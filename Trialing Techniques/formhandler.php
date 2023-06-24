<?php
    if  ($_SERVER["REQUEST_METHOD"] == "POST") {

        //"sanitieses" input so no code can be injected into the website
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);
        echo "this is the data that the user submitted";
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $password;

        //sends user back to login page or index
        header("Location: ./index.html");
    }
    else
    {
        header("Location: ./index.html");
    }