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
    <div id="wrapperNav">
      <nav>
        <ul class="navList">
          <li class="navListItem"><a class="navLinks" href="test.php">Book</a></li>
          <li class="navListItem"><a class="navLinks" href="register.php">About</a></li>
          <li class="navListItem"><a class="navLinks" href="index.php">Home</a></li>
        </ul>

        <i data-feather="user" class="user-pic" onclick="toggleMenu()"></i>

        <div class="sub-menu-wrap" id="subMenu">
          <div class="sub-menu">
            <div class="user-info">
              <i data-feather="user" class="user-info-icon"></i>
              <h3><?php echo $_SESSION['user']['first_name'] ?> <?php echo $_SESSION['user']['last_name'] ?></h3>
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

      <div id="index-image-container">
        <div id="index-text">
          <h1>HBHS Booking Website</h1>
          <button>Book Now</button>
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