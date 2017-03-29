<?php

function GetAllAddresses() {
  $db = DB();
  
  $stmt = $db->prepare("SELECT * FROM address");
  $results = [];
  
  if ($stmt->execute() && $stmt->rowCount() > 0) {
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
    
  return $results;
}


function CreateAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday) {
  $db = DB();
  
  // Prepared statement
  $stmt = $db->prepare(
    "INSERT INTO address SET 
    fullname     = :fullname, 
    email        = :email, 
    addressline1 = :addressline1, 
    city         = :city, 
    state        = :state, 
    zip          = :zip, 
    birthday     = :birthday"
  );
  
  // Bind params
  $binds = array(
    ":fullname"     => $fullname,
    ":email"        => $email,
    ":addressline1" => $addressline1,
    ":city"         => $city,
    ":state"        => $state,
    ":zip"          => $zip,
    ":birthday"     => $birthday
  );
  
  // Check that at least one row was affected
  if ($stmt->execute($binds) && $stmt->rowCount() > 0)
    return true;
  
  return false;
}

?>