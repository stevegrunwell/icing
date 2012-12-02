<div class="new-post">
  <h1>New Icing</h1>

  <?php echo $this->Session->flash(); ?>

  <?php
    echo $this->Form->create( 'Post' );
    echo $this->Form->input( 'content', array( 'div' => false, 'rows' => 3, 'label' => array( 'class' => 'screen-reader-text' ) ) );
    echo $this->Form->end( 'Save' );
  ?>
</div><!-- .new-post -->