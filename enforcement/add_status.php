<!DOCTYPE HTML>
<?php
ini_set('display_errors','off');

require_once 'include/session.php'; 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Status</title>
 <link rel="stylesheet" href="css/jquery-ui.css" />
<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/menu.css">
    
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery-ui.js"></script>
    
<?php include "class.docket.php";
$obj=new docket();
if($_POST['add_status'])
{
	$obj->docket();
	$obj->insert_status();
}
?>
<body><?php include_once 'include/menu.php';?>
	<div class="content">
    <div class="clear">
		<div class="welcome"><h3 style="margin-left: 130px;" >Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
        </div>
</div>
<form action="" method="post" onSubmit="return validate(this)">
<table border="1px" align="center">
<tr>
<td>
Add Status :
</td>
<td>
<input type="text" name="add_status" id="add_status">
</td>
</tr>
<tr>
<td>
Parent Status :
</td>
<td>
<select name="parent_status" id="parent_status">
<option>select</option>
<?php
$obj->parent_status(); 
?>
</select>
</td>
</tr>
<tr>
<td>
Repeat :
</td>
<td>
<input type="radio" name="radio" value="1" id="radio">Yes
<input type="radio" name="radio" value="0" id="radio">No
</td>
</tr>
<tr>
<td>
Time To Execute :
</td>
<td>
<input type="text" name="time_execute" size="4"> days
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="submit_status" value="submit">
</td>
</tr>
</table>
</form>
<?php echo "<div style='Color:#FF0000; margin-top:15px;font-weight:bold; text-align: center; '>".$_GET['created']."</div>";?>
</body>
</html>