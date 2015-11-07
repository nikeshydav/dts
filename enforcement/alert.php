<?php
require_once 'include/session.php';
ini_set('display_errors', 'off');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Alert List</title>
        <link rel="stylesheet" href="css/custom.css" />
        <link rel="stylesheet" href="css/menu.css" />
        <?php
        include "configure/connectivity.php";
        ?>
    </head>
    <body> <?php include_once 'include/menu.php'; ?>
        <div class="content1">
            <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
            <table  width="100%">
                <?php
                if (isset($_GET['particular_date'])) {
                    ?>
                    <tr>
                        <td colspan="4"><b>Alerts For : <?php echo $_GET['particular_date'] ?></b></td>
                    </tr>
                    <?php }
                ?>
                <tr>
                    <td><b>S.no</b></td>
                    <td><b>Alert</b></td>
                    <td><b>ALG File Type.</b></td>
                    <td><b>ALG Ref.</b></td>
                    <td><b>Date</b></td>
                    <td><b>Action</b></td>
                </tr>
                <?php
                $i = 1;
                $date = (isset($_GET['particular_date'])) ? 'a.toa="'.$_GET['particular_date'].'"' : 'a.toa<="'.date('Y-m-d').'"';

                $s = "select a.id, a.fid, a.alert, a.toa,ap.file_type, ap.mark, ft.all_alg_file_data from alert a, application ap, alg_file_type ft where " . $date . " and a.toa!='0000-00-00' and a.status=0 and a.del='0000-00-00' and ap.id=a.fid and ap.id=ft.alg_file_app_id";
                $res = mysql_query($s);
                while ($row = mysql_fetch_array($res)) {
                    echo '<tr><td><b>' . $i++ . '</b></td><td>' . $row['alert'] . '</td><td>' . $row['all_alg_file_data'] . '</td><td>' . $row['mark'] . '</td><td>' . $row['toa'] . '</td>';
                    echo '<td><a href="update_alert.php?act=edit&id=' . $row['fid'] . '&aid=' . $row['id'] . '"><img class="icon" src="images/done.png" alt="Done" title="Done"></a>';
                    echo '<a href="update_alert.php?act=del&id=' . $row['fid'] . '&aid=' . $row['id'] . '"><img class="icon" src="images/delete.png" alt="Del" title="Delete"></a></td></tr>';
                }
                ?>
            </table>
        </div>
    </body>
</html>