<?php
/**
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 4/9/2017
 * Time: 9:49 AM
 */

$username = $_GET["username"];

if(isset($username)) {
    session_destroy();
    session_start();
    $_SESSION["username"] = $username;
    header("Location: ../WebContent/main.html");
} else {
    echo "Username is not set";
}






