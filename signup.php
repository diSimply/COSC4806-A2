<?php
  session_start();
  if (isset($_SESSION['authenticated'])) {
    $authenticated = $_SESSION['authenticated'];
    if ($authenticated) {
      // redirect to home page when authenticated
      header('location: /');
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
    </form>
  </body>
</html>