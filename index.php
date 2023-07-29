<?php
require_once "./config.php";
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
                <li class="navListItem"><a class="navLinks" href="#">Book</a></li>
                <li class="navListItem"><a class="navLinks" href="#">About</a></li>
                <li class="navListItem"><a class="navLinks" href="index.html">Home</a></li>
            </ul>

            <a class="btnLogin" href="login.html">Login</a>
        </nav>


        <div id="index-image-container">
            <div id="index-text">
                <h1>HBHS Booking Website</h1>
                <button>Book Now</button>
            </div>
        </div>
    </div>

    <script>
        feather.replace();
    </script>

    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu")
        }
    </script>
</body>

</html>