<?php
include "configure/connectivity.php";
$lawfirmcode = $_GET['lawfirm_code'];
$sql = "select lawfirm_code from user where lawfirm_code='$lawfirmcode'";
$res = mysql_query($sql);
while ($row = mysql_fetch_array($res)) {
    $clientcode = $row['lawfirm_code'];
    if ($lawfirmcode == $clientcode) {
        echo "This client code already exist";
    }
}
