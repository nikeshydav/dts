<?php
ini_set('display_errors', 'on');
ini_set('max_execution_time', 0);
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
        <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" language="javascript" src="http://cdn.datatables.net/1.10.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $(document).ready(function() { $('#datatable').dataTable(); });
                function popitup(url) {
                    newwindow = window.open(url, 'name', 'height=500,width=550');
                    if (window.focus) {
                        newwindow.focus()
                    }
                    return false;
                }


            });
        </script>
        <?php
	include "class.docket.php";
	$obj = new docket();
	?>
    </head>

    <body> <?php include_once 'include/menu.php'; ?>
	<div class="content1">

	    <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
            <table id="datatable" class="display" cellspacing="0" width="100%">
		<thead>
		<tr>
		    <td><b>#</b></td>
                    <td><b>ALG File</b></td>
                    <td><b>ALG Ref</b></td>
		    <td><b>Mark</b></td>
                    <td><b>File Type</b></td>
		    <td><b>Registration No.</b></td>
		    <td><div class="date_width"><b>Filing Date</b></div></td>
		    <td><b>Class(es)</b></td>
		    <td><div class="date_width"><b>User</b></div></td>
                    <td><b>Client Entity</b></td>
		    <td><b>Intermediary Entity</b></td>
		    <td><b>Forum</b></td>
		    <td><b>Goods/Services</b></td>
		    <td><b>Status Maintenance</b></td>
                    <td><b>Status Recordals</b></td>
                    <td><b>Client Ref</b></td>
                    <td><b>Mail To</b></td>
                    <td><b>Mail Forward</b></td>
                    <td><b>Mail Instructed</b></td>		    
		    <td>-</td>
		</tr>
                </thead>
                <tbody>
		    <?php $obj->applications_list(); ?>
                </tbody>
	    </table>
	</div>
        <style>
    .dataTables_length {
    float: none;
}
</style>
    </body>
</html>
