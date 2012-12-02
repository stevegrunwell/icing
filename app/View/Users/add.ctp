<div class="signup">
  <h1>Signup</h1>

  <?php echo $this->Session->flash(); ?>

  <?php
    echo $this->Form->create( 'User' );
    echo $this->Form->input( 'username' );
    echo $this->Form->input( 'email_address', array( 'type' => 'email' ) );
    echo $this->Form->input( 'password', array( 'type' => 'password' ) );
    echo $this->Form->input( 'confirm_password', array( 'type' => 'password' ) );
    echo $this->Form->end( 'Register' );
  ?>
</div><!-- .signup -->