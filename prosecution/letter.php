<?php
 ini_set('display_errors','off'); 
require_once 'include/session.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>mail</title>
	<link rel="stylesheet" href="css/custom.css" />
			<link rel="stylesheet" href="css/menu.css" />
		<script src="js/jquery-1.8.3.min.js"></script>
		<script src="js/custom.js"></script>


<?php
include "class.docket.php";
$obj=new docket();

?>
<?php
if(isset($_POST['subject']))
{
	$obj->docket();
$obj->insertletter();
}
?>
</head>
<body>
<table align="center">
<?php include_once 'include/menu.php';?>
 <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
<form action="" method="post">
<tr>
<td>
Subject:
</td>
<td>
<input type="text" name="subject" size="80px">
</td>
</tr>
<tr>
<td valign="top">
Letter Body:
</td>
<td>
<textarea name="letter" rows="30" cols="60">
</textarea>
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" value="submit">
</td>
</tr>
</form>
</table>
<?php echo "<div style='Color:#FF0000; margin-top:15px;font-weight:bold; '>" . $_GET['created'] . "</div>"; ?>
</body>
</html>