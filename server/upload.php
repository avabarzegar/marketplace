<!-- Developed by Fatemeh Barzegar  -->


<?php
include('.././server_connection/db-connection.php');

if(isset($_POST['submit'])) {
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = '../images/'.$file_name;

    // Move the uploaded file to the destination folder
    if(move_uploaded_file($tempname, $folder)) {
        // File moved successfully, now insert the URL into the database
        $imageURL = mysqli_real_escape_string($conn, $folder); // Escape special characters to prevent SQL injection
        $query = "INSERT INTO images (imageURL) VALUES ('$imageURL')";
        
        if(mysqli_query($conn, $query)) {
            echo "Image inserted into database successfully";
        } else {
            echo "Error inserting image into database: " . mysqli_error($conn);
        }
    } else {
        echo "Error moving uploaded file";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" />
        <br /><br />
        <button type="submit" name="submit">Submit</button>
</form>
<div>
<?php 

    $res = mysqli_query($conn, "select * from images");
    while($row = mysqli_fetch_assoc($res)) {
     ?>
     <img src="<?php echo $row['ImageURL']; ?>" />
     <?php } ?>   

     </div>
</body>
</html> 




