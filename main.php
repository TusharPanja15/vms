<?php
ini_set("display_errors", "off");

$error = "";

if (array_key_exists("id", $_COOKIE) && $_COOKIE['id']) {

  $_SESSION['id'] = $_COOKIE['id'];
}

if (array_key_exists("id", $_SESSION)) {

  include "connection.php";

  $query = "SELECT `first name` FROM `users` WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";

  $row = mysqli_fetch_array(mysqli_query($link, $query));

  $salesSUM = "SELECT SUM(amount) FROM `sales` WHERE payment_status = 0";
  $query_sales = mysqli_query($link, $salesSUM);

  $ordersSUM = "SELECT SUM(amount) FROM `orders` WHERE payment_status = 0";
  $query_orders = mysqli_query($link, $ordersSUM);
}
?>


<?php

include "header.php";

include "navBarTop.php";

include "sideNavBar.php";

?>

<link rel="stylesheet" type="text/css" href="assets/css/nav-bar.css">

<div class="content">


  <div class="container">

    <div class="row">
      <div class="col">

        <!-- User's Name -->

        <h6 class="display-1" id="first name"><?php echo "Hi " . $firstName . " !"; ?></h6>

      </div>






      <div class="col-xl-auto">
        <div class="card mb-3  arrow-img-card">
          <div class=" row g-0">
            <div class="col-md-4">
              <img src="assets\img\Red-animated-arrow-down.gif" id="arrow-img">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title" style="text-align: left;">To be recived..</h5>
                <?php
                while ($row = mysqli_fetch_array($query_sales)) {
                  echo "&#8377; " . $row['SUM(amount)'];
                  echo "<br />";
                }
                ?>
                <!-- <div class="spinner-border text-danger" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col col-md-auto">

        <div class="card mb-3 arrow-img-card">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="assets\img\Green-animated-arrow.gif" id="arrow-img">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title" style="text-align: left;">To be paid..</h5>
                <?php
                while ($row = mysqli_fetch_array($query_orders)) {
                  echo "&#8377; " . $row['SUM(amount)'];
                  echo "<br />";
                }
                ?>
                <!-- <div class="spinner-border text-success" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div> -->
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>




  <div class="container">
    <!-- User Features -->

    <div class="row">

      <div class="card container-content">
        <img src="assets\img\invoice_receipt_animation.gif" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">My Products.</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="invoice.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

      <div class="card container-content">
        <img src="assets\img\orders.gif" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">My Orders.</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="orders.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

      <div class="card container-content">
        <img src="assets\img\payments.gif" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">My Payments.</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="payments.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

    </div>

  </div>

</div>






<?php include "footer.php"; ?>