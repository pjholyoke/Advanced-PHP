<?php 
  require_once('Autoloader.php');
  require_once('Views/Templates/header.php');
?>
  <div class="container-fluid">
    <?php

    // Check request type.
    switch($_SERVER['REQUEST_METHOD']) {
      case "GET":
        try {
          $CRUD = new CRUD();

        } catch(Exception $e) {?>
    <div class="col-md-12 text-center">
      <h3 class="text-danger">Couldn't Connect to Database</h3>
      <p>Looks like we couldn't connect to the database, sorry. Please try again.</p>
      <pre style="text-align: left;"><?php
        var_dump($e);  
      ?></pre>
    </div>
    <?php
        }
        include('Views/Templates/welcome.php');
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