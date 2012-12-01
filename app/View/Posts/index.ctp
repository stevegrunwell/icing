<h1>Latest Icings</h1>
<?php echo $this->Html->link( 'Add Icing', array( 'controller' => 'posts', 'action' => 'add' ) ); ?>

<ul class="icings">
<?php foreach ( $posts as $post ) : ?>

  <li class="icing">
    <p><?php echo $post['Post']['content']; ?></p>
    <ul class="meta">
      <li><?php echo $this->Post->formatPostDate( $post['Post']['created'] ); ?></li>
      <li><?php echo $this->Html->link( 'Permalink', array( 'controller' => 'posts', 'action' => 'view', $post['Post']['id'] ) ); ?></li>
    </ul>
  </li>

<?php endforeach; ?>
</ul>