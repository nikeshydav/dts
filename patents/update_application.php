<?php
ini_set('display_errors', 'off');
require_once 'include/session.php';
include "class.docket.php";
$obj = new docket();
?>
<?php
if ($_POST) {
    $id = $_POST['id'];
    $file_type = $_POST['file_type'];

    $patn_digit11 = $_POST['patn_digit1'];
    $patn_digit13 = $_POST['patn_digit3'];
    $patn_digit15 = $_POST['patn_digit5'];
    if ($patn_digit11 != '') {
        $patn_digit1 = $patn_digit11;
    } else if ($patn_digit13 != '') {
        $patn_digit1 = $patn_digit13;
    } else if ($patn_digit15 != '') {
        $patn_digit1 = $patn_digit15;
    }
    $patn_digit12 = $_POST['patn_digit2'];
    $patn_digit14 = $_POST['patn_digit4'];
    if ($patn_digit12 != '') {
        $patn_digit2 = $patn_digit12;
    } else if ($patn_digit14 != '') {
        $patn_digit2 = $patn_digit14;
    }
    $patn_city11 = $_POST['patn_city1'];
    $patn_city12 = $_POST['patn_city2'];
    $patn_city13 = $_POST['patn_city3'];
    if ($patn_city11 != '') {
        $patn_city1 = $patn_city11;
    } else if ($patn_city12 != '') {
        $patn_city1 = $patn_city12;
    } else if ($patn_city13 != '') {
        $patn_city1 = $patn_city13;
    }
    $patn_year11 = $_POST['patn_year1'];
    $patn_year12 = $_POST['patn_year2'];
    $patn_year13 = $_POST['patn_year3'];
    if ($patn_year11 != '') {
        $patn_year2 = $patn_year11;
    } else if ($patn_year12 != '') {
        $patn_year2 = $patn_year12;
    } else if ($patn_year13 != '') {
        $patn_year2 = $patn_year13;
    }

    $title = addslashes($_POST['title']);
    $date_of_publication = $_POST['date_of_publication'];
    $filing_date = $_POST['filing_date'];
    $pr_type = $_POST['priority'];
    $applicant = $_POST['applicant'];
    $client = $_POST['client'];
    $rfe_filing_date = $_POST['rfe_filing_date'];

    $priority_date = $_POST['priority_date'];
    $pend_rec_cor = $_POST['pend_rec_cor'];
    $history_sheet = $_POST['history_sheet'];
    $cl_ref_no = $_POST['cl_ref_no'];

    $alg_ref_no = $_POST['alg_ref_no'];
    $applicant_ref_no = $_POST['applicant_ref_no'];
    $client_ref_no = $_POST['client_ref_no'];
    $priority_ref_no = $_POST['priority_ref_no'];
    $year_ref_no = $_POST['year_ref_no'];

    session_start();
    
    $total_status = $_POST['total_status'];
    $sql_delete = "delete from application_status where app_id='$id'";
    mysql_query($sql_delete);
    $sql_status_hidden = "insert into application_status(app_id,status,status_effective_on_date )values('" . $id . "','1','')";
    mysql_query($sql_status_hidden);
    
    for ($i = 1; $i <= $total_status; $i++) {
        $status_add = $_POST['status' . $i];
        $status_date_update = $_POST['status_date' . $i];
        if ($status_add != 'select') {
            $sql_insert = "insert into application_status(app_id,status,status_effective_on_date)values('" . $id . "','" . $status_add . "','" . $status_date_update . "')";
            mysql_query($sql_insert);
        }
    }
    
    
    

    $obj->update_application($id, $file_type, $patn_digit1, $patn_digit2, $patn_city1, $patn_year2, $title, $date_of_publication, $filing_date, $pr_type, $applicant, $client, $rfe_filing_date, $priority_date, $pend_rec_cor, $history_sheet, $cl_ref_no, $alg_ref_no, $applicant_ref_no, $client_ref_no, $priority_ref_no, $year_ref_no);
    // $status, $status_date, $status2, $status2_date, $status3, $status3_date, $status4, $status4_date,$status5, $status5_date,
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Update Application</title>
        <link rel="stylesheet" href="css/jquery.fancybox.css" />
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <link rel="stylesheet" href="css/custom.css" />
        <link rel="stylesheet" href="css/menu.css" />
        <script src="js/jquery-1.8.3.min.js"></script>

        <script src="js/jquery-ui.js"></script>
        <script src="js/jquery.fancybox.js"></script>
        <script src="js/custom.js"></script>
        <!--Below are two js for editor 
        <script type="text/javascript" src="editor/jscripts/tiny_mce/tiny_mce.js"></script>
        <script type="text/javascript" src="editor/jscripts/tarun.js"></script> -->
        <!--Above are two js for editor  -->
        <script language="javascript" type="text/javascript">
            function popitup(url) {
                newwindow = window.open(url, 'name', 'height=500,width=550');
                if (window.focus) {
                    newwindow.focus()
                }
                return false;
            }
        </script>
        <style>
            #addVar{background: none repeat scroll 0 0 #000000;color: #FFFFFF;padding: 3px;cursor: pointer;}
            .custom-combobox {position: relative;display: inline-block;}
            .custom-combobox-toggle {position: absolute;top: 0;bottom: 0;margin-left: -1px;padding: 0;/* support: IE7 */*height: 1.7em;*top: 0.1em;}
            .custom-combobox-input {margin: 0;padding: 0.3em;}
            .ui-state-default .ui-icon {background-image: url("images/ui-icons_888888_256x240.png");}
            .custom-combobox input { width:250px;}
            #addVaralert{background: none repeat scroll 0 0 #000000;color: #FFFFFF;padding: 3px;cursor: pointer;}
        </style>
    </head>
    <?php
    if ($_GET['action'] == 'edit') {
        $id = $_GET['id'];
        $obj->edit_application($id);
    }

    if ($_GET['action'] == 'delete') {
        $id = $_REQUEST['id'];
        $obj->delete_application($id);
    }
    ?>
    <body>
        <?php
        include_once 'include/menu.php';
        ?>
        <div class="content">
            <div class="welcome">
                <h3>Welcome <?php echo $_SESSION['username']
        ?>!</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <table align="center">
                    <input type="hidden" name="id" id="id" value="<?php echo $obj->id; ?>" />
                    <?php include "file_type_pattern.php"; ?>
                    <tr>
                        <td> Title :</td><td>
                            <input type="text"  name="title" id="title" value="<?php echo $obj->title; ?>" autocomplete="off" />
                        </td>
                    </tr>                    
                    <tr>
                        <td> Date Of Publication :</td><td>
                            <input type="text"  name="date_of_publication" id="date_of_publication" value="<?php echo ($obj->date_of_publication == '0000-00-00') ? '' : $obj->date_of_publication ?>" autocomplete="off" />
                        </td>
                    </tr>
                    <tr>
                        <td> Filing Date :</td><td>
                            <input type="text" name="filing_date" id="filing_date" autocomplete="off" value="<?php
                    echo $fil_dt = $obj->filing_date;
                    ?>" />
                        </td>
                    </tr>                    
                    <tr> <td> Priority :</td> <td><select  name="priority" id="priority">
                                <option value="">--Select--</option>
                                <?php
                                $pr_type = $obj->pr_type;
                                for ($index = 1; $index <= 10; $index++) {
                                    if ($pr_type == $index . 'PR') {
                                        $sel = 'selected="selected"';
                                    } else {
                                        $sel = '';
                                    }
                                    echo '<option value="' . $index . '" ' . $sel . '>' . $index . 'PR</option>';
                                }
                                ?>
                            </select>
                            <span id="pr_span_id">
                                <?php
                                $ids_pr = $obj->id;
                                $sql_pr = "SELECT a.id,apr.pr_app_id,apr.pr_text,apr.pr_date FROM application a, application_pr apr WHERE a.id=apr.pr_app_id and apr.pr_app_id = '$ids_pr' order by id DESC ";
                                $show_pr = mysql_query($sql_pr);
                                $k = 0;
                                while ($result_pr = mysql_fetch_array($show_pr)) {
                                    $id_pr = $result_pr['pr_id'];
                                    $text_pr = $result_pr['pr_text'];
                                    $date_pr = $result_pr['pr_date'];
                                    $k++;
                                    ?>
                                    <input type="text" id="pr<?php echo $k; ?>" name="pr<?php echo $k; ?>" value="<?php echo $text_pr ?>"/>
                                    <input type="text" id="p_d<?php echo $k; ?>" name="p_d<?php echo $k; ?>" value="<?php echo $date_pr ?>"/><hr>

                                <?php } ?></span>
                            <span id="priority_options"></span>                               
                        </td> </tr>
                    <tr> <td> Priority Date :</td> <td><input type="text" name="priority_date" id="priority_date" autocomplete="off" value="<?php
                                echo $fil_dt = $obj->priority_date;
                                ?>" />
                            <input type="button" id="fill_date" value="Set Priority Date">
                        </td></tr>
                    <?php
                    $new_date_inc = strtotime($obj->request_for_examination_date);
                    $final_date = date("Y-m-d", strtotime("+4 year", $new_date_inc));
                    ?>
                    <tr>
                        <td> RFE due date :</td><td>
                            <input type="text"  name="request_for_examination_date" id="request_for_examination_date" value="<?php echo $final_date; ?>" autocomplete="off" readonly />
                        </td>
                    </tr>
                    <?php
                    $cat_sql = "SELECT category from category where id='1'";
                    $cat_show = mysql_query($cat_sql);
                    while ($cat_result = mysql_fetch_array($cat_show)) {
                        $cat_category = $cat_result['category'];
                    }
                    $sql3 = "select * from year_serialno where alg_app_id='$obj->id'";
                    $res3 = mysql_query($sql3);
                    $i = 0;
                    while ($get3 = mysql_fetch_array($res3)) {
                        $i++;
                        $id = $get3['alg_id'];
                        $alg_doc_name = $get3['alg_doc_name'];
                        $alg_applicant_code = $get3['alg_applicant_code'];
                        $alg_client_code = $get3['alg_client_code'];
                        $alg_priority_date = $get3['alg_priority_date'];
                        $alg_priority_date_format = date("y-m-d", strtotime($alg_priority_date));
                        $alg_serialno = $get3['alg_serialno'];
                        $sid = mt_rand(1, 1000000);
                    }
                    ?>
                    <tr>
                        <td> Client Entity :</td><td><?php
                    $obj->applicants($obj->applicant);
                    ?>
                            <input type="text" name="applicant_ref_no" maxlength="3" id="applicant_ref_no" class="applicant_ref_no" value="<?php echo $alg_applicant_code; ?>" autocomplete="off" /><br>
                            <div id="code_error_app"></div>
                            <a class="fancybox fancybox.iframe" href="iframe.php?pop=yes&current_ent=app_ent">Add Entity</a>
                        </td>
                    </tr>
                    <tr>
                        <td> Intermediary Entity :</td><td><?php
                            $obj->clients($obj->lawfirm);
                    ?>
                            <input type="text" name="client_ref_no" maxlength="3" id="client_ref_no" class="client_ref_no" value="<?php echo $alg_client_code; ?>" autocomplete="off" /><br>
                            <div id="code_error_cli"></div>
                            <a class="fancybox fancybox.iframe" href="iframe.php?pop=yes&current_ent=cli_ent">Add Entity</a>
                        </td>
                    </tr>
                    <tr id="mailto"><td>To</td>
                        <td>
                            <select name="cli_mail_to[]" multiple id="cli_mail_to" class="client_mail" >
                                <?php
                                $sql_app_email = "select * from user_entity_email where user_id='$obj->applicant' or user_id='$obj->lawfirm'";
                                $res_app_email = mysql_query($sql_app_email);
                                while ($get_app_email = mysql_fetch_array($res_app_email)) {
                                    $autoId = $get_app_email['auto_id'];
                                    $Email = $get_app_email['email'];
                                    $sqlEmails = "select * from users_cli_mails where app_id='$obj->id'";
                                    $resEmails = mysql_query($sqlEmails);
                                    while ($getEmails = mysql_fetch_array($resEmails)) {
                                        $cli_mail_to = $getEmails['cli_mail_to'];
                                    }
                                    $splitStringTo = explode(",", $cli_mail_to);
                                    $selected1 = in_array($autoId, $splitStringTo) ? ' selected="selected"' : '';
                                    echo '<option value="' . $autoId . '" ' . $selected1 . ' >' . htmlspecialchars($Email) . '</option><br>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr id="forwardto"><td>Forward To</td>
                        <td>
                            <select name="cli_mail_forward[]" multiple id="cli_mail_forward" class="client_mail" >
                                <?php
                                $sql_app_email = "select * from user_entity_email where user_id='$obj->applicant' or user_id='$obj->lawfirm'";
                                $res_app_email = mysql_query($sql_app_email);
                                while ($get_app_email = mysql_fetch_array($res_app_email)) {
                                    $autoId = $get_app_email['auto_id'];
                                    $Email = $get_app_email['email'];
                                    $sqlEmails = "select * from users_cli_mails where app_id='$obj->id'";
                                    $resEmails = mysql_query($sqlEmails);
                                    while ($getEmails = mysql_fetch_array($resEmails)) {
                                        $cli_mail_forward = $getEmails['cli_mail_forward'];
                                    }
                                    $splitStringForward = explode(",", $cli_mail_forward);
                                    $selected2 = in_array($autoId, $splitStringForward) ? ' selected="selected"' : '';
                                    echo '<option value="' . $autoId . '" ' . $selected2 . ' >' . htmlspecialchars($Email) . '</option><br>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr id="instructed"><td>Instructed By</td>
                        <td>
                            <select name="cli_mail_instructed[]" multiple id="cli_mail_instructed" class="client_mail" >
                                <?php
                                $sql_app_email = "select * from user_entity_email where user_id='$obj->applicant' or user_id='$obj->lawfirm'";
                                $res_app_email = mysql_query($sql_app_email);
                                while ($get_app_email = mysql_fetch_array($res_app_email)) {
                                    $autoId = $get_app_email['auto_id'];
                                    $Email = $get_app_email['email'];
                                    $sqlEmails = "select * from users_cli_mails where app_id='$obj->id'";
                                    $resEmails = mysql_query($sqlEmails);
                                    while ($getEmails = mysql_fetch_array($resEmails)) {
                                        $cli_mail_instructed = $getEmails['cli_mail_instructed'];
                                    }
                                    $splitStringInst = explode(",", $cli_mail_instructed);
                                    $selected3 = in_array($autoId, $splitStringInst) ? ' selected="selected"' : '';
                                    echo '<option value="' . $autoId . '" ' . $selected3 . ' >' . htmlspecialchars($Email) . '</option><br>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr> <td> RFE Filing Date :</td> <td><input type="text" name="rfe_filing_date" id="rfe_filing_date" value="<?php echo ($obj->rfe_filing_date == '0000-00-00') ? '' : $obj->rfe_filing_date ?>" autocomplete="off" /> </td></tr>


                    <tr>
                        <td> Status Maintenance :</td><td>
                            <?php
                            $ids = $obj->id;
                            $sql = "SELECT s.id, s.status_name,ast.app_id,ast.status_effective_on_date FROM status s, application_status ast WHERE s.id=ast.status and ast.app_id = '" . $ids . "' and ast.status!=1 order by id DESC ";
                            //exit();
                            $show = mysql_query($sql);
                            $i = 0;
                            while ($result = mysql_fetch_array($show)) {
                                $id_st = $result['id'];
                                $date_st = $result['status_effective_on_date'];
                                $status_id_st_for_future_notifications[$i] = $id_st;
                                $status_date_st[$i] = $date_st;
                                $i++;
                                ?>
                                <div class="status">
                                    <p>
                                        <label for="var1">
                                            <select name="status<?php echo $i ?>" id="status<?php echo $i ?>"><option value="select">--Select--</option><?php echo $obj->show_status($id_st); ?></select>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            Effective On : <input type="text" autocomplete="off" name="status_date<?php echo $i ?>" id="status_date<?php echo $i ?>" value="<?php echo $date_st ?>" />&nbsp;<input type="button" value="Add to history" class="status_history" rel="<?php echo $i ?>" > &nbsp;&nbsp; </label>
                                    <?php } ?>
                                    <span class="removeVar"></span>
                                </p>
                            </div>
                            <p>
                                <span id="addVar">Add Status</span>
                            </p>
                            <input type="hidden" name="total_status" value="<?php echo $i ?>" id="total_status">
                            <?php $count_value = $i; ?>
                        </td>
                    </tr>
                    </td></tr>
                    <tr class="">
                        <td style="vertical-align: top;"> History Sheet :</td><td>
                            <?php $obj->history_sheet_status(); ?>
                            <input type="text" id="history_name" autocomplete="off">&nbsp;
                            <input type="text" id="history_date" autocomplete="off">                            
                            <input type="button" value="Submit" id="history_submit">
                            <span id="history_txt"><textarea  rows="7" cols="40" name="history_sheet" id="history_sheet" class=""><?php echo strip_tags($obj->history_sheet); ?></textarea></span></td>
                    </tr>
                    <tr class="">
                        <td style="vertical-align: top;"> File Noting:</td><td><textarea rows="7" cols="40" name="pend_rec_cor" id="pend_rec_cor" class=""><?php echo $obj->pend_rec_cor; ?> </textarea></td>
                    </tr>
                    <tr class="alert_p"> <td> Alert :</td> <td>
                            <?php
                            $fid = $_GET['id'];
                            $increment = 0;
                            $sql = "select `alert`,`alert_name`,`toa` from `alert` where status=0 and fid='$fid'";
                            $res = mysql_query($sql);
                            while ($row = mysql_fetch_array($res)) {
                                $alert = $row['alert'];
                                $alertname = $row['alert_name'];
                                $alertdate = $row['toa'];
                                echo '<div><input type="text" name="alert[]" id="alert" value="' . $alert . '" autocomplete="off" readonly/>&nbsp;';
                                echo '<input id="alertdate' . $increment . '"  name="alertdate[]" placeholder="Alert Date" value="' . $alertdate . '" readonly/>';
                                echo '<input id="alert_name' . $increment . '"  name="alert_name[]" placeholder="name" value="' . $alertname . '"  readonly>';
                                echo '&nbsp; <a href="javascript:void(0);" class="removeParent"><img class="icon" src="images/delete.png" alt="Del" title="Delete"></a></div>';
                                $increment++;
                            }
                            ?><p><span id="addVaralert">Add Alert</span></p>

                            <input type="hidden" name="total_alert" value="<?php echo $increment ?>" id="total_alert">
                        </td></tr>
                    <tr>
                        <td> Client Ref :</td><td>
                            <input type="text" name="cl_ref_no" id="cl_ref_no" autocomplete="off" value="<?php echo $obj->cl_ref_no; ?>" />
                        </td>
                    </tr>

                    <tr><td> ALG Ref :</td> <td>
                            <input type="text" size="10px" name="alg_ref_no" autocomplete="off" id="alg_ref_no" value="<?php echo strtoupper($cat_category); ?>" />-                            
                            <input type="text" size="10px" name="applicant_ref_no" maxlength="3" id="applicant_ref_no" class="applicant_ref_no" value="<?php echo $alg_applicant_code; ?>" readonly />-
                            <input type="text" size="10px" name="client_ref_no" maxlength="3" id="client_ref_no" class="client_ref_no" value="<?php echo $alg_client_code; ?>" readonly />-
                            <input type="text" size="10px" name="priority_ref_no" id="priority_ref_no" value="<?php echo $alg_priority_date_format; ?>" />-
                            <input type="text" size="10px" maxlength="4" name="year_ref_no" autocomplete="off" id="year_ref_no" value="<?php echo $alg_serialno; ?>" />
                        </td></tr>
                    <?php
                    $sql4 = "select * from alg_file_type where alg_file_app_id='$obj->id'";
                    $res4 = mysql_query($sql4);
                    $i = 0;
                    while ($get4 = mysql_fetch_array($res4)) {
                        $i++;
                        $id = $get4['alg_file_id'];
                        $alg_file_type = $get4['alg_file_type'];
                        $alg_apln = $get4['alg_apln'];
                        $alg_class = $get4['alg_class'];
                        $alg_title = $get4['alg_title'];
                        $alg_pr_type = $get4['alg_pr_type'];
                        $sid = mt_rand(1, 1000000);
                    }
                    ?>
                    <tr> <td> ALG File :</td> <td>
                            File Type : <input type="text" name="alg_file_tyle" style="<?php echo ($alg_file_type == 'PAT') ? 'display:block' : 'display:none' ?>" id="alg_file_tyle" value="<?php echo $alg_file_type; ?>" readonly /><br>
                            <span id="patn_file_type_id">
                                <div style="<?php echo ($files == 'PATN NP') ? 'display:block' : 'display:none' ?>">
                                    <input type="text" style="<?php echo ($obj->alg_patn_digit1 != '') ? 'display:block' : 'display:none' ?>" value="<?php echo $obj->alg_patn_digit1 ?>" readonly>
                                    <input type="text" value="<?php echo $obj->alg_patn_digit2 ?>" readonly>
                                    <input type="text" value="<?php echo $obj->alg_patn_city ?>" readonly>
                                    <?php
                                    if ($files == 'PATN NP') {
                                        echo 'NP';
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                    <input type="text" value="<?php echo $obj->alg_patn_year ?>" readonly>                                    
                                </div>
                                <div style="<?php echo ($files == 'PATN') ? 'display:block' : 'display:none' ?>">
                                    <input type="text" style="<?php echo ($obj->alg_patn_digit1 != '') ? 'display:block' : 'display:none' ?>" value="<?php echo $obj->alg_patn_digit1 ?>" readonly>
                                    <input type="text" value="<?php echo $obj->alg_patn_digit2 ?>" readonly>
                                    <input type="text" value="<?php echo $obj->alg_patn_city ?>" readonly>
                                    <input type="text" value="<?php echo $obj->alg_patn_year ?>" readonly>
                                </div>
                                <div style="<?php echo ($files == 'PCT') ? 'display:block' : 'display:none' ?>">
                                    <input type="text" value="<?php echo $obj->alg_patn_city ?>" readonly>
                                    <input type="text" value="<?php echo $obj->alg_patn_year ?>" readonly>
                                    <input type="text" value="<?php echo $obj->alg_patn_digit1 ?>" readonly>
                                </div></span>
                            <span id="patn_file_type"></span><hr>
                            Title :<input type="text" size="15px" name="alg_title" id="alg_title" value="<?php echo $alg_title; ?>" readonly /><br>
                            <?php //if($alg_pr_type != ''){ ?>
                            PR Type :<input type="text" id="alg_pr_type" name="alg_pr_type" value="<?php echo $alg_pr_type; ?>" readonly/><hr>
                            <?php //} ?>
                            <span id="pr_file_type_id">
                                <?php
                                $ids_pr_alg = $obj->id;
                                $sql_pr_alg = "SELECT a.id,aft.alg_pr_app_id,aft.alg_pr_text FROM application a, alg_file_type_pr aft WHERE a.id=aft.alg_pr_app_id and aft.alg_pr_app_id = '$ids_pr_alg' order by id DESC ";
                                $show_pr_alg = mysql_query($sql_pr_alg);
                                $m = 0;
                                while ($result_pr_alg = mysql_fetch_array($show_pr_alg)) {
                                    $id_pr_alg = $result_pr_alg['pr_id'];
                                    $alg_text_pr = $result_pr_alg['alg_pr_text'];
                                    $m++;
                                    ?>
                                    <input type="text" id="pr_file<?php echo $m; ?>" name="pr_file<?php echo $m; ?>" value="<?php echo substr($alg_text_pr, 0, -1) ?>" readonly/><hr>

                                <?php } //} ?></span>

                            <span id="priority_options_file_type" class="priority_options_file_type"></span>
                        </td></tr>
                    <?php if ($_SESSION['role'] != 'associate') {
                        ?>
                        <tr>
                            <td></td><td>
                                <input type="submit"  id="submit_app" value="Update" />
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <!--                for past and future notifications*-->
                <table align="center">
                    <caption>Past Notifications</caption>
                    <tr><th>Date of Generation</th><th>Notification Name</th><th>Date of Deletion</th></tr>
                    <?php
                    $status_sql = mysql_query("SELECT n.toe, n.notify_status, s.status_name, n.snooze FROM `notifications` n, `status` s where app_id='" . $_GET['id'] . "' and n.status_id=s.id");
                    $ttotalrow = 0;
                    while ($status_row = mysql_fetch_assoc($status_sql)) {
                        echo '<tr><td>' . $status_row['toe'] . '</td><td>' . $status_row['status_name'] . '</td><td>' . (($status_row['notify_status'] == 1) ? $status_row['snooze'] : 'Unread' ) . '</td></tr>';
                        $ttotalrow++;
                    }
                    if ($ttotalrow == 0) {
                        echo '<tr><td colspan="3">No notifications</td></tr>';
                    }
                    ?>
                </table>
                <table align="center">
                    <caption>Future Notifications</caption>
                    <tr><th>Days Left</th><th>Notification Name</th></tr>
                    <?php
                    $i = 0;
                    foreach ($status_id_st_for_future_notifications as $key => $value) {
                        #echo "SELECT status_name, time_to_execute, radio  FROM `status` where parent_id='" . $value . "' order by status_order";
                        $status_sql = mysql_query("SELECT status_name, time_to_execute, radio  FROM `status` where parent_id='" . $value . "' order by status_order");
                        $ttotalrow = 0;
                        while ($status_row = mysql_fetch_assoc($status_sql)) {
                            $ts1 = strtotime($status_date_st[$i]);
                            $ts2 = strtotime(date('Y-m-d'));
                            $days_passed = ($ts2 - $ts1) / (3600 * 24);
                            #echo ',';
                            $time_to_execute = $status_row['time_to_execute'];
                            if ($status_row['radio'] == 1) {
                                if ($time_to_execute > $days_passed) {
                                    $days_left = $time_to_execute - $days_passed;
                                } else {
                                    $days_left = $time_to_execute - ($days_passed % $time_to_execute);
                                }
                            } else {
                                $days_left = $time_to_execute - $days_passed;
                            }
                            if ($days_left >= 1) {
                                echo '<tr><td>' . $days_left . '</td><td>' . $status_row['status_name'] . '</td></tr>';
                                $ttotalrow++;
                            }
                        }
                        $i++;
                    }
                    if ($ttotalrow == 0) {
                        echo '<tr><td colspan="3">No notifications</td></tr>';
                    }
                    ?>
                </table>
                <table align="center" style="border-collapse: none;">
                    <caption>Past Alert</caption>
                    <tr>
                        <th>Alert</th><th>Alert Date</th><th>Date of Deletion</th>
                    </tr>
                    <?php
                    $strSQL = "SELECT * FROM alert WHERE fid='" . $_GET["id"] . "' and status!=0";
                    $ttotalrowalert = 0;
                    $rs = mysql_query($strSQL);
                    while ($row = mysql_fetch_array($rs)) {
                        echo '<tr><td>' . $row['alert'] . '</td><td>' . $row['toa'] . '</td><td>' . $row['del'] . '</td></tr>';
                        $ttotalrowalert++;
                    }
                    if ($ttotalrowalert == 0) {
                        echo '<tr><td colspan="3">No Alert</td></tr>';
                    }
                    ?>
                </table>
                <table align="center" style="border-collapse: none;">
                    <caption>Future Alert</caption>
                    <tr>
                        <th>Alert</th><th>Alert Date</th>
                    </tr>
                    <?php
                    $strSQL = "SELECT * FROM alert where fid='" . $_GET["id"] . "' AND toa >= '" . date('Y-m-d') . "'";
                    $ttotalrowalert = 0;
                    $rs = mysql_query($strSQL);
                    while ($row = mysql_fetch_array($rs)) {
                        echo '<tr><td>' . $row['alert'] . '</td><td>' . $row['toa'] . '</td></tr>';
                        $ttotalrowalert++;
                    }
                    if ($ttotalrowalert == 0) {
                        echo '<tr><td colspan="3">No Alert</td></tr>';
                    }
                    ?>
                </table>

                <?php
                //$not_sql = "SELECT a.app_id, a.status, s.status_name ,DATEDIFF( now(), STR_TO_DATE( a.status_effective_on_date, '%m/%d/%Y')  ) as ef_day,  s1.id as child_id, s1.time_to_execute FROM `application_status` a, `status` s, `status` s1 where a.status=s.id and s1.parent_id=a.status and a.status_effective_on_date!='' and a.app_id = '$obj->id'";
                $not_sql = "SELECT a.app_id,a.status_effective_on_date, a.status, s.status_name ,DATEDIFF( now(), STR_TO_DATE( a.status_effective_on_date, '%Y-%m-%d')  ) as ef_day,  s1.id as child_id, s1.time_to_execute FROM `application_status` a, `status` s, `status` s1 where a.status=s.id and s1.parent_id=a.status and a.status_effective_on_date!='' and a.app_id = '$obj->id'";
                $not_res = mysql_query($not_sql);
                while ($not_row = mysql_fetch_array($not_res)) {
                    $id = $not_row['app_id'];
                    $time_to_execute = $not_row['time_to_execute'];
                    $ef_day = $not_row['ef_day'];
                    $noti_status_name = $not_row['status_name'];
                    $child_id = $not_row['child_id'];

                    echo $status_effective_on_date = $not_row['status_effective_on_date'];
                    $new_date = (date('Y-m-d', strtotime($status_effective_on_date . ' + ' . $time_to_execute . '  days')));
                    $current_date = (date("Y-m-d"));
                    //echo $days = (strtotime($new_date) - strtotime($new_date2)) / (60 * 60 * 24);
                    $days = (strtotime($new_date) - strtotime($current_date)) / 24 / 3600;

                    //if ($ef_day >= $time_to_execute) { 
                    //echo '<font color="red" ><br />Notification pending: ' . $noti_status_name . ' <br /> Days Left: ' . $time_to_execute . '</font><br>';
                    echo '<font color="red" ><br />Notification pending: ' . $noti_status_name . ' <br /> Days Left: ' . $days . '</font><br>';
                    //}
                }
                echo '<a href="add_application.php" style="float: left;">New Application</a>';
                echo '<a href="applications_list.php" style="float: left;margin-left:140px;">View Application</a>';
                echo '<a href="welcome.php" style="float: right;">Close Application</a>';
                ?>
            </form>
        </div>


        <script>
            (function($) {
                $.widget("custom.combobox", {
                    _create: function() {
                        this.wrapper = $("<span>")
                                .addClass("custom-combobox")
                                .insertAfter(this.element);

                        this.element.hide();
                        this._createAutocomplete();
                        this._createShowAllButton();
                    },
                    _createAutocomplete: function() {
                        var selected = this.element.children(":selected"),
                                value = selected.val() ? selected.text() : "";

                        this.input = $("<input>")
                                .appendTo(this.wrapper)
                                .val(value)
                                .attr("title", "")
                                .addClass("custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left")
                                .autocomplete({
                            delay: 0,
                            minLength: 0,
                            source: $.proxy(this, "_source")
                        })
                                .tooltip({
                            tooltipClass: "ui-state-highlight"
                        });

                        this._on(this.input, {
                            autocompleteselect: function(event, ui) {
                                ui.item.option.selected = true;
                                this._trigger("select", event, {
                                    item: ui.item.option
                                });
                            },
                            autocompletechange: "_removeIfInvalid"
                        });
                    },
                    _createShowAllButton: function() {
                        var input = this.input,
                                wasOpen = false;

                        $("<a>")
                                .attr("tabIndex", -1)
                                .attr("title", "Show All Items")
                                .tooltip()
                                .appendTo(this.wrapper)
                                .button({
                            icons: {
                                primary: "ui-icon-triangle-1-s"
                            },
                            text: false
                        })
                                .removeClass("ui-corner-all")
                                .addClass("custom-combobox-toggle ui-corner-right")
                                .mousedown(function() {
                            wasOpen = input.autocomplete("widget").is(":visible");
                        })
                                .click(function() {
                            input.focus();

                            // Close if already visible
                            if (wasOpen) {
                                return;
                            }

                            // Pass empty string as value to search for, displaying all results
                            input.autocomplete("search", "");
                        });
                    },
                    _source: function(request, response) {
                        var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
                        response(this.element.children("option").map(function() {
                            var text = $(this).text();
                            if (this.value && (!request.term || matcher.test(text)))
                                return {
                                    label: text,
                                    value: text,
                                    option: this
                                };
                        }));
                    },
                    _removeIfInvalid: function(event, ui) {

                        // Selected an item, nothing to do
                        if (ui.item) {
                            return;
                        }

                        // Search for a match (case-insensitive)
                        var value = this.input.val(),
                                valueLowerCase = value.toLowerCase(),
                                valid = false;
                        this.element.children("option").each(function() {
                            if ($(this).text().toLowerCase() === valueLowerCase) {
                                this.selected = valid = true;
                                return false;
                            }
                        });

                        // Found a match, nothing to do
                        if (valid) {
                            return;
                        }

                        // Remove invalid value
                        this.input
                                .val("")
                                .attr("title", value + " didn't match any item")
                                .tooltip("open");
                        this.element.val("");
                        this._delay(function() {
                            this.input.tooltip("close").attr("title", "");
                        }, 2500);
                        this.input.data("ui-autocomplete").term = "";
                    },
                    _destroy: function() {
                        this.wrapper.remove();
                        this.element.show();
                    }
                });
            })(jQuery);

            $(function() {
                var clientEntityOptions = '', interOptions = '';
                function assignValuesClientMail() {

                    $('.client_mail').html(clientEntityOptions);
                    $('.client_mail').append(interOptions);
                    var foundedinputs1 = [];
                    $("#cli_mail_to option").each(function() {
                        if ($.inArray(this.value, foundedinputs1) != -1)
                            $(this).remove();
                        foundedinputs1.push(this.value);
                    });
                    var foundedinputs2 = [];
                    $("#cli_mail_forward option").each(function() {
                        if ($.inArray(this.value, foundedinputs2) != -1)
                            $(this).remove();
                        foundedinputs2.push(this.value);
                    });
                    var foundedinputs3 = [];
                    $("#cli_mail_instructed option").each(function() {
                        if ($.inArray(this.value, foundedinputs3) != -1)
                            $(this).remove();
                        foundedinputs3.push(this.value);
                    });
                    return false;
                }
                $("#applicant").combobox({
                    select: function(event, ui) {
                        var app_id = $(this).val();
                        $.ajax({
                            type: 'post',
                            url: 'check_app_cli_code.php?applicant_id=' + app_id,
                            data: $(this).serialize(),
                            success: function(data) {
                                if (data) {
                                    $('.applicant_ref_no').val(data);
                                    $('#code_error_app').html('').removeClass('error');
                                    $('#submit_app').removeAttr('disabled');
                                }
                            }
                        });
                        $.ajax({
                            type: 'post',
                            url: 'check_email_code.php?email_id=' + app_id,
                            data: $(this).serialize(),
                            success: function($AppemailOpt) {
                                if ($AppemailOpt) {
                                    clientEntityOptions = $AppemailOpt;
                                    assignValuesClientMail();
                                }
                            }
                        });
                    }
                });

                $("#client").combobox({
                    select: function(event, ui) {
                        var app_id = $(this).val();
                        $.ajax({
                            type: 'post',
                            url: 'check_app_cli_code.php?applicant_id=' + app_id,
                            data: $(this).serialize(),
                            success: function(data) {
                                if (data) {
                                    $('.client_ref_no').val(data);
                                    $('#code_error_cli').html('').removeClass('error');
                                    $('#submit_app').removeAttr('disabled');
                                }
                            }
                        });
                        $.ajax({
                            type: 'post',
                            url: 'check_email_code.php?email_id=' + app_id,
                            data: $(this).serialize(),
                            success: function($CliemailOpt) {
                                if ($CliemailOpt) {
                                    interOptions = $CliemailOpt;
                                    assignValuesClientMail();
                                }
                            }
                        });
                    }
                });
                $("#applicant_ref_no").keyup(function() {
                    this.value = this.value.toUpperCase();
                    var app_ref_id = $(this).val().toUpperCase();
                    $.ajax({
                        type: 'post',
                        url: 'check_app_cli_code_again.php?applicant_ref_id=' + app_ref_id,
                        data: $(this).serialize(),
                        success: function(data) {
                            if (data) {
                                $("#applicant").val(data);
                                $showTXT = $("#applicant option:selected").text();
                                $("#applicant").next().children('input ').val($showTXT);
                                $('#code_error_app').html('').removeClass('error');
                                $('#submit_app').removeAttr('disabled');
                            } else {
                                $('#code_error_app').html('This code does not exist, Please enter valid code').addClass('error');
                                $('#submit_app').attr('disabled', 'disabled');
                            }
                        }
                    });
                    $.ajax({
                        type: 'post',
                        url: 'check_email_code_again.php?email_code=' + app_ref_id,
                        data: $(this).serialize(),
                        success: function($AppemailOptCode) {
                            if ($AppemailOptCode) {
                                clientEntityOptions = $AppemailOptCode;
                                assignValuesClientMail();
                            }
                        }
                    });
                });
                $("#client_ref_no").keyup(function() {
                    this.value = this.value.toUpperCase();
                    var app_ref_id = $(this).val().toUpperCase();
                    $.ajax({
                        type: 'post',
                        url: 'check_app_cli_code_again.php?applicant_ref_id=' + app_ref_id,
                        data: $(this).serialize(),
                        success: function(data) {
                            if (data) {
                                $("#client").val(data);
                                $showTXT = $("#client option:selected").text();
                                $("#client").next().children('input ').val($showTXT);
                                $('#code_error_cli').html('').removeClass('error');
                                $('#submit_app').removeAttr('disabled');
                            } else {
                                $('#code_error_cli').html('This code does not exist, Please enter valid code').addClass('error');
                                $('#submit_app').attr('disabled', 'disabled');
                            }
                        }
                    });
                    $.ajax({
                        type: 'post',
                        url: 'check_email_code_again.php?email_code=' + app_ref_id,
                        data: $(this).serialize(),
                        success: function($CliemailOptCode) {
                            if ($CliemailOptCode) {
                                interOptions = $CliemailOptCode;
                                assignValuesClientMail();
                            }
                        }
                    });
                });
                $('#history_submit').click(function() {
                    var history_sheet_val = $("#history_sheet").val();
                    if ($("#history_date").val() == '' && $("#history_name").val() == '' && $("#history_sheet_status").val() == '')
                        return false;
                    var history_firsttime = ($("#history_sheet").val().length);
                    if (history_firsttime > '0') {
                        var blank = "\n\====================\n\ ";
                    } else {
                        blank = '';
                        history_sheet_val = '';
                    }
                    var x = $("#history_sheet_status").val();
                    var y = $("#history_date").val();
                    var z = $("#history_name").val();

                    $historyHtmlStucture = '<textarea  rows="7" cols="40" name="history_sheet" id="history_sheet" class="">' + history_sheet_val + blank + x + '&nbsp;' + z + '&nbsp;' + y + '</textarea>';
                    $("#history_txt textarea").remove();
                    $("#history_txt").html($historyHtmlStucture);

                    $("#history_sheet_status").val('');
                    $("#history_date").val('');
                    $("#history_name").val('');
                });
                $('#file_type').change(function() {
                    var fl = $("#file_type").val();
                    $("#alg_file_tyle").val(fl);
                });
                $('#app_no,#classes,#title,#pr,#client_ref_no,#applicant_ref_no').keyup(function() {
                    var apn = $("#app_no").val();
                    var cls = $("#classes").val();
                    var tit = $("#title").val();
                    var pr_txt = $("#pr").val();
                    var cli_ref = $("#client_ref_no").val();
                    var app_ref = $("#applicant_ref_no").val();
                    $(".client_ref_no").val(cli_ref);
                    $(".applicant_ref_no").val(app_ref);
                    $("#alg_apln").val(apn);
                    $("#alg_class").val(cls);
                    $("#alg_title").val(tit);
                    $("#alg_pr").val(pr_txt);
                });
                var startingNo = 0;
                var $node = "";
                for (varCount = '<?php echo $count_value ?>'; varCount <= startingNo; varCount++) {
                    //var displayCount = varCount + 1;
                    //$node += '<p><label for="var' + displayCount + '">Variable ' + displayCount + ': </label><input type="text" name="var' + displayCount + '" id="var' + displayCount + '"><span class="removeVar"></span></p>';
                }
                $('.status').prepend($node);

                $('.form').live('click', '.removeVar', function() {
                    $(this).parent().remove();
                    varCount--;
                    $('#total_status').val(varCount);
                });
                $('#priority').change(function() {
                    var pr_priority = $("#priority").val();
                    var MyFileType = $("input:radio:checked").val();
                    var a = "1";
                    var pr_priority_new = parseInt(a, 10) + parseInt(pr_priority, 10);
                    if (MyFileType == 'PATN NP') {
                        $filetypenew = pr_priority_new;
                    } else {
                        $filetypenew = pr_priority;
                    }
                    $('#priority_options').html('');
                    $('#priority_options_file_type').html('');
                    $('#pr_span_id').remove();
                    $('#pr_file_type_id').remove();
                    for (i = 1; i <= $filetypenew; i++) {
                        $('#priority_options').append('<input type="text" id="pr' + i + '" name="pr' + i + '"/><input type="text" id="p_d' + i + '" name="p_d' + i + '" /> <hr>');
                        $("#p_d" + i).datepicker({
                            changeMonth: true,
                            changeYear: true,
                            dateFormat: "yy-mm-dd"
                        });
                        $('#priority_options_file_type').append('<input type="text" class="pr_file' + i + '" id="pr_file' + i + '" name="pr_file' + i + '" readonly /><hr>');
                    }
                    if (pr_priority == '') {
                        $('#alg_pr_type').val('');
                        $('#alg_pr_type').hide();
                    } else {
                        $('#alg_pr_type').val(pr_priority + 'PR');
                    }
                });
<?php for ($j = 1; $j <= 11; $j++) { ?>
                    $("#pr<?php echo $j ?>").live('change', function() {
                        $("#pr_file<?php echo $j ?>").val($("#pr<?php echo $j ?>").val());
                    });
<?php } ?>
                $('#fill_date').live('click', function() {
                    var pr_priority = $("#priority").val();
                    var a = "1";
                    var pr_priority_new = parseInt(a, 10) + parseInt(pr_priority, 10);
                    var $date_priority = [];
                    var $date_number;
                    for (var $a = 1; $a <= pr_priority_new; $a++) {
                        if ($("#p_d" + $a).val() != '') {
                            $date_number = $("#p_d" + $a).val();
                            $date_priority[$a] = $date_number;
                        }
                    }
                    $date_priority.sort();
                    var pr_filing = $("#filing_date").val();
                    var new_date = $date_priority[0];

//                    if (pr_filing < new_date) {
//                        $("#priority_date").val(pr_filing);
//                    } else {
//                        $("#priority_date").val(new_date);
//                    }
                    if (pr_filing < new_date) {
                        $("#priority_date").val(pr_filing);
                        $("#priority_ref_no").val(pr_filing);
                    } else if (new_date < pr_filing && new_date != '') {
                        $("#priority_date").val(new_date);
                        $("#priority_ref_no").val(new_date);
                    } else {
                        $("#priority_date").val(pr_filing);
                        $("#priority_ref_no").val(pr_filing);
                    }
                });

                $('#addVar').live('click', function() {

                    varCount++;
                    $('#total_status').val(varCount);

                    $node = '<p><select name="status' + varCount + '" id="status' + varCount + '"><option value="select">Select</option><?php $obj->show_status(); ?></select>';
                    $node += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Effective On : &nbsp;&nbsp;<input type="text" autocomplete="off" name="status_date' + varCount + '" id="status_date' + varCount + '">&nbsp;<input type="button" value="Add to history" class="status_history" rel="' + varCount + '"> ';
                    $node += '<span class="removeVar"></span></p>';
                    $(this).parent().before($node);
                    $("#status_date" + varCount).datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: "yy-mm-dd"
                    });
                    status_history();
                });

                $('.removeParent').on('click', function() {
                    $(this).parent().remove();
                });
                $('#addVaralert').on('click', function() {
                    varCount++;
                    $('#total_alert').val(varCount);
                    $node = '<div><input type="text" name="alert[]" id="alert' + varCount + '" autocomplete="off" />';
                    $node += '&nbsp;';
                    $node += '<input id="alertdate' + varCount + '"  name="alertdate[]" placeholder="Alert Date" class="alert_datepicker"/>';
                    $node += '<input id="alert_name' + varCount + '" name="alert_name[]" placeholder="name">';
                    $node += '<span class="removeVar"></span>&nbsp; <a href="javascript:void(0);" class="removeParent"><img class="icon" src="images/delete.png" alt="Del" title="Delete"></a></div>';
                    $node += '<br/>';
                    $(this).parent().before($node);
                    $(".alert_datepicker").datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: "yy-mm-dd"
                    });
                    $('.removeParent').on('click', function() {
                        $(this).parent().remove();
                    });

                });

                $(".alert_datepicker").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "yy-mm-dd"
                });
                function status_history() {
                    $('.status_history').on('click', function() {
                        $rel = $(this).attr('rel');
                        var history_sheet_val = $("#history_sheet").val();
                        if ($("#status" + $rel).val() == '' || $("#status_date" + $rel).val() == '')
                            return false;
                        var history_firsttime = ($("#history_sheet").val().length);
                        if (history_firsttime > '0') {
                            var blank = "\n\====================\n\ ";
                        } else {
                            blank = '';
                            history_sheet_val = '';
                        }

                        var x = $("#status" + $rel + "  option:selected").text();
                        var q = 'Status (Effective Date): ';
                        var y = $("#status_date" + $rel + "").val();
                        $historyHtmlStucture = '<textarea rows="7" cols="40" name="history_sheet" id="history_sheet">' + history_sheet_val + blank + q + x + '&nbsp;' + y + '</textarea>';
                        $("#history_txt textarea").remove();
                        $("#history_txt").html($historyHtmlStucture);
                        $(this).hide();
                    });
                }
                status_history();
                $('#submit_app').click(function() {
                    $('.invalid').removeClass('invalid');
                    var priority_ref_no = $('#priority_ref_no').val();
                    var year_ref_no = $('#year_ref_no').val();
                    if (priority_ref_no == "") {
                        $('#priority_ref_no').addClass('invalid');
                        $('#priority_ref_no').focus();
                        return false;
                    }
                    if (year_ref_no == "") {
                        $('#year_ref_no').addClass('invalid');
                        $('#year_ref_no').focus();
                        return false;
                    }
                });
//           
            });
        </script>
        <script>
            $(function() {
                $("<?php
for ($dcount = 1; $dcount <= $k; $dcount++) {
    echo '#p_d' . $dcount . ',';
}
echo '#p_d' . $dcount;
?>").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "yy-mm-dd"
                });
            });
        </script>


        <style>
            .custom-combobox {
                position: relative;
                display: inline-block;
            }
            .custom-combobox-toggle {
                position: absolute;
                top: 0;
                bottom: 0;
                margin-left: -1px;
                padding: 0;
                /* support: IE7 */
                *height: 1.7em;
                *top: 0.1em;
            }
            .custom-combobox-input {
                margin: 0;
                padding: 0.3em;
            }
            <?php if ($_SESSION['role'] != 'associate') { ?>
            #instructed,#forwardto,#mailto{display: none}
            <?php } ?>
        </style>

    </body>
</html>