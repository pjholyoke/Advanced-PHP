<?php

class Util extends DBSpring {

  protected $db = null;

  public function getHashForEmail($email) {
    $db = $this->getDb();
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

  public function login($email, $pwd) {
    return password_verify($pwd, $this->getHashForEmail($email));
  }

  public function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
  }
}


?>
