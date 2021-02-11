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


    if (isset($_POST["edit_id"])) {
        $output = '';

        $query = "UPDATE `sales` SET 
        `date` = '" . mysqli_real_escape_string($link, $_POST['date']) . "',
        `invoice_no` = '" . mysqli_real_escape_string($link, $_POST['invoiceNo']) . "',
        `gst_no` = '" . mysqli_real_escape_string($link, $_POST['gstin']) . "',
        `name` = '" . mysqli_real_escape_string($link, $_POST['name']) . "',
        `business_name` = '" . mysqli_real_escape_string($link, $_POST['businessName']) . "',
        `email` = '" . mysqli_real_escape_string($link, $_POST['emailId']) . "',
        `address` = '" . mysqli_real_escape_string($link, $_POST['address']) . "',
        `contact_no` = '" . mysqli_real_escape_string($link, $_POST['contactNo']) . "',
        `product` = '" . mysqli_real_escape_string($link, $_POST['product']) . "',
        `quantity` = '" . mysqli_real_escape_string($link, $_POST['quantity']) . "',
        `amount = `'" . mysqli_real_escape_string($link, $_POST['amount']) . "',
        `payment_mode` = '" . mysqli_real_escape_string($link, $_POST['paymentMode']) . "',
        `payment_status` = '" . mysqli_real_escape_string($link, $_POST['paymentStatus']) . "'
        WHERE sale_id = `". $_POST["edit_id"] ."` ";

        mysqli_query($link, $query);
    } else {
        echo 'no';
    }
}
