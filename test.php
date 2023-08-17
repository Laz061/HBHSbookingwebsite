<?php

require_once "includes/dbh.inc.php";
require_once "config.php";

$query = "SELECT * FROM gym_booking";
$stmt = $pdo->prepare($query);
$stmt->execute();
$bookings = $stmt->fetchAll();

foreach ($bookings as $booking) {
    echo $booking["start_time"];
    echo "<br>";
}

/*

    echo $booking["id"];
    echo "<br>"


$query = "SELECT * FROM gym_booking WHERE start_time > :start AND start_time > :end";

$stmt = $pdo->prepare($query);
$stmt->bindParam(":start", $start);
$stmt->bindParam(":end", $end);
$stmt->execute();

//fetches the number of rows and stores it
$results = $stmt->fetchColumn();

//if there are any results then outputs error
if ($results > 0) {
    $error = '<p class="error">This booking overlaps with a prexisting booking</p>';
}
*/