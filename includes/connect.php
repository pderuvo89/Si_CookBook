<?php

// Creates the connection to the DB
$conn = mysqli_connect("localhost","root","root","si_cookbook");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>