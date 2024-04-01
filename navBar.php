
<header class="navHeader">
    <!-- code for search functionality -->
    <?php include('search.php'); ?>
    <!-- Check session status -->
    <input type="checkbox" name="" id="chk1">
    <h1 class="logo">AlgoBuy</h1>
    <div class="searchBar">
        <form action="GET" action="index.php" enctype="multipart/form-data">
            <input type="text" name="search" id="search" placeholder="Search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <nav class="navigation">
        <div class="log-btn">
            <?php
            session_start();
            if (isset($_SESSION['UserID'])){
                echo '<a class-"buttonLoginPopUp" href="index.php">Market</a>';
                echo '<a class-"buttonLoginPopUp" href="user_profile.php">Account</a>';
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
        <label for="chk1" id="menuDropDown">
            <i class="fa fa-bars"></i>
        </label>
        <ul class="megaMenu" id=megaMenu>
        <?php
            if (isset($_SESSION['UserID'])){
                echo '<li><a class="buttonLoginPopUp" href="index.php">Market</a></li>';
                echo '<li><a class="buttonLoginPopUp" href="user_profile.php">Account</a></li>';
                echo '<li><a class="buttonLoginPopUp" href="logout_process.php">Logout</a></li>';
            } else {
                echo '<li><a class="buttonLoginPopUp" href="index.php">Market</a></li>';
                echo '<li><a class="buttonLoginPopUp" href="log.php">Login</a></li>';
                echo '<li><a class="buttonLoginPopUp" href="sign.html"> SignUp</a></li>';
            }
            ?>
        </ul>
    </div>
</header>

