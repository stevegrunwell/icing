<div class="login">
  <h1>Login</h1>

  <?php
    echo $this->Session->flash( 'auth' );
    echo $this->Form->create( 'User' );
    echo $this->Form->input( 'username' );
    echo $this->Form->input( 'password', array( 'type' => 'password' ) );
    echo $this->Form->end( 'Login' );
  ?>
</div><!-- .login -->