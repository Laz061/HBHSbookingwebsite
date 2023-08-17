<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "./dbh.inc.php";
    require_once "../config.php";
    //"sanitieses" input so no code can be injected into the website
    $eventName = $_POST["event_name"];
    $start = new DateTime($_POST["start_time"], new DateTimeZone('Pacific/Auckland'));
    $end = new DateTime($_POST["end_time"], new DateTimeZone('Pacific/Auckland'));
    $current_time = new DateTime('Pacific/Auckland');

    if (empty($eventName)) {
        $error = '<p class="error">Please enter an event name</p>';
    } else if (empty($start)) {
        $error = '<p class="error">Please select a start time</p>';
    } else if (empty($end)) {
        $error = '<p class="error">Please select a end time</p>';
    } else if ($start < $current_time) {
        //checks if the start time is in the future
        $error = '<p class="error">Please select a start time that is in the future</p>';
    } else if ($end < $start) {
        //checks if the end time is after the start time
        $error = '<p class="error">Please select a end time that is after the start time</p>';
    }

    //Changes booking time to mySQL format
    $start_time = $start->format('Y-m-d H:i:s');
    $end_time = $end->format('Y-m-d H:i:s');

    if (empty($error)) {
        //Prevention of double booking
        $query = "SELECT * FROM gym_booking WHERE start_time < :etime AND start_time > :stime OR start_time < :stime AND end_time > :etime OR end_time > :stime AND end_time < :etime";
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
    }

    //if there are no errors then it will insert the data
    if (empty($error)) {
        try {
            $insertQuery = "INSERT INTO gym_booking (start_time, end_time, reservation_name, reservation_email) VALUES (:stime, :etime, :fname, :email);";

            //prepares a blank query for $pdo database    
            $stmt = $pdo->prepare($insertQuery);

            //binds variables to parameters set in the query
            $stmt->bindParam(":stime", $start_time);
            $stmt->bindParam(":etime", $end_time);
            $stmt->bindParam(":fname", $_SESSION['user']['first_name']);
            $stmt->bindParam(":email", $_SESSION['user']['email']);

            //submits actual data entered by user
            $stmt->execute();

            //empties the variables to free up resources
            $insertQuery = NULL;
            $stmt = NULL;

            //sends user back to login page or index
            header("Location: ../login.php");
            die();
        } catch (PDOException $e) {
            die("query failed: " . $e->getMessage());
            header("Location: ../index.php");
        };
    }
}
?>

<!DOCTYPE html>
<html lang="EN-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <title>HBHS booking website</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@400;500;600;700&family=Sawarabi+Mincho&display=swap" rel="stylesheet">
</head>

<body>
    <div id="error-wrapper">
        <?php
        if (!empty($error)) {
            echo $error;
            echo "<br>";
            echo "<button class='errorbtn'><a href=\"javascript:history.go(-1)\">GO TO PREVIOUS PAGE</a></button>";
        }
        ?>
    </div>
</body>

</html>