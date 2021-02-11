<?php

session_start();
$error = "";
$contactNo = "";
$companyName = "";
$address = "";

if (array_key_exists("id", $_COOKIE) && $_COOKIE['id']) {

    $_SESSION['id'] = $_COOKIE['id'];
}

if (array_key_exists("id", $_SESSION)) {

    include "connection.php";

    $query = "SELECT `first name`, `last name`, `email` FROM `users` WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";

    $row = mysqli_fetch_array(mysqli_query($link, $query));

    $firstName = $row['first name'];

    $lastName = $row['last name'];

    $email = $row['email'];


    // Modal form validation

    if (array_key_exists("submit", $_POST)) {

        if (!$_POST['contactNo']) {

            $error .= "Your contact no. is required<br>";
        }

        if (!$_POST['companyName']) {

            $error .= "Your company name is required<br>";
        }

        if (!$_POST['address']) {

            $error .= "A address is required<br>";
        }

        if (!$_POST['address2']) {

            $error .= "Address is required<br>";
        }

        if (!$_POST['city']) {

            $error .= "Your City is required<br>";
        }

        if (!$_POST['state']) {

            $error .= "Your State is required<br>";
        }

        if (!$_POST['zip']) {

            $error .= "Your Zip-Code is required<br>";
        }

        if ($error != "") {

            $error = "<p>There were error(s) in your form:</p>" . $error;
        } else {


            $query = "UPDATE `users_details` SET `contact no` = '" . mysqli_real_escape_string($link, $_POST['contactNo']) . "', `company name` = '" . mysqli_real_escape_string($link, $_POST['companyName']) . "', `address` = '" . mysqli_real_escape_string($link, $_POST['address'] . $_POST['address2']) . "', `city` = '" . mysqli_real_escape_string($link, $_POST['city']) . "', `state` = '" . mysqli_real_escape_string($link, $_POST['state']) . "', `zip` = '" . mysqli_real_escape_string($link, $_POST['zip']) . "' WHERE `email` = '$email' LIMIT 1";


            if (!mysqli_query($link, $query)) {

                $error = "<p>Could not update your details - please try again later.</p>";
            } else {

                $query = "SELECT * FROM `users_details` WHERE `email` = '$email' LIMIT 1";

                $row = mysqli_fetch_array(mysqli_query($link, $query));

                if (isset($row)) {
                    $contactNo = $row['contact no'];
                    $companyName = $row['company name'];
                    $address = $row['address']  . ", " . $row['city'] . ", " . $row['state'] . ", " . $row['zip'];
                } else {

                    $error .= "ff1234567ff";
                }
            }
        }
    }
} else {

    header("Location: index.php");
}


?>

<?php include "header.php";

include "navBarTop.php";

include "sideNavBar.php"; ?>


<!-- profile photo css -->

<link rel="stylesheet" type="text/css" href="assets\css\profile-photo.css">


<div class="content">

    <h6 class="display-1">My Profile.</h6>

    <div class="container">

        <div class="card mb-3" id="card-noBorder">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">

                                <!-- Profile Photo -->
                                <img src="assets\img\payment.gif" alt="..." class="img-thumbnail">

                            </div>
                            <div class="flip-card-back">
                                <h1><a href="">Change Profile image...</a></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="display-4"><?php echo  $firstName . " " . $lastName; ?></h1>
                        <br>

                        <!-- Profile Details -->
                        <h4><?php echo  "Email Id : " . $email; ?></h4>
                        <h4><?php echo  "Contact No. : " . $contactNo;  ?></h4>
                        <h4><?php echo  "Company Name : " . $companyName; ?></h4>
                        <h4><?php echo  "Company Address : " . $address; ?></h4>


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            Edit Details.
                        </button>

                        <div class="error">
                            <?php
                            if ($error != "") {
                                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php

        $sales = "SELECT SUM(amount), count(*) as number FROM `sales` GROUP BY payment_status";
        $query_sales = mysqli_query($link, $sales);

        $orders = "SELECT SUM(amount), count(*) as number FROM `orders` GROUP BY payment_status";
        $query_orders = mysqli_query($link, $orders);

        ?>


        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Percentage of Paid and Credit Sales</h5>
                        <div id="salespiechart" style="height: 300px">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Percentage of Paid and Credit Orders</h5>
                        <div id="orderspiechart" style="height: 300px">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['amount', 'Number'],
                    <?php
                    while ($row = mysqli_fetch_array($query_sales)) {
                        echo "['" . $row["SUM(amount)"] . "', " . $row["number"] . "],";
                    }
                    ?>
                ]);
                var options = {
                    //is3D:true,  
                    pieHole: 0.4
                };
                var chart = new google.visualization.PieChart(document.getElementById('salespiechart'));
                chart.draw(data, options);
            }
        </script>

        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['amount', 'Number'],
                    <?php
                    while ($row = mysqli_fetch_array($query_orders)) {
                        echo "['" . $row["SUM(amount)"] . "', " . $row["number"] . "],";
                    }
                    ?>
                ]);
                var options = {
                    //is3D:true,  
                    pieHole: 0.4
                };
                var chart = new google.visualization.PieChart(document.getElementById('orderspiechart'));
                chart.draw(data, options);
            }
        </script>



    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit your personal details.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST">

                    <div class="form-group">
                        <label class="col-form-label">Contact No.</label>
                        <input type="number" class="form-control" id="contactNo" name="contactNo" placeholder="+91">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Business Name</label>
                        <input type="text" class="form-control" id="companyName" name="companyName">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
                    </div>

                    <div class="form-group">
                        <label>Address 2</label>
                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment, studio, or floor">
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>City</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>

                        <div class="form-group col-md-4">
                            <label>State</label>

                            <select id="inputState" class="form-control" id="state" name="state">
                                <option selected>Choose...</option>
                                <option>Andaman and Nicobar Island</option>
                                <option>Andhra Pradesh</option>
                                <option>Arunachal Pradesh</option>
                                <option>Assam</option>
                                <option>Bihar</option>
                                <option>Chandigarh</option>
                                <option>Chhattisgarh</option>
                                <option>Dadra and Nagar Haveli and Daman and Diu</option>
                                <option>Delhi</option>
                                <option>Goa</option>
                                <option>Gujarat</option>
                                <option>Haryana</option>
                                <option>Himachal Pradesh</option>
                                <option>Dharamshala</option>
                                <option>Jammu and Kashmir</option>
                                <option>Jharkhand</option>
                                <option>Karnataka</option>
                                <option>Kargil</option>
                                <option>Kerala</option>
                                <option>Ladakh</option>
                                <option>Lakshadweep</option>
                                <option>Madhya Pradesh</option>
                                <option>Maharashtra</option>
                                <option>Nagpur</option>
                                <option>Manipur</option>
                                <option>Meghalaya</option>
                                <option>Mizoram</option>
                                <option>Nagaland</option>
                                <option>Odisha</option>
                                <option>Puducherry</option>
                                <option>Punjab</option>
                                <option>Rajasthan</option>
                                <option>Sikkim</option>
                                <option>Tamil Nadu</option>
                                <option>Telangana</option>
                                <option>Tripura</option>
                                <option>Uttar Pradesh</option>
                                <option>Uttarakhand</option>
                                <option>Dehradun</option>
                                <option>West Bengal</option>
                            </select>

                            <small class="form-text text-muted">Only for India.</small>
                        </div>

                        <div class="form-group col-md-2">
                            <label>Zip</label>
                            <input type="number" class="form-control" id="zip" name="zip">
                        </div>

                    </div>

                    <!-- <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label">
                                    Check me out
                                </label>
                            </div>
                        </div> -->


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="submit" value="Save changes">
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


<?php include "footer.php"; ?>