<?php
require_once 'include/session.php';
include "class.docket.php";
$obj = new docket();
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
            #addVar,#addStatusRecordals{background: none repeat scroll 0 0 #000000;color: #FFFFFF;padding: 3px;cursor: pointer;}
            .removeStatusRecordals {background: none repeat scroll 0 0 #8d8d8d;color: #FFFFFF;padding: 3px;cursor: pointer;}
            .custom-combobox {position: relative;display: inline-block;}
            .custom-combobox-toggle {position: absolute;top: 0;bottom: 0;margin-left: -1px;padding: 0;/* support: IE7 */*height: 1.7em;*top: 0.1em;}
            .custom-combobox-input {margin: 0;padding: 0.3em;}
            .ui-state-default .ui-icon {background-image: url("images/ui-icons_888888_256x240.png");}
            .custom-combobox input { width:250px;}
            #addVaralert{background: none repeat scroll 0 0 #000000;color: #FFFFFF;padding: 3px;cursor: pointer;}
        </style>
    </head>
    <?php
    if ($_GET['action'] == 'delete') {
        $id = $_REQUEST['id'];
        $obj->delete_application($id);
    }
    ?>
    <?php
    if ($_POST) {
        $id = $_POST['id'];
        $file_type = $_POST['file_type'];
        $application_no = $_POST['app_no'];
        $mark = addslashes($_POST['mark']);
        $image_named = $_POST['file'];
        $class = $_POST['classes'];
        $classes = str_replace(' ', ',', $class);
        $user = $_POST['user_proposed'];
        $filing_date = $_POST['filing_date'];

        $applicant = $_POST['applicant'];
        $client = $_POST['client'];

        $priority_date = $_POST['priority_date'];
        $jurisdiction = $_POST['jurisdiction'];
        $goods_services = $_POST['goods_services'];
        $status = $_POST['status'];
        $status_date = $_POST['status_date'];
        $status2 = $_POST['status2'];
        $status2_date = $_POST['status2_date'];
        $status3 = $_POST['status3'];
        $status3_date = $_POST['status3_date'];
        $status4 = $_POST['status4'];
        $status4_date = $_POST['status4_date'];
        $status5 = $_POST['status5'];
        $status5_date = $_POST['status5_date'];
        $pend_rec_cor = $_POST['pend_rec_cor'];
        $history_sheet = addslashes($_POST['history_sheet']);
        $cl_ref_no = $_POST['cl_ref_no'];

        $alg_ref_no = $_POST['alg_ref_no'];
        $applicant_ref_no = $_POST['applicant_ref_no'];
        $client_ref_no = $_POST['client_ref_no'];
        $priority_ref_no = $_POST['priority_ref_no'];
        $year_ref_no = $_POST['year_ref_no'];

        //$obj->update_application($id, $file_type, $application_no, $mark, $image_named, $classes, $user, $filing_date, $applicant, $client, $priority_date, $jurisdiction, $goods_services, $pend_rec_cor, $history_sheet, $cl_ref_no, $alg_ref_no, $applicant_ref_no, $client_ref_no, $priority_ref_no, $year_ref_no);
        //$status, $status_date, $status2, $status2_date, $status3, $status3_date, $status4, $status4_date,$status5, $status5_date,
        //function update_application($id, $file_type, $application_no, $mark, $image_named, $classes, $user, $filing_date, $applicant, $client, $priority_date, $jurisdiction, $goods_services, $pend_rec_cor, $history_sheet, $cl_ref_no, $alg_ref_no, $applicant_ref_no, $client_ref_no, $priority_ref_no, $year_ref_no) {

        $file = $_FILES['file'];
        $image_name = $file['name'];
        $type = $file['type'];
        $size = $file['size'];
        $tmppath = $file['tmp_name'];
        move_uploaded_file($tmppath, 'upload/' . $image_name);
        if ($image_name != '') {
            $sql = "UPDATE application SET file_type='$file_type',application_no='$application_no',mark='$mark',images='$image_name',classes='$classes',user_proposed='$user',filing_date='$filing_date',applicant='$applicant',client='$client',priority_date='$priority_date',jurisdiction='$jurisdiction',goods_services='$goods_services',pending_record='$pend_rec_cor',history='$history_sheet',cl_ref_no='$cl_ref_no' WHERE id='$id'";
            mysql_query($sql);
        } else {
            $sql2 = "UPDATE application SET file_type='$file_type', application_no='$application_no',mark='$mark',images='$image_name',classes='$classes',user_proposed='$user',filing_date='$filing_date',applicant='$applicant',client='$client',priority_date='$priority_date',jurisdiction='$jurisdiction',goods_services='$goods_services',pending_record='$pend_rec_cor',history='$history_sheet',cl_ref_no='$cl_ref_no' WHERE id='$id'";
//exit();

            mysql_query($sql2);
        }

        $sqlCliMailDel = "delete from users_cli_mails where app_id='$id'";
        mysql_query($sqlCliMailDel);
        $cli_mail_to = implode(', ', (array) $_POST['cli_mail_to']);
        $cli_mail_forward = implode(', ', (array) $_POST['cli_mail_forward']);
        $cli_mail_instructed = implode(', ', (array) $_POST['cli_mail_instructed']);
        $sql_cli_email = "insert into users_cli_mails(app_id,client_entity_id,inter_entity_id,cli_mail_to,cli_mail_forward,cli_mail_instructed)values('$id','$applicant','$client','$cli_mail_to','$cli_mail_forward','$cli_mail_instructed')";
        mysql_query($sql_cli_email);
        $sql3 = "delete from year_serialno where alg_app_id='$id'";
        mysql_query($sql3);
        $sql4 = "insert into year_serialno(alg_app_id,alg_doc_name,alg_applicant_code,alg_client_code,alg_priority_date,alg_serialno,all_alg_data)values('$id','$alg_ref_no','$applicant_ref_no','$client_ref_no','$priority_ref_no','$year_ref_no','$alg_ref_no/$applicant_ref_no-$client_ref_no/" . addslashes(date("ymd", strtotime($priority_ref_no))) . "$year_ref_no')";
        mysql_query($sql4);
        /* $sql5 = "delete from alg_file_type where alg_file_app_id='$id'";
          mysql_query($sql5);
          $sql6 = "insert into alg_file_type(alg_file_app_id,alg_file_type,alg_apln,alg_class,alg_mark,all_alg_file_data)values('$id','$file_type','$application_no','$classes','$mark','$file_type $application_no-$classes $mark')";
          mysql_query($sql6);
         */
        $alg_forum = $_POST['alg_forum'];
        $all_alg_file_data = $alg_forum . "_" . $file_type . " Regn " . $application_no . "-" . $classes . " " . $mark;
        $sql6 = "UPDATE alg_file_type SET alg_forum='$alg_forum' , alg_file_type='$file_type',alg_apln='$application_no',alg_class='$classes',alg_mark='$mark',all_alg_file_data='$all_alg_file_data'  WHERE alg_file_app_id=$id;";
        mysql_query($sql6);
        if (mysql_affected_rows() == 0) {
            $sql6 = "insert into alg_file_type(alg_file_app_id,alg_file_type,alg_apln,alg_class,alg_mark,all_alg_file_data, alg_forum)values('$id','$file_type','$application_no','$classes','$mark','$file_type $application_no-$classes $mark', '$alg_forum')";
            mysql_query($sql6);
        }

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
        $total_status_recordals = $_POST['total_status_recordals'];
        $sql_delete_status_recordals = "delete from status_recordals where status_recordals_app_id='$id'";
        mysql_query($sql_delete_status_recordals);
        for ($t = 1; $t <= $total_status_recordals; $t++) {
            $status_recordals = $_POST['status_recordals' . $t];
            $status_recordals_for_16tm = $_POST['status_recordals_for_16tm' . $t];
            $pick_file = $_POST['pick_file' . $t];
            $status_recordals_date = $_POST['status_recordals_date' . $t];
            if ($status_recordals != 'select' && $status_recordals != '') {
                $sql_status_recordals = "insert into status_recordals(status_recordals_app_id,status_recordals,status_recordals_for_16tm,
                    pick_file_textbox,status_recordals_date)values('" . $id . "','" . $status_recordals . "','" . $status_recordals_for_16tm . "',
                        '" . $pick_file . "','" . $status_recordals_date . "')";
                mysql_query($sql_status_recordals);
            }
        }



        $i = 0;
        mysql_query("DELETE FROM `alert` WHERE status=0 and fid=$id") || die(mysql_error());
        foreach ($_POST['alert'] as $alert) {
            $sqlAlert = "INSERT INTO alert (fid,alert,alert_name,toa) VALUES ('$id', '$alert','" . $_POST['alert_name'][$i] . "','" . $_POST['alertdate'][$i] . "');";
            mysql_query($sqlAlert);
            $i++;
        }


        $sql1 = "insert into log (user_id,action,comment) values('" . $_SESSION['id'] . "','update','application_id=$id')";
        mysql_query($sql1);


        //echo '<script>window.location.href="update_application.php?http://dts.algindia.in/dts/maintenance/update_application.php?action=edit&id='+$_REQUEST['id']+'</script>';
        echo "<script>
			window.location.href='update_application.php?action=edit&id=$id&sid=$sid'
			 </script>";
        die();
    }

    if ($_GET['action'] == 'edit') {
        $id = $_GET['id'];
        $obj->edit_application($id);
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
                    <tr> <td> File Type :</td> <td><select  name="file_type" id="file_type">
                                <option value="none">--Select--</option>
                                <?php
                                $files = $obj->file_type;
                                ?>
                                <option <?php echo ($files == 'TM-1') ? 'selected="selected"' : '' ?> >TM-1</option>
                                <option <?php echo ($files == 'TM-2') ? 'selected="selected"' : '' ?> >TM-2</option>
                                <option <?php echo ($files == 'TM-3') ? 'selected="selected"' : '' ?> >TM-3</option>
                                <option <?php echo ($files == 'TM-4') ? 'selected="selected"' : '' ?> >TM-4</option>
                                <option <?php echo ($files == 'TM-8') ? 'selected="selected"' : '' ?> >TM-8</option>
                                <option <?php echo ($files == 'TM-37') ? 'selected="selected"' : '' ?> >TM-37</option>
                                <option <?php echo ($files == 'TM-51') ? 'selected="selected"' : '' ?> >TM-51</option>
                                <option <?php echo ($files == 'TM-52') ? 'selected="selected"' : '' ?> >TM-52</option>
                                <option <?php echo ($files == 'TM-64') ? 'selected="selected"' : '' ?> >TM-64</option>
                                <option <?php echo ($files == 'TM-65') ? 'selected="selected"' : '' ?> >TM-65</option>
                                <option <?php echo ($files == 'TM-66') ? 'selected="selected"' : '' ?> >TM-66</option>
                                <option <?php echo ($files == 'TM-67') ? 'selected="selected"' : '' ?> >TM-67</option>
                                <option <?php echo ($files == 'TM-68') ? 'selected="selected"' : '' ?> >TM-68</option>
                                <option <?php echo ($files == 'TM-69') ? 'selected="selected"' : '' ?> >TM-69</option>
                            </select></td></tr>
                    <tr>
                        <td> Registration No. :</td><td>
                            <input type="text" name="app_no" id="app_no" value="<?php echo $obj->application_no; ?>" autocomplete="off" />
                        </td>
                    </tr>
                    <tr>
                        <td> Mark :</td><td>
                            <input type="text" size="50px" name="mark" id="mark" value="<?php echo $obj->mark; ?>" autocomplete="off" />
                            &nbsp;&nbsp;OR&nbsp;&nbsp;
                            <input type="file" name="file" />
                            &nbsp;&nbsp;<?php if ($obj->images != '') {
                                    ?><a href="upload/<?php echo $obj->images; ?>" onClick="return popitup(this.href)" target="_blank"><img src='/doc/images/preview_icon.jpg' height="30px" width="30px"></a><?php } ?></td>
                    </tr>
                    <tr>
                        <td> Class(es) :</td><td>
                            <input type="text" name="classes" id="classes" value="<?php echo $obj->classes; ?>" autocomplete="off" />
                        </td>
                    </tr>
                    <tr>
                        <td> User :</td><td>
                            <?php if ($obj->user == 0000 - 00 - 00) { ?>
                                <input type="text" name="user_proposed" id="user_proposed" autocomplete="off" style="display:none;" value="<?php
                                $user_dt = $obj->user;
                                list($y, $m, $d) = explode('-', $user_dt);
                                $user_dt_format = "$m/$d/$y";
                                echo $user_dt_format = '';
                                ?>" />
                                   <?php } else { ?>
                                <input type="text" name="user_proposed" id="user_proposed" autocomplete="off" value="<?php
                                echo $user_dt = $obj->user;
//                                list($y, $m, $d) = explode('-', $user_dt);
//                                $user_dt_format = "$m/$d/$y";
//                                echo $user_dt_format
                                ?>" />
                                   <?php } ?>
                            <input type="checkbox" name="proposed" id="proposed" onClick="pro();" <?php echo ($obj->user == 0000 - 00 - 00) ? 'checked="checked"' : ''; ?>>Proposed to be used
                        </td>
                    </tr>
                    <tr>
                        <td> Filing Date :</td><td>
                            <input type="text" name="filing_date" id="filing_date" autocomplete="off" value="<?php
                            echo $fil_dt = $obj->filing_date;
                            ?>" />
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
                    <tr><td>To</td>
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
                    <tr><td>Forward To</td>
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
                    <tr><td>Instructed By</td>
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
                    <tr>
                        <td> Priority Date :</td><td>
                            <input type="text" name="priority_date" id="priority_date" autocomplete="off" value="<?php
                            echo $prior_dt = $obj->priority_date;
                            ?>" />
                            <input type="button" id="fill_date" value="Fill Same As Filling Date">
                        </td>
                    </tr>
                    <tr>
                        <td> Forum :</td><td>
                            <?php
                            switch ($obj->jurisdiction) {
                                case 'New Delhi':
                                    $forum = "DEL";
                                    break;

                                case 'Mumbai':
                                    $forum = "MUM";
                                    break;


                                case 'Ahmedabad':
                                    $forum = "AMD";
                                    break;

                                case 'Kolkata':
                                    $forum = "KOL";
                                    break;

                                case 'Chennai':
                                    $forum = "CHE";
                                    break;


                                default:
                                    $forum = $obj->jurisdiction;
                                    break;
                            }
                            ?>
                            <select  name="jurisdiction" id="jurisdiction" >
                                <option value="select">--Select--</option>
                                <option value="DEL" <?php echo ($forum == 'DEL') ? ' selected="selected"' : ''; ?>>New Delhi</option>
                                <option value="MUM" <?php echo ($forum == 'MUM') ? ' selected="selected"' : ''; ?>>Mumbai</option>
                                <option value="AMD" <?php echo ($forum == 'AMD') ? ' selected="selected"' : ''; ?>>Ahmedabad</option>
                                <option value="KOL" <?php echo ($forum == 'KOL') ? ' selected="selected"' : ''; ?>>Kolkata</option>
                                <option value="CHE" <?php echo ($forum == 'CHE') ? ' selected="selected"' : ''; ?>>Chennai</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td> Goods/Services :</td><td>						<textarea  rows="7" cols="40" name="goods_services" id="" class=""><?php echo $obj->goods_services; ?></textarea></td>
                    </tr>
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
                    <?php include "status_recordals.php"; ?>
                    </td></tr>
                    <tr class="">
                        <td style="vertical-align: top;"> Pending Recordals/Corrections:</td><td><textarea rows="7" cols="40" name="pend_rec_cor" id="pend_rec_cor" class=""><?php echo $obj->pend_rec_cor; ?> </textarea></td>
                    </tr>
                    <tr class="">
                        <td style="vertical-align: top;"> History Sheet :</td><td>
                            <?php $obj->history_sheet_status(); ?>
                            <input type="text" id="history_name" autocomplete="off">&nbsp;
                            <input type="text" id="history_date" autocomplete="off">
                            <input type="button" value="Submit" id="history_submit">
                            <span id="history_txt"><textarea  rows="7" cols="40" name="history_sheet" id="history_sheet" class=""><?php echo strip_tags($obj->history_sheet); ?></textarea></span></td>
                    </tr>
                    <tr class="alert_p"> <td> Alert :</td> <td>
                            <?php
                            $fid = $_GET['id'];
                            $increment = 0;
                            $sql = "select `alert`, `alert_name`,`toa` from `alert` where status=0 and fid='$fid'";
                            $res = mysql_query($sql);
                            while ($row = mysql_fetch_array($res)) {
                                $alert = $row['alert'];
                                $alertdate = $row['toa'];
                                $alertname = $row['alert_name'];
                                echo '<div><input type="text" name="alert[]" id="alert" value="' . $alert . '" autocomplete="off" readonly/>&nbsp;';
                                echo '<input id="alertdate' . $increment . '"  name="alertdate[]" placeholder="Alert Date" value="' . $alertdate . '"  readonly>';
                                echo '<input id="alert_name' . $increment . '"  name="alert_name[]" placeholder="name" value="' . $alertname . '"  readonly>';
                                if ($_SESSION['role'] == 'admin') {
                                    echo '&nbsp; <a href="javascript:void(0);" class="removeParent"><img class="icon" src="images/delete.png" alt="Del" title="Delete"></a>';
                                }
                                echo '</div>';
                                $increment++;
                            }
                            ?>
                            <?php if ($_SESSION['role'] == 'admin') { ?><p><span id="addVaralert">Add Alert</span></p><?php } ?>
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
                        $alg_forum = $get4['alg_forum'];
                        $alg_file_type = $get4['alg_file_type'];
                        $alg_apln = $get4['alg_apln'];
                        $alg_class = $get4['alg_class'];
                        $alg_mark = $get4['alg_mark'];
                        $sid = mt_rand(1, 1000000);
                    }
                    ?>
                    <tr> <td> ALG File :</td> <td>
                            Forum: <input type="text" size="10px" name="alg_forum" id="alg_forum" value="<?php echo $alg_forum; ?>"  readonly />
                            File Type : <input type="text" name="alg_file_tyle" id="alg_file_tyle" value="<?php echo $alg_file_type; ?>" readonly />
                            Regn : <input type="text" name="alg_apln" id="alg_apln" value="<?php echo $alg_apln; ?>" readonly /><br>
                            Class : <input type="text" name="alg_class" id="alg_class" value="<?php echo $alg_class; ?>" readonly />
                            Mark : <input type="text" name="alg_mark" id="alg_mark" value="<?php echo $alg_mark; ?>" readonly />
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
                <table align="center">
                    <caption>Past Notifications</caption>
                    <tr><th>Date of Generation</th><th>Notification Name</th><th>Date of Deletion</th><th>Action</th></tr>
                    <?php
                    $status_sql = mysql_query("SELECT n.toe, n.notify_status, s.status_name, n.snooze FROM `notifications` n, `status` s where app_id='" . $_GET['id'] . "' and n.status_id=s.id");
                    $ttotalrow = 0;
                    while ($status_row = mysql_fetch_assoc($status_sql)) {
                        $action = ($status_row['notify_status'] == 0) ? '' : (($status_row['notify_status'] = 1) ? 'Updated' : 'Deleted');
                        echo '<tr><td>' . $status_row['toe'] . '</td><td>' . $status_row['status_name'] . '</td><td>' . (($status_row['notify_status'] == 0) ? 'Unread' : $status_row['snooze'] ) . '</td><td>' . $action . '</td></tr>';
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
                echo '<a href="add_application.php" style="float: left;">New Application</a>';
                echo '<a href="applications_list.php" style="float: left;margin-left:140px;">View Application</a>';
                echo '<a href="welcome.php" style="float: right;">Close Application</a>';
                ?>
            </form>
        </div>

        <script src="js/combobox.js"></script>
        <script>
                                $(function () {
                                    var clientEntityOptions = '', interOptions = '';
                                    function assignValuesClientMail() {

                                        $('.client_mail').html(clientEntityOptions);
                                        $('.client_mail').append(interOptions);
                                        var foundedinputs1 = [];
                                        $("#cli_mail_to option").each(function () {
                                            if ($.inArray(this.value, foundedinputs1) != -1)
                                                $(this).remove();
                                            foundedinputs1.push(this.value);
                                        });
                                        var foundedinputs2 = [];
                                        $("#cli_mail_forward option").each(function () {
                                            if ($.inArray(this.value, foundedinputs2) != -1)
                                                $(this).remove();
                                            foundedinputs2.push(this.value);
                                        });
                                        var foundedinputs3 = [];
                                        $("#cli_mail_instructed option").each(function () {
                                            if ($.inArray(this.value, foundedinputs3) != -1)
                                                $(this).remove();
                                            foundedinputs3.push(this.value);
                                        });
                                        return false;
                                    }
                                    $("#applicant").combobox({
                                        select: function (event, ui) {
                                            var app_id = $(this).val();
                                            $.ajax({
                                                type: 'post',
                                                url: 'check_app_cli_code.php?applicant_id=' + app_id,
                                                data: $(this).serialize(),
                                                success: function (data) {
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
                                                success: function ($AppemailOpt) {
                                                    if ($AppemailOpt) {
                                                        clientEntityOptions = $AppemailOpt;
                                                        assignValuesClientMail();
                                                    }
                                                }
                                            });
                                        }
                                    });
                                    $("#client").combobox({
                                        select: function (event, ui) {
                                            var app_id = $(this).val();
                                            $.ajax({
                                                type: 'post',
                                                url: 'check_app_cli_code.php?applicant_id=' + app_id,
                                                data: $(this).serialize(),
                                                success: function (data) {
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
                                                success: function ($CliemailOpt) {
                                                    if ($CliemailOpt) {
                                                        interOptions = $CliemailOpt;
                                                        assignValuesClientMail();
                                                    }
                                                }
                                            });
                                        }
                                    });
                                    $("#applicant_ref_no").keyup(function () {
                                        this.value = this.value.toUpperCase();
                                        var app_ref_id = $(this).val().toUpperCase();
                                        $.ajax({
                                            type: 'post',
                                            url: 'check_app_cli_code_again.php?applicant_ref_id=' + app_ref_id,
                                            data: $(this).serialize(),
                                            success: function (data) {
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
                                            success: function ($AppemailOptCode) {
                                                if ($AppemailOptCode) {
                                                    clientEntityOptions = $AppemailOptCode;
                                                    assignValuesClientMail();
                                                }
                                            }
                                        });
                                    });
                                    $("#client_ref_no").keyup(function () {
                                        this.value = this.value.toUpperCase();
                                        var app_ref_id = $(this).val().toUpperCase();
                                        $.ajax({
                                            type: 'post',
                                            url: 'check_app_cli_code_again.php?applicant_ref_id=' + app_ref_id,
                                            data: $(this).serialize(),
                                            success: function (data) {
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
                                            success: function ($CliemailOptCode) {
                                                if ($CliemailOptCode) {
                                                    interOptions = $CliemailOptCode;
                                                    assignValuesClientMail();
                                                }
                                            }
                                        });
                                    });
                                    $('#fill_date').click(function () {
                                        var a = $("#filing_date").val();
                                        $("#priority_date").val(a);
                                        $("#priority_ref_no").val(a);
                                    });
                                    $('#priority_date').change(function () {
                                        var priority_date_ref = $("#priority_date").val();
                                        $("#priority_ref_no").val(priority_date_ref);
                                    });

                                    $('#history_submit').click(function () {
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

                                    function addToHistory(history_sheet_val) {
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
                                    }




                                    $('#history_update_status').click(function () {
                                        var history_sheet_val = $("#history_sheet").val();
                                        if ($("#history_date").val() == '' && $("#history_name").val() == '' && $("#history_sheet_status").val() == '')
                                            return false;
                                        addToHistory(history_sheet_val);

                                    });


                                    $('#file_type').change(function () {
                                        var fl = $("#file_type").val();
                                        $("#alg_file_tyle").val(fl);
                                    });
                                    $('#app_no,#classes,#mark,#client_ref_no,#applicant_ref_no').keyup(function () {
                                        var cli_ref = $("#client_ref_no").val();
                                        var app_ref = $("#applicant_ref_no").val();
                                        var apn = $("#app_no").val();
                                        var cls = $("#classes").val();
                                        var mrk = $("#mark").val();
                                        $(".client_ref_no").val(cli_ref);
                                        $(".applicant_ref_no").val(app_ref);
                                        $("#alg_apln").val(apn);
                                        $("#alg_class").val(cls);
                                        $("#alg_mark").val(mrk);
                                    });
                                    $('#jurisdiction').change(function () {
                                        var forum = $("#jurisdiction").val();
                                        $("#alg_forum").val(forum);
                                    });
                                    var startingNo = 0;
                                    var $node = "";
                                    for (varCount = '<?php echo $count_value ?>'; varCount <= startingNo; varCount++) {
                                        //var displayCount = varCount + 1;
                                        //$node += '<p><label for="var' + displayCount + '">Variable ' + displayCount + ': </label><input type="text" name="var' + displayCount + '" id="var' + displayCount + '"><span class="removeVar"></span></p>';
                                    }
                                    $('.status').prepend($node);

                                    $('.form').live('click', '.removeVar', function () {
                                        $(this).parent().remove();
                                        varCount--;
                                        $('#total_status').val(varCount);
                                    });




                                    $('#addVar').live('click', function () {

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
                                    $('.removeParent').on('click', function () {
                                        $(this).parent().remove();
                                    });

                                    $('#addVaralert').on('click', function () {
                                        varCount++;
                                        $('#total_alert').val(varCount);
                                        $node = '<div><input type="text" name="alert[]" id="alert' + varCount + '" autocomplete="off" />';
                                        $node += '&nbsp;';
                                        $node += '<input id="alertdate' + varCount + '"  name="alertdate[]" placeholder="Alert Date" class="alert_datepicker"/>';
                                        $node += '<input id="alert_name' + varCount + '" name="alert_name[]" placeholder="name">';
                                        $node += '<span class="removeVar"></span>&nbsp; <?php if ($_SESSION['role'] == 'admin') { ?><a href="javascript:void(0);" class="removeParent"><img class="icon" src="images/delete.png" alt="Del" title="Delete"></a><?php } ?></div>';
                                        $node += '<br/>';
                                        $(this).parent().before($node);
                                        $(".alert_datepicker").datepicker({
                                            changeMonth: true,
                                            changeYear: true,
                                            dateFormat: "yy-mm-dd"
                                        });
                                        $('.removeParent').on('click', function () {
                                            $(this).parent().remove();
                                        });

                                    });

                                    $(".alert_datepicker").datepicker({
                                        changeMonth: true,
                                        changeYear: true,
                                        dateFormat: "yy-mm-dd"
                                    });
                                    function status_history() {
                                        $('.status_history').on('click', function () {
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
                                            var y = '(' + $("#status_date" + $rel + "").val() + ')';
                                            $historyHtmlStucture = '<textarea rows="7" cols="40" name="history_sheet" id="history_sheet">' + history_sheet_val + blank + q + x + '&nbsp;' + y + '</textarea>';
                                            $("#history_txt textarea").remove();
                                            $("#history_txt").html($historyHtmlStucture);
                                            $(this).remove();
                                        });
                                    }
                                    status_history();

                                    $('#submit_app').click(function () {
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
                                    $("#alertdate").datepicker({
                                        changeMonth: true,
                                        changeYear: true,
                                        dateFormat: "yy-mm-dd"
                                    });
//
                                });

                                function pro() {
                                    var ischecked = $('#proposed').attr('checked') ? true : false;
                                    if (ischecked) {
                                        $("#user_proposed").hide();
                                        $('#user_proposed').val('');
                                        //$("#user_proposed").attr("disabled","true");
                                    } else {
                                        $("#user_proposed").show();
                                    }
                                }
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
        </style>

    </body>
</html>