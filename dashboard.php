<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Adding Styles -->
    <link rel="stylesheet" href="style.css" />
    <!-- Adding Javascript -->
    <script src="js/script.js"></script>
    <title>Dashboard</title>
    </head>
    <body>
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
            <ul>
            <?php while($category = mysqli_fetch_assoc($categoriesOptionsResult_set)) { ?>
            <li>
                <input type="radio" name="category" id="categoryOptions"
                    value="<?php echo $category['CategoryID']; ?>"
                />
                <?php echo $category['Name']; ?>
            </li>
            <?php } ?>
            </ul>
        </li>
        <li class="side-li">Price</li>
        </ul>
    </aside>
  </body>
</html>
