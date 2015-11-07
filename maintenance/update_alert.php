<?php
require_once 'include/session.php';
include "configure/connectivity.php";
$act = $_GET['act'];
$alert_id = $_GET['aid'];
$app_id = $_GET['id'];
if($act=='edit'){
    $sql = "UPDATE `alert` SET `del` =  '".date('Y-m-d')."', `status` = '1' WHERE `id` = $alert_id;";
    mysql_query($sql);
}elseif ($act=='del') {
    $sql = "UPDATE `alert` SET `del` =  '".date('Y-m-d')."', `status`= '2' WHERE `id` = $alert_id;";
    mysql_query($sql);
}
header('Location: update_application.php?action=edit&id='.$app_id);