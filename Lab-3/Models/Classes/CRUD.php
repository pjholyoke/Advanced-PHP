<?php

class CRUD extends DB {
  
  protected $db;
  
  public function __construct() {
    $temp = new DB(
      'mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2017',
      'root',
      ''
    );

    $this->db = $temp->getDb();
  }
  
  public function create($fullname, $email, $addressline1, $city, $state, $zip, $birthday) {
    $db = $this->db;

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
  
  public function update() {
    // TODO
  }
  
  public function delete() {
    // TODO
  }
  
  public function getAll() {
    $stmt = $this->db->prepare("SELECT * FROM address");
    $results = [];

    if ($stmt->execute() && $stmt->rowCount() > 0) {
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
  }
}



?>