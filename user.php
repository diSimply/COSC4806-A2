<?php 

require_once('database.php');

class User {

  // get all users
  public function getAllUsers(){
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  // create new user
  public function createUser($username, $password){
    $db = db_connect();
    $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    $statement->execute();
    
  }
  
}


?>