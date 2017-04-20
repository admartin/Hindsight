<?php
/**
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 4/20/2017
 * Time: 12:23 PM
 */

session_start();

if(isset($_SESSION['username'])) {

    $dsn = 'mysql:host=localhost:3306;dbname=userdata;charset=utf8';
    $user = 'root'; //Insert your username in here when testing.
    $pass = 'Jaljap2732!';//Insert your password in here when testing.
    $dbh = new PDO($dsn, $user, $pass);
    $dbh->exec("set names utf8");

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

    //SELECT t.tweet, c.type from tweet t, category c WHERE c.idCategory = t.Category_idCategory AND c.type = 'Politics';
    $sql = "SELECT t.tweet, c.type FROM tweet t, category c WHERE c.idCategory = t.Category_idCategory AND c.type = ? AND t.Username = ?";
    $sqlExecute = $dbh->prepare($sql);

    $categories = array('Animals', 'Technology', 'Food', 'Politics', 'Entertainment', 'Sports', 'Other');

    //$htmlBody = "";
    $table = "";

    foreach ($categories as $category) {
        $sqlExecute->execute(array($category, $_SESSION['username']));
        $result = $sqlExecute->fetchAll();

        foreach ($result as $item) {
            $table .= "<table class='table table-striped\'>";
            $table .= "<thead><tr><th>Tweet</th><th>Category</th></tr></thead>";
            $table .= "<tbody><tr><td>" .$item['tweet'] ."</td>" . "<td>" . $item['type'] ."</td></tr>". "</tbody>";
            $table .=  "</table>";
        }

    }

    echo $table;



} else {
    echo "Session not set";
    die();
}