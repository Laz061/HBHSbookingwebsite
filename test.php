<!DOCTYPE html>
<html>

<head>
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      width: 300px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f2f2f2;
    }

    .container h2 {
      text-align: center;
    }

    .container input[type="text"],
    .container input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .container input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 3px;
      background-color: dodgerblue;
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Login</h2>
    <form>
      <input type="text" placeholder="Username" required>
      <input type="password" placeholder="Password" required>
      <input type="submit" value="Login">
    </form>
  </div>

  <?php 
  
  ?>

</body>

</html>