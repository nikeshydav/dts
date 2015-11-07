<?php
include "configure/connectivity.php";
$email_code = $_GET['email_code'];
$sql = "select id from user where name_code='$email_code'";
$res = mysql_query($sql);
while ($row = mysql_fetch_array($res)) {
  $email_code_id = $row['id'];
}
$sql = "select auto_id,email from user_entity_email where user_id='$email_code_id'";
$res = mysql_query($sql);
$emls = 'ok';
while ($row = mysql_fetch_array($res)) {
    $auto_id = $row['auto_id'];
    $emailId = $row['email'];
    $emls .= '<option value="'.$auto_id.'">' . htmlspecialchars($emailId) . '</option>';
}
echo $emls;