<?php
class PostsController extends AppController {
  public $helpers = array( 'Form', 'Html', 'Post', 'Session' );

  public function index() {
    $this->set( 'posts', $this->Post->find( 'all', array( 'order' => 'created DESC' ) ) );
  }

  public function view( $id=null ) {
    $this->Post->id = $id;
    $this->set( 'post', $this->Post->read() );
  }

  public function add() {
    if ( $this->request->is( 'post' ) ) {
      $this->Post->create();
      if ( $this->Post->save( $this->request->data ) ) {
        $this->Session->setFlash( 'Your icing has been created successfully' );
        $this->redirect( array( 'action' => 'index' ) );
      } else {
        $this->Session->setFlash( 'There was an error creating your icing' );
      }
    }
  }

  public function delete( $id ) {
    if ( $this->request->is( 'get' ) ) {
      throw new MethodNotAllowedException();
    }

    if ( $this->Post->delete( $id ) ) {
      $this->Session->setFlash( 'Your icing has been deleted' );
      $this->redirect( array( 'action' => 'index' ) );
    }
  }

}