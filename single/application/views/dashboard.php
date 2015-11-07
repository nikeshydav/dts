<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function generateRandomString($length = 6) {
    $characters = '0123456789ABCDEF';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
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
        <style>
            .box-inner {
                width:20%;float: left;margin-bottom: 5em;
            }
        </style>
    </head>
    <body >
        <div class="container" >
            <?php
            include_once 'header.php';
            ?>
            <div class="container" id="top">
                <div style="height: 20px"></div>



                <?php
                $query = $this->db->get('DTS');
                foreach ($query->result() as $row) {
                    $db[$row->name] = $row->db;
                }
                ?>

                <div class="row-fluid">
                    <div class="span4">
                        <div class="box-wrap">
                            <div class="box-heading">
                                <h4><i class="icon-dashboard"></i> Queries </h4>
                            </div>

                            <div style="height: 10px"></div>
                            <div class="box-inner">
                                <div class="control-group">
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <?php
                                            $total_dealer = 0;
                                            $this->db->where('dateofdeleteion<=', date('Y-m-d'));
                                            $this->db->where('status<=', '0');
                                            if ($this->session->userdata('role') != 1) {
                                                $this->db->where('alert_assign_to', $this->session->userdata('id'));
                                            }
                                            $query = $this->db->get('query');
                                            $total_dealer = $query->num_rows();
                                            $this->db->close();
                                            ?>
                                            <input type="text" class="input-small knob" readonly value="<?php echo $total_dealer ?>" data-min="0" data-max="<?php echo $total_dealer + 10 ?>" data-step="10" data-width="80" data-height="80" data-thickness=".2" data-fgColor="#2091CF"  />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="height: 200px"></div>


                <div class="row-fluid">


                    <div class="span4">
                        <div class="box-wrap">
                            <div class="box-heading">
                                <h4><i class="icon-dashboard"></i> Alerts </h4>
                            </div>

                            <div style="height: 10px"></div>



                            <?php foreach ($db as $key => $value) : ?>
                                <div class="box-inner">
                                    <div class="control-group">
                                        <div class="row-fluid">
                                            <div class="span4">
                                                <?php
                                                $this->db = $this->load->database($value, true);
                                                $total_dealer = 0;
                                                $this->db->where('toa<=', date('Y-m-d'));
                                                if ($this->session->userdata('role') != 1) {
                                                    $this->db->where('alert_name', $this->session->userdata('user_name'));
                                                }
                                                $query = $this->db->get('alert_view');
                                                $total_dealer = $query->num_rows();
                                                $this->db->close();
                                                ?>
                                                <input type="text" class="input-small knob" readonly value="<?php echo $total_dealer ?>" data-min="0" data-max="<?php echo $total_dealer + 10 ?>" data-step="10" data-width="80" data-height="80" data-thickness=".2" data-fgColor="#<?php echo generateRandomString() ?>"  />
                                                <br />
                                                <?php echo $key ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>




                </div>

                <!-- Mails END -->
                <div style="height: 50px"></div>

            </div>
            <?php
            include_once 'footer.php';
            ?>
        </div>
        <script>var base_url = '<?php echo base_url(); ?>index.php';</script>
        <script src="<?php echo base_url(); ?>assets/js/app.js" ></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.knob.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $('.knob').knob({
                    'readOnly': true
                });
            });
        </script>
        <script src="<?php echo base_url(); ?>assets/js/js.js" ></script>
    </body>
</html>