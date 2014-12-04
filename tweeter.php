<?php
session_start();
require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "AirEsiea";
$notweets = 10;
$consumerkey = "Ru6ucQXdi8Kr9MYzGgIz56n87";
$consumersecret = "4jtyeJb9Lc8oj5xTbyb8u2X361l3ZbRPrCokksYMJVWjm25nTo";
$accesstoken = "1086420055-LXc5AXhslGY3pLRR2HSKqFkeACvFs5SINdonzJq";
$accesstokensecret = "BrqKBnWDWUhqRMBq5vTKJZ5kkRfGHFmgHTT82VgpGJ0ye";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>	