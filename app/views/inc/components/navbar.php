<div class="topnav">
  <a class="active" href="#home">Home</a>
  <?php if(!isset($_SESSION['user_id'])): ?>
  <a href="<?php echo URLROOT ?>/users/register">Register</a>
  <a href="<?php echo URLROOT ?>/users/login">Login</a>
  <?php else: ?>
  <a href="<?php echo URLROOT ?>/users/logout">Logout</a>
  <?php endif; ?>

</div>