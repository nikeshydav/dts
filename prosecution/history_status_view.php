<?php

require_once 'include/session.php'; 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>History Status List</title>
	<link rel="stylesheet" href="css/custom.css" />
	<link rel="stylesheet" href="css/menu.css" />
<?php include "class.docket.php";
$obj=new docket();
?>
</head>

<body> <?php include_once 'include/menu.php';?>
	<div class="content1">
		
		<div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>

<table  width="100%">
<!--<form action="" method="post">-->
<tr>
<td><b>S.no</b></td>
<td><b>History Status Name</b></td>
 <?php $obj->history_status_list(); ?>
</tr>
<!--</form>-->
</table>
</div>
</body>
</html>