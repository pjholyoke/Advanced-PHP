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
    
  }


?>