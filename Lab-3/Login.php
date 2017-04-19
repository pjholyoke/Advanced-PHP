<?php
  require_once('Autoloader.php');
  require_once('Views/Templates/header.php');

  include_once('Views/Templates/login.php');

  $util = new Util();

  if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
    $email = filter_input(INPUT_POST, 'email');
    $pwd = filter_input(INPUT_POST, 'pwd');
    $errors = [];
    
    if($util->login($email, $pwd)) {
      // Login correct
      $usr = $util->getAllUserData()[0];
      $_SESSION['user_id'] = $usr['user_id'];
      $_SESSION['email'] = $usr['email'];
      header("location: index.php");
    }
    else {
      // Login failed
      array_push($errors, "E-mail address or password is incorrect");
      include('Views/Templates/error-template.php');
    }
  }

  
  require_once('Views/Templates/footer.php');
?>