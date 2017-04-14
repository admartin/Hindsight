<?php

require_once ("twitter_php_interface/TwitterAPIExchange.php");
session_start();

/**
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 4/9/2017
 * Time: 7:23 PM
 */

$credentials = array(
    'oauth_access_token' => "847109906826186752-IqDb0ueSTWvNpx7PH24h8w9FrKOCJza",
    'oauth_access_token_secret' => "fInPOqtpCNd5wVONyQPHofxFepUbMuir1s1kWib8FUFIu",
    'consumer_key' => "jyIwjRE1QwU4yAFCuJRF1W2ND",
    'consumer_secret' => "lhtxvG8TYIy1DrxjLMkU22EqVU9tK5Zn2y3s521Y91m7HH3kHn"
);

$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";


if(isset($_SESSION['username'])) {


        $query = '?screen_name=' . $_SESSION['username'] . '&count=100';

        $twitter = new TwitterAPIExchange($credentials);
        $result = json_decode($twitter->setGetfield($query)
            ->buildOauth($url, $requestMethod)
            ->performRequest(), $assoc = TRUE);

        if($result["error"][0]["message"] != "") {
            echo "Error With Twiiter API Exchange";
        } else {

            $htmlBody = ""; // an empty html body response for now.
            $tweetsParagraph = "";
            $tweet = "";

            foreach ($result as $item) {
                $tweet = $item['text'];
                $tweetsParagraph .= "<p>" ."$tweet</p>";
            }

            $htmlBody = <<<END
                    $tweetsParagraph;
END;

            echo $htmlBody;
        }
} else {
        echo "Error with session variable, username not set!";
        die();
}