<!-- Developed by Aya Azzam and Se wing Huang  -->

<?php

require_once('.././server_connection/db_credentials.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Include your PHP script to connect to the database
include 'db_connection.php';

// Fetch products from the database (replace this with your actual database query)
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

// Loop through the fetched products and generate HTML content
while ($row = mysqli_fetch_assoc($result)) {
    $productName = $row['product_name'];
    $productImage = $row['product_image'];
    $productPrice = $row['product_price'];

    // Output HTML for each product with CSS classes
    echo '<div class="productBox">';
    echo '<img src="' . $productImage . '" alt="' . $productName . '" class="productImage">';
    echo '<h6 class="productName">' . $productName . '</h6>';
    echo '<p class="productPrice">$' . $productPrice . '</p>'; // Assuming product price is in USD
    echo '</div>';
}

// Close the database connection
mysqli_close($connection);
?>
