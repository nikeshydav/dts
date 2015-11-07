<?php
ini_set('display_errors', 'off');
require_once 'include/session.php';
?>
<?php
include "class.docket.php";
$obj = new docket();

$sql = "select *,(select GROUP_CONCAT(status_name) from application_status a, status s WHERE s.id=a.status  and a.app_id=aa.id) AS status          
          from application aa, application_status a where a.app_id=aa.id order by aa.id DESC limit 0,1";
        $res = mysql_query($sql);
        $i = 0;
        while ($row = mysql_fetch_array($res)) {
            $i++;
            $id = $row['id'];
            $file_type = $row['file_type'];
            $trademark = $row['mark'];
            $app_no = $row['application_no'];
            $fillingdate = $row['filing_date'];
            $date_filling = date('d M,Y', strtotime($fillingdate));
            $prioritydate = $row['priority_date'];
            $date_priority = date('d M,Y', strtotime($prioritydate));
            $applicant = $row['applicant'];
            $client = $row['client'];
            $class = $row['classes'];
            $last_key = preg_replace('/,([^,]*)$/', ' & \1', $class);
            $user = $row['user_proposed'];
            if($user == '0000-00-00'){
            $user = '';
            } else {
            $user = date('d M,Y', strtotime($user));
            }
            $jurisdiction = $row['jurisdiction'];
            $goods_services = $row['goods_services'];
            $history = $row['history'];
            $pending_record = $row['pending_record'];
            $cl_ref_no = $row['cl_ref_no'];
            $status = str_replace('hidden,', '', $row['status'] );
            $status = str_replace('hidden', '', $status );
            $status_date = $row['status_effective_on_date'];
            $date_effective_status = date('d M,Y', strtotime($status_date));
            $toe_unformatted = $row['toe'];
            $toe = date('d M,Y', strtotime($toe_unformatted));
            $sid = mt_rand(1, 1000000);
            
            $status_recordals = '';
            $sql_rec = "select * from status_recordals where status_recordals_app_id=$id";
            $get_rec = mysql_query($sql_rec);
            while ($row_rec = mysql_fetch_array($get_rec)) {
                    $status_recordals .= $row_rec['status_recordals'].',';
                } 

            $exp_applicant = explode(',', $applicant);
            count($exp_applicant);
            $name_app = '';
            if (count($exp_applicant) > 0) {
                $res1 = "select name from user where id in ($applicant)";
                $res2 = mysql_query($res1);
                while ($row3 = mysql_fetch_array($res2)) {
                    $name_app .= $row3['name'] . ', ';
                }
            }
            $exp_client = explode(',', $client);
            count($exp_client);
            $name_cli = '';
            if (count($exp_client) > 0) {
                $res_cli = "select name from user where id in ($client)";
                $res_cli1 = mysql_query($res_cli);
                while ($row4 = mysql_fetch_array($res_cli1)) {
                    $name_cli .= $row4['name'] . ', ';
                }
            }
        }

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Welcome Page</title>
        <link rel="stylesheet" href="css/jquery.fancybox.css" />
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <link rel="stylesheet" href="css/custom.css" />
        <link rel="stylesheet" href="css/menu.css" />
        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery.fancybox.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
    </head>
    <body>
        <?php
        include_once 'include/menu.php';
        ?>
        <div class="content">

            <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>

            <div>
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr> <td> File Type :</td> <td><input type="text" name="file_type" id="file_type" value="<?php echo $file_type; ?>" readonly/> </td></tr>
                        <tr> <td> Registration No. :</td> <td><input type="text" name="app_no" id="app_no" value="<?php echo $app_no; ?>" readonly/> </td></tr>
                        <tr> <td> Mark :</td> <td><input type="text" name="mark" id="mark" value="<?php echo $trademark; ?>" readonly/></td></tr>
                        <tr> <td> Class(es) :</td> <td><input type="text" name="classes" id="classes" value="<?php echo $last_key; ?>" readonly/> </td></tr>
                        <tr> <td> User :</td> <td><input type="text" name="user_proposed" id="" value="<?php echo $user; ?>" readonly/></td></tr>
                        <tr> <td> Filing Date :</td> <td><input type="text" name="filing_date" id="" value="<?php echo $date_filling; ?>" readonly/> </td></tr>
                        <tr> <td> Client Entity :</td> <td><input type="text" size="100px" name="applicant_ref_no" id="applicant_ref_no" value="<?php echo $name_app; ?>" readonly/>
                            </td></tr>
                        <tr> <td> Intermediary Entity :</td> <td><input type="text" size="100px" name="client_ref_no" id="client_ref_no" value="<?php echo $name_cli; ?>" readonly/>                            
                            </td></tr>
                        <tr> <td> Priority Date :</td> <td><input type="text" name="priority_date" value="<?php echo $date_priority; ?>" id="" readonly/>
                            </td></tr>
                        <tr> <td> Forum :</td> <td><input type="text" name="" id="" value="<?php echo $jurisdiction; ?>" readonly/></td></tr>
                        <tr> <td valign="top"> Goods/Services :</td> <td><textarea name="goods_services" id="goods_services" readonly><?php echo $goods_services; ?></textarea> </td></tr>
                        <tr> <td valign="top"> Status Maintenance :</td> <td><input type="text" size="100px" name="" id="" value="<?php echo $status; ?>" readonly/> 
                            </td></tr>
                        <tr> <td valign="top"> Status Recordals :</td> <td><input type="text" size="100px" name="" id="" value="<?php echo $status_recordals; ?>" readonly/> 
                            </td></tr>
                        <tr> <td style="vertical-align: top;"> History Sheet :</td> <td><textarea name="history" id="history" readonly><?php echo $history; ?></textarea></td></tr>
                        <tr> <td style="vertical-align: top;"> Pending Recordals/Corrections :</td> <td><textarea name="pending_record" id="pending_record" readonly><?php echo $pending_record; ?></textarea></td></tr>
                        <tr> <td> Client Ref No :</td> <td><input type="text" name="cl_ref_no" id="cl_ref_no" value="<?php echo $cl_ref_no; ?>" readonly/> </td></tr>                        
                        <tr> <td> Alert :</td> <td><?php
                        $sql = mysql_query('SELECT * FROM `alert` where fid='.$id);
                        while ($rowes1 = mysql_fetch_array($sql)) {
                            echo '<input value="'.$rowes1['alert'].'" />&nbsp;<input value="'.$rowes1['toa'].'" /><br /><br />';
                        }
                        ?></td></tr>
                    </table>
                </form>
            </div>   
            <?php
            if ($_GET['created']) {
                //echo "yes";
                $sql3 = "select * from year_serialno ORDER BY alg_id DESC limit 0,1";
                $res3 = mysql_query($sql3);
                $i = 0;
                while ($get3 = mysql_fetch_array($res3)) {
                    $i++;
                    $al_id = $get3['alg_id'];
                    $alg_doc_name = $get3['alg_doc_name'];
                    $alg_applicant_code = $get3['alg_applicant_code'];
                    $alg_client_code = $get3['alg_client_code'];
                    $alg_priority_date = $get3['alg_priority_date'];
                    $alg_priority_date_format = date("y-m-d", strtotime($alg_priority_date));
                    $alg_serialno = $get3['alg_serialno'];
                    $sid = mt_rand(1, 1000000);
                    echo '<form method="post"><table border="1px" style="width: 775px;"><tr><td width="125px"> ALG Ref :</td> <td>
                                <input type="text" size="10px" name="alg_ref_no" id="alg_ref_no" value="' . strtoupper($alg_doc_name) . '" readonly/>/                            
                                <input type="text" size="10px" name="applicant_ref_no" id="applicant_ref_no" value="' . strtoupper($alg_applicant_code) . '" readonly/>-
                                <input type="text" size="10px" name="client_ref_no" id="client_ref_no" value="' . strtoupper($alg_client_code) . '" readonly/>/
                                <input type="text" size="10px" name="priority_ref_no" id="priority_ref_no" value="' . $alg_priority_date_format . '" />-
                                <input type="text" size="10px" maxlength="4" name="year_ref_no" autocomplete="off" id="year_ref_no" value="' . $alg_serialno . '" />
<input type="submit" id="submit_alg" value="Update" />
                            </td></tr></table></form>';
                }
                
                $sql3 = "select * from alg_file_type ORDER BY alg_file_id DESC limit 0,1";
                $res3 = mysql_query($sql3);
                $i = 0;
                while ($get3 = mysql_fetch_array($res3)) {
                    $i++;
                    $al_id = $get3['alg_id'];
                    $alg_file_type = $get3['alg_file_type'];
                    $alg_apln = $get3['alg_apln'];
                    $alg_class = $get3['alg_class'];
                    $alg_mark = $get3['alg_mark'];
                    $sid = mt_rand(1, 1000000);
                    echo '<form method="post"><table border="1px" style="width: 775px;"><tr><td width="125px"> ALG File :</td> <td>
                                <input type="text" size="10px" name="alg_file_type" id="alg_file_type" value="' . strtoupper($alg_file_type) . '" readonly/>/                            
                                <input type="text" size="10px" name="alg_apln" id="alg_apln" value="' . strtoupper($alg_apln) . '" readonly/>-
                                <input type="text" size="10px" name="alg_class" id="alg_class" value="' . strtoupper($alg_class) . '" readonly/>/
                                <input type="text" size="50px" name="alg_mark" id="alg_mark" value="' . strtoupper($alg_mark) . '" readonly />
                            </td></tr></table></form>';
                }
                
                echo '<a href="add_application.php" style="float: left;">New Application</a>';
                echo '<a href="applications_list.php" style="float: left;margin-left:140px;">View Application</a>';
                echo '<a href="welcome.php" style="float: right;">Close Application</a>';
            }
if ($_POST) {
                $priority_ref_no = $_POST['priority_ref_no'];
                $year_ref_no = $_POST['year_ref_no'];
                $sql_alg = "update year_serialno set alg_priority_date='$priority_ref_no',alg_serialno='$year_ref_no',all_alg_data='".$_POST['alg_ref_no']."/".$_POST['applicant_ref_no']."-".$_POST['client_ref_no']."/".addslashes(date("ymd", strtotime($priority_ref_no)))."$year_ref_no' where alg_app_id ='$id'";
                mysql_query($sql_alg);
                if (!headers_sent()) {
                    header("location:show_application.php?created=New Application has been generated successfully.");
                } else {
                    echo "<script>
			window.location.href='show_application.php?created=New Application has been generated successfully.'
			 </script>";
                }
            }
            ?>
        </div>
    </body>
</html>
