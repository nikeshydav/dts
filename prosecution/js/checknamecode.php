<?php
include "configure/connectivity.php";
ini_set('display_errors', 'off');
$namecode = $_GET['name_code'];
$sql = "select name_code from user where name_code='$namecode'";
$res = mysql_query($sql);
while ($row = mysql_fetch_array($res)) {
 echo   $code = $row['name_code'];
    if ($namecode == $code) {
        echo "This applicant code already exist";
    }
}
/*$lawfirmcode = $_GET['lawfirm_code'];
$sql = "select lawfirm_code from client where lawfirm_code='$lawfirmcode'";
$res = mysql_query($sql);
while ($row = mysql_fetch_array($res)) {
    $clientcode = $row['lawfirm_code'];
    if ($lawfirmcode == $clientcode) {
        echo "This client code already exist";
    }
}
$applicant_id = $_GET['applicant_id'];
$sql = "select name_code from user where id='$applicant_id'";
$res = mysql_query($sql);
while ($row = mysql_fetch_array($res)) {
  echo $applicantcode = $row['name_code'];
}*/
//$client_id = $_GET['client_id'];
//$sql = "select name_code from user where id='$client_id'";
//$res = mysql_query($sql);
//while ($row = mysql_fetch_array($res)) {
//  echo  $clientcode = $row['name_code'];
//}
