<?php 

require_once('config.php');

function db_connect() {
  try {
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
    return $db;
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  
}


?>