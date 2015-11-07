<?php
include "configure/connectivity.php";
$applicant_ref_id = $_GET['applicant_ref_id'];
$sql = "select id,name,name_code from user where name_code='$applicant_ref_id'";
$res = mysql_query($sql);
while ($row = mysql_fetch_array($res)) {
  $applicantname = $row['id'];
  $NameCode = $row['name_code'];
  if ($applicant_ref_id == $NameCode) {
        echo $applicantname = $row['id'];
    }
}
