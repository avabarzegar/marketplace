<!-- Developed by Aya Azzam  -->

<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['UserID'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: log.php");
    exit(); // Stop script execution
}

// Include your database connection file

require_once('.././server_connection/database.php');


// Fetch categories from database
$categoriesQuery = "SELECT * FROM categories";
$categoriesQueryResult = mysqli_query($conn, $categoriesQuery);

// Check if ProductsID is provided in the URL
if (!isset($_GET['ProductsID'])) {
    // Redirect or show error message
    header("Location: user_profile.php");
    exit();
}

$ProductsID = $_GET['ProductsID'];

// Retrieve product details from the database
$product_query = "SELECT * FROM products WHERE ProductsID = $ProductsID";
$product_result = mysqli_query($conn, $product_query);

// Check if product exists
if (!$product_result || mysqli_num_rows($product_result) === 0) {
    // Product not found, redirect or show error message
    header("Location: user_profile.php");
    exit();
}

$product = mysqli_fetch_assoc($product_result);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $categoryID = $_POST['category'];
    $price = $_POST['price'];
    $location = $_POST['location'];

    // Update listing in the database
    $update_query = "UPDATE products SET Title='$title', Price='$price', CategoryID='$categoryID', Location='$location' WHERE ProductsID=$ProductsID";

    $result = mysqli_query($conn, $update_query);
    if ($result) {
        // Listing updated successfully
        echo "<script>alert('Listing updated successfully');</script>";
        header("Location: user_profile.php"); // Redirect to user profile page after successful update
        exit();
    } else {
        // Error updating listing
        echo "<script>alert('Error updating listing');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Edit Listing</title>
</head>
<body>
    <?php include("navBar.php") ?>
    <div class="editListingFormContainer">
        <h2>Edit Listing</h2>
        <form action=# method="post" enctype="multipart/form-data">
            <div class="newListingContainer">
                <div class="editListingInput">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="<?php echo $product['Title']; ?>" required>

                    <label for="category">Category:</label>
                    <ul>
                        <?php while ($category = mysqli_fetch_assoc($categoriesQueryResult)) { ?>
                            <li>
                                <input type="radio" name="category" id="category_<?php echo $category['CategoryID']; ?>"
                                    value="<?php echo $category['CategoryID']; ?>" <?php if ($category['CategoryID'] == $product['CategoryID']) echo "checked"; ?>>
                                <label for="category_<?php echo $category['CategoryID']; ?>">
                                    <?php echo $category['Name']; ?>
                                </label>
                            </li>
                        <?php } ?>
                    </ul>

                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" value="<?php echo $product['Price']; ?>" required>
                    
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" value="<?php echo $product['Location']; ?>" required>
                </div>
                <div class="image-upload-container">
                    <input type="file" id="image" name="image" accept="image/*" class="image-upload">
                    <img src="https://via.placeholder.com/150" alt="Upload Image" class="image-upload">
                    <label class="image-upload-label" for="image">Choose Image</label>
                </div>
            </div>
            <input class="submitEditListing" type="submit" value="Update Listing">
        </form>
    </div>
    <?php include("../pages/footer.html") ?>
</body>
</html>