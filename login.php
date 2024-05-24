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
        if($search_param['error'] == 'invalid_credentials') {
          $error_text = "Invalid credentials";
        } else {
          $error_text = "Failed to login";
        }
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>
  </head>
  <body>
    <h1>Login</h1>
    <form action="/validate.php" method="post">
      <div>
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" required>
      </div>
      <div>
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" required>
      </div>
      <input type="submit" value="Submit">
      <p style="color: red;"><?php echo $error_text ?></p>
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up</a></p>
  </body>
</html>