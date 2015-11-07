<?php
include "configure/connectivity.php";
$adv_entity = $_GET['adv_entity_id'];
$sql = "select name from adversary_entity where id='$adv_entity'";
$res = mysql_query($sql);
while ($row = mysql_fetch_array($res)) {
   echo $entityname = $row['name'];
}
