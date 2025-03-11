<?php
require_once "./config.php";
if (isset($_SESSION["userid"])) {
    header("Location: ./indexli.php");
};
?>
<!DOCTYPE html>
<html lang="EN-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <title>HBHS booking website</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@400;500;600;700&family=Sawarabi+Mincho&display=swap" rel="stylesheet">
</head>

<body>
    <div class="content-wrapper">
        <header>
            <img src="images/logo.png" class="logo">
        </header>

        <nav>
            <ul class="navList">
                <li class="navListItem"><a class="navLinks" href="login.php">Book</a></li>
                <li class="navListItem"><a class="navLinks" href="index.php">Home</a></li>
            </ul>

            <a class="btnLogin" href="login.php">Login</a>
        </nav>

        <div class="lform-wrapper">
            <section>
                <div class="lform-box" id="register_form">
                    <form action="includes/registerform.inc.php" method="post">
                        <h2>Register</h2>

                        <div class="input-box">
                            <span class="icon">
                                <i data-feather="mail"></i>
                            </span>
                            <input type="email" required name="email" placeholder=" ">
                            <label>Email</label>
                        </div>

                        <div class="input-box">
                            <span class="icon">
                                <i data-feather="user"></i>
                            </span>
                            <input type="text" required name="first_name" placeholder=" ">
                            <label>First name</label>
                        </div>

                        <div class="input-box">
                            <span class="icon">
                                <i data-feather="user"></i>
                            </span>
                            <input type="text" required name="last_name" placeholder=" ">
                            <label>Surname</label>
                        </div>

                        <div class="input-box">
                            <span class="icon">
                                <i data-feather="phone"></i>
                            </span>
                            <input type="text" name="phone" required placeholder=" ">
                            <label>Phone Number</label>
                        </div>

                        <div class="input-box">
                            <span class="icon">
                                <i data-feather="lock"></i>
                            </span>
                            <input type="password" required name="password" placeholder=" " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase letter, one lowercase letter, and at least 8 or more characters">
                            <label>password</label>
                        </div>

                        <div class="input-box">
                            <span class="icon">
                                <i data-feather="lock"></i>
                            </span>
                            <input type="password" required name="confirm_password" placeholder=" " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase letter, one lowercase letter, and at least 8 or more characters">
                            <label>Confirm Password</label>
                        </div>

                        <!--
                        <div class="remember-forgot">
                            <label><input type="checkbox"> Remember me</label>
                            <a href="#">Forgot Password?</a>
                        </div>
                        -->

                        <button class="form-button" type="submit">Register</button>

                        <div class="register-link">
                            <p>already have an account? <a href="login.php">Login</a></p>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>

</html>