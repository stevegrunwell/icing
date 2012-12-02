<?php
class AppSchema extends CakeSchema {

  public function before($event = array()) {
    return true;
  }

  public function after($event = array()) {
  }

  public $posts = array(
    'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
    'content' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
    'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
    'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
    'indexes' => array(
      'PRIMARY' => array('column' => 'id', 'unique' => 1)
    ),
    'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
  );
  public $users = array(
    'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
    'email_address' => array('type' => 'string', 'null' => false, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
    'username' => array('type' => 'string', 'null' => false, 'length' => 120, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
    'password' => array('type' => 'string', 'null' => false, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
    'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
    'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
    'last_login' => array('type' => 'datetime', 'null' => false, 'default' => null),
    'indexes' => array(
      'PRIMARY' => array('column' => 'id', 'unique' => 1),
      'email' => array('column' => 'email_address', 'unique' => 1),
      'username' => array('column' => 'username', 'unique' => 1)
    ),
    'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
  );
}
