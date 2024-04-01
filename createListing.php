<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Create New Listing - Facebook Marketplace</title>

</head>
<body id="newListingBody">
    <?php include("navBar.php");
    // require_once('db_credentials.php');
    require_once('database.php');

    // $conn = db_connect(DB_SERVER , DB_USER , DB_PASS , DB_NAME);

    //fetching categories from db
    $categoriesQuery = "SELECT * FROM categories";
    $categoriesQueryResult = mysqli_query($conn, $categoriesQuery);
    
    //handles form submission, everythign submitted will turn up on the db
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // print_r($_FILES);
        // die();
        $title = $_POST['title'];
        $categoryID = $_POST['category'];
        $price = $_POST['price'];
        $location = $_POST['location'];
        //$image = $_POST['image']; //DELETE?

        /* Add variables to take into account image upload. Images are uploaded via $_FILE and not $_POST. 
        $folder is image folder. -Se-Wing  */
        $file_name = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'images/'.$file_name;

        if(move_uploaded_file($tempname, $folder)) { //temporary name for when image is submitted.

            $imageURL = mysqli_real_escape_string($db, $folder); //escapes special characters so reduce vulnerabilities.
            $query = "INSERT INTO images (imageURL) VALUES ('$imageURL')"; //URL for image is inserted into images table under imageURL column. -Se-Wing
        
            if(mysqli_query($db, $query)) {
                $last_inserted_id = mysqli_insert_id($db);
        
            // Insert listing into the database
        $insert_query = "INSERT INTO products (Title, Price, CategoryID, UserID, Location, ImageURL)
        VALUES ('$title', '$price', '$categoryID', '{$_SESSION['UserID']}', '$location', '$imageURL')"; //Corrected imageURL to $imageURL -Se-Wing
            }
        $result = mysqli_query($db, $insert_query);
        if ($result) {
        // Listing added successfully
        echo "<script>alert('Listing added successfully');</script>";
        }} else {
        // Error adding listing
        echo "<script>alert('Error adding listing');</script>";
        }
    }
    ?>

    <div class="newListingFormContainer">
        <h2 id="newListingh2">Create New Listing</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="newListingContainer">
                <div class="newListingInput">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>

                    <label for="category">Category:</label>
                    <ul>
                        <?php while($category = mysqli_fetch_assoc($categoriesQueryResult)) { ?>
                            <li>
                                <input type="radio" name="category" id="categoryOptions"
                                value="<?php echo $category['CategoryID']; ?>" required
                                >
                                <label for="category_<?php echo $category['CategoryID']; ?>">
                                    <?php echo $category['Name']; ?>
                                </label>
                            </li>
                        <?php } ?>
                    </ul>

                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" required>
                    
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required>
                </div>
                <div class="image-upload-container">
                    <input type="file" id="image" name="product_image" accept="image/*" class="image-upload">
                    <img src="https://via.placeholder.com/150" alt="Upload Image" class="image-upload">
                    <label class="image-upload-label" for="image">Choose Image</label>
                </div>
            </div>
            <input class="submitNewListing" type="submit" value="Create Listing">
        </form>
    </div>
</body>
</html>
