<?php 
  require_once('Autoloader.php');
  require_once('Views/Templates/header.php');
?>
  <div class="container-fluid">
    <?php

    // Check request type.
    switch($_SERVER['REQUEST_METHOD']) {
      case "GET":
        include('Views/Templates/logout.php');
        break;
      case "POST":
        break;
      case "PUT":
        break; // Do nothing
      case "DELETE":
        break; // Do nothing
      default:
        break; // Do nothing
    }
    ?>

  </div>
<?php require_once('Views/Templates/footer.php'); ?>