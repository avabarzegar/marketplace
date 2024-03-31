
    <aside>
        <div class="select-menu">
        <div class="select">
            <span class="sort-head"><strong>Sort By</strong></span>
            <i class="fas fa-angle-down"></i>
        </div>
            <div class="options-list" id="filterSelect" onchange="searchFilter();" value="price">
                <div class="option" value="new">New</div>
                <div class="option" value="old">Old</div>
                <div class="option" value="price">price</div>
            </div>
        </div>
            <span class="cat-head"><strong>Categories</strong></span>
            
            <?php while($category = mysqli_fetch_assoc($categoriesOptionsResult_set)) { ?>
            <div class="side-filtering">
                <input type="radio"  name="category" id="categoryOptions" onchange="searchFilter();"
                    value="<?php echo $category['CategoryID']; ?>"
                />
                <?php echo $category['Name']; ?>
            </div>
            <?php } ?>
          
<!--         
        <p class="side-li">Price</p> -->
        
    </aside>
 