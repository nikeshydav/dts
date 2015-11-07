<?php
require_once 'include/session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Admin Panel</title>
<link rel="stylesheet" href="css/custom.css" />
			<link rel="stylesheet" href="css/menu.css" />
</head>
<body>
 <?php include_once 'include/menu.php';?>
		<div class="content">
			
			<div class="clear">
				<h1 align="center" ">Welcome <?php  echo $_SESSION['username']?>!
				</h1>
				<div id="matter" align="center"><img src="images/welcome.jpg"></div>
			</div>
			</div>
</body></html>