<?php

class Post extends AppModel {

  public $belongsTo = 'User';

  public $validate = array(
    'content' => array(
      'required' => array(
        'rule' => 'notEmpty',
        'required' => true,
        'message' => 'Your icing cannot be empty'
      ),
      'maxLength' => array(
        'rule' => array( 'maxLength', 140 ),
        'message' => 'Your icing cannot be longer than 140 characters'
      )
    )
  );

  /**
   * Can the currently logged-in user edit this post?
   * @param int $post The post ID
   * @param int $user The user ID
   * @return bool
   */
  public function userCanEditPost( $post=false, $user=false ) {
    return $this->field( 'id', array( 'id' => $post, 'user_id' => $user ) ) === $post;
  }

}