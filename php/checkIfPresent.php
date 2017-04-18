<?php
/**
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 4/14/2017
 * Time: 1:56 PM
 */

session_start();

require_once ("categories/UserCategories.php");
//echo "Item: " . $item['user']['screen_name'];


    function PrintTweetCategory($tweet, $username, $created_at)
    {

        //echo "Username is: " . $username;
        UserCategories::decideCategory($tweet, $username, $created_at);

    }