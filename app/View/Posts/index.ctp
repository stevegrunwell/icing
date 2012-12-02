<h1>Latest Icings</h1>

<?php echo $this->Session->flash(); ?>

<ul class="posts">
<?php foreach ( $posts as $post ) : ?>

  <?php echo $this->element( 'postListItem', array( 'post' => $post ) ); ?>

<?php endforeach; ?>
</ul>