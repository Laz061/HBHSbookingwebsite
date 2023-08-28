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

                    //redirects user to welcome page
                    header("Location: ./redirect.inc.php");

                    //empties the variables to free up resources
                    $insertQuery = NULL;
                    $stmt = NULL;

                    die();
                } else {
                    $error = "<p class='error'>Password incorrect</p>";
                }
            } else {
                $error = "<p class='error'>No user exists with that email</p>";
            }
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
            echo "<a class='errorbtn' href=\"javascript:history.go(-1)\">GO TO PREVIOUS PAGE</a>";
        }
        ?>
    </div>
</body>

</html>

<?php
//empties the variables to free up resources
$insertQuery = NULL;
$stmt = NULL;

die();

?>