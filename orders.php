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


    if (isset($_POST['submit'])) {

        $exists = mysqli_query($link, "select 1 from `" . $ordersTable . "` ");

        if ( $exists !== FALSE) {
            $error .= "Sorry! can't proceed your request.<br>";

            mysqli_close($link);
        }
    }

    if (array_key_exists("submit-order", $_POST)) {
        include "connection.php";

        if (!$_POST['date']) {
            $error .= "&middot A date is required<br>";
        }

        if (!$_POST['gstin']) {

            $error .= "&middot GSTIN No. is required<br>";
        }

        // if (!$_POST['invoiceNo']) {

        //     $error .= "&middot Invoice No. is required<br>";
        // }

        // if (!$_POST['name']) {

        //     $error .= "&middot A Name is required<br>";
        // }

        // if (!$_POST['contactNo']) {

        //     $error .= "&middot A Contact No. is required<br>";
        // }

        // if (!$_POST['businessName']) {

        //     $error .= "&middot A Business Name is required<br>";
        // }

        // if (!$_POST['emailId']) {

        //     $error .= "&middot An email is required<br>";
        // }

        // if (!$_POST['address']) {

        //     $error .= "&middot A address is required<br>";
        // }

        // if (!$_POST['product']) {

        //     $error .= "&middot Product Detail is required<br>";
        // }

        // if (!$_POST['quantity']) {

        //     $error .= "&middot Product quantityis required<br>";
        // }

        // if (!$_POST['amount']) {

        //     $error .= "&middot An amount is required<br>";
        // }

        // if (!$_POST['paymentMode']) {

        //     $error .= "&middot Payment Mode is required<br>";
        // }

        // if ($_POST['paymentStatus']) {

        //     $_POST['paymentStatus'] = $_POST['paymentStatus'] == 'true' ? true : false;
        // } else {

        //     $error .= "&middot Payment Status is required<br>";
        // }

        if ($error != "") {
            $error = '
                <div id="myModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Info!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg> There were error(s) in your form : <br>' . $error . '</h4>
                            </div>
                        </div>
                    </div>
                </div>
                ';
        } else {
            if ($_POST['submitOrder'] == 1) {
                $ordersQuery = "INSERT INTO `orders` (`user_id`, `date`, `invoice_no`, `gst_no`, `name`, `business_name`, `email`, `address`, `contact_no`, `product`, `quantity`, `amount`, `payment_mode`) VALUES (
                '" . mysqli_real_escape_string($link, $_SESSION['id']) . "',
                '" . mysqli_real_escape_string($link, $_POST['date']) . "',
                '" . mysqli_real_escape_string($link, $_POST['invoiceNo']) . "',
                '" . mysqli_real_escape_string($link, $_POST['gstin']) . "',
                '" . mysqli_real_escape_string($link, $_POST['name']) . "',
                '" . mysqli_real_escape_string($link, $_POST['businessName']) . "',
                '" . mysqli_real_escape_string($link, $_POST['email']) . "',
                '" . mysqli_real_escape_string($link, $_POST['address']) . "',
                '" . mysqli_real_escape_string($link, $_POST['contactNo']) . "',
                '" . mysqli_real_escape_string($link, $_POST['product']) . "',
                '" . mysqli_real_escape_string($link, $_POST['quantity']) . "',
                '" . mysqli_real_escape_string($link, $_POST['amount']) . "',
                '" . mysqli_real_escape_string($link, $_POST['paymentMode']) . "'
                ) LIMIT 1";

                mysqli_query($link, $ordersQuery);
            } else {
                $salesQuery = "INSERT INTO `sales` (`user_id`, `date`, `invoice_no`, `gst_no`, `name`, `business_name`, `email`, `address`, `contact_no`, `product`, `quantity`, `amount`, `payment_mode`) VALUES (
                '" . mysqli_real_escape_string($link, $_SESSION['id']) . "',
                '" . mysqli_real_escape_string($link, $_POST['date']) . "',
                '" . mysqli_real_escape_string($link, $_POST['invoiceNo']) . "',
                '" . mysqli_real_escape_string($link, $_POST['gstin']) . "',
                '" . mysqli_real_escape_string($link, $_POST['name']) . "',
                '" . mysqli_real_escape_string($link, $_POST['businessName']) . "',
                '" . mysqli_real_escape_string($link, $_POST['email']) . "',
                '" . mysqli_real_escape_string($link, $_POST['address']) . "',
                '" . mysqli_real_escape_string($link, $_POST['contactNo']) . "',
                '" . mysqli_real_escape_string($link, $_POST['product']) . "',
                '" . mysqli_real_escape_string($link, $_POST['quantity']) . "',
                '" . mysqli_real_escape_string($link, $_POST['amount']) . "',
                '" . mysqli_real_escape_string($link, $_POST['paymentMode']) . "'
                ) LIMIT 1";

                mysqli_query($link, $salesQuery);
            }
            if (mysqli_query($link, $ordersQuery) or mysqli_query($link, $salesQuery)) {

                $success .= '
                <div id="myModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Info!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4 class="success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                </svg> Submitted successfully.</h4>
                            </div>
                        </div>
                    </div>
                </div>
                ';
            }
        }
    }
}

include "ordersForm.php";
?>

