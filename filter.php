<?php 
// Include configuration file 
require_once 'db_credentials.php'; 
 
// Include User class 
require_once 'Product.class.php'; 
 
// Initialize User class 
$product = new Product(); 
 
// Define filters 
$conditions = array(); 
// $db = db_connect();
 
// If search request is submitted 
if(!empty($_POST['keywords'])){ 
    $conditions['search'] = array('Title' => $_POST['keywords']); 
} 
 
// If filter request is submitted 
if(!empty($_POST['filter'])){ 
    $sortVal = $_POST['filter']; 
    $sortArr = array( 
        'new' => array( 
            'where' => 'ProductID DESC' 
        ), 
        'old'=>array( 
            'where'=>'ProductID ASC' 
        ), 
        'price'=>array( 
            'where'=>'Price DESC' 
        )
    ); 
    $sortKey = key($sortArr[$sortVal]); 
    $conditions[$sortKey] = $sortArr[$sortVal][$sortKey]; 
} 


// If category request is submitted 
// if (!empty($_POST['category'])) {
//     $categoryId = $_POST['category']; // Assuming category IDs are integers
    
//     $categoryConditions = [
//         'where' => ['CategoryID' => $categoryId]
//     ];

//     // Merge the category conditions with existing conditions
//     $conditions =$categoryConditions;
// }
// Get members data based on search and filter 

$products = $product->getRows($conditions); 
 
if(!empty($products)){ $i = 0; 
    foreach($products as $row){ $i++; 
?>
<div class="col productCard">

<?php
// Fetching image URL for the current product
// $image_sql = "SELECT ImageURL FROM images WHERE ProductID = {$row['ProductID']}";
// $image_result = mysqli_query($db, $image_sql);
// $image_row = mysqli_fetch_assoc($image_result);
// ?>


<p><?php echo $row['Title'] ?></p>
<p><?php echo $row['Price'] ?></p>
<p><?php echo $row['Location'] ?></p>
</div>
<?php } }else{ ?>
<h3>No product(s) found...</h3>
<?php } ?>
