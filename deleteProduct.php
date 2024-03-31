this is deleteProduct.php: 
<?php include('db-connection.php'); //this is working ?> 

<?php
    $ProductsID = $_POST['ProductsID'];

    // Prepare and execute deletion query
    $delete_query = "DELETE FROM products WHERE ProductsID = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $ProductsID);
    
    if ($stmt->execute()) {
        // Product deleted successfully
        header("Location: user_profile.php");
        exit();

    $stmt->close();
    $conn->close();
    } else {
    // Handle invalid request
    header("Location: user_profile.php");
    exit();
    }

?>