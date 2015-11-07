<!DOCTYPE HTML>
<?php
ini_set('display_errors','off');
require_once 'include/session.php'; 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Search</title>
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/menu.css">
<?php include "class.docket.php";
$obj=new docket();
?>
</head>

<body> <?php include_once 'include/menu.php';?>
	<div class="content1">
    
		<div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>

<table  width="100%">

<a href="create_word.php?application=<?php echo $_POST['application'] ?>"  ><h3 style="float:right;
 margin-right:150px;"> Download Current Search</h3></a>
<tr>
<td><b>S.no</b></td>
<td><b>File Type</b></td>
<td><b>Adversary Mark</b></td>
<td><b>Adv Domain Name</b></td>
<td><b>Date of file opening</b></td>
<td><b>Client Entity </b></td>
<td><b>Intermediary Entity </b></td>
<td><b>Client Marks</b></td>
<td><b>Status Enforcement</b></td>
<td><b>History</b></td>
<td></td>
 <?php  if($_POST['application']!='')echo $obj->search(''.$_POST['application'].''); ?>
</tr>
</table>
</div>
</body>
</html>