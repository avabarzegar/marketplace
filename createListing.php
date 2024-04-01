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


        // upload image
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        // echo "<script>alert('".$target_file."');</script>";
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["product_image"])) {
            $check = getimagesize($_FILES["product_image"]["tmp_name"]);
            if($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                // echo "<script>alert('File is an image - " . $check["mime"] . ".');</script>";
                $uploadOk = 1;
            } else {
                // echo "File is not an image.";
                echo "<script>alert('File is not an image.');</script>";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $target_file = $target_dir . time() . basename($_FILES["product_image"]["name"]);
            // echo "Sorry, file already exists.";
            // echo "<script>alert('Sorry, product image already exists.');</script>";
            // $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["product_image"]["size"] > 500000) {
            // echo "Sorry, your file is too large.";
            echo "<script>alert('Sorry, your image is too large.');</script>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        echo "<script>alert('Sorry, your image was not uploaded.');</script>";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
                // $product_image_name = htmlspecialchars( basename( $_FILES["product_image"]["name"]));
                $product_image_name = $target_file;
            } else {
                // echo "Sorry, there was an error uploading your file.";
                echo "<script>alert('Sorry, there was an error uploading your image.');</script>";
            }
        }

        // echo "<script>alert('".."');</script>";
        





        // Insert listing into the database
        $insert_query = "INSERT INTO products (Title, Price, CategoryID, UserID, Location)
        VALUES ('$title', '$price', '$categoryID', '{$_SESSION['UserID']}', '$location')";

        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            $last_id = mysqli_insert_id($conn);
            $insert_query_image = "INSERT INTO `images`(`ProductID`, `ImageURL`)
            VALUES ('$last_id', '$product_image_name')";
            $image_result = mysqli_query($conn, $insert_query_image);
            if ($image_result) {
                // Listing added successfully
                echo "<script>alert('Listing added successfully');</script>";
            }
            else {
                // Error adding listing
                echo "<script>alert('Error adding listing');</script>";
            }
        }
        else {
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
