<?php 
// Include configuration file 
require_once 'database.php';

// Include User class 
require_once 'product.class.php'; 
 
// Initialize User class 
$product = new Product(); 
 
// Define filters 
$conditions = array(); 

 
// If search request is submitted 
if(!empty($_POST['keywords'])){ 
    $conditions['search'] = array('Title' => $_POST['keywords']); 
} 


if(!empty($_POST['filter'])){
    $filter = $_POST['filter'];

    switch ($filter) {
    case "new":
        $conditions['order_by'] = 'ProductsID DESC ';
        break;
    case "old":
        $conditions['order_by'] = 'ProductsID ASC ';
        break;
    case "price":
        $conditions['order_by'] = 'Price DESC ';
        break;
    default:
        $conditions['order_by'] = 'ProductsID DESC ';
    }
    
    
}


// If category request is submitted 
if (!empty($_POST['category'])) {
    $categoryId = $_POST['category']; // Assuming category IDs are integers

    
    // Merge the category conditions with existing conditions
    $conditions['where'] = array('CategoryID' => $categoryId);
}
// Get members data based on search and filter 

$products = $product->getRows($conditions); 
 
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