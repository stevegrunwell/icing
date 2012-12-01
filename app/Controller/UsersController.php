<?php

class UsersController extends AppController {

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow( 'add', 'login' );
  }

  public function view( $id=null ) {
    $this->User->id = $id;
    if ( ! $this->User->exists() ) {
      throw new NotFoundException( 'User does not exist' );
    }
    $this->set( 'user', $this->User->read( null, $id ) );
    $this->set( 'posts', $this->User->Post->find( 'all', array( 'conditions' => array( 'user_id' => $id ), 'limit' => 10, 'order' => 'Post.created DESC' ) ) );
  }

  public function add() {
    if ( $this->request->is( 'post' ) ) {
      $this->User->create();
      if ( $this->User->save( $this->request->data ) ) {
        $this->Session->setFlash( 'Your account has been created successfully' );
        $this->redirect( array( 'action' => 'view', $this->User->id ) );
      } else {
        $this->Session->setFlash( 'Unable to create user account' );
      }
    }
  }

  public function edit() {
    $this->User->id = $this->Auth->user( 'id' );
    if ( ! $this->User->exists() ) {
      throw new NotFoundException( 'Invalid user' );
    }

    if ( $this->request->is( 'post' ) || $this->request->is( 'put' ) ) {
      if ( $this->User->save( $this->request->data ) ) {
        $this->Session->setFlash( 'Your changes have been saved' );
        $this->redirect( array( 'action' => 'view' ) );
      } else {
        $this->Session->setFlash( 'Changes could not be saved' );
      }
    } else {
      $this->request->data = $this->User->read( null, $id );
      unset( $this->request->data['User']['password'] );
    }
  }

  public function login() {
    if ( $this->request->is( 'post' ) ) {
      if ( $this->Auth->login() ) {
        $this->redirect( $this->Auth->redirect() );
      } else {
        $this->Session->setFlash( 'Invalid credentials' );
      }
    }
  }

  public function logout() {
    $this->redirect( $this->Auth->logout() );
  }

}