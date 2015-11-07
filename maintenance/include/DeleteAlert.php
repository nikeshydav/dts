<?php

require_once '../configure/connectivity.php';
foreach ($_REQUEST as $key => $value) {
    //mysql_query("DELETE FROM `alert` WHERE id= " . $value) || die(mysql_error());
    $sql = "UPDATE alert SET  status='2', del='".date('Y-m-d')."' WHERE id=" . $value;
    mysql_query($sql) || die(mysql_error()); 
}
echo 'ok';
