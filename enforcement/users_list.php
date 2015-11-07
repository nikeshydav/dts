<?php
require_once 'include/session.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Users List</title>
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
    </head>
    <body> <?php include_once 'include/menu.php'; ?>
        <div class="content1">
            <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
            <table id="datatabe"  cellpadding="0" cellspacing="0" border="0" class="display" >
                <thead>
                    <tr>
                        <td><b>S.no</b></td>
                        <td><b>Applicant/Client NAME</b></td>
                        <td><b>Applicant/Client CODE</b></td>
                        <td><b>Action</b></td>
                    </tr>
                </thead>
                <tbody>                   
                    <?php $obj->users_list(); ?>
                </tbody>
            </table>
        </div>
    </body>
</html>