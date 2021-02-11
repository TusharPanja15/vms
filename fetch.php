<?php


session_start();

//fetch.php


if (array_key_exists("logOut", $_GET)) {
  unset($_SESSION);
  setcookie("id", "", time() - 60 * 60);
  $_COOKIE["id"] = "";

  session_destroy();
}

if (array_key_exists("id", $_SESSION)) {

  include 'connection.php';

  $query = "SELECT `id`, `first name` FROM `users` WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";

  $row = mysqli_fetch_array(mysqli_query($link, $query));

  $idName = mysqli_real_escape_string($link, $row['id']) . "_" . mysqli_real_escape_string($link, $row['first name']);

  $ordersTable = $idName . "_orders_contents";
  $salesTable = $idName . "_sales_contents";



  $query = "SELECT * FROM `" . $salesTable . "` ORDER BY id DESC";

  $result = mysqli_query($link, $query);

  $output = '
<div class="table-responsive">
      <table class="table table-hover table-borderless myTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Invoice No.</th>
                                                    <th scope="col">Business Name</th>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Amount (&#8377;)</th>
                                                </tr>
                                            </thead>
';

  if (mysqli_num_rows($result) > 0) {
    foreach ($result as $row) {
      $output .= '
  <tr>
   <td>' . $row["date"] . '</td>
   <td><button type="button" name="edit" id="' . $row["id"] . '" class="btn btn-warning btn-xs edit">Edit</button></td>
   <td><button type="button" name="delete" id="' . $row["id"] . '" class="btn btn-danger btn-xs delete">Delete</button></td>
  </tr>
  ';
    }
  } else {
    $output .= '
 <tr>
  <td colspan="4">No Data Found</td>
 </tr>
 ';
  }
  $output .= '</table></div>';

  echo $output;
}
?>