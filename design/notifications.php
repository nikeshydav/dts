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
            @import "/dts/prosecution/media/css/demo_page.css";
            @import "/dts/prosecution/media/css/demo_table.css";
        </style>

        <!--        js and css for popup start here -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="http://www.formmail-maker.com/var/demo/jquery-popup-form/colorbox.css" />
        <script src="http://www.formmail-maker.com/var/demo/jquery-popup-form/jquery.colorbox-min.js"></script>
        <script type="text/javascript" language="javascript" src="http://cdn.datatables.net/1.10.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $(".iframe").colorbox({iframe: true, fastIframe: false, width: "500px", height: "480px", transition: "fade", scrolling: false});
                $('#datatable').dataTable();
            });
        </script>
        <style>
            #cboxOverlay{background:#666666;}
            .iframe{margin-left: 5px;}
        </style>
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