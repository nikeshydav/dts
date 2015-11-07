<?php
include "configure/connectivity.php";
$applicant_id = $_GET['applicant_id'];
$sql = "select name_code from user where id='$applicant_id'";
$res = mysql_query($sql);
while ($row = mysql_fetch_array($res)) {
  echo  $applicantcode = $row['name_code'];
}
