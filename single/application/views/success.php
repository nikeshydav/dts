<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" class="login">
    <head>
        <meta charset="utf-8">
        <title>Welcome to DTS</title>
        <link href="<?php echo base_url(); ?>assets/css/app.css" rel="stylesheet" />
        <style type="text/css" media="screen">
            @import "<?php echo base_url(); ?>assets/js/datatables/css/jquery.dataTables.css";
        </style>
        <link href="<?php echo base_url(); ?>assets/js/jqueryui/css/base/jquery-ui.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" />
    </head>
    <body >
        <div class="container" >

        <?php include_once 'header.php'; ?>            
            <p class="bg-success">Data Has been update successfully. </p>
        <?php include_once 'footer.php'; ?>
        </div>
        <script>var base_url = '<?php echo base_url(); ?>index.php';</script>
        <script src="<?php echo base_url(); ?>assets/js/app.js" ></script>
        <script src="<?php echo base_url(); ?>assets/js/js.js" ></script>
    </body>
</html>