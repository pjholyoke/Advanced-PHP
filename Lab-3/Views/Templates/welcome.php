<div class="text-center">
  <?php if(!isset($_SESSION['user_id'])) { ?>
  <h2 class="text-default" style="margin-bottom: 1em;">Hello, please login using the button on the top right.</h2>

  <div class="col-xs-4 col-xs-offset-4">
    <a href="Login.php"><button class="btn btn-success btn-block">Or Login Here</button></a>
  </div>
  <?php } else { ?>
  <div class="col-xs-4 col-xs-offset-4">
    <h2 class="text-default" style="margin-bottom: 1em;">Hello <?php echo $_SESSION['email']; ?>, thank you for logging in.</h2>
    <a href="Admin.php"><button class="btn btn-danger btn-block">Administrator Page</button></a><br />
    <a href="Logout.php"><button class="btn btn-default btn-block">Log out</button></a>
  </div>
  <?php } ?>
</div>