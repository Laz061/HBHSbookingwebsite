<?php

require_once "includes/dbh.inc.php";
require_once "config.php";

//Prevention of double booking
$query = "SELECT * FROM gym_booking WHERE start_time <= :end-time AND start_time >= :start-time OR start_time <= :stime AND end_time >= :etime OR end_time >= :stime AND end_time <= :etime";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":stime", $start_time);
$stmt->bindParam(":etime", $end_time);
$stmt->execute();

//fetches the number of rows and stores it
$results = $stmt->fetchColumn();

//if there are any results then outputs error
if ($results > 0) {
    $error = '<p class="error">This booking overlaps with a pre-existing booking</p>';
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
