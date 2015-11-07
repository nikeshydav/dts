<?php

require_once 'include/session.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Letter List</title>
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
<table border="1px" width="100%">
<?php include_once 'include/menu.php';?>
<div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
<!--<form action="" method="post">-->
<tr>
<td><b>S.no</b></td>
<td><b>Name</b></td>
<td><b>Edit</b></td>
<!--<td>Mail Body</td>-->
<?php
$obj->docket();
$obj->gridletter();
?>
</tr>
<!--</form>-->
</table>
</body>
</html>