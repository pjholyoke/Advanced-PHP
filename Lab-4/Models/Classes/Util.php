<?php

class Util extends DB {

  protected $db = null;

  public function __construct() {
    $this->db = new DB(
      'mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2017',
      'root',
      ''
    );
  }

  public function getHashForEmail($email) {
    $db = $this->db->getDb();
    $results = "";

    $stmt = $db->prepare("SELECT password FROM users WHERE email = :email");
    $binds = array(":email" => $email);

    try {
      // Check that at least one row was returned
      if ($stmt->execute($binds) && $stmt->rowCount() > 0)
        $results = $stmt->fetch()[0];
      else
        $results = null;

    } catch (PDOException $e) {
      return false;
    }

    return $results;
  }

  public function getAllUserData() {
    $db = $this->db->getDb();
    $stmt = $db->prepare("SELECT * FROM users");
    $results = [];

    if ($stmt->execute() && $stmt->rowCount() > 0) {
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
  }

  public function createAccount($email, $pwd) {

    $db = $this->db->getDb();
    $pwd = password_hash($pwd, PASSWORD_BCRYPT);

    // Prepared statement
    $stmt = $db->prepare(
      "INSERT INTO users SET 
        email = :email, 
        password = :pwd,
        created = NOW()"
    );

    // Bind params
    $binds = array(
      ":email" => $email,
      ":pwd" => $pwd
    );

    try {
      // Check that at least one row was affected
      if ($stmt->execute($binds) && $stmt->rowCount() > 0)
        return true;

    } catch (PDOException $e) {
      if ($e->errorInfo[1] == 1062) {
        // duplicate entry, do something else
      }
    }

    return false;
  }

  public function login($email, $pwd) {
    return password_verify($pwd, $this->getHashForEmail($email));
  }
}


?>