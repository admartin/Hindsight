<?php

require_once ("twitter_php_interface/TwitterAPIExchange.php");
require_once ("checkIfPresent.php");
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
$urlTweetEmbed = "https://publish.twitter.com/oembed";
$requestMethod = "GET";


if(isset($_SESSION['username'])) {


        $query = '?screen_name=' . $_SESSION['username'] . '&count=100';

        $twitter = new TwitterAPIExchange($credentials);
        $result = json_decode($twitter->setGetfield($query)
            ->buildOauth($url, $requestMethod)
            ->performRequest(), $assoc = TRUE);

            $htmlBody = ""; // an empty html body response for now.
            $tweetsParagraph = "";
            $tweet = "";
            $created_at = "";
            $user = "";


            //id_str

            foreach ($result as $item) {
                $tweet = $item['text'];
                $created_at = $item['created_at'];
                $user = $_SESSION['username'];

                $oEmbedTwitter = new TwitterAPIExchange($credentials);
                $queryTwo = $urlTweetEmbed . "?url=https://twitter.com/" . $_SESSION['username'] . "/status/"
                    . $item['id_str'] . "&maxwidth=325";
                $resultTwo = json_decode($oEmbedTwitter->setGetfield($query)
                             ->buildOauth($queryTwo, $requestMethod)
                             ->performRequest(), $assoc = TRUE);

                echo $resultTwo['html'];

                PrintTweetCategory($tweet, $user, $created_at);

            }
} else {
        echo "Error with session variable, username not set!";
        die();
}