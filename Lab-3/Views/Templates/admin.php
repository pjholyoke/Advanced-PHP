
<?php if(isset($_SESSION['user_id'])) { ?>
<div class="col-md-4">
  <h3><span class="text-info">User ID:</span> <?php echo $_SESSION['user_id']; ?></h3>
  <h3><span class="text-info">Email address:</span> <?php echo $_SESSION['email']; ?></h3>
</div>
<?php } else { ?>
<div class="col-md-12 text-center">
  <h1 style="color:white; font-size: 4em;" style="font-size: 4.5em;">Access Denied</h1>
  <p style="color:white;">Nope - You don't have the required permissions</p>
</div>
<?php } ?>