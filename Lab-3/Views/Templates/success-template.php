<div class="col-sm-4 col-sm-offset-4" style="margin-top: 1em;">
  <div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong>
    <br />
    You've successfully created an account. Click <a href="Login.php">here</a> to login!
    <ul>
      <?php
        foreach($errors as $error) {
          echo("<li>$error</li>");
        }
      ?>
    </ul>

    <small>(Click me to clear this message)</small>
  </div>
</div>