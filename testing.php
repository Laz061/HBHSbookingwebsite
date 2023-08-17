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
    <link rel="stylesheet" href="bookingstyle.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@400;500;600;700&family=Sawarabi+Mincho&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@event-calendar/build@1.5.1/event-calendar.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@event-calendar/build@1.5.1/event-calendar.min.js"></script>
    <script src="calendar_scripts.js" type="text/javascipt"></script>
</head>

<body>
    <div class="content-wrapper">
        <header>
            <img src="images/logo.png" class="logo">
        </header>
        <div id="wrapperNav">
            <nav>
                <ul class="navList">
                    <li class="navListItem"><a class="navLinks" href="#">Book</a></li>
                    <li class="navListItem"><a class="navLinks" href="register.php">About</a></li>
                    <li class="navListItem"><a class="navLinks" href="indexli.php">Home</a></li>
                </ul>

                <i data-feather="user" class="user-pic" onclick="toggleMenu()"></i>

                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <i data-feather="user" class="user-info-icon"></i>
                            <h3>
                                <?php echo $_SESSION['user']['first_name'] ?>
                                <?php echo $_SESSION['user']['last_name'] ?>
                            </h3>
                        </div>

                        <hr>

                        <a href="#" class="sub-menu-link">
                            <i data-feather="user" class="user-info-icon"></i>
                            <p>profile</p>
                            <span>></span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <i data-feather="help-circle" class="user-info-icon"></i>
                            <p>Help</p>
                            <span>></span>
                        </a>

                        <a href="includes/logout.inc.php" class="sub-menu-link">
                            <i data-feather="log-out" class="user-info-icon"></i>
                            <p>Logout</p>
                            <span>></span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <div id="booking-content-wrapper">
            <!-- Side navigation -->
            <div class="sidenav-container">
                <div class="sidenav">
                    <a href="#">Gym 1</a>
                    <a href="#">Gym 2</a>
                    <a href="#">Pool</a>
                </div>
            </div>

            <div id="calendar-container">
                <div id="ecc">
                    <h1>calendar</h1>

                </div>
                <div class="booking-form">
                    <form action="" method="post">

                    </form>
                </div>
            </div>
        </div>

        <!--<script src="scripts.js"></script>-->
        <script src="calendar_scripts.js"></script>
</body>

</html>