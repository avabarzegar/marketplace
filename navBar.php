
<header class="navHeader">
    <!-- code for search functionality -->
    <?php include('search.php'); ?>
    <!-- Check session status -->
    <input type="checkbox" name="" id="chk1">
    <h1 class="logo">AlgoBuy</h1>
    <div class="searchBar">
       
            <input type="text" name="search" onchange="searchFilter();" id="search" placeholder="Search">
            <button  type="button"><i class="fa fa-search"></i></button>
       
    </div>
    <nav class="navigation">
        <div class="log-btn">
            <?php
            session_start();
            if (isset($_SESSION['UserID'])){
                echo '<a class-"buttonLoginPopUp" href="index.php">Market</a>';
                echo '<a class-"buttonLoginPopUp" href="user_profile.php">Your Listings</a>';
                echo '<a class-"buttonLoginPopUp" href="logout_process.php">Logout</a>';
            } else {
                echo '<a class-"buttonLoginPopUp" href="index.php">Market</a>';
                echo '<a class="buttonLoginPopUp" href="log.php">Login</a>';
                echo '<a class="buttonLoginPopUp" href="sign.html"> SignUp</a>';
            }
            ?>
            </div>
    </nav>
    <div class="menu">
        <label for="chk1">
            <i class="fa fa-bars"></i>
        </label>
    </div>
</header>
