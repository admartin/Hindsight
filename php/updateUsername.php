<?php
/**
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 4/18/2017
 * Time: 2:40 PM
 */

session_start();

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    echo $username;
}