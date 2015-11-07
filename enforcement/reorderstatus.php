<?php
include "configure/connectivity.php";
$status_id = $_POST['id'];
$order_id = $_POST['o'];
mysql_query("UPDATE status SET status_order='$order_id' WHERE id='$status_id'");