<?php

include "configure/connectivity.php";
$email_id = $_GET['email_id'];
$sql = "select auto_id,email from user_entity_email where user_id='$email_id'";
$res = mysql_query($sql);
$emls = 'ok';
while ($row = mysql_fetch_array($res)) {
    $auto_id = $row['auto_id'];
    $emailId = $row['email'];
    if($auto_id != ''){
    $emls .= '<option value="'.$auto_id.'">' . htmlspecialchars($emailId) . '</option>';
    }
}
echo $emls;