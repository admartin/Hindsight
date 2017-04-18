<?php
/**
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 4/17/2017
 * Time: 9:43 PM
 */


session_start();



    if(isset($_SESSION['username'])) {

        $dsn = 'mysql:host=localhost:3306;dbname=userdata;charset=utf8';
        $user = 'root'; //Insert your username in here when testing.
        $pass = 'Jaljap2732!';//Insert your password in here when testing.
        $dbh = new PDO($dsn, $user, $pass);

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

        $sqlQuery  =     "select t.username, c.type, count(t.category_idCategory) as count";
        $sqlQuery .=     " from tweet t, category c where t.username = ? AND t.category_idCategory = c.idCategory";
        $sqlQuery .=     " group by c.type, t.username;";

        $execute = $dbh->prepare($sqlQuery);
        $execute->execute(array($_SESSION['username']));


        $result = $execute->fetchAll();
        $arrayResult = array();

        foreach ($result as $item) {
            array_push($arrayResult,  array(array("type" => $item['type'],
                                           "count" => $item['count']))
            );

        }

        echo json_encode($arrayResult);
//        foreach ($arrayResult as $e){
//            echo json_encode($e);
//        }

    } else {
        echo "Error";
    }
