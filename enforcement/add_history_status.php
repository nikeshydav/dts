<!DOCTYPE HTML>
<?php
ini_set('display_errors','off');

require_once 'include/session.php'; 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add History Status</title>
 <link rel="stylesheet" href="css/jquery-ui.css" />
<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/menu.css">
    
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery-ui.js"></script>
    
<?php include "class.docket.php";
$obj=new docket();
if($_POST['add_history_status'])
{
	$obj->docket();
	$obj->insert_history_status();
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
Add History Status :
</td>
<td>
<input type="text" name="add_history_status" id="add_history_status">
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="submit_history_status" value="submit">
</td>
</tr>
</table>
</form>
<?php echo "<div style='Color:#FF0000; margin-top:15px;font-weight:bold; text-align: center; '>".$_GET['created']."</div>";?>
</body>
</html>