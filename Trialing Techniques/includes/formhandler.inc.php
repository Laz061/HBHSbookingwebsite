<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //"sanitieses" input so no code can be injected into the website
    $email = $_POST["email"];
    $pwd = $_POST["password"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO tblusers (email, pwd) VALUES (?, ?);";

        //prepares a blank query for $pdo database    
        $stmt = $pdo->prepare($query);

        //submits actual data entered by user
        $stmt->execute([$email, $pwd]);

        //empties the variables to free up resources
        $query = NULL;
        $stmt = NULL;

        //sends user back to login page or index
        header("Location: ./index.html");

        die();
    } catch (PDOException $e) {
        die("query failed: " . $e->getMessage());
    };
} else {
    //sends user back if request method was not "POST"
    header("Location: ./index.html");
}