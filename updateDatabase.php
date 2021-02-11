<?php

session_start();

if (array_key_exists("content", $_POST)) {

    include("connection.php");

    $query = "UPDATE `" . $GLOBALS['salesTable'] . "` 
    SET 
    `date` = '" . mysqli_real_escape_string($link, $_POST['date']) . "',
    `gstNo` = '" . mysqli_real_escape_string($link, $_POST['gstin']) . "',
    `invoiceNo` = '" . mysqli_real_escape_string($link, $_POST['invoiceNo']) . "',
    `name` = '" . mysqli_real_escape_string($link, $_POST['name']) . "',
    `contactNo` = '" . mysqli_real_escape_string($link, $_POST['contactNo']) . "',
    `businessName` = '" . mysqli_real_escape_string($link, $_POST['businessName']) . "',
    `email` = '" . mysqli_real_escape_string($link, $_POST['emailId']) . "',,
    `address` = '" . mysqli_real_escape_string($link, $_POST['address']) . "',
    `product` = '" . mysqli_real_escape_string($link, $_POST['product']) . "',
    `quantity` = '" . mysqli_real_escape_string($link, $_POST['quantity']) . "',
    `amount` = '" . mysqli_real_escape_string($link, $_POST['amount']) . "',
    `paymentMethod` = '" . mysqli_real_escape_string($link, $_POST['paymentMode']) . "',
    `paymentStatus` = '" . mysqli_real_escape_string($link, $_POST['paymentStatus']) . "' 
    WHERE id = " . mysqli_real_escape_string($link, $_SESSION['id']) . " LIMIT 1";

    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_array($link, $result);

    echo $row;
}

