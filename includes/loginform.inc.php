<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "./dbh.inc.php";
    require_once "../config.php";
    //"sanitieses" input so no code can be injected into the website
    $email = $_POST["email"];
    $pwd = $_POST["password"];

    //checks if there is the email entered is already registered within the database
    //prepares a select query and uses the entered email to select any users in the email coloumn with the entered email
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    //fetches the number of rows and stores it
    $results = $stmt->fetchColumn();

    //if there are any results then outputs error
    if (empty($email)) {
        $error = '<p class="error">Please enter an email</p>';
    }
    //checks if $pwd is atleast 8 characters
    else if (empty($pwd)) {
        $error = '<p class="error">Please enter a password</p>';
    }

    if (!empty($error)) {
        echo $error;
    }

    //if there are no errors then it will insert the data
    if (empty($error)) {
        try {
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            $results = $stmt->fetch();

            if ($results) {

                if (password_verify($pwd, $results["pwd"])) {
                    $_SESSION["userid"] = $results["id"];
                    $_SESSION["user"] = $results;

                    echo "login successful";

                    //redirects user to welcome page
                    //header("Location: ../indexli.php");
                }
            } else {
                echo "No user exists with that email";
            }

            //empties the variables to free up resources
            $insertQuery = NULL;
            $stmt = NULL;

            die();
        } catch (PDOException $e) {
            die("query failed: " . $e->getMessage());
            header("Location: ../indexli.php");
        };
    }
}
