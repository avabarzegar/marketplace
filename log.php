<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Adding Styles -->
    <link rel="stylesheet" href="style.css">
    <!-- Adding Javascript -->
    <script src="signUpValidation.js" defer></script>
    <title>Log In</title>
</head>
<body class="loginSignUpBody">
    
    <div class="loginSignUpWrapper">

        <div class="closeLoginSignUp"><a href="./index.php">X</a></div>

        <div class="formLoginSignUp">
            <h2>Login</h2>
            <form action="login_process.php" method="post" id="loginForm">
                <div class="loginSignUpInput">
                    <input type="email" name="emailName" id="emailID">
                    <label class="label" for="email">Email</label>
                </div>

                <div class="loginSignUpInput">
                    <input type="password" name="passwordName" id="passwordID">
                    <label class="label" for="password">Password</label>
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