<?php

class PostsController extends AppController {

  public $helpers = array( 'Form', 'Html', 'Post', 'Session' );

  public function index() {
    $this->set( 'posts', $this->Post->find( 'all', array( 'order' => 'Post.created DESC' ) ) );
  }

  public function view( $id=null ) {
    $this->Post->id = $id;
    $this->set( 'post', $this->Post->read() );
    $this->set( 'can_delete', $this->Post->userCanEditPost( $id, $this->Auth->user( 'id' ) ) );
  }

  public function add() {
    if ( $this->request->is( 'post' ) ) {
      $this->Post->create();
      $this->request->data['Post']['user_id'] = $this->Auth->user( 'id' );
      if ( $this->Post->save( $this->request->data ) ) {
        $this->Session->setFlash( 'Your icing has been created successfully', 'default', array( 'class' => 'success' ) );
        $this->redirect( array( 'action' => 'index' ) );
      } else {
        $this->Session->setFlash( 'There was an error creating your icing', 'default', array( 'class' => 'error' ) );
      }
    }
  }

  public function delete( $id ) {
    if ( $this->request->is( 'get' ) ) {
      throw new MethodNotAllowedException();
    }

    if ( $this->Post->delete( $id ) ) {
      $this->Session->setFlash( 'Your icing has been deleted', 'default', array( 'class' => 'success' ) );
      $this->redirect( array( 'action' => 'index' ) );
    }
  }

  public function isAuthorized( $user ) {
    if ( $this->action === 'add' ) {
      return true;
    }

    if ( $this->action === 'delete' ) {
      $post_id = $this->request->params['pass'][0];
      if ( $this->Post->userCanEditPost( $post_id, $user['id'] ) ) {
        return true;
      }
    }

    return parent::isAuthorized( $user );
  }

}