<?php

App::uses( 'AppHelper', 'View/Helper' );

class UserHelper extends AppHelper {
  /**
   * Get a user's gravatar
   * @param str $email The user's email address
   * @param int size The width/height (doesn't matter, it's a square) of the gravatar
   * @return str
   */
  public function getGravatar( $email='', $size=80 ) {
    $base = '//gravatar.com/avatar/%s.jpg?s=%d';
    return sprintf( $base, md5( trim( strtolower( $email ) ) ), $size );
  }
}