<?php

session_start();

$error = "";

// Checks Sessions and Cookies 

if (array_key_exists("logOut", $_GET)) {
    unset($_SESSION);
    setcookie("id", "", time() - 60 * 60);
    $_COOKIE["id"] = "";

    session_destroy();
}

//delete.php

if (array_key_exists("id", $_SESSION)) {
    include "connection.php";

    $query = "SELECT * FROM `sales` WHERE user_id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";

    $row = mysqli_fetch_array(mysqli_query($link, $query));

    if (isset($_POST["delete_id"])) {
        $output = '';
        $query = "DELETE FROM `sales` WHERE sales_id = '" . $_POST["delete_id"] . "' ";
        mysqli_query($link, $query);
    } else {echo 'no';}

}
