<?php
App::uses('AppHelper', 'View/Helper');

class PostHelper extends AppHelper {
  public $helpers = array( 'Time' );

  /**
   * Format a post date
   * Will create a <time> element with an RFC 2822-formatted Datetime string as a title attribute and a more user-friendly
   * "{time} ago"-style string for display
   *
   * @param str $date The date, most likely $post['Post']['created']
   * @return str The formatted <time> element
   * @uses TimeHelper::timeAgoInWords()
   */
   public function formatPostDate( $date=false ) {
     $time = ( $date ? strtotime( $date ) : time() );
     return sprintf( '<time title="%s">Posted %s</time>', date( 'r', $time ), $this->Time->timeAgoInWords( $time ) );
   }
}

?>