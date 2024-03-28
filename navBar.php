<header class="navHeader">
    <!-- code for search functionality -->
    <?php include('search.php'); ?>

    <input type="checkbox" name="" id="chk1">
    <h1 class="logo">AlgoBuy</h1>
    <div class="searchBar">
        <form action="GET" action="index.php" enctype="multipart/form-data">
            <input type="text" name="search" id="search" placeholder="Search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <nav class="navigation">
        <!--    <a href="#">Add Listing</a>  -->
        <div class="log-btn">
          <a class="buttonLoginPopUp" href="log.html">Login</a>
          <a class="buttonLoginPopUp" href="sign.html"> SignUp</a>
        </div>
    </nav>
    <div class="menu">
        <label for="chk1">
            <i class="fa fa-bars"></i>
        </label>
    </div>
</header>
