<?php
ini_set("display_errors", "off");

session_start();

$error = "";
$success = "";

// Checks Sessions and Cookies 

if (array_key_exists("id", $_COOKIE) && $_COOKIE['id']) {

    $_SESSION['id'] = $_COOKIE['id'];
}

if (array_key_exists("id", $_SESSION)) {
    include "connection.php";

    $query = "SELECT * FROM `sales` WHERE user_id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";

    $row = mysqli_fetch_array(mysqli_query($link, $query));
}
?>

<?php

include "header.php";

include "navBarTop.php";

include "sideNavBar.php";

?>

<div class="content">

    <h6 class="display-1">My Payments.</h6>
    <br>

    <div class="container">

        <div class="row">
            <div class="card card-body" id="printarea">

                <?php include "invoice.php"?>

            </div>

            <hr>


        </div>

    </div>

</div>
