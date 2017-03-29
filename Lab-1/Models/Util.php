<?php
  function ValidateDate($date) {
    return !!strtotime($date); 
  }

  function ValidateZip($zip) {
    $pattern = '/^[0-9]{5}$/';
    
    if(preg_match($pattern, $zip))
      return true;
    
    return false;
  }

?>