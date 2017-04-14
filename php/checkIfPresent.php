<?php
/**
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 4/14/2017
 * Time: 1:56 PM
 */


require_once ("categories/UserCategories.php");
//echo "Item: " . $item['user']['screen_name'];

function PrintTweetCategory($tweet) {

    echo "Tweet Passed in is: " . $tweet;
    UserCategories::decideCategory($tweet);

}