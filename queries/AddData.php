<?php
require_once 'db.php';
$sub = addslashes( $_POST['subject']);
$receipt_date = $_POST['receipt_date'];
$deletion_date = $_POST['deletion_date'];
$name = addslashes($_POST['name']);
$dts = $_POST['dts'];
$sql = "INSERT INTO `query` (`subject`, `receipt_date`, `deletion_date`, `name`, `dts`) VALUES ( '$sub', '$receipt_date', '$deletion_date', '$name','$dts');";
mysql_query($sql) || die(mysql_error());