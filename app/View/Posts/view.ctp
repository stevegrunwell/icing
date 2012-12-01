<article class="icing">
  <p><?php echo h( $post['Post']['content'] ); ?></p>
  <ul class="meta">
    <li><?php echo $this->Post->formatPostDate( $post['Post']['created'] ); ?></li>
    <li><?php echo $this->Form->postLink( 'Delete', array( 'action' => 'delete', $post['Post']['id'] ), array( 'confirm' => 'Are you sure you want to delete this icing?' ) ); ?></li>
  </ul>
</article>