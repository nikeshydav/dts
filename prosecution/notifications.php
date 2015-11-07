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
        <style type="text/css" title="currentStyle">
            @import "media/css/demo_page.css";
            @import "media/css/demo_table.css";
        </style>
        <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" language="javascript" src="http://cdn.datatables.net/1.10.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#datatable').dataTable();
            });
        </script>
        <?php
        include "configure/connectivity.php";
        include "configure/class.notifications.php";
        $obj = new notifications();
        ?>
    </head>
    <body> <?php include_once 'include/menu.php'; ?>
        <div class="content1">
            <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
            <table id="datatable" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <td><b>S.no</b></td>
                    <td><b>Notification</b></td>
                    <td></td>                   
                </tr>                
                </thead>
                 <?php
                    $particular_date = $_GET['particular_date'];
                    if ($particular_date) {
                        $obj->notifications_list_for_toe($particular_date);
                    } else {
                        $obj->notifications_list();
                    }
                    ?>
            </table>
        </div>
    </body>
</html>
