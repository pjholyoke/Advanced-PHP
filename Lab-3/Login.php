<?php
  require_once('Views/Templates/header-logged-out.php');

  if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
    
  }

  include_once('Views/Templates/login.php');
  
  require_once('Views/Templates/footer.php');
?>