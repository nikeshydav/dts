<?php
require_once 'include/session.php';
ini_set('display_errors', 'off');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Notification List</title>
        <link rel="stylesheet" href="css/custom.css" />
        <link rel="stylesheet" href="css/menu.css" />
        <?php
        include "class.docket.php";
        $obj = new docket();
        ?>
    </head>
    <body> <?php include_once 'include/menu.php'; ?>
        <div class="content1">
            <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
            <table  width="100%">
                <tr>
                    <td><b>S.no</b></td>
                    <td><b>Notification</b></td>
                    <?php
                    $particular_date = $_GET['particular_date'];
                    if ($particular_date) {
                        $obj->notifications_list_for_toe($particular_date);
                    } else {
                        $obj->notifications_list();
                    }
                    ?>
                </tr>
            </table>
        </div>
    </body>
</html>