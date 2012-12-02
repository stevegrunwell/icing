<?php

App::import( 'Model', 'User' );

class UserTest extends CakeTestCase {

  public $User;

  public function setUp() {
    $this->User = new User;
  }

  public function testClassExistance() {
    $this->assertTrue( class_exists( 'User' ) );
  }

  public function testValidations() {

  }

  public function testCheckAgainstReservedUsernames() {

    // Restricted usernames
    foreach ( array( 'posts', 'users', 'login', 'logout', 'signup' ) as $restricted ) {
      $this->assertFalse( $this->User->checkAgainstReservedUsernames( array( 'username' => $restricted ) ) );
    }

    // Nice, normal names that don't conflict with our routes
    foreach ( array( 'bob', 'alice' ) as $permitted ) {
      $this->assertTrue( $this->User->checkAgainstReservedUsernames( array( 'username' => $permitted ) ) );
    }
  }

}