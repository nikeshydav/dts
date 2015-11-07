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
        </style>
    </head>
    <body >
        <div class="container" >
            <div class="container" >
                <?php include_once 'header.php'; ?>
                <?php
                echo validation_errors();
                ?>
                <div class="container login  col-lg-6">
                    <?php
                    $attributes = array('class' => 'form-signin');
                    echo form_open_multipart('change_password', $attributes);
                    echo '<h2 class="form-signin-heading">Change Password</h2>';
                    echo '<div class="form-group">';
                    echo form_password('password', '', 'placeholder="Password"');
                    echo '</div><div class="form-group">';
                    echo form_password('password2', '', 'placeholder="Confirm password"');
                    echo '</div><div class="form-group">';
                    echo form_submit('Submit', 'Submit', 'class="btn btn-large btn-primary"');
                    echo '</div>';
                    echo form_close();
                    ?>
                </div>
                <?php include_once 'footer.php'; ?>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/js/app.js" ></script>
        <script src="<?php echo base_url(); ?>assets/js/js.js" ></script>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
    </body>
</html>