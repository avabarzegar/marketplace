<!-- Developed by Fatemeh Barzegar  -->

<?php
session_start();

// Define database connection constants
require ('db_credentials.php');

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS) or die(mysqli_error());
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>