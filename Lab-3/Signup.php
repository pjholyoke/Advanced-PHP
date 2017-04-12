<?php
  require_once('Autoloader.php');
  $util = new Util();

  require_once('Views/Templates/header-logged-out.php');

  include_once('Views/Templates/signup.php');

  if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
    $email = filter_input(INPUT_POST, 'email');
    $pwd = filter_input(INPUT_POST, 'pwd');
    $pwdVer = filter_input(INPUT_POST, 'confirm-pwd');
    
    $pwdMatch = ($pwd === $pwdVer);
    $errors = [];
    
    try {
      
      if(empty($email))
        array_push($errors, "Email Field Is Required");
      
      if(empty($pwd))
        array_push($errors, "Please enter a password");
      
      if(empty($pwdVer))
        array_push($errors, "Please confirm your password");
      
      if(!$pwdMatch)
        array_push($errors, "Passwords do not match");
      
      if(empty($errors)) {
        $util->createAccount($email, $pwd);
        include('Views/Templates/success-template.php');
      }
      else
        include('Views/Templates/error-template.php');
      
    }
    catch(Exception $e) {
        array_push($errors, "An unknown error occurred");   
    }
  }

  require_once('Views/Templates/footer.php');
?>