<!-- Top Nav Bar CSS-->

<link rel="stylesheet" type="text/css" href="assets/css/nav-bar.css">


<!-- Top Nav Bar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">

    <!-- Image and text -->
    <!-- <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-top">
                Bootstrap
            </a>
        </div>
    </nav> -->

    <a class="navbar-brand" href="index.php">TopTechs360<span class="change_content"></span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="myProfile.php">My Profile</a>
            </li>
            <form class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a id="logout" href='index.php?logOut=1'>Log out</a></button>
            </form>
        </ul>
    </div>
</nav>