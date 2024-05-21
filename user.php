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

  public function getUserByUsernamePassword($username, $password) {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    return $row;
  }

  public function getUserByUsername($username) {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users WHERE username = :username");
    $statement->bindParam(':username', $username);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    return $row;
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