<?php
ini_set("display_errors", "off");

include "class.docket.php";
include "include/class.selectiveSearch.php";
$obj = new docket();
$sective = new selectivesearch();

header("Pragma: no-cache");
header("Expires: 0");
header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=Status_Chart.xls");
$sective->select_search(TRUE);

/*
 * Clear Session
 */
?>