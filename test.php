<?php

require_once "includes/dbh.inc.php";

/*
$email = "w";

$query = "SELECT * FROM users WHERE email = :email";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":email", $email);
$stmt->execute();

//fetches the number of rows and stores it
$results = $stmt->fetchColumn();

if ($results = 1) {
    echo "2";
};*/

$insertQuery = "INSERT INTO users (first_name, last_name, pwd, email, phone) VALUES ('a', 'b', '3', '3', '3');";
$stmt = $pdo->prepare($insertQuery);
$stmt->execute();
