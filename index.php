<?php

require_once('user.php');

$user = new User();
$user_rows = $user->getAllUsers();

print_r($user_rows);
?>