<!-- Developed by Aya Azzam  -->

<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
 
// Check if user is logged in
if (!isset($_SESSION['UserID'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: log.php");
    exit(); // Stop script execution
}

require_once '.././server_connection/database.php';

// Assuming your session stores user ID
$UserID = $_SESSION['UserID'];

// Adjust this query according to your database schema
$users_query = "SELECT * FROM users WHERE UserID = $UserID";

$users_result = mysqli_query($conn, $users_query);

// Check if query was successful
if ($users_result && mysqli_num_rows($users_result) > 0) {
    $users = mysqli_fetch_assoc($users_result); // Fetch user data
} else {
    // Handle error, user not found
    echo "User not found.";
    exit();
}

// Step 3: Retrieve User's products from the database
$products_query = "SELECT products.*, categories.Name AS category_name 
                FROM products 
                INNER JOIN categories ON products.CategoryID = categories.CategoryID
                WHERE products.UserID = $UserID";

$products_result = mysqli_query($conn, $products_query);

// Check if query was successful
if ($products_result && mysqli_num_rows($products_result) > 0) {
    // Fetch all products associated with the user
    $products = mysqli_fetch_all($products_result, MYSQLI_ASSOC);
} else {
    // No products found for the user
    $products = array(); // Empty array
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Adding Styles -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>User Profile</title>
</head>
<body>
   <?php
   include('navBar.php');
   ?>
    <section class="listingPageContainer">
    <div class="userProfilePage">
        <div class="userProfileSidebar">
            <h2>Your Information</h2>
            <p><strong>Name:</strong> <?php echo $users['Name']; ?></p>
            <p><strong>Email:</strong> <?php echo $users['Email']; ?></p>
            <a href="createListing.php"><button id="newListingButton">Create New Listing</button></a>
        </div>

    <div class="userProfileMainContent">
        <div class="container productCardsContainer">
                <?php if (!empty($products)) : ?>
                    <?php foreach ($products as $product) : ?>
                        
                        <div class="col productCard">
                            <?php
                            // Fetching image URL for the current product
                            $image_sql = "SELECT ImageURL FROM images WHERE ProductsID = {$product['ProductsID']}";
                            $image_result = mysqli_query($conn, $image_sql);
                            $image_product = mysqli_fetch_assoc($image_result);
                            ?>
                            <img src="<?php echo $image_product['ImageURL']; ?>" alt="<?php echo $product['Title']; ?>">
                            <div class="productDetails">
                                <h3><?php echo $product['Title']; ?></h3>
                                <p><strong>Price:</strong> <?php echo $product['Price']; ?></p>
                                <p><strong>Category:</strong> <?php echo $product['category_name']; ?></p>
                                <p><strong>Location:</strong> <?php echo $product['Location']; ?></p>
                                <div class="productButtons">
                                    <a href="editProduct.php?ProductsID=<?php echo $product['ProductsID']; ?>"><button>Edit</button></a> <!--Corrected primary keys that prevented loading. ProductID -> ProductsID - Se-Wing-->
                                    <form method="post" action="deleteProduct.php" class="productButtons">
                                        <input type="hidden" name="ProductsID" value="<?php echo $product['ProductsID']; ?>">
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No listings found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </section>
    <?php include("../pages/footer.html") ?>
</body>
</html>
