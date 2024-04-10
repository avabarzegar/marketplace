<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Adding Styles -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Adding Javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <script src="js/script.js"></script>
    <title>Marketplaces</title>
</head>

<body class="indexBody">

    <!-- adding navbar  -->
    <?php
      ini_set('display_errors', '1');
      ini_set('display_startup_errors', '1');
      error_reporting(E_ALL);
    include("navBar.php"); ?>

    <?php 
    require_once('db_credentials.php');
    require_once('product.class.php');
 
// Initialize User class 
$product = new Product(); 
 
// Get members data from database 
$products = $product->getRows(); 
    
    require_once('database.php');

      // Fetch categories from the database
      $categoriesOptionsSql = "SELECT * FROM categories";
      $categoriesOptionsResult_set = mysqli_query($conn, $categoriesOptionsSql);
    ?>
    

    <main>
      <div class="userProfileMainContent">
        
            <?php include ("dashboard.php"); ?>
            
       
<div class="productCardsContainer">
  <div class="loading-overlay" style="display: none;">
    <div class="overlay-content">Loading.....</div>
  </div>
        <section class="container" id="products">
          <?php
        if(!empty($products)){ $i = 0; 
                foreach($products as $row){ $i++; 
            ?>
          <div class="col productCard">

            <?php
            // Fetching image URL for the current product
            $image_sql = "SELECT ImageURL FROM images WHERE ProductsID = {$row['ProductsID']}";
            $image_result = mysqli_query($conn, $image_sql);
            $image_row = mysqli_fetch_assoc($image_result);
            ?>
            
            <img src="<?php echo $image_row['ImageURL']; ?>" alt="<?php echo $row['Title']; ?>">
            <p><?php echo $row['Title'] ?></p>
            <p><?php echo $row['Price'] ?></p>
            <p><?php echo $row['Location'] ?></p>
          </div>
          <?php } }else{ ?>
            <h3>No product(s) found...</h3>
            <?php } ?>

       
        
        </section>
       </div>
      </div>
    </main>   
    <!-- adding footer  -->
    <?php include("footer.html"); ?>

</body>
</html>