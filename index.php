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
    <?php include("navBar.php") ?>

    <?php 
    require_once('db_credentials.php');
    require_once('database.php');
    
    $db = db_connect();
    ?>
  
    <?php
      $sql = "SELECT * FROM products";
      $result_set = mysqli_query($db, $sql);
    ?>
    <?php
      // Fetch categories from the database
      $categoriesOptionsSql = "SELECT * FROM categories";
      $categoriesOptionsResult_set = mysqli_query($db, $categoriesOptionsSql);
    ?>
    

    <main>
      <div class="userProfileMainContent">
        
            <?php include ("dashboard.php") ?>
       
<div class="productCardsContainer">
        <section class="container" id="products">
        <?php while($results = mysqli_fetch_assoc($result_set)){ ?>
          <div class="col productCard">

            <?php
            // Fetching image URL for the current product
            $image_sql = "SELECT ImageURL FROM images WHERE ProductID = {$results['ProductID']}";
            $image_result = mysqli_query($db, $image_sql);
            $image_row = mysqli_fetch_assoc($image_result);
            ?>
            
            <img src="<?php echo $image_row['ImageURL']; ?>" alt="<?php echo $results['Title']; ?>">
            <p><?php echo $results['Title'] ?></p>
            <p><?php echo $results['Price'] ?></p>
            <p><?php echo $results['Location'] ?></p>
          </div>
        <?php } ?>

       
        
        </section>
        </div>
      </div>
    </main>   
    <!-- adding footer  -->
    <?php include("footer.html") ?>

</body>
</html>