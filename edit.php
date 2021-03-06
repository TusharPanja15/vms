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


    if (isset($_POST["employee_id"])) {
        $output = '';
        $connect = mysqli_connect("localhost", "root", "", "poject");
        $query = "SELECT * FROM `sales` WHERE sales_id = '" . $_POST["employee_id"] . "'";
        $result = mysqli_query($connect, $query);

        $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '  
                <form method="POST" action="">

                                                    <div class="form-group">

                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="col-form-label">Date</label>
                                                                <input disabled value="' . $row["date"] . '" type="text" class="form-control datepicker" name="date" minlength="10" maxlength="10" size="10" placeholder="dd/mm/yyyy">
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">GSTIN No.</label>
                                                                <input disabled value="' . $row["gst_no"] . '" type="text" class="form-control" id="gstin" name="gstin" minlength="8" maxlength="15" size="15" style="text-transform:uppercase">
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">Invoice No.</label>
                                                                <input disabled value="' . $row["invoice_no"] . '" type="text" class="form-control" id="invoiceNo" name="invoiceNo">
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="col-form-label">Name</label>
                                                                <input disabled value="' . $row["name"] . '" type="text" class="form-control" id="name" name="name">
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">Contact No.</label>
                                                                <input disabled value="' . $row["contact_no"] . '" type="number" class="form-control" id="contactNo" name="contactNo" minlength="10" maxlength="10" size="10" placeholder="+91">
                                                            </div>


                                                        </div>
                                                    </div>


                                                    <div class="row">

                                                        <div class="col">
                                                            <label class="col-form-label">Business Name</label>
                                                            <input disabled value="' . $row["business_name"] . '" type="text" class="form-control" id="businessName" name="businessName">
                                                        </div>

                                                        <div class="col">
                                                            <label class="col-form-label">Email Id</label>
                                                            <input disabled value="' . $row["email"] . '" type="text" class="form-control" id="emailId" name="emailId">
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col">
                                                            <label class="col-form-label">Address</label>
                                                            <input disabled value="' . $row["address"] . '" type="text" class="form-control" id="address" name="address">
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="col-form-label">Product Detais</label>
                                                                <input disabled value="' . $row["product"] . '" type="text" class="form-control" id="product" name="product">
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">Quantity</label>
                                                                <input disabled value="' . $row["quantity"] . '" type="text" class="form-control" id="quantity" name="quantity">                                                               
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">Amount</label>
                                                                <input disabled value="' . $row["amount"] . '" type="text" class="form-control" id="amount" name="amount" placeholder="&#8377;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row">

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Payment Mode</label>
                                                                <input disabled value="' . $row["payment_mode"] . '" type="text" class="form-control" id="paymentMode" name="paymentMode">
                                                            </div>
                                                        </div>

                                                    </div>

                                                </form>  
                ';
        }
        $output .= "</table></div>";
        echo $output;


       
        
    } else {
        echo 'no';
    }
}
