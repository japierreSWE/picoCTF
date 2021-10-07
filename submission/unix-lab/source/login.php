<?php
  include "config.php";

  $username = $_POST["username"];
  $password = $_POST["password"];
  $debug = $_POST["debug"];

  $username .= ":";
  $hashed = crypt($password, $salt);

  $contents = file_get_contents($password_file);
  $usrpswrd = explode('$', $contents);
  $usrpswrd[3] = $salt . $usrpswrd[3];

  

  if ($usrpswrd[0] == $username && (trim($hashed) == trim($usrpswrd[3])) ) {
    echo "<h1>Logged in!</h1>";
    echo "<p>Your flag is: $FLAG</p>";
  } else {
    echo "<h1>Login failed.</h1>";
  }

  if (intval($debug)) {
    echo "<pre>";
    echo "username: ", htmlspecialchars($username), "\n";
    echo "password: ", htmlspecialchars($password), "\n";
    echo "returned from hash fuction: " . $hashed . "\n";
    echo "username from passfile.txt: " . $usrpswrd[0] . "\n";
    echo "password from passfile.txt: " . $usrpswrd[3] . "\n";
    echo "</pre>";
  }


?>
