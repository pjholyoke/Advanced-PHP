<?php include_once('Autoloader.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Lab2 - Part 1 Test</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body>
    <style>.alert { font-size: 2.5em; margin: 0; border-radius: 0; } .nopad { margin: 0px; padding: 0px; } </style>
    
    <?php
      $err = new ErrorMessage();
      $woo = new SuccessMessage();
      
      // Add some stuff.
      $err->addMessage(mt_rand(), 'Aaaa Fire <i class="fa fa-fire" aria-hidden="true"></i>');
      $err->addMessage('remove-me', "I won't show up.");
      
      $woo->addMessage(mt_rand(), 'Woo, fire extinguisher <i class="fa fa-fire-extinguisher" aria-hidden="true"></i>');
      $woo->addMessage(mt_rand(), 'I will show up.');
    
      // Remove one.
      $err->removeMessage('remove-me');
    ?>
    
    <!-- Print everything -->
    <div class="col-xs-6 nopad">
      <?php foreach($err->getAllMessages() as $msg) { ?>
        <div class="alert alert-danger">
          <strong>Error: </strong> <?php echo $msg; ?>
        </div>
      <?php } ?>
    </div>
    
    <div class="col-xs-6 nopad">
      <?php foreach($woo->getAllMessages() as $msg) { ?>
        <div class="alert alert-success">
          <strong>Success: </strong> <?php echo $msg; ?>
        </div>
      <?php } ?>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>