<h1>Latest Icings</h1>
<?php echo $this->Html->link( 'Add Icing', array( 'controller' => 'posts', 'action' => 'add' ) ); ?>

<ul class="posts">
<?php foreach ( $posts as $post ) : ?>

  <?php echo $this->element( 'postListItem', array( 'post' => $post ) ); ?>

<?php endforeach; ?>
</ul>