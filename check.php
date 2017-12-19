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
    <main class="mdl-layout__content">
        <div class="page-content" align="center">
        <!-- form for the username -->
            <div class="demo-card-wide mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Welcome</h2>
            </div>
            <div class="mdl-card__supporting-text">
                Please enter a @username
            </div>
            <div class="mdl-card__actions mdl-card--border">
            <form action="getresult.php" method="post" >
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="user_id" name="user_id">
                    <label class="mdl-textfield__label" align="center" for="user_id">username</label>
                </div>
            <input class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" type="submit">
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