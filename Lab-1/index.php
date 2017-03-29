<?php 
require_once('./Models/DB.php');
require_once('./Models/CRUD.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Lab 1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="Views/CSS/style.css">
  </head>

  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="./">Lab 1</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="./">Home</a></li>
          <li><a href="Add.php">Add</a></li>
        </ul>
      </div>
    </nav>


    <div class="container-fluid">
      <?php
        $addrs = GetAllAddresses();
      
        $fullname     = filter_input(INPUT_POST, 'fullname');
        $email        = filter_input(INPUT_POST, 'email');
        $addressline1 = filter_input(INPUT_POST, 'addressline1');
        $city         = filter_input(INPUT_POST, 'city');
        $state        = filter_input(INPUT_POST, 'state');
        $zip          = filter_input(INPUT_POST, 'zip');
        $birthday     = filter_input(INPUT_POST, 'birthday');

        $errors = [];

        // Check request type.
        switch($_SERVER['REQUEST_METHOD']) {
          case "GET":
            include('Views/Templates/address-table.php');
            break;
          case "POST":
            CreateAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday);
            
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>