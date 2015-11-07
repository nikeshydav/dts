<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" class="login">
    <head>
        <meta charset="utf-8">
        <title>Welcome to DTS</title>
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>

        <link href="<?php echo base_url(); ?>assets/css/app.css" rel="stylesheet" />
        <style type="text/css" media="screen">
            @import "<?php echo base_url(); ?>assets/js/datatables/css/jquery.dataTables.css";
        </style>
        <link href="<?php echo base_url(); ?>assets/js/jqueryui/css/base/jquery-ui.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" />
        <style type='text/css'>
            .read-icon{display: none !important}
            .text-left input{width: 100px;border: 1px dotted #666666}
        </style>
    </head>
    <body >
        <div class="container" >
            <div class="container" >
                <?php include_once 'header.php'; ?>
                <?php echo $output; ?>
                <?php include_once 'footer.php'; ?>
            </div>
        </div>
        <?php $total_js = 0; ?>
        <?php foreach ($js_files as $file): $total_js++; ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
        <?php if ($total_js == 0) : ?>
            <script src="/dts/single/assets/js/app.js" ></script>
        <?php endif; ?>
        <?php if ($total_js > 0) : ?>
            <script src="<?php echo base_url(); ?>assets/js/bootstrap.js" ></script>
        <?php endif; ?>
        <script src="<?php echo base_url(); ?>assets/js/js.js" ></script>
    </body>
</html>