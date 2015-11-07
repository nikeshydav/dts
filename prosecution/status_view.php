<?php
require_once 'include/session.php';

function status_list() {

    $sql = "SELECT s.*, ps.status_name as parent_name, ps.id as parent_id  FROM `status` s LEFT JOIN  `status` ps on ps.id=s.parent_id where s.id!=1 order by s.status_order";
    $res = mysql_query($sql);
    $i = 0;
    while ($get = mysql_fetch_array($res)) {
        $i++;
        $id = $get['id'];
        $status = $get['status_name'];
        $parent_status = $get['parent_name'];
        $radio_option = ($get['radio'] == 1) ? 'Yes' : 'No';
        $time_to_execute = $get['time_to_execute'];
        $sid = mt_rand(1, 1000000);

        echo '<li rel="' . $id . '" id="order' . $id . '"><dl><dt>' . $i . '</dt><dt>' . $status . '</dt><dt>' . $parent_status . '</dt><dt>' . $radio_option . '</dt><dt>' . $time_to_execute . '</dt><dt><a href="update_status.php?action=edit&id=' . $id . '&?sid=' . $sid . '"><img class="icon" src="images/edit.png" alt="Edit" title="Edit" /></a>';
        if ($_SESSION['role'] != 'associate') {
            echo '<a  onclick=" return confirm(\'do you really want to delete?\');"  href="update_status.php?action=delete&id=' . $id . '&?sid=' . $sid . '"><img class="icon" src="images/delete.png" alt="Delete" title="Delete" /></a></dt>';
        }
        echo '</dl></li>';
    }
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Status List</title>
        <link rel="stylesheet" href="css/jquery.fancybox.css" />
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <link rel="stylesheet" href="css/custom.css" />
        <link rel="stylesheet" href="css/menu.css" />
        <script type="text/javascript"  src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript"  src="js/jquery-ui.js"></script>
        <script type="text/javascript"  src="js/jquery.fancybox.js"></script>
        <script type="text/javascript"  src="js/custom.js"></script>
        <?php include "class.docket.php"; ?>
    </head>

    <body> <?php include_once 'include/menu.php'; ?>
        <div class="content1">

            <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>

            <ul class="status_list status_heading">
                <li>
                    <dl>
                        <dt>S.no</dt>
                        <dt>Status Name</dt>
                        <dt>Parent Status</dt>
                        <dt>Repeat</dt>
                        <dt>Time To Execute</dt>
                    </dl>
                </li>
            </ul>
            <ul class="status_list" id="status_list">
                <?php status_list(); ?>
            </ul>
        </div>
    </body>
</html>