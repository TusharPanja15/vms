<?php

session_start();
//$diaryContent="";

if (array_key_exists("id", $_COOKIE) && $_COOKIE['id']) {

    $_SESSION['id'] = $_COOKIE['id'];
}

if (array_key_exists("id", $_SESSION)) {

    include "connection.php";

    $query = "SELECT `first name` FROM `users` WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";

    $row = mysqli_fetch_array(mysqli_query($link, $query));

    $firstName = $row['first name'];

    include "main.php";

    //echo "<p>Logged In! <a href='index.php?logOut=1'>Log out</a></p>";
} else {

    header("Location: index.php");
}



?>