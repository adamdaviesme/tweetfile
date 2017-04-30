<?php
//Error reporting while in dev
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
* Database
* You can just add a column called tweet_refresh or something if you have a table with the users username etc
**/
//temp username variable
$username = 'adammydesign';

//value from database placeholder (tweet_refresh)
$start_date = new DateTime('2017-04-30 10:55:00');

//generate new date for current time and calculate the difference between the 2 dates
$since_start = $start_date->diff(new DateTime());

//this gets the minutes difference which is all we need really
$difference = $since_start->i;

//check if the difference is greater than 3 (for 3 minutes), this can be adjusted for further throttling
if($difference >= 3) {

  /**
  * GET TWEETS LIKE YOU USUALLY DO
  **/

  // TEMP ARRAY TO REPRESENT STATUSES ARRAY
  $statuses = array('One status', 'two status');

  //empty $tweet variable for now
  $tweet = '';

  foreach($statuses as $gotTweet) {
    //here we are appending each tweet to the tweet variable
    $tweet .= '<span class="your-style-etc">'.$gotTweet.'</span>';
  }

  //open current file if it exists if not it will be created and write tweets with layout and styles to text file
  //check the one in tweets folder and you will see it holds syntax fine to simply include.
  $tweetFile = fopen('./tweets/'.$username.'.txt', 'w');
  fwrite($tweetFile, $tweet);
  fclose($tweetFile);

  //now that we have written we now include the text file
  include('./tweets/'.$username.'.txt');

} else {

  //return file in the name of the username because they are less than 3 minutes old
  include('./tweets/'.$username.'.txt');

}
?>
