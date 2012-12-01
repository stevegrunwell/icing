<li class="post">
  <p><?php echo $post['Post']['content']; ?></p>
  <ul class="meta">
    <li><?php echo $this->Post->formatPostDate( $post['Post']['created'] ); ?></li>
    <li><?php echo $this->Html->link( 'Permalink', array( 'controller' => 'posts', 'action' => 'view', $post['Post']['id'] ) ); ?></li>
  </ul>
</li>