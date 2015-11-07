<?php
//ini_set("display_errors", "off");
header("Content-Type: application/vnd.ms-word");
header("Content-disposition: inline; filename=search-".$_GET['application']."-".date('dmY-H:i:s') .".doc");
header("Pragma: no-cache");
header("Expires: 0");
echo $app=$_GET['application'];
include "class.docket.php";


$i=0;

print "<table border=\"1\"><tr><td><b>S.NO.</b></td><td><b>File Type</b></td><td><b>Mark</b></td><td><b>Adversary Domain Name</b></td><td><b>Date of file opening</b></td><td><b>Client Entity</b></td><td><b>Intermediary Entity</b></td><td><b>Client Marks</b></td><td><b>Status</b></td><td><b>History</b></td></tr>";

$obj=new docket();
echo $obj->search("$app");
