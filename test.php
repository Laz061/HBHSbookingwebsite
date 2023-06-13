<!DOCTYPE html>
<html lang="EN-US">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, inital-scale=1.0">
  <title>HBHS booking website</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
  <div class="wrapper">
    <header>
      <img src="images/logo place holder.png" class="logo">
    </header>
    <div id="wrapperNav">
      <nav>
        <ul class="navList">
          <li class="navListItem"><a class="navLinks" href="#">Book</a></li>
          <li class="navListItem"><a class="navLinks" href="#">About</a></li>
          <li class="navListItem"><a class="navLinks" href="index.html">Home</a></li>
        </ul>

        <i data-feather="user" class="user-pic" onclick="toggleMenu()"></i>

        <div class="sub-menu-wrap" id="subMenu">
          <div class="sub-menu">
            <div class="user-info">
              <i data-feather="user" class="user-info-icon"></i>
              <h3>USER NAME</h3>
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
            <a href="#" class="sub-menu-link">
              <i data-feather="log-out" class="user-info-icon"></i>
              <p>Logout</p>
              <span>></span>
            </a>
          </div>
        </div>
    </div>
    </nav>

    <main>
      <?php
       echo "hello world"
      ?>

    </main>
  </div>

  <footer>
    <h3>Contact Us</h3>
    <i data-feather="instagram"></i>
  </footer>

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