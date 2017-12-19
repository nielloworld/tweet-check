
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
    <!-- PHP Logic-->
    <?php 
    if ($_POST["user_id"] == null){
        header("Location: check.php");
    }
    date_default_timezone_set('Asia/Manila');
        require(__DIR__ . '/vendor/autoload.php');
        use Abraham\TwitterOAuth\TwitterOAuth;

        $config = require(__DIR__ . '/config.php');

        $connection = new TwitterOAuth($config['consumer_key'], $config['consumer_secret'], $config['access_token'], $config['access_token_secret']);
        $exist = (array) $connection->post('users/lookup', ["screen_name" => $_POST["user_id"]]);
         
        if(array_key_exists('errors', $exist) == true){
            header("Location: check.php");
        }
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
        $sample = array();
        foreach ($totalTweets as $page) {
            foreach ($page as $tweet) {
                $hour = date('H', strtotime($tweet->created_at));
                array_push($sample, array($tweet->text, $hour));               
            }        
        }
        $sample = json_encode($sample);
    ?>
    <!-- art using JS -->
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = new google.visualization.DataTable();
                data.addColumn('string', 'tweet');
                data.addColumn('string', 'hour');
                data.addRows(<?php echo $sample ?>);
                
            var options = {
            title: 'Recent 500 tweets - with time',
            legend: { position: 'none' },
            };

            var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

    
            <!-- layout!! -->
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">Welcome <?php echo $_POST["user_id"]; ?></span>
            <div class="mdl-layout-spacer"></div>
            <a class="mdl-navigation__link" href="/">back</a>
            </div>
        </header>
       
        <main class="mdl-layout__content">
            <div class="page-content" align = "center">
                <div id="chart_div" style="width: 900px; height: 500px;"></div>
            </div>
        </main>
        </div>
    
<br>
</body>