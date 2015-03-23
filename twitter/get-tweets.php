<?php
session_start();
require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "plazathemes";
$notweets = 30;
$consumerkey = "vcp0Z0KD8mHleidiivHw";
$consumersecret = "cSFqqBmm92pi8bEZaaV7J7BHqwrVOuO4oklV7xETcc";
$accesstoken = "218191870-cpQ4ng5ONm5zjRNALfkqFpMCqvakJPzBDXFcRdP6";
$accesstokensecret = "jPuMi30Mdy0zAxdeEEnEYYO0vy6iudOqSYY1gfdqjY";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
  
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>