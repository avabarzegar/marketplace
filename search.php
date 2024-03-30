<?php
require_once('db_credentials.php');
require_once('database.php');

if(isset($_GET['search'])) {
    $db = db_connect();
    $text = '%' . $_GET['search'] . '%'; // Modify the search text to include wildcards

    $getData = $db->prepare("SELECT * FROM products WHERE Name LIKE ?");
    $getData->bind_param('s', $text); // Bind the parameter to the prepared statement
    $getData->execute();

    $result = $getData->get_result(); // Get the result set

    while ($data = $result->fetch_assoc()) {
      
      echo '<div class="col card">';
        echo '<p>' . $data['Name'] . '</p>';
        echo '<p>' . $data['Price'] . '</p>';
        echo '<p>' . $data['Location'] . '</p>';
      echo '</div>';
    }
}
?>
