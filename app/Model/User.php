<?php

App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {

  public $hasMany = 'Post';

  public $validate = array(
    'email_address' => array(
      'email' => array(
        'rule' => 'email',
        'required' => true,
        'message' => 'You must provide a valid email address'
      ),
      'isUnique' => array(
        'rule' => 'isUnique',
        'message' => 'There is already an account registered for that email address'
      )
    ),
    'username' => array(
      'required' => array(
        'rule' => 'notEmpty',
        'required' => true,
        'message' => 'You must select a username'
      ),
      'isUnique' => array(
        'rule' => 'isUnique',
        'message' => 'That username is already taken'
      ),
      'alphanumeric' => array(
        'rule' => 'alphanumeric',
        'message' => 'Usernames can only contain letters and numbers'
      ),
      'reserved' => array(
        'rule' => 'checkAgainstReservedUsernames',
        'message' => 'That username is not permitted'
      )
    ),
    'password' => array(
      'rule' => array( 'minLength', 6 ),
      'required' => true,
      'message' => 'Passwords must be at least 6 characters long'
    ),
    'confirm_password' => array(
      'required' => array(
        'rule' => array( 'notEmpty' ),
        'required' => true,
        'message' => 'Passwords do not match'
      ),
      'matches' => array(
        'rule' => array( 'validatePasswordConfirmation' ),
        'message' => 'Passwords do not match'
      )
    ),
  );

  /**
   * Don't let users register names that can/will conflict with actual routes
   * @param array $data Request data to validate
   * @return bool
   */
  public function checkAgainstReservedUsernames( $data ) {
    $reserved = array( 'posts', 'users', 'admin', 'login', 'logout', 'signup' );
    return ! in_array( $data['username'], $reserved );
  }

  /**
   * Ensure that a user-supplied password matches the password confirmation
   * @param array $data Request data to validate
   * @return bool
   */
  public function validatePasswordConfirmation( $data ) {
    return $this->data['User']['password'] === $data['confirm_password'];
  }

  public function beforeSave( $options=array() ) {
    if ( isset( $this->data[$this->alias]['password'] ) ) {
      $this->data[$this->alias]['password'] = AuthComponent::password( $this->data[$this->alias]['password'] );
    }
    return true;
  }

}