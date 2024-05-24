<?php

  require_once('user.php');
  $user = new User();

  session_start();

  

  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];

  $user_row = $user->getUserByUsernamePassword($username, $password);

  // if user row exists, then login was successfull
  if ($user_row) {
    $_SESSION['authenticated'] = true;
    $_SESSION['failed_attempts'] = 0;
    $_SESSION['username'] = $username;
    header('location: /');
  } else {
    // check the session variable
    if (isset($_SESSION['failed_attempts'])) {
      // session variable already exists, update it
      $_SESSION['failed_attempts'] = $_SESSION['failed_attempts'] + 1;
    } else {
      // session variable does not exist, initialize it
       $_SESSION['failed_attempts'] = 1;
    }
    header('location: /login.php?error=invalid_credentials');
  }

?>