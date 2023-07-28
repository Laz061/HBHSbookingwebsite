<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "./dbh.inc.php";
    //"sanitieses" input so no code can be injected into the website
    $email = $_POST["email"];
    $fName = $_POST["first_name"];
    $lName = $_POST["last_name"];
    $phone = $_POST["phone"];
    $pwd = $_POST["password"];
    $confirm_pwd = $_POST["confirm_password"];

    //checks if there is the email entered is already registered within the database
    //prepares a select query and uses the entered email to select any users in the email coloumn with the entered email
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    //fetches the number of rows and stores it
    $results = $stmt->fetchColumn();

    //if there are any results then outputs error
    if ($results > 0) {
        $error = '<p class="error">The email is already registered</p>';
        echo $error;
    }
    //checks if $pwd is atleast 8 characters
    else if (strlen($pwd) < 8) {
        $error = '<p class="error">Password must be longer than 8 characters</p>';
        echo $error;
    }
    //checks if the both passwords are the same
    else if ($confirm_pwd != $pwd) {
        $error = '<p class="error">Passwords dont match</p>';
        echo $error;
    }
    //if there are no errors then it will insert the data
    else if (empty($error)) {
        try {
            $insertQuery = "INSERT INTO users (first_name, last_name, pwd, email, phone) VALUES (:fname, :lname, :pwd, :email, :phone);";

            //prepares a blank query for $pdo database    
            $stmt = $pdo->prepare($insertQuery);

            //Hashing the password
            $options = [
                'cost' => 12
            ];

            $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

            //binds variables to parameters set in the query
            $stmt->bindParam(":fname", $fName);
            $stmt->bindParam(":lname", $lName);
            $stmt->bindParam(":pwd", $hashedPwd);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phone", $phone);

            //submits actual data entered by user
            $stmt->execute();

            //empties the variables to free up resources
            $insertQuery = NULL;
            $stmt = NULL;

            //sends user back to login page or index
            header("Location: ../indexnli.html");
            die();
        } catch (PDOException $e) {
            die("query failed: " . $e->getMessage());
            header("Location: ../index.html");
        };
    }
}
