<?php 
  require_once('user.php');
  $user = new User();


  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];
  $confirm_password = $_REQUEST['confirm_password'];


  // check passwords match
  if($password != $confirm_password) {
    header('location: /signup.php?error=passwords_dont_match');   
  } else if(strlen($password) < 10) {
     header('location: /signup.php?error=password_must_be_at_least_10_characters');   
  } else { // check username does not already exist
    $user_row = $user->getUserByUsername($username);
    if($user_row) {
      header('location: /signup.php?error=username_already_exists');
    } else {
      $user->createUser($username, $password);
      header('location: /login.php');
    }

  }
?>