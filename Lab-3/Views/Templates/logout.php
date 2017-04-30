<div class="text-center">
  <h2>You have been logged out!</h2>
  <p>You will redirected to the home page in <span id="timer">5</span> seconds</p>
  <?php
    session_destroy();
    unset($_SESSION);
    header( "refresh:5;url=index.php" );
  ?>
</div>