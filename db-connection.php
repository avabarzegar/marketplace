<?php
session_start();

// Define database connection constants
define('LOCALHOST', 'localhost');
define('DB_USER', 'avayawing');
define('DB_PASS', 'marketplace-assingment2');
define('DB_NAME', 'marketplace');

$conn = mysqli_connect(LOCALHOST, DB_USER, DB_PASS) or die(mysqli_error());
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>