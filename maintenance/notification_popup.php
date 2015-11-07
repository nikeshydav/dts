<?php

include "configure/connectivity.php";
$applId = $_GET['id'];
$letter_for_mail_title = $_GET['letter_for_mail'];
$sql = "select a.id,uc.* from application a, users_cli_mails uc where uc.app_id=a.id and a.id=$applId";
$res = mysql_query($sql);
$i = 0;
//$cli_mail_to = '';
//$cli_mail_forward = '';
//$cli_mail_instructed = '';
$name_mail_to = '';
$name_mail_forward = '';
$name_mail_instructed = '';
$name_mail_toNew = '';
$name_mail_forwardNew = '';
$name_mail_instructedNew = '';
while ($row = mysql_fetch_array($res)) {
    //$appId = $row['app_id'];
    $cli_mail_to = $row['cli_mail_to'];
    $exp_mail_to = explode(',', $cli_mail_to);
    $name_mail_to = '';
    foreach ($exp_mail_to as $key => $value) {
        $res1_mail_to = "select email from user_entity_email where auto_id in ('$value')";
        $res2_mail_to = mysql_query($res1_mail_to);
        while ($row3_mail_to = mysql_fetch_array($res2_mail_to)) {
            $name_mail_to .= $row3_mail_to['email'] . ', ';
        }
    }
    $cli_mail_forward = $row['cli_mail_forward'];
    $exp_mail_forward = explode(',', $cli_mail_forward);
    $name_mail_forward = '';
    foreach ($exp_mail_forward as $key => $value) {
        $res1_mail_forward = "select email from user_entity_email where auto_id in ('$value')";
        $res2_mail_forward = mysql_query($res1_mail_forward);
        while ($row3_mail_forward = mysql_fetch_array($res2_mail_forward)) {
            $name_mail_forward .= $row3_mail_forward['email'] . ', ';
        }
    }
    $cli_mail_instructed = $row['cli_mail_instructed'];
    $exp_mail_instructed = explode(',', $cli_mail_instructed);
    $name_mail_instructed = '';
    foreach ($exp_mail_instructed as $key => $value) {
        $res1_mail_instructed = "select email from user_entity_email where auto_id in ('$value')";
        $res2_mail_instructed = mysql_query($res1_mail_instructed);
        while ($row3_mail_instructed = mysql_fetch_array($res2_mail_instructed)) {
            $name_mail_instructed .= $row3_mail_instructed['email'] . ', ';
        }
    }
}
//if($cli_mail_to != '' || $cli_mail_forward != '' || $cli_mail_instructed != ''){
$name_mail_toNew = 'To: ' . htmlspecialchars($name_mail_to) . '<br><br>';
$name_mail_forwardNew = 'Forward To: ' . htmlspecialchars($name_mail_forward) . '<br><br>';
$name_mail_instructedNew = 'Instructed by: ' . htmlspecialchars($name_mail_instructed) . '<br><hr>';
//}
//echo '<p style="text-align: justify;">';
switch ($letter_for_mail_title) {
    case '*mailreseekrenewalinstr':
        echo $name_mail_toNew;
        echo $name_mail_forwardNew;
        echo $name_mail_instructedNew;
        echo $paragraph = '<p style="text-align:justify">This file came up on our docket - the subject registration is due for renewal, and the deadline to renewis ___________. <br><br>
Please let us know if you would like us to file for renewal. Thank you</p>';
        break;
    case '*mailseekrenewalwithsurchargeinstr':
        echo $name_mail_toNew;
        echo $name_mail_forwardNew;
        echo $name_mail_instructedNew;
        echo $paragraph = '<p style="text-align:justify">We note that the deadline for renewing the subject registration was __________, and renewal appears not to have been filed yet.<br><br> 
It is still possible to renew by paying a surcharge - the deadline to renew with surcharge is ____________.<br><br>
Please do not hesitate to let us know if you would like us to file for renewal. Thank you</p>';
        break;
    case '*mailchaseforaffidavit':
        echo $name_mail_toNew;
        echo $name_mail_forwardNew;
        echo $name_mail_instructedNew;
        echo $paragraph = '<p style="text-align:justify">This came up on our docket - we look forward to receiving the Affidavit of Use in original for filing at the TM Office.<br><br>
            Please do not hesitate to let us know to clarify anything.</p>';
        break;
    case '*mailchaseforpoa':
        echo $name_mail_toNew;
        echo $name_mail_forwardNew;
        echo $name_mail_instructedNew;
        echo $paragraph = '<p style="text-align:justify">We look forward to receiving the Power of Attorney (draft re-attached).</p>';
        break;
    case '*mailseekrenewalinstr':
        echo $name_mail_toNew;
        echo $name_mail_forwardNew;
        echo $name_mail_instructedNew;
        echo $paragraph = '<p style="text-align:justify">The subject registration is due for renewal. The
deadline to renew is _____________. Please let us 
have your instructions to file for renewal of the 
registration for the next 10-year term.</p>';
        break;

    default:
        $paragraph = '';
        break;
}
//echo '</p>';
?>
