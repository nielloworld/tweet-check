<html>
<body>
Welcome
<?php echo $_POST["user_id"]; 
require(__DIR__ . '/vendor/autoload.php');
use Abraham\TwitterOAuth\TwitterOAuth;

$config = require(__DIR__ . '/config.php');

$connection = new TwitterOAuth($config['consumer_key'], $config['consumer_secret'], $config['access_token'], $config['access_token_secret']);

// Logic
$tweets = $connection->get("statuses/user_timeline", ["include_entities" => "true", "include_rts" => "0", "screen_name" => $_POST["user_id"], "count" => "200"]);
$totalTweets[] = $tweets;
$page = 0;
for ($count = 200; $count < 500; $count += 200) { 
    $max = count($totalTweets[$page]) - 1;
    $tweets = $connection->get('statuses/user_timeline', ['count' => 200, 'max_id' => $totalTweets[$page][$max]->id_str, 'screen_name' =>  $_POST["user_id"], 'include_rts' => false]);
    $totalTweets[] = $tweets;
    $page += 1;
}

foreach ($totalTweets as $page) {
    foreach ($page as $tweet) {
        $datetime = explode(" ", $tweet->created_at);
        $time = explode(":", $datetime["3"]);
        $hour = $time[0];
        var_dump($hour);
    }
}

?>
<br>
</body>
</html>