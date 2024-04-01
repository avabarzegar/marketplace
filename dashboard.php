
    <aside>
        <div class="select-menu">
        <div class="select">
            <span class="sort-head"><strong>Sort By</strong></span>
          <select class="options-list" id="filterSelect" onchange="searchFilter();" value="price">
                <option class="option" value="new">New</option>
                <option class="option" value="old">Old</option>
                <option class="option" value="price">price</option>
            </select>
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
 