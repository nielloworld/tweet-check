<html>
<body>
Welcomes
<?php echo $_POST["user_id"]; 
require(__DIR__ . '/vendor/autoload.php');
use Abraham\TwitterOAuth\TwitterOAuth;

$config = require(__DIR__ . '/config.php');

$connection = new TwitterOAuth($config['consumer_key'], $config['consumer_secret'], $config['access_token'], $config['access_token_secret']);
//var_dump($connection);
//$content = $connection->get("account/verify_credentials");
//var_dump($content);
$statuses = $connection->get("statuses/user_timeline", ["include_entities" => "true", "include_rts" => "1", "user_id" => $_POST["user_id"], "count" => "200"]);
//$statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);
////$url= "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=twitterapi&count=2";
 //$ch = curl_init();
 //curl_setopt($ch, CURLOPT_URL, $url);
 // Set so curl_exec returns the result instead of outputting it.
 //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);x
 // Get the response and close the channel.
 //$response = curl_exec($ch);
 //curl_close($ch);

////$json = file_get_contents('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=twitterapi&count=2'); // this WILL do an http request for you
//$data = json_decode($json);
//$a_statuses = json_decode($statuses, true); 
$format = 'Y-m-d';

foreach ($statuses as $status){
    $a = (array) $status; 
    $datetime = explode(" ", $a["created_at"]);
    $time = explode(":", $datetime["3"]);
    $hour = $time[0];
    var_dump($hour);
}

?>
<br>
</body>
</html>