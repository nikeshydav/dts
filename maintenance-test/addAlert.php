<?php
require_once 'include/session.php';
ini_set('display_errors', 'off');
include "configure/connectivity.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Alert List</title>
        <link rel="stylesheet" href="css/menu.css" />
        <link rel="stylesheet" href="css/custom.css" />
    </head>
    <body>
        <?php include_once 'include/menu.php'; ?>
        <div class="content1">
            <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <?php
                if ($_POST) {
                    $alert = $_POST['alert'];
                    $alert_name = $_POST['alert_name'];
                    $date = $_POST['date'];
                    $ref = $_POST['ref'];
                    $file = $_POST['file'];
                    $sql = "INSERT INTO `alert` (fid,`alert`,`alert_name`,`toa`,`dummy_ref`,`dummy_file`) VALUES ('0', '$alert', '$alert_name', '$date','$ref','$file');";
                    mysql_query($sql) || die('Something is wrong!');
                    echo '<div class="welcome">Alert has been added!</div>';
                }
                ?>
                <table  width="50%" style="width: 50%;margin: 0 auto" >
                    <tr><td colspan="2"><h2>Add Alert:</h2></td></tr>
                    <tr><td>Alert:</td><td><input name="alert"></td></tr>
                    <tr><td>ALG ref:</td><td><input type="text" name="ref"></td></tr>
                    <tr><td>ALG File:</td><td><input type="text" name="file"></td></tr>
                    <tr><td>Name:</td><td><input name="alert_name"></td></tr>
                    <tr><td></td><td><input type="submit" /></td></tr>
                </table>
                <input type="hidden" name="date" value="<?php echo $_GET['particular_date']?>">
            </form>
        </div>
    </body>
</html>