<!-- Developed by Aya Azzam  -->

<?php
include('.././server_connection/database.php');

$ProductsID = $_POST['ProductsID'];

// Delete associated images first
$delete_images_query = "DELETE FROM images WHERE ProductsID = ?";
$stmt_images = $conn->prepare($delete_images_query);
$stmt_images->bind_param("i", $ProductsID);
$stmt_images->execute();
$stmt_images->close();

// Prepare and execute deletion query for product
$delete_product_query = "DELETE FROM products WHERE ProductsID = ?";
$stmt_product = $conn->prepare($delete_product_query);
$stmt_product->bind_param("i", $ProductsID);

if ($stmt_product->execute()) {
    // Product deleted successfully
    header("Location: user_profile.php");
    exit();
} else {
    // Handle invalid request or display error message
    header("Location: user_profile.php?error=delete_failed");
    exit();
}

$stmt_product->close();
$conn->close();
?>
