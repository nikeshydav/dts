<?php
require_once 'include/session.php';
include "class.docket.php";
$obj = new docket();
@session_start();

$sql = "select *,(select GROUP_CONCAT(status_name) from application_status a, status s WHERE s.id=a.status  and a.app_id=aa.id) AS status          
          from application aa, application_status a where a.app_id=aa.id order by aa.id DESC limit 0,1";
$res = mysql_query($sql);
$i = 0;
while ($row = mysql_fetch_array($res)) {
    $i++;
    $id = $row['id'];
    $file_type = $row['file_type'];
    $trademark = $row['mark'];
    $adversary_entity = $row['adversary_entity'];
    $adver_ent = '';
    foreach ($_SESSION['adversary_entity'] as $adversary_entity) {
        $sql_adv = "select name from adversary_entity where id ='$adversary_entity'";
        $res_adv = mysql_query($sql_adv);
        while ($row_adv = mysql_fetch_array($res_adv)) {
            $adver_ent .= '<input type="text" name="addv_entity" value="'.$row_adv['name'].'" readonly/><br />';
        }
    }

    $fillingdate = $row['filing_date'];
    $date_filling = date('d M,Y', strtotime($fillingdate));
    $prioritydate = $row['priority_date'];
    if ($prioritydate == '0000-00-00') {
        $prioritydate = '';
    } else {
        $date_priority = date('d M,Y', strtotime($prioritydate));
    }
    $applicant = $row['applicant'];
    $client = $row['client'];

    $adversary_domain_name = $row['adversary_domain_name'];
    $client_marks = $row['client_marks'];
    $clients_date_india = $row['clients_date_india'];
    if ($clients_date_india == '0000-00-00') {
        $clients_date_india = '';
    } else {
        $clients_date_india = date('d M,Y', strtotime($clients_date_india));
    }
    $clients_date_international = $row['clients_date_international'];
    if ($clients_date_international == '0000-00-00') {
        $clients_date_international = '';
    } else {
        $clients_date_international = date('d M,Y', strtotime($clients_date_international));
    }
    $adversary_date = $row['adversary_date'];
    if ($adversary_date == '0000-00-00') {
        $adversary_date = '';
    } else {
        $adversary_date = date('d M,Y', strtotime($adversary_date));
    }

    $history = $row['history'];
    $cl_ref_no = $row['cl_ref_no'];
    $status = str_replace('hidden,', '', $row['status']);
    $status = str_replace('hidden', '', $status);
    $status_date = $row['status_effective_on_date'];
    $date_effective_status = date('d M,Y', strtotime($status_date));
    $toe_unformatted = $row['toe'];
    $toe = date('d M,Y', strtotime($toe_unformatted));
    $sid = mt_rand(1, 1000000);

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
                        <tr> <td>Adversary Mark :</td> <td><input type="text" name="mark" id="mark" value="<?php echo $trademark; ?>" readonly/></td></tr>
                        <tr> <td> Adversary Domain Name :</td> <td><input type="text" name="domain_name" id="domain_name" value="<?php echo $adversary_domain_name; ?>" /></td></tr>
                        <tr> <td> Adversary Entity :</td> <td><?php echo $adver_ent ?></td></tr>
                        <tr> <td> Date of file opening :</td> <td><input type="text" name="filing_date" id="" value="<?php echo $date_filling; ?>" readonly/> </td></tr>
                        <tr> <td> Client Entity :</td> <td><input type="text" size="100px" name="applicant_ref_no" id="applicant_ref_no" value="<?php echo $name_app; ?>" readonly/></td></tr>
                        <tr> <td> Intermediary Entity :</td> <td><input type="text" size="100px" name="client_ref_no" id="client_ref_no" value="<?php echo $name_cli; ?>" readonly/>                            
                            </td></tr>
                        <tr> <td> Clients Mark(s) :</td> <td><input type="text" name="mark" id="mark" value="<?php echo $client_marks; ?>" readonly/></td></tr>
                        <tr> <td> Date of file closing :</td> <td><input type="text" name="priority_date" value="<?php echo $date_priority; ?>" id="" readonly/>
                            </td></tr>   
                        <tr> <td> Client's Date of Prior use (India) :</td> <td><input type="text" name="mark" id="mark" value="<?php echo $clients_date_india; ?>" readonly/></td></tr>
                        <tr> <td> Client's Date of Prior use (International) :</td> <td><input type="text" name="mark" id="mark" value="<?php echo $clients_date_international; ?>" readonly/></td></tr>
                        <tr> <td> Adversary's date of prior use :</td> <td><input type="text" name="mark" id="mark" value="<?php echo $adversary_date; ?>" readonly/></td></tr>
                        <tr> <td valign="top"> Status Enforcement :</td> <td><input type="text" size="100px" name="filing_date" id="" value="<?php echo $status; ?>" readonly/> 
                            </td></tr>
                        <tr> <td style="vertical-align: top;"> History Sheet :</td> <td><textarea name="history" id="history" readonly><?php echo $history; ?></textarea></td></tr>
                        <tr> <td> Alert :</td> <td><?php
                                $sql = mysql_query('SELECT * FROM `alert` where fid=' . $id);
                                while ($rowes1 = mysql_fetch_array($sql)) {
                                    echo '<input value="' . $rowes1['alert'] . '" />&nbsp;<input value="' . $rowes1['toa'] . '" /><br /><br />';
                                }
                                ?></td></tr>
                        <tr> <td> Client Ref :</td> <td><input type="text" name="cl_ref_no" id="cl_ref_no" value="<?php echo $cl_ref_no; ?>" readonly/> </td></tr>                        
                    </table>
                </form>
            </div>   
            <?php
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
                                <input type="text" size="10px" name="priority_ref_no" id="priority_ref_no" value="' . $alg_priority_date_format . '"  />-
                                <input type="text" size="10px" maxlength="4" name="year_ref_no" autocomplete="off" id="year_ref_no" value="' . $alg_serialno . '" />
                                <input type="submit" id="submit_alg" value="Update" />
                            </td></tr></table></form>';
                }

                $sql3 = "select * from alg_file_type ORDER BY alg_file_id DESC limit 0,1";
                $res3 = mysql_query($sql3);
                $i = 0;
                while ($get4 = mysql_fetch_array($res3)) {
                    $i++;
                    $al_id = $get4['alg_file_id'];
                    $alg_forum = $get4['alg_forum'];
                    $alg_file_type = $get4['alg_file_type'];
                    $alg_client_mark = $get4['alg_client_mark'];
                    $alg_adversary_name = $get4['alg_adversary_name'];
                    $alg_adversary_mark = $get4['alg_adversary_mark'];
                    $alg_adversary_domain_name = $get4['alg_adversary_domain_name'];
                    if ($alg_adversary_domain_name == '') {
                        $adStyle = 'display:none';
                    } else {
                        $adStyle = '';
                    }
                    $sid = mt_rand(1, 1000000);
                    echo '<form method="post"><table border="1px" style="width: 775px;"><tr><td width="125px"> ALG File :</td> <td>
                        <input type="text" size="10px" name="alg_forum_show" id="alg_forum_show" value="' . strtoupper($alg_forum) . '" readonly />_
                                <input type="text" size="30px" name="alg_file_type_show" id="alg_file_type_show" value="' . strtoupper($alg_file_type) . '" readonly/> [
                                <input type="text" size="30px" name="alg_client_mark_show" id="alg_client_mark_show" value="' . strtoupper($alg_client_mark) . '" readonly/>  ] v 
                                <input type="text" size="30px" name="alg_adversary_name_show" id="alg_adversary_name_show" value="' . strtoupper($alg_adversary_name) . '" readonly/> [
                                <input type="text" size="30px" name="alg_adversary_mark_show" id="alg_adversary_mark_show" value="' . strtoupper($alg_adversary_mark) . '" readonly /> 
                                <input type="text" style="' . $adStyle . '" size="30px" name="alg_adversary_domain_name" id="alg_adversary_domain_name" value="' . strtoupper($alg_adversary_domain_name) . '" readonly /> ]
                            </td></tr></table></form>';
                }

                echo "<div style='Color:#FF0000; margin-top:15px;font-weight:bold; '>" . $_GET['created'] . "</div>";
                echo '<a href="add_application.php" style="float: left;">New Application</a>';
                echo '<a href="applications_list.php" style="float: left;margin-left:140px;">View Application</a>';
                echo '<a href="welcome.php" style="float: right;">Close Application</a>';
            
            if ($_POST) {
                $priority_ref_no = $_POST['priority_ref_no'];
                $year_ref_no = $_POST['year_ref_no'];
                $sql_alg = "update year_serialno set alg_priority_date='$priority_ref_no',alg_serialno='$year_ref_no',all_alg_data='" . $_POST['alg_ref_no'] . "/" . $_POST['applicant_ref_no'] . "-" . $_POST['client_ref_no'] . "/" . addslashes(date("ymd", strtotime($priority_ref_no))) . "$year_ref_no' where alg_app_id ='$id'";
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
