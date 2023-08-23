<?php
require_once "../config.php";
if (!isset($_SESSION["userid"]) && $_SESSION["userid"] !== true) {
    header("Location: ../index.php");
} else if ($_SESSION["user"]["admin"] == false) {
    header("Location: ../user.php");
    echo $_SESSION["user"]["admin"];
} else if ($_SESSION["user"]["admin"] == true) {
    header("Location: ../admin.php");
    echo $_SESSION["user"]["admin"];
}
