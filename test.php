<?php

require_once "includes/dbh.inc.php";
session_start();

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
echo $_SESSION["user"]['first_name'];
