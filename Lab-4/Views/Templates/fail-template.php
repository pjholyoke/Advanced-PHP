<div class="col-sm-4 col-sm-offset-4" style="margin-top: 1em;">
  <div class="alert alert-danger alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Uh oh!</strong>
    <br />
    File could not be uploaded!
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