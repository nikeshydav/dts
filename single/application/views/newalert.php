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
                <form role="form" method="post">
                    <?php echo $message ?>
                    <div class="form-group">
                        <label for="email">Practice Account:</label>
                        <select name="dts" class="form-control" >
                            <option value="maintenance">IP.M</option>
                            <option value="opposition">IP.O</option>
                            <option value="patents">PATN</option>
                            <option value="prosecution"> IP.P</option>
                            <option value="enforcement">IP.E</option>
                            <option value="counseling"> IP.C</option>
                            <option value="domain"> IP.D</option>
                            <option value="design">DESN</option>
                            <option value="iplitigation">IP.L</option>
                            <option value="litigation">LITN</option>
                        </select>
                    </div>
                    <?php if (!$calendar_alert) : ?>
                        <div class="form-group">
                            <label for="pwd">ALG Ref:</label>
                            <input name="alg_ref" class="form-control" >
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="pwd">Alert:</label>
                        <input name="alert" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="pwd">Date:</label>
                        <input name="toa" class="form-control datepicker-input" >
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <?php #include_once 'footer.php'; ?>
            </div>
        </div>
        <script src="/dts/single/assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
        <script src="/dts/single/assets/grocery_crud/js/jquery_plugins/jquery.noty.js"></script>
        <script src="/dts/single/assets/grocery_crud/js/jquery_plugins/config/jquery.noty.config.js"></script>
        <script src="/dts/single/assets/grocery_crud/themes/flexigrid/js/cookies.js"></script>
        <script src="/dts/single/assets/grocery_crud/js/jquery_plugins/jquery.form.min.js"></script>
        <script src="/dts/single/assets/grocery_crud/js/jquery_plugins/jquery.numeric.min.js"></script>
        <script src="/dts/single/assets/grocery_crud/js/jquery_plugins/jquery.fancybox-1.3.4.js"></script>
        <script src="/dts/single/assets/grocery_crud/js/jquery_plugins/jquery.easing-1.3.pack.js"></script>
        <script src="/dts/single/assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/dts/single/assets/js/bootstrap.js" ></script>
        <script src="<?php echo base_url(); ?>assets/js/js.js" ></script>
    </body>
</html>