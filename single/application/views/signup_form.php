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
        
    </head>
    <body >
        <div class="container" >
            <div class="container" >                
                <?php include_once 'header.php'; ?>
                <?php
                echo validation_errors();
                ?>
                <div class="container login col-lg-6">
                    <?php
                    $attributes = array('class' => 'form-signin');
                    echo form_open('create_member', $attributes);
                    echo '<h2 class="form-signin-heading">Create an account</h2>';
                    echo '<div class="form-group">';
                    echo form_input('first_name', set_value('first_name'), 'placeholder="First name" class="form-control"');
                    echo '</div><div class="form-group">';
                    echo form_input('last_name', set_value('last_name'), 'placeholder="Last name" class="form-control"');
                    echo '</div><div class="form-group">';
                    /*echo form_input('email_address', set_value('email_address'), 'placeholder="Email" class="form-control"');
                    echo '</div><div class="form-group">';*/
                    echo form_input('username', set_value('username'), 'placeholder="Username" class="form-control"');
                    echo '</div><div class="form-group">';
                    echo form_input('password', '', 'placeholder="Password" class="form-control"');
                    echo '</div><div class="form-group">';
                    echo form_radio('role', '1', FALSE);
                    echo form_label('Super Admin', 'role');
                    echo '</div><div class="form-group">';
                    echo form_radio('role', '2', TRUE);
                    echo form_label('User', 'role');
                    
                    echo '</div><div class="form-group">';
                    /*echo form_password('password2', '', 'placeholder="Password confirm" class="form-control"');
                    echo '</div><div class="form-group">';*/
                    echo form_submit('submit', 'submit', 'class="btn btn-large btn-primary"');
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

