<?php
ini_set('display_errors', 'off');
require_once 'include/session.php';
?>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Adversary List</title>
	<link rel="stylesheet" href="css/custom.css" />
	<link rel="stylesheet" href="css/menu.css" />
        
	<?php
	include "class.docket.php";
	$obj = new docket();
	?>
    </head>

    <body> <?php include_once 'include/menu.php'; ?>
	<div class="content1">

	    <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
            <table width="90%" id="datatabe"  cellpadding="0" cellspacing="0" border="0" >
		<thead>
		<tr>
		    <td><b>SNo</b></td>
                    <td><b>Name</b></td>
		    <td><b>Address</b></td>
		    <td></td>
		</tr>
                </thead>
                <tbody>
		    <?php $obj->adversary_list('for_back'); ?>
                </tbody>
	    </table>

	</div>
    </body>
</html>
<style>
    .dataTables_length {
    float: none;
}
</style>