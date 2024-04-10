
<header class="navHeader">
   
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
             if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
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

