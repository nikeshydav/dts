<?php
ini_set('display_errors', 'off');
require_once 'include/session.php';
?>
<html>
    <head>
        <title>ADD Adversary Client</title>
        <link rel="stylesheet" href="css/custom.css" />
        <link rel="stylesheet" href="css/menu.css" />
        <script src="js/jquery-1.8.3.min.js"></script>
        <script src="js/custom.js"></script>
    </head>
    <body>
        <?php include_once 'include/menu.php'; ?>
        <div class="content">

            <div class="clear">
                <h3>Welcome <?php echo $_SESSION['username'] ?>!
                </h3>
            </div>
            <?php
            include_once 'adversary_iframe.php';
            ?>
        </div>

    </body>
</html>