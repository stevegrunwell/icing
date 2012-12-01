<article class="post">
  <p><?php echo h( $post['Post']['content'] ); ?></p>
  <ul class="meta">
    <li><?php echo $this->Post->formatPostDate( $post['Post']['created'] ); ?></li>
  <?php if ( $can_delete ) : ?>
    <li><?php echo $this->Form->postLink( 'Delete', array( 'action' => 'delete', $post['Post']['id'] ), array( 'confirm' => 'Are you sure you want to delete this icing?' ) ); ?></li>
  <?php endif; ?>
  </ul>
</article>