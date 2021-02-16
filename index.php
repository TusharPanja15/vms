<?php

ini_set("display_errors", "off");

session_start();

$error = "";

// Checks Sessions and Cookies 

if (array_key_exists("logOut", $_GET)) {

    unset($_SESSION);
    setcookie("id", "", time() - 60 * 60);
    $_COOKIE["id"] = "";

    session_destroy();

} else if ((array_key_exists("id", $_SESSION) and $_SESSION['id']) or (array_key_exists("id", $_COOKIE) and $_COOKIE['id'])) {

    header("Location: loggedin.php");
}

// Adding or Check User from database 

if (array_key_exists("submit", $_POST)) {

    include "connection.php";

    if (!$_POST['email']) {

        $error .= "An email address is required<br>";
    }

    if (!$_POST['password']) {

        $error .= "A password is required<br>";
    }

    if ($error != "") {

        $error = "<p>There were error(s) in your form:</p>" . $error;
        
    } else {

        if ($_POST['signUp'] == '1') {

            $query = "SELECT id FROM `users` WHERE email = '" . mysqli_real_escape_string($link, $_POST['email']) . "' LIMIT 1";

            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) > 0) {

                $error = "That email address is taken.";

            } else {

                if (!$_POST['firstName']) {

                    $error .= "Your First Name is required<br>";
                }

                if (!$_POST['lastName']) {

                    $error .= "Your Last Name is required<br>";
                }

                if ($error != "") {

                    $error = "<p>There were error(s) in your form:</p>" . $error;

                } else {

                    $date = date('Y-m-d H:i:sa');

                    $query = "INSERT INTO `users` (`date of creation`, `first name`, `last name`, `email`, `password`) VALUES ('$date', '" . mysqli_real_escape_string($link, $_POST['firstName']) . "', '" . mysqli_real_escape_string($link, $_POST['lastName']) . "', '" . mysqli_real_escape_string($link, $_POST['email']) . "', '" . mysqli_real_escape_string($link, $_POST['password']) . "')";

                    $queryA = "INSERT INTO `users_details` (`date of creation`, `email`, `first name`, `last name`) VALUES ('$date', '" . mysqli_real_escape_string($link, $_POST['email']) . "', '" . mysqli_real_escape_string($link, $_POST['firstName']) . "', '" . mysqli_real_escape_string($link, $_POST['lastName']) . "')";

                    mysqli_query($link, $queryA);

                    if (!mysqli_query($link, $query) and !mysqli_query($link, $queryA)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    } elseif ($_POST['password'] != $_POST['passwordConfirm']) { 

                        $error = "Please check your password.";

                    } else {

                        $query = "UPDATE `users` SET password = '" . md5(md5(mysqli_insert_id($link)) . $_POST['password']) . "' WHERE id = " . mysqli_insert_id($link) . " LIMIT 1";

                        $id = mysqli_insert_id($link);

                        mysqli_query($link, $query);

                        $_SESSION['id'] = $id;

                        setcookie("id", $id, time() + 60 * 60 * 24 * 365);

                        if ($_POST['stayLoggedIn'] == '1') {
                            setcookie("id", $id, time() + 60 * 60 * 24 * 365);

                            header("Location: loggedin.php");
                        }

                        header("Location: loggedin.php");
                    }
                }
            }

        } else {

            $query = "SELECT * FROM `users` WHERE email = '" . mysqli_real_escape_string($link, $_POST['email']) . "'";

            $result = mysqli_query($link, $query);

            $row = mysqli_fetch_array($result);

            if (isset($row)) {

                $hashedPassword = md5(md5($row['id']) . $_POST['password']);

                if ($hashedPassword == $row['password']) {

                    $_SESSION['id'] = $row['id'];

                    setcookie("id", $row['id'], time() + 60 * 60 * 24 * 1);

                    if (isset($_POST['stayLoggedIn']) == '1') {

                        setcookie("id", $row['id'], time() + 60 * 60 * 24 * 1);
                        header("Location: loggedin.php");
                    } 

                    header("Location: loggedin.php");
                } else {

                    $error = "That email/password combination could not be found.";
                }
            } else {

                $error = "That email/password combination could not be found.";
            }
        }
    }
}


// LogIn Form

include "form.php";

?>