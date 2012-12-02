<li class="post">
  <p class="author">
  <?php
    $image_atts = array(
      'alt' => $post['User']['username'],
      'class' => 'avatar'
    );
    echo $this->Html->image( $this->User->getGravatar( $post['User']['email_address'], 120 ), $image_atts );
    echo $this->Html->link( $post['User']['username'], array( 'controller' => 'users', 'action' => 'view', 'username' => $post['User']['username'] ) );
  ?>
  </p>
  <p><?php echo $post['Post']['content']; ?></p>
  <ul class="meta">
    <li><?php echo $this->Post->formatPostDate( $post['Post']['created'] ); ?></li>
    <li><?php echo $this->Html->link( 'Permalink', array( 'controller' => 'posts', 'action' => 'view', $post['Post']['id'] ) ); ?></li>
  </ul>
</li>