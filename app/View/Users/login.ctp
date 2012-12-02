<div class="login">
  <h1>Login</h1>

  <?php echo $this->Session->flash(); ?>

  <?php
    echo $this->Session->flash( 'auth' );
    echo $this->Form->create( 'User' );
    echo $this->Form->input( 'username' );
    echo $this->Form->input( 'password', array( 'type' => 'password' ) );
    echo $this->Form->end( 'Login' );
  ?>

  <h2>Don't have an account?</h2>
  <p><?php echo $this->Html->link( 'Register now', array( 'controller' => 'users', 'action' => 'add' ) ); ?> to talk about yourself in public.</p>
</div><!-- .login -->