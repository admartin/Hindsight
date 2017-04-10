<?php

session_start();

/**
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 4/9/2017
 * Time: 7:23 PM
 */




if(isset($_SESSION['username'])) {



        $servername = "localhost:3306"; //modify this with your own server
        $dbusername = "root"; //Modify this with your own username
        $dbpassword = "Jaljap2732!"; //modify this with your own password

        try {

            $connection = new PDO("mysql:host=$servername;dbname=rawdata",
                $dbusername,
                $dbpassword
            );

            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $connection->prepare("SELECT t.tweet FROM tweet t WHERE
                t.User_username = ?");

            $query->execute(array($_SESSION['username']));

            $htmlBody = ""; // an empty html body response for now.
            $tweetsParagraph = "";
            $tweet = "";

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $tweet = $row["tweet"];
                $tweetsParagraph .= "<p>Tweet: $tweet</p>";

            }

            $htmlBody = <<<END
                $tweetsParagraph;
END;

            echo $htmlBody;

        } catch (PDOException $e) {
            echo "Connection Failed With Error: " .$e->getMessage();
        }

    } else {
        echo "Error with session variable, username not set!";
        die();
    }