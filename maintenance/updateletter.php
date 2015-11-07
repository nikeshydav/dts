<?php

require_once 'include/session.php';
?>
<!DOCTYPE HTML>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Update Letter</title>
<link rel="stylesheet" href="css/custom.css" />
			<link rel="stylesheet" href="css/menu.css" />
		<script src="js/jquery-1.8.3.min.js"></script>
		<script src="js/custom.js"></script>

<?php
include "class.docket.php";
$obj=new docket();
?>
</head>
<?php
if(isset($_REQUEST['action']) && $_REQUEST['action']=='edit')
{
	$id=$_REQUEST['id'];
	$obj->docket();
	$obj->showletter($id);
}
if(isset($_POST['act'])=='update')
{
	$obj->docket();
	$obj->updateletter($id);
}
?>
<body>

<table align="left" style="float: left;
    margin-left: 150px; margin-right: 100px;">
<?php include_once 'include/menu.php';?>

<form action="" method="post">
<input type="hidden" name="act" value="update">
<input type="hidden" name="id" value="<?php echo $obj->id;   ?>"/>
<tr>
<td>
Subject:
</td>
<td>
<input type="text" name="subject" size="80px" value="<?php echo $obj->subject; ?>"/>
</td>
</tr>
<tr>
<td valign="top">
Letter Body:
</td>
<td>
<textarea name="letterbody"  rows="30" cols="60">
<?php 
echo $obj->letterbody ;
?>
</textarea>
</td>
</tr>
<tr>
<td colspan="2" align="center">
<?php if($_SESSION['role']!='associate') { ?>
<input type="submit" value="update">
<?php  } ?>
</td>

</tr>

</form>
</table>
<table width="200" border="1">
<tr>
    <td><b>[TAGS]</b></td>
    <td><b>TYPES</b></td>
     <td><b>EXAMPLE</b></td>

  </tr>
  
  <tr>
    <td>[application]</td>
    <td>application type</td>
     <td>TM-52</td>

  </tr>
  <tr>
    <td>[appno]</td>
    <td>application number</td>
     <td>1738588</td>

  </tr>
  <tr>
    <td>[class]</td>
    <td>class</td>
     <td>6, 14 & 20</td>

  </tr>
  <tr>
    <td>[client]</td>
    <td>client name </td>
     <td>Skadden</td>

  </tr>
  <tr>
    <td>[applicant]</td>
    <td>applicant name </td>
     <td>The Saul ZaentzCompany</td>

  </tr>
  <tr>
    <td>[refno]</td>
    <td>Client Ref no </td>
     <td>325910/76</td>

  </tr>
  <tr>
    <td>[address]</td>
    <td>city </td>
     <td>New Delhi</td>

  </tr>
  <tr>
    <td>[date]</td>
    <td>M/D/Y </td>
     <td>August 3, 2012</td>

  </tr>
  <tr>
    <td>[filling_date]</td>
    <td>M/D/Y </td>
     <td>filed on April 26, 2012</td>

  </tr>
  <tr>
    <td>[priority_date]</td>
    <td>D/M/Y </td>
     <td>Dated this 28th day of August, 2012</td>

  </tr>
</table>
</body>
</html>