<?php

/**
 *
 * Class with only static methods which will be used to return our array of categories.
 *
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 4/14/2017
 * Time: 12:16 PM
 */
class UserCategories
{


    private static $sports = array("football", "NFL", "NCAA", "Superbowl", "Falcons", "Dodgers", "Bulldawgs", "Georgia Bulldawgs", "Yellow Jackets", "NFL", "SEC"
    , "basketball", "NBA", "March Madness", "baseball", "MLB", "world series", "tennis", "soccer", "NASCAR", "olympics", "golf", "Augusta");
    private static $politics = array("Russia", "Syria", "France", "Belgium", "London", "Moscow", "Washington", "North Korea", "China", "Beijing", "Nuclear", "Nuclear War",
        "Terrorism", "War on Terror", "War on Drugs", "Police Brutality", "Senate", "House", "Duma", "Communist", "Communism", "Socialist", "Fascist", "Trump", "Putin",
        "Kim Jong Un", "CIA", "WikiLeaks", "Russian Hacking", "Elections", "Hillary Clinton", "Clinton", "Donald Trump", "President", "POTUS", "Debate", "CNN", "Fox News",
        "BBC", "Liberal", "Conservative", "State of the Union", "Homosexuality", "Black Lives Matter", "BLM", "Obama");
    private static $entertainment = array("TV", "MTV", "HBO", "Game of Thrones", "GOT", "Sex", "Sexy", "Fashion", "Marriage", "SNL", "Reddit", "AMA", "Golden Globes", "Music", "Billboard Music Awards",
        "BMA", "Oscars", "Miss Universe", "Pageant", "Rap", "Hip-Hop", "Hip Hop", "RNB", "R&B", "Classic Music", "Metal", "Elvis", "YouTube");
    private static $technology = array("Microsft", "Google", "Apple", "Toshiba", "iPhone", "Android", "Windows", "Mac", "iPad", "Surface", "Tablet", "Yahoo", "Verizon", "Samsung",
        "Uber", "Adobe", "Photoshop", "AI", "Self Driving Cars", "Video Games", "LG", "OSX", "Windows 10");
    private static $food = array("Wendys", "McDonalds", "Wendy's", "Chic Fil A", "Chic-Fil-a", "Burger", "TGI", "BBQ", "Grilling", "Wine", "Tasty", "Yum", "IHOP", "Pancakes", "Pizza", "Cake"
        ,"Baking");
    private static $other;
    private static $animals = array("Cat", "Dog", "Cats", "Dogs", "Doggo", "Pupper", "Pupperino", "Puppy", "Kitten", "Parrot");



    public static function decideCategory($tweets, $username, $created_at) {

        /*
         * Okay, so at this time we are just going over the whole splitted (aka, exploded) tweet. However, what we want to do is go over the tweet, yes,
         * but, keep in mind that once it hits a certain keyword just break out of it. Perhaps even, only decide on "other" if it hit nothing at all.
         * */

        $dsn = 'mysql:host=localhost:3306;dbname=userdata;charset=utf8';
        $user = 'root'; //Insert your username in here when testing.
        $pass = 'Jaljap2732!';//Insert your password in here when testing.
        $dbh = new PDO($dsn, $user, $pass);
        $dbh->exec("set names utf8");

        try {


            $tweet = $tweets;
            $dateArray = explode(" ", $created_at);
            $date = $dateArray[5] . "-" . self::monthToInt($dateArray[1]) . "-". $dateArray[2];
            $sql = "INSERT INTO tweet (tweet, posted, Category_idCategory, Username) 
            VALUES (?, ?, ?, ?);";

            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

            $notOther = false;


            foreach (self::$politics as $result) {
                if (strpos(strtolower($tweet), strtolower($result)) !== false) {
                    $notOther = true;

                    $execute = $dbh->prepare($sql);
                    $execute->execute(array($tweet, $date, 2, $username));
                    //echo "POLITICS!!";
                    //echo "Tweet is: " . $tweet;

                    break;
                }
            }

            foreach (self::$entertainment as $result) {
                if (strpos(strtolower($tweet), strtolower($result)) !== false) {
                    $notOther = true;
                    $execute = $dbh->prepare($sql);
                    $execute->execute(array($tweet, $date, 3, $username));
                    //echo "entertainment!!";
                    //echo "Tweet is: " . $tweet;
                    break;
                }
            }
            foreach (self::$sports as $result) {
                if (strpos(strtolower($tweet), strtolower($result)) !== false) {
                    $notOther = true;
                    $execute = $dbh->prepare($sql);
                    $execute->execute(array($tweet, $date, 1, $username));
                    //echo "sports!!";
                    //echo "Tweet is: " . $tweet;
                    break;
                }
            }
            foreach (self::$animals as $result) {
                if (strpos(strtolower($tweet), strtolower($result)) !== false) {
                    $notOther = true;
                    $execute = $dbh->prepare($sql);
                    $execute->execute(array($tweet, $date, 5, $username));
                    //echo "animals!!";
                    //echo "Tweet is: " . $tweet;
                    break;
                }
            }
            foreach (self::$food as $result) {
                if (strpos(strtolower($tweet), strtolower($result)) !== false) {
                    $notOther = true;
                    $execute = $dbh->prepare($sql);
                    $execute->execute(array($tweet, $date, 7, $username));
                    //echo "food!!";
                    //echo "Tweet is: " . $tweet;
                    break;
                }
            }
            foreach (self::$technology as $result) {
                if (strpos(strtolower($tweet), strtolower($result)) !== false) {
                    $notOther = true;
                    $execute = $dbh->prepare($sql);
                    $execute->execute(array($tweet, $date, 4, $username));
                    //echo "technology!!";
                    //echo "Tweet is: " . $tweet;
                    break;
                }
            }

            if($notOther == false) {
                //echo "OTHER";
                $execute = $dbh->prepare($sql);
                $execute->execute(array($tweet, $date, 6, $username));
            }


        } catch (PDOException $e) {
            echo "PDO Error: " . $e->getMessage();
            die();
        }


    }


    private function monthToInt($month) {

        $result = "";

        switch($month) {
            case "Jan":
                //echo "Janaury: 01";
                $result = "01";
                break;
            case "Feb":
                //echo ("February: 02");
                $result = "02";
                break;
            case "Mar":
                //echo ("March: 03");
                $result = "03";
                break;
            case "Apr":
                //echo ("April: 04");
                $result = "04";
                break;
            case "May":
                //echo ("May: 05");
                $result = "05";
                break;
            case "Jun":
                //echo ("Jun: 06");
                $result = "06";
                break;
            case "Jul":
                //echo ("Jul: 07");
                $result = "07";
                break;
            case "Aug":
                //echo ("August: 08");
                $result = "08";
                break;
            case "Sept":
                //echo ("September: 09");
                $result = "09";
                break;
            case "Sep":
                //echo ("September: 09");
                $result = "09";
                break;
            case "Oct":
                //echo ("October: 10");
                $result = "10";
                break;
            case "Nov":
                //echo ("November: 11");
                $result = "11";
                break;
            case "Dec":
                //echo ("December: 12");
                $result = "12";
                break;
        }

        return $result;

    }
}