<!-- Developed by Se wing Huang  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Adding Styles -->
    <link rel="stylesheet" href="../style.css">
      <!-- Adding Javascript -->
      <script src="../js/login.js" defer></script>
    <title>Log In</title>
</head>
<body class="loginSignUpBody">
    
    <div class="loginSignUpWrapper">

        <div class="closeLoginSignUp"><a href="index.php">X</a></div>

        <div class="formLoginSignUp">
            <h2>Login</h2>
            <form action="authentication/login_process.php" method="post" id="loginForm" onsubmit="return validateLogin();">
                <div class="textfield loginSignUpInput">
                <label class="label" for="emailID">Email</label>
                    <input type="email" name="emailName" id="emailID">
                    
                </div>

                <div class="textfield loginSignUpInput">
                <label class="label" for="passwordID">Password</label>
                    <input type="password" name="passwordName" id="passwordID">
                    
                </div>

                <button type="submit" class="loginBtn">Login</button>
                <div class="noAccount">
                    <p id="noAccountText">Don't Have an account?</p>
                    <a href="../pages/sign.html" class="LoginSignUpLink">Sign Up</a>
                </div>
            </form>
        </div>
    </div>

  
</body>
</html>