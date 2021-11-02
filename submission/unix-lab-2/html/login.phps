<?php
  include "config.php";

  $user = $_POST["username"];
  $pass = $_POST["password"];
  $usrEnv = $_ENV["USERNAME"];
  $pswEnv = $_ENV["PASSWORD_HASH"];
  $salt = $_ENV["SALT"];

  $hashed = crypt($pass, $salt);

  if ($usrEnv == $user && $pswEnv == $hashed) {
    echo "<h1>Logged in!</h1>";
    echo "<p>Your flag is: $FLAG</p>";
  } else {
    echo "<h1>Login failed.</h1>";
  }
?>
