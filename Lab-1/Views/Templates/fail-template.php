<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Form contains the following errors:</strong>
  <br />
  
  <ul>
    <?php
      foreach($errors as $error) {
        echo("<li>$error</li>");
      }
    ?>
  </ul>
  
  <small>(Click me to clear this message)</small>
</div>