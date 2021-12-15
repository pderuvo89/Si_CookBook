<?php
//Logs the user out
session_start();
session_unset();
session_destroy();

header("location: ../main.php");
exit();