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
    $user_row = $this->getUserByUsername($username);
    if ($user_row) { // check row exists
      $hashed_password = $user_row['password'];
      if ($user_row) {
        if(password_verify($password, $hashed_password)) {
            return $user_row;
        }   
      }
    }
    return null;
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
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $statement->bindParam(':password', $hashed_password);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row;
  }
  
}


?>