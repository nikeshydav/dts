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
    <body class="loginscreen">
        <div class="container" >
            <div class="row">
                <div class="col-md-12">
                    <div class="pr-wrap">
                        <div class="pass-reset">
                            <label>Enter the email you signed up with</label>
                            <input type="email" placeholder="Email" />
                            <input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
                        </div>
                    </div>
                    <div class="wrap">
                        <p class="form-title">Sign In</p>
                        <form class="login" action="<?php echo base_url() . index_page() ?>/user_validate" method="post">
                            <?php echo $message ?>
                            <input type="text" name="user_name" placeholder="Username" />
                            <input type="password" name="password" placeholder="Password" />
                            <input type="submit" value="Sign In" class="btn btn-success btn-sm" />
                            <div class="remember-forgot">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" />
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 forgot-pass-content">
                                        <a href="javascription:void(0);" class="forgot-pass">Forgot Password</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>var base_url = '<?php echo base_url(); ?>index.php';</script>
        <script src="<?php echo base_url(); ?>assets/js/app.js" ></script>
        <script src="<?php echo base_url(); ?>assets/js/js.js" ></script>
    </body>
</html>