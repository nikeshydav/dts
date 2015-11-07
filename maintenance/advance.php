<?php
ini_set('display_errors', 'off');
require_once 'include/session.php'; 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Advance Search</title>
	<link rel="stylesheet" href="css/custom.css" />
	<link rel="stylesheet" href="css/menu.css" />
<?php include "class.docket.php";
$obj=new docket();
?>
</head>
<body> <?php include_once 'include/menu.php';?>
	<div class="content1">
		<div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
<table border="1px" width="100%">
<tr>
<td><b>S.no</b></td>
<td><b>Mark</b></td>
<td><b>Registration No.<br>(Filing Date)</b><form action="" name="form_trade_no" method="post">
<select name="trade_no_name" onChange="document.form_trade_no.submit()"><option >--Select--</option>
<?php $obj->trademark_no_name(); ?>
</select>
</form>
</td>
<!--<td><b>Application No<br>(Filling Date)</b></td>-->
<td><b>Client Entity</b></td>
<td><b>Intermediary Entity</b></td>
<td ><b>Class(es)</b>
<form  action="" name="form_clas" method="post">
<select name="class_name" onChange="document.form_clas.submit()">
<?php 
for($i=0;$i<=46;$i++)
{
	echo "<option >$i</option>";
}
?>
</select>
</form>
</td>
<td><b>Forum</b></td>
<td><b>Status Maintenance</b><form action="" name="form_status" method="post">
<select name="status_name" onChange="document.form_status.submit()"><option >--Select--</option>
<?php $obj->parent_status(); ?>
</select>
</form>
</td>
<td><b>Last Updated</b></td>
<?php 
$obj->applications_list1(); 
?>
</tr>
</table>
</div>
</body>
</html>