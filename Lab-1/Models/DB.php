<?php  
function DB() {
    $config = array(
        'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2017',
        'DB_USER' => 'root',
        'DB_PASSWORD' => ''
    );

    try {
        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } 
    catch (Exception $ex) {
        // Release resources if an exception is thrown.
        $db = null;
        $message = $ex->getMessage();
        var_dump($message);
        exit();
    }

    return $db;
}
?>