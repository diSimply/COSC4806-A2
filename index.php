<?php
  session_start();
  if (isset($_SESSION['authenticated'])) {
    $username = $_SESSION['username'];
    $authenticated = $_SESSION['authenticated'];
    if (!$authenticated) {
      // redirect to login page when not authenticated
      header('location: /login.php');
    }
  } else {
    // redirect to login page when not authenticated
    header('location: /login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
  <h1>Assignment 2 Home</h1>
  <p>
   <div>Welcome <strong><?php echo $username ?></strong>!</div>
   <div>Today is <i><?php echo date("M d, Y")?></i>.</div> 
   <div>You are in the home page.</div>
   <a href="logout.php">Logout</a>
  </p>
</body>
</html>