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

    

    <main>
      <div class="main-container">

      <aside>
        <ul>
          <li class="side-li">
            <span><strong>Sort By</strong></span>
            <select id="sort-by-select" value="Price">
              <option value="price">Price</option>
              <option value="popularity">Popularity</option>
              <option value="date-added">Date Added</option>
            </select>
          </li>
          <li class="side-li">
          <span><strong>Categories</strong></span>
            <select id="sort-by-select" value="Home">
              <option value="home">Home</option>
              <option value="clothes">Clothes</option>
              <option value="vehicle">Date Added</option>
            </select>
          </li>
          <li class="side-li">Price</li>
        </ul>
      </aside>

      <section class="container" id="products">
        <?php while($results = mysqli_fetch_assoc($result_set)){ ?>
          <div class="col card">
            <img src="<?php echo $results['image_path'] ?>" name="<?php echo $results['name'] ?>">
            <p><?php echo $results['name'] ?></p>
            <p><?php echo $results['price'] ?></p>
            <p><?php echo $results['address'] ?></p>
          </div>
        <?php } ?>

       
        
        </section>
        </div>
    </main>
   
    <!-- adding footer  -->
    <?php include("footer.html") ?>

</body>
</html>