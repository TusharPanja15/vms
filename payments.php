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

    <a href="editInvoice.php" class="btn btn-info btn-xs print">Create your own invoice</a>

    <div class="container">

        <div class="row">
            <div class="card card-body">

                <div class="col" id="Existing-Orders">

                    <div class="card">

                        <h5 class="card-header">My Sales Record...</h5>
                        <div class="card-body">


                            <?php
                            $result = mysqli_query($link, "SELECT * FROM `sales` WHERE user_id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' ORDER BY `sales_id` DESC");

                            ?>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                            ?>


                                <div class="table-responsive">
                                    <table class='table table-hover table-borderless myTable'>
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
                                        <?php
                                        $i = 0;
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tbody>
                                                <form>
                                                    <th scope="row"><?php echo $i + 1; ?></th>
                                                    <td><?php echo $row["date"]; ?></td>
                                                    <td><?php echo $row["name"]; ?></td>
                                                    <td><?php echo $row["invoice_no"]; ?></td>
                                                    <td><?php echo $row["business_name"]; ?></td>
                                                    <td><?php echo $row["product"]; ?></td>
                                                    <td><?php echo $row["quantity"]; ?></td>
                                                    <td><?php echo $row["amount"]; ?></td>
                                                    <td><input type="button" name="print" value="print" id="<?php echo $row["sales_id"]; ?>" class="btn btn-info btn-xs print" /></td>
                                                    </tr>
                                                </form>
                                            </tbody>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </table>


                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end pager myPager">
                                        </ul>
                                    </nav>

                                </div>
                            <?php
                            } else {
                                echo "No result found";
                            }

                            ?>


                        </div>

                    </div>
                </div>

            </div>

            <hr>


        </div>

    </div>


    <div class="container">

        <div class="row">
            <div class="card card-body">

                <div class="col" id="Existing-Orders">

                    <div class="card">

                        <h5 class="card-header">My Orders Record...</h5>
                        <div class="card-body">


                            <?php
                            $result = mysqli_query($link, "SELECT * FROM `orders` WHERE user_id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' ORDER BY `orders_id` DESC");

                            ?>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                            ?>


                                <div class="table-responsive">
                                    <table class='table table-hover table-borderless myTable2'>
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
                                        <?php
                                        $i = 0;
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tbody>
                                                <form>
                                                    <th scope="row"><?php echo $i + 1 ?></th>
                                                    <td><?php echo $row["date"]; ?></td>
                                                    <td><?php echo $row["name"]; ?></td>
                                                    <td><?php echo $row["invoice_no"]; ?></td>
                                                    <td><?php echo $row["business_name"]; ?></td>
                                                    <td><?php echo $row["product"]; ?></td>
                                                    <td><?php echo $row["quantity"]; ?></td>
                                                    <td><?php echo $row["amount"]; ?></td>
                                                    <td><input type="button" name="printOrder" value="print" id="<?php echo $row["orders_id"]; ?>" class="btn btn-info btn-xs print" /></td>
                                                    </tr>
                                                </form>
                                            </tbody>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </table>


                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end pager2 myPager2">
                                        </ul>
                                    </nav>

                                </div>
                            <?php
                            } else {
                                echo "No result found";
                            }

                            ?>


                        </div>

                    </div>
                </div>

            </div>

            <hr>


        </div>

    </div>

</div>



<div id="dataModall" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" id="printarea">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Your payment details.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail">

            </div>
            <div class="modal-footer form-buttons">
                <input type="button" class="btn btn-success" value="Print this page" onClick="window.print()">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<?php include("footer.php"); ?>