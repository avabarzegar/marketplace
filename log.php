<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Adding Styles -->
    <link rel="stylesheet" href="style.css">
      <!-- Adding Javascript -->
      <script src="js/login.js" defer></script>
    <title>Log In</title>
</head>
<body class="loginSignUpBody">
    
    <div class="loginSignUpWrapper">

        <div class="closeLoginSignUp"><a href="index.php">X</a></div>

        <div class="formLoginSignUp">
            <h2>Login</h2>
            <form action="login_process.php" method="post" id="loginForm" onsubmit="return validateLogin();">
                <div class="textfield loginSignUpInput">
                <label class="label" for="loginEmail">Email</label>
                    <input type="email" name="emailName" id="loginEmail">
                    
                </div>

                <div class="textfield loginSignUpInput">
                <label class="label" for="loginPass">Password</label>
                    <input type="password" name="passwordName" id="loginPass">
                    
                </div>

                <button type="submit" class="loginBtn">Login</button>
                <div class="noAccount">
                    <p id="noAccountText">Don't Have an account?</p>
                    <a href="./sign.html" class="LoginSignUpLink">Sign Up</a>
                </div>
            </form>
        </div>
    </div>

  
</body>
</html>