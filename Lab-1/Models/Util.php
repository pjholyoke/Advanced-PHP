<?php

  // Check email with email filter.
  function ValidateEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false)
      return true; 
    else
      return false;
  }

  // Make sure date is correct format.
  function ValidateDate($date) {
    return !!strtotime($date); 
  }

  // Check for valid date.
  function ValidateZip($zip) {
    $pattern = '/^[0-9]{5}$/';
    
    if(preg_match($pattern, $zip))
      return true;
    
    return false;
  }

?>