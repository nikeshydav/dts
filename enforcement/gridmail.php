<?php require_once 'include/session.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Email List</title>
<link rel="stylesheet" href="css/custom.css" />
			<link rel="stylesheet" href="css/menu.css" />
		<script src="js/jquery-1.8.3.min.js"></script>
		<script src="js/custom.js"></script>

<?php
include "class.docket.php";
$obj=new docket();
?>
</head>
<body>	
<?php include_once 'include/menu.php';?>
<div class="content1">
<div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
<table  width="100%">
<!--<form action="" method="post">-->
<tr>
<td><b>S.no</b></td>
<td><b>Name</b></td>
<td><b>Edit</b></td>
<?php
$obj->docket();
$obj->grid();
?>
</tr>
<!--</form>-->
</table>
</div>
</body>
</html>