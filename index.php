<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">Tweet-check</span>
        <div class="mdl-layout-spacer"></div>
        </div>
    </header>
     <!-- welcome page -->
    <main class="mdl-layout__content">
        <div class="page-content" align="center">
            <div class="demo-card-wide mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Welcome</h2>
            </div>
            <div class="mdl-card__supporting-text">
                search for a username to see his/her last 500 tweets!
                <br> you want to try?
            </div>
            <div class="mdl-card__actions mdl-card--border">
            <form action="check.php" method="get">
                <input class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" type="submit" value="yes">
            </form >
            </div>
            <div class="mdl-card__menu">
                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                <i class="material-icons">share</i>
                </button>
            </div>
            </div>
        </div>
    </main>
    </div>
</body>