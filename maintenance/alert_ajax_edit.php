<?php

require_once 'include/session.php';
include "configure/connectivity.php";
if ($_POST['action'] == 'remove') {
    foreach ($_POST['id'] as $key => $value) {
        $id = explode('_', $value);
        $sql = "UPDATE alert SET  status='2' WHERE id=" . $id[0];
        mysql_query($sql) || die(mysql_error());
    }
    echo '[]';
} else if ($_POST['action'] == 'edit') {
    echo '{"row":{';
//print_r($_POST);
    $id = explode('_', $_POST['id']);
    echo '"DT_RowId":"' . $id[0] . '",';
    foreach ($_POST['data'] as $key => $value) {
        if ($key == 'alert_name') {
            $alert_name = $value;
            echo '"' . $key . '":"' . $value . '"';
        } else {
            echo '"' . $key . '":"' . $value . '",';
        }
    }
    $sql = "UPDATE alert SET  alert_name='$alert_name' WHERE id=" . $id[0];
    mysql_query($sql) || die(mysql_error());
    echo '}}';
}