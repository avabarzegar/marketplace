
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  </head>
  <body>
    <?php
    require_once('db_credentials.php');
    require_once('database.php');
    include "navBar.php";

    // URL parameters
    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id= '$id' ";
    $result_set = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($result_set);

    ?>


  </body>
  </html>