<?php

class UsersController extends AppController {

  public $helpers = array( 'Form', 'Html', 'User', 'Session' );

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow( 'add', 'login', 'logout' );
  }

  public function view( $id=null, $is_username=true ) {
    if ( $is_username ) {
      $id = $this->User->field( 'id', array( 'username' => $id ) );
    }
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
        $this->Session->setFlash( 'Your account has been created successfully', 'default', array( 'class' => 'success' ) );
        $this->redirect( array( 'action' => 'view', $this->User->id ) );
      } else {
        $this->Session->setFlash( 'Unable to create user account', 'default', array( 'class' => 'error' ) );
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
        $this->Session->setFlash( 'Your changes have been saved', 'default', array( 'class' => 'success' ) );
        $this->redirect( array( 'action' => 'view' ) );
      } else {
        $this->Session->setFlash( 'Changes could not be saved', 'default', array( 'class' => 'error' ) );
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
        $this->Session->setFlash( 'Invalid credentials', 'default', array( 'class' => 'error' ) );
      }
    }
  }

  public function logout() {
    $this->redirect( $this->Auth->logout() );
  }

}