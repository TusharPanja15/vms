<?php include "header.php"; ?>

<div class="container element Form" id="detailsForm">

    <form method="POST">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First name">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last name">
            </div>
        </div>
        <input type="hidden" name="details" value="0">
        <input type="submit" class="btn btn-primary" id="login-button continue" name="submit" value="Continue">

    </form>

    <div class=" error">
        <?php
        if ($error != "") {
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        }
        ?>
    </div>

</div>

<?php include "footer.php"; ?>