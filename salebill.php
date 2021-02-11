<div class="modal fade" id="saleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">F

    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit your orders details.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" id="idForm">

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
                                <div class="btn-group">
                                    <input type="text" class="form-control" id="quantity" name="quantity">
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Kgs</a></li>
                                        <li><a class="dropdown-item" href="#">Pcs</a></li>
                                        <li><a class="dropdown-item" href="#">Lits</a></li>
                                    </ul>
                                </div>
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
                        <input type="hidden" name="submitOrder" value="0">
                        <input type="submit" class="btn btn-primary" name="submit-order" value="Save changes">
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $('#saleModal').bind('input propertychange', function() {

        $.ajax({
            method: "POST",
            url: "updateDatabase.php",
            data: {
                content: $("#saleModal").val()
            }
        });

    });
</script>