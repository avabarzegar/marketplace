<?php
// Establish database connection
$servername = "localhost";
$username = "avayawing";
$password = "marketplace-assingment2";
$dbname = "marketplace";
session_start();

// Define database connection constants
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['pass']);
    
    // Insert user into 'users' table
    $sql = "INSERT INTO users (Name, Email, Password) VALUES ('$username', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to login page after successful registration
        header("Location: log.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>