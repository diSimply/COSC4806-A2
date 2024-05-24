<?php
  session_start();
  if (isset($_SESSION['authenticated'])) {
    $authenticated = $_SESSION['authenticated'];
    if ($authenticated) {
      // redirect to home page when authenticated
      header('location: /');
    }
  }

  $error_text = '';
  if(isset($_SERVER['QUERY_STRING'])) {
    $search_param = array();
    parse_str($_SERVER['QUERY_STRING'], $search_param);
    if (isset($search_param['error'])) {
      if($search_param['error'] == 'passwords_dont_match') {
        $error_text = "Passwords don't match";
      } else if ($search_param['error'] == 'password_must_be_at_least_10_characters') {
        $error_text = "Password must be at least 10 characters";
      } else if ($search_param['error'] == 'username_already_exists') {
        $error_text = "Username already exists";
      } else {
        $error_text = "Failed to signup";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sign Up</title>
  </head>
  <body>
    <h1>Sign Up</h1>
    <form action="/create_user.php" method="post">
      <div>
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" required>
      </div>
      <div>
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" required>
      </div>
      <div>
        <label for="confirm_password">Confirm Password: </label>
        <input type="password" id="confirm_password" name="confirm_password" required>
      </div>
      <input type="submit" value="Submit">
      <p style="color: red;"><?php echo $error_text ?></p>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
  </body>
</html>