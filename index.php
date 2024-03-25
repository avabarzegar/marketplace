<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Adding Styles -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Adding Javascript -->
    <script src="js/script.js"></script>
    <title>Marketplaces</title>
</head>
<body class="indexBody">

    <!-- adding navbar  -->
    <?php include("navBar.html") ?>

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
      <aside>

      </aside>
      <section class="container" id="products">
        <?php while($results = mysqli_fetch_assoc($result_set)){ ?>
          <div class="col card">
            <p><?php echo $results['name'] ?></p>
            <p><?php echo $results['price'] ?></p>
            <p><?php echo $results['address'] ?></p>
          </div>
        <?php } ?>
        </section>
    </main>
   
    <!-- adding footer  -->
    <?php include("footer.html") ?>

</body>
</html>