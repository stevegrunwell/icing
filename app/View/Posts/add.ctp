<h1>New Icing</h1>
<?php
  echo $this->Form->create( 'Post' );
  echo $this->Form->input( 'content', array( 'rows' => 3 ) );
  echo $this->Form->end( 'Save' );
?>