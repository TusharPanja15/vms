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

if (array_key_exists("id", $_SESSION)) {
    include 'connection.php';

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
                <div class="container">
  <div class="card">
<div class="card-header">
Invoice
<strong>' . $row["invoice_no"] . '</strong> 

</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-6">
<h6 class="mb-3">From:</h6>
<div>
<strong>' . $row["name"] . '</strong>
</div>
<div>' . $row["date"] . '</div>
</div>

<div class="col-sm-6">
<h6 class="mb-3">To:</h6>
<div>
<strong>' . $row["name"] . '</strong>
</div>
<div>' . $row["address"] . '</div>
</div>



</div>

<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>
<th class="center">#</th>
<th>Item</th>

<th class="right">Unit Cost</th>
  <th class="center">Qty</th>
<th class="right">Total</th>
</tr>
</thead>
<tbody>
<tr>
<td class="center">1</td>
<td class="left strong">' . $row["product"] . '</td>

<td class="right"></td>
  <td class="center">' . $row["quantity"] . '</td>
<td class="right"> 	&#8377; ' . $row["amount"] . '</td>
</tr>
</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">

</div>

<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>

<tr>
<td class="left">
<strong>Total</strong>
</td>
<td class="right">
<strong> &#8377; ' . $row["amount"] . '</strong>
</td>
</tr>
</tbody>
</table>

</div>

</div>

</div>
</div>
</div>
                ';
        }
        $output .= "</table></div>";
        echo $output;
    } else {
        echo "no";
    }
}
