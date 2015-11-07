<?php

require_once '../configure/connectivity.php';
$value = $_REQUEST['value'];
$update = "UPDATE  `alert` SET  `alert_name` ='$value' WHERE id=" . $_POST['id'];
mysql_query($update) || die(mysql_error());
echo $value;
