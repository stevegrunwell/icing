<!DOCTYPE html>
<!--[if IE 7]><html class="no-js ie7" lang="en"><![endif]-->
<!--[if IE 8]><html class="no-js ie8" lang="en"><![endif]-->
<!--[if (gte IE 9) | !(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
<?php echo $this->Html->charset(); ?>
<title>untitled</title>
<?php echo $this->Html->css( 'style' ); ?>
</head>
<body>
  <div id="wrapper">
    <header>
      <?php echo $this->Html->link( 'Icing', '/', array( 'id' => 'site-logo' ) ); ?>
      <nav id="primary-nav">
        <ul>
        <?php if ( $userLoggedIn ) : ?>
          <li><?php echo $this->Html->link( 'Add Icing', array( 'controller' => 'posts', 'action' => 'add' ) ); ?></li>
          <li><?php echo $this->Html->link( 'Logout', array( 'controller' => 'users', 'action' => 'logout' ) ); ?></li>
        <?php else : ?>
          <li><?php echo $this->Html->link( 'Login', array( 'controller' => 'users', 'action' => 'login' ) ); ?></li>
          <li><?php echo $this->Html->link( 'Sign up', array( 'controller' => 'users', 'action' => 'add' ) ); ?></li>
        <?php endif; ?>
        </ul>
      </nav>
    </header>

    <div id="content">

      <?php echo $this->fetch( 'content' ); ?>

    </div><!-- #content -->
  </div><!-- #wrapper -->
</body>
</html>