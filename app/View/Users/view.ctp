<div class="user profile">

  <h1><?php echo $user['User']['username']; ?></h1>

  <h2>Recent Icings</h2>

<?php if ( $posts ) : ?>

  <ul class="recent-posts">
  <?php foreach ( $posts as $post ) : ?>

    <?php echo $this->element( 'postListItem', array( 'post' => $post ) ); ?>

  <?php endforeach; ?>
  </ul>

<?php else : ?>

  <p class="no-posts"><?php sprintf( '%s has not iced yet', $user['User']['username'] ); ?></p>

<?php endif; ?>

</div>