<?php
//ini_set("display_errors", "off");
header("Content-Type: application/vnd.ms-word");
header("Content-disposition: inline; filename=search-".$_GET['application']."-".date('dmY-H:i:s') .".doc");
header("Pragma: no-cache");
header("Expires: 0");
echo $app=$_GET['application'];
include "class.docket.php";


$i=0;

print "<table border=\"1\"><tr><td><b>S.NO.</b></td><td><b>Application_NO</b></td><td><b>Mark</b></td><td><b>Classes</b></td><td><b>Filling_Date</b></td><td><b>Applicant</b></td><td><b>Client</b></td><td><b>Priority_Date</b></td><td><b>Jurisdiction</b></td><td><b>Status</b></td><td><b>History</b></td><td><b>Pending_Record</b></td></tr>";

$obj=new docket();
echo $obj->search("$app");
