<?php
class Post extends AppModel {
  public $validate = array(
    'content' => array(
      'rule' => array( 'maxLength', 140 ),
      'required' => true,
      'message' => 'Your icing cannot be longer than 140 characters'
    )
  );
}