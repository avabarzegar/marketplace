<!-- Developed by Aya Azzam  -->

<?php
session_start();
// Establish database connection
require_once ('../../server_connection/database.php');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['pass']);
    
    // Insert user into 'users' table
    $sql = "INSERT INTO users (Name, Email, Password) VALUES ('$username', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to login page after successful registration
        header("Location: ../log.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>