<?php
session_start();

// Establish database connection
$servername = "localhost";
$username = "avayawing";
$password = "marketplace-assingment2";
$dbname = "marketplace";

// Define database connection constants
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['emailName']);
    $password = $conn->real_escape_string($_POST['passwordName']);

    // Fetch user data from database
    $sql = "SELECT * FROM users WHERE Email='$email' AND Password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User exists and password matches
        $row = $result->fetch_assoc();
        
        // Set session variables
        $_SESSION['UserID'] = $row['UserID'];
        $_SESSION['UserName'] = $row['Name'];

        // Redirect to home page or wherever you want
        header("Location: index.php");
        exit();
    } else {
        // Invalid credentials
        echo "Invalid email or password. Please try again.";
    }
}

$conn->close();
?>
