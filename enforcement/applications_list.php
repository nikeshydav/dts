<?php
ini_set('display_errors', 'off');
require_once 'include/session.php';
?>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Applications List</title>
	<link rel="stylesheet" href="css/custom.css" />
	<link rel="stylesheet" href="css/menu.css" />
        <style type="text/css" title="currentStyle">
            @import "media/css/demo_page.css";
            @import "media/css/demo_table.css";
        </style>        
        <script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#datatabe').dataTable();
            });
        </script>
	<?php
	include "class.docket.php";
	$obj = new docket();
	?>
	<script language="javascript" type="text/javascript">
	<!--
	    function popitup(url) {
		newwindow = window.open(url, 'name', 'height=500,width=550');
		if (window.focus) {
		    newwindow.focus()
		}
		return false;
	    }

	// -->
	</script>
    </head>

    <body> <?php include_once 'include/menu.php'; ?>
	<div class="content1">

	    <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
            <table width="90%" id="datatabe"  cellpadding="0" cellspacing="0" border="0" >
		<thead>
		<tr>
		    <td><b>#</b></td>
                    <td><b>ALG File</b></td>
                    <td><b>ALG Ref</b></td>
		    <td><b>Adversary Mark</b></td>
                    <td><b>File Type</b></td>
                    <td><b>Adversary Entity</b></td>
		    <td><div class="date_width"><b>Date of file opening</b></div></td>
                    <td><b>Client Entity</b></td>
		    <td><b>Intermediary Entity</b></td>
                    <td><b>Forum</b></td>
                    <td><b>Client Marks</b></td>
                    <td><b>Adversary Domain Name</b></td>
		    <td><b>Status Enforcement</b></td>
                    <td><b>Mail To</b></td>
                    <td><b>Mail Forward</b></td>
                    <td><b>Mail Instructed</b></td>
		    
		    <td></td>
		</tr>
                </thead>
                <tbody>
		    <?php $obj->applications_list(); ?>
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
