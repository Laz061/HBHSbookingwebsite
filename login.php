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

        <div class="lform-wrapper">
            <section>
                <div class="lform-box">
                    <form action="includes/loginform.inc.php" method="post">

                        <a href="index.php"><i data-feather="home" class="btnhome"></i></a>

                        <h2>Login</h2>

                        <div class="input-box">
                            <span class="icon">
                                <i data-feather="mail"></i>
                            </span>
                            <input type="email" required name="email" placeholder=" ">
                            <label>Email</label>
                        </div>

                        <div class="input-box">
                            <span class="icon">
                                <i data-feather="lock"></i>
                            </span>
                            <input type="password" required name="password" placeholder=" ">
                            <label>password</label>
                        </div>

                        <!--
                        <div class="remember-forgot">
                            <label><input type="checkbox"> Remember me</label>
                            <a href="#">Forgot Password?</a>
                        </div>
                        -->

                        <button class="form-button" type="submit">Login</button>

                        <div class="register-link">
                            <p>Don't have an account? <a href="register.php">Register</a></p>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <main>
        <h1></h1>
    </main>

    <script>
        feather.replace();
    </script>

</body>

</html>