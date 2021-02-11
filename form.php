<?php include("header.php") ?>


<!-- Signup form -->

<div class="container element Form" id="logInForm">

    <h6 class="display-4">Create your Account</h6>
    <br>
    <h2 class="display-6">to continue</h2>
    <br><br>

    <div class="row">
        <div class="col">
            <form method="POST">


                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email address">
                    <small id="passwordHelpBlock" class="form-text text-muted">You can use letters, numbers & periods.</small>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="firstName" placeholder="First Name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                    </div>
                </div>
                <small id="passwordHelpBlock" class="form-text text-muted">Enter Your Name.</small>

                <br>

                <div class="row">
                    <div class="col">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" name="passwordConfirm" placeholder="Confirm">
                    </div>
                    <!--eye icon-->
                </div>
                <small id="passwordHelpBlock" class="form-text text-muted">Use 8 or more characters with a mix of letters, numbers &
                    symbols.</small>

                <input type="checkbox" class="checkbox" name="stayLoggedIn" value=1> Stay logged in


                <div class="form-buttons">
                    <input type="button" id="toogle-button" class="btn btn-light toggleForm" value="Sign in instead">
                    <input type="hidden" name="signUp" value="1">
                    <input type="submit" class="btn btn-primary" id="login-button" name="submit" value="LogIn">
                </div>
            </form>
        </div>
        <div class="col">
            <img src="assets\img\secure.gif">

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


<!-- Login form -->

<div class="container element Form" id="signInForm">

    <form method="POST">

        <h6 class="display-4">Sign in</h6>
        <br>
        <h2 class="display-6">to continue</h2>
        <br>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email address">
                    <small id="passwordHelpBlock" class="form-text text-muted">Use your existing email.</small>
                </div>

                <br>

                <input type="password" class="form-control" name="password" placeholder="Password">
                <!--eye icon-->

                <small id="passwordHelpBlock" class="form-text text-muted">Enter your password.</small>

                <input type="checkbox" class="checkbox" name="stayLoggedIn" value=1> Stay logged in

                <div class="form-buttons">
                    <input type="button" id="toogle-button" class="btn btn-light toggleForm" value="Create new account">
                    <input type="hidden" name="signUp" value="0">
                    <input type="submit" class="btn btn-primary" id="login-button" name="submit" value="SignIn">
                </div>

                <a class="forgetPassword">Forget Password?</a>

            </div>
            <div class="col">
                <img src="assets\img\secure.gif">

                <div class=" error">
                    <?php
                    if ($error != "") {
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                    }
                    ?>
                </div>

            </div>
        </div>
    </form>

</div>


<?php include("footer.php"); ?>