<?php

include "header.php";

include "navBarTop.php";

include "sideNavBar.php";

?>

<div class="content">


    <form method="POST">
        <input type="submit" class="btn btn-primary" name="submit" id="get_started" Value="submit">
    </form>



    <h6 class="display-1">My Orders.</h6>

    <br>

    <div class="error">
        <?php
        if ($error != "") {
            echo $error;
        } else {
            echo $success;
        }
        ?>
    </div>


    <div class="container" id="orders">



        <!-- Trigger Buttons for collapse -->


        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

            <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" data-bs-toggle="collapse" href="#multiCollapseExample1">
            <label class="btn btn-outline-success" for="btncheck1">My Sales</label>

            <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2">
            <label class="btn btn-outline-warning" for="btncheck2">My Orders</label>

            <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample3">
            <label class="btn btn-outline-warning" for="btncheck3">Add Products</label>

        </div>






        <!-- Sales -->

        <div class="row">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card card-body">

                    <div class="col" id="Existing-Orders">

                        <div class="card">

                            <h5 class="card-header">My Sales Record...</h5>
                            <div class="card-body">

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#salesList">
                                    + Add Sales
                                </button>

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
                                                        <tr data-bs-toggle="modal" data-bs-target="#saleModal">
                                                            <th scope="row"><?php echo $row["sales_id"]; ?></th>
                                                            <td><?php echo $row["date"]; ?></td>
                                                            <td><?php echo $row["name"]; ?></td>
                                                            <td><?php echo $row["invoice_no"]; ?></td>
                                                            <td><?php echo $row["business_name"]; ?></td>
                                                            <td><?php echo $row["product"]; ?></td>
                                                            <td><?php echo $row["quantity"]; ?></td>
                                                            <td><?php echo $row["amount"]; ?></td>
                                                            <td><input type="button" name="view" value="view" id="<?php echo $row["sales_id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
                                                            <td><input type="button" name="delete" value="delete" id="<?php echo $row["sales_id"] ?>" class="btn btn-danger btn-xs delete"></td>
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


                                <hr>


                                <!-- Modal for order update -->
                                <div class="modal fade" id="salesList" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add your orders details.</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <form method="POST" action="" id="salesform" class="form">

                                                    <div class="form-group">

                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="col-form-label">Date</label>
                                                                <input type="text" class="form-control datepicker" name="date" minlength="10" maxlength="10" size="10" placeholder="dd/mm/yyyy">
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">GSTIN No.</label>
                                                                <input type="text" class="form-control" id="gstin" name="gstin" minlength="8" maxlength="15" size="15" style="text-transform:uppercase">
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">Invoice No.</label>
                                                                <input type="text" class="form-control" id="invoiceNo" name="invoiceNo">
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="col-form-label">Name</label>
                                                                <input type="text" class="form-control" id="name" name="name">
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">Contact No.</label>
                                                                <input type="number" class="form-control" id="contactNo" name="contactNo" minlength="10" maxlength="10" size="10" placeholder="+91">
                                                            </div>


                                                        </div>
                                                    </div>


                                                    <div class="row">

                                                        <div class="col">
                                                            <label class="col-form-label">Business Name</label>
                                                            <input type="text" class="form-control" id="businessName" name="businessName">
                                                        </div>

                                                        <div class="col">
                                                            <label class="col-form-label">Email Id</label>
                                                            <input type="text" class="form-control" id="emailId" name="emailId" placeholder="Apartment, studio, or floor">
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col">
                                                            <label class="col-form-label">Address</label>
                                                            <input type="text" class="form-control" id="address" name="address" placeholder="Apartment, studio, or floor">
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="col-form-label">Product Detais</label>
                                                                <input type="text" class="form-control" id="product" name="product">
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">Quantity</label>
                                                                <input type="text" class="form-control" id="quantity" name="quantity">
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">Amount</label>
                                                                <input type="text" class="form-control" id="amount" name="amount" placeholder="&#8377;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row">

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Payment Mode</label>
                                                                <input type="text" class="form-control" id="paymentMode" name="paymentMode">
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Payment Status</label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="paymentStatus" id="paymentStatus" value="true">
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                        Recieved
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="paymentStatus" id="paymentStatus" value="false">
                                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                                        Not Recieved
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="modal-footer form-buttons">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input type="hidden" name="submitOrder" id="action" value="0">
                                                        <input type="submit" class="btn btn-primary" name="submit-order" value="Save changes">
                                                    </div>

                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <hr>

            </div>

        </div>





        <!-- Orders -->

        <div class="row">
            <div class="collapse multi-collapse" id="multiCollapseExample2">
                <div class="card card-body">

                    <div class="col" id="Existing-Orders">

                        <div class="card">

                            <h5 class="card-header">My Orders Record...</h5>
                            <div class="card-body">

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ordersList">
                                    + Add Orders
                                </button>

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
                                                        <tr data-bs-toggle="modal" data-bs-target="#saleModal">
                                                            <th scope="row"><?php echo $row["orders_id"]; ?></th>
                                                            <td><?php echo $row["date"]; ?></td>
                                                            <td><?php echo $row["name"]; ?></td>
                                                            <td><?php echo $row["invoice_no"]; ?></td>
                                                            <td><?php echo $row["business_name"]; ?></td>
                                                            <td><?php echo $row["product"]; ?></td>
                                                            <td><?php echo $row["quantity"]; ?></td>
                                                            <td><?php echo $row["amount"]; ?></td>
                                                            <td><input type="button" name="view" value="view" id="<?php echo $row["orders_id"]; ?>" class="btn btn-info btn-xs view_order_data" /></td>
                                                            <td><input type="button" name="delete" value="delete" id="<?php echo $row["orders_id"] ?>" class="btn btn-danger btn-xs delete_order"></td>
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


                                <hr>


                                <!-- Modal for order update -->
                                <div class="modal fade" id="ordersList" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add your orders details.</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <form method="POST" action="" id="salesform" class="form">

                                                    <div class="form-group">

                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="col-form-label">Date</label>
                                                                <input type="text" class="form-control datepicker" name="date" minlength="10" maxlength="10" size="10" placeholder="dd/mm/yyyy">
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">GSTIN No.</label>
                                                                <input type="text" class="form-control" id="gstin" name="gstin" minlength="8" maxlength="15" size="15" style="text-transform:uppercase">
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">Invoice No.</label>
                                                                <input type="text" class="form-control" id="invoiceNo" name="invoiceNo">
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="col-form-label">Name</label>
                                                                <input type="text" class="form-control" id="name" name="name">
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">Contact No.</label>
                                                                <input type="number" class="form-control" id="contactNo" name="contactNo" minlength="10" maxlength="10" size="10" placeholder="+91">
                                                            </div>


                                                        </div>
                                                    </div>


                                                    <div class="row">

                                                        <div class="col">
                                                            <label class="col-form-label">Business Name</label>
                                                            <input type="text" class="form-control" id="businessName" name="businessName">
                                                        </div>

                                                        <div class="col">
                                                            <label class="col-form-label">Email Id</label>
                                                            <input type="text" class="form-control" id="emailId" name="emailId" placeholder="Apartment, studio, or floor">
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col">
                                                            <label class="col-form-label">Address</label>
                                                            <input type="text" class="form-control" id="address" name="address" placeholder="Apartment, studio, or floor">
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="col-form-label">Product Detais</label>
                                                                <select class="form-select" aria-label="Default select example" id="product" name="product">
                                                                    <option disabled selected>-- Select City --</option>
                                                                    <?php
                                                                    include "connection.php";  // Using database connection file here
                                                                    $records = mysqli_query($link, "SELECT `product` From `product` WHERE user_id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' ");  // Use select query here 

                                                                    while ($data = mysqli_fetch_array($records)) {
                                                                        echo "<option value='" . $data['product'] . "'>" . $data['product'] . "</option>";  // displaying data in option menu
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">Quantity</label>
                                                                <input type="text" class="form-control" id="quantity" name="quantity">
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">Amount</label>
                                                                <input type="text" class="form-control" id="amount" name="amount" placeholder="&#8377;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row">

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Payment Mode</label>
                                                                <input type="text" class="form-control" id="paymentMode" name="paymentMode">
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Payment Status</label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="paymentStatus" id="paymentStatus" value="true">
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                        Recieved
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="paymentStatus" id="paymentStatus" value="false">
                                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                                        Not Recieved
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="modal-footer form-buttons">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input type="hidden" name="submitOrder" id="action" value="1">
                                                        <input type="submit" class="btn btn-primary" name="submit-order" value="Save changes">
                                                    </div>

                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <hr>

            </div>

        </div>







        <!-- Products -->

        <div class="row">
            <div class="collapse multi-collapse" id="multiCollapseExample3">
                <div class="card card-body">

                    <div class="col" id="Existing-Orders">

                        <div class="card">

                            <h5 class="card-header">My Sales Record...</h5>
                            <div class="card-body">

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#salesList">
                                    + Add Sales
                                </button>

                                <?php
                                $result = mysqli_query($link, "SELECT * FROM `" . $salesTable . "` ORDER BY id DESC ");

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
                                                        <tr data-bs-toggle="modal" data-bs-target="#saleModal">
                                                            <th scope="row"><?php echo $row["id"]; ?></th>
                                                            <td><?php echo $row["date"]; ?></td>
                                                            <td><?php echo $row["name"]; ?></td>
                                                            <td><?php echo $row["invoiceNo"]; ?></td>
                                                            <td><?php echo $row["businessName"]; ?></td>
                                                            <td><?php echo $row["product"]; ?></td>
                                                            <td><?php echo $row["quantity"]; ?></td>
                                                            <td><?php echo $row["amount"]; ?></td>
                                                            <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
                                                            <td><input type="button" name="delete" value="delete" id="<?php echo $row["id"] ?>" class="btn btn-danger btn-xs delete"></td>
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


                                <hr>


                                <!-- Modal for order update -->
                                <div class="modal fade" id="salesList" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit your orders details.</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <form method="POST" action="" id="salesform" class="form">

                                                    <div class="form-group">

                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="col-form-label">Product Name</label>
                                                                <input type="text" class="form-control datepicker" name="date" minlength="10" maxlength="10" size="10" placeholder="dd/mm/yyyy">
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">Amount Per Qty</label>
                                                                <input type="text" class="form-control" id="gstin" name="gstin" minlength="8" maxlength="15" size="15" style="text-transform:uppercase">
                                                            </div>

                                                            <div class="col">
                                                                <label class="col-form-label">Quantity</label>
                                                                <input type="text" class="form-control" id="invoiceNo" name="invoiceNo">
                                                            </div>

                                                        </div>
                                                    </div>



                                                    <div class="modal-footer form-buttons">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input type="hidden" name="submitOrder" id="action" value="0">
                                                        <input type="submit" class="btn btn-primary" name="submit-order" value="Save changes">
                                                    </div>

                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <hr>

            </div>

        </div>



    </div>


</div>



<div id="dynamic_field_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="add_name">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Details</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" />
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="dynamic_field">

                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="hidden" name="action" id="action" value="insert" />
                    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                </div>
            </form>
        </div>
    </div>

</div>








<div id="dataModal" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Your orders details.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail">

            </div>
            <div class="modal-footer form-buttons">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<div id="deletedataModal" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                    </svg> Data deleted successfully.</h4>
            </div>
        </div>
    </div>
</div>



</div>

<?php include("footer.php"); ?>