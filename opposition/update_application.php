<?php
ini_set('display_errors', 'off');
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
<!--        <script type="text/javascript">
            function prop()
            {
                var ischecked = $('#proposed').attr('checked') ? true : false;
                if (ischecked)
                {
                    $("#user_proposed").hide();
                    $('#user_proposed').val('');
                    //$("#user_proposed").attr("disabled","true");
                }
                else {
                    $("#user_proposed").show();
                }
            }
        </script>

       	<script>
            var startingNo = 0;
            var $node = "";
            for (varCount = 0; varCount <= startingNo; varCount++) {
                var displayCount = varCount + 1;
                $node += '<p><label for="var' + displayCount + '">Variable ' + displayCount + ': </label><input type="text" name="var' + displayCount + '" id="var' + displayCount + '"><span class="removeVar"></span></p>';
            }
            $('.status').prepend($node);

            $('.form').live('click', '.removeVar', function() {
                $(this).parent().remove();
                varCount--;
                $('#total_status').val(varCount);
            });



            $('#addVar').live('click', function() {

                varCount++;

                $('#total_status').val(varCount);

                $node = '<p><select name="status' + varCount + '" id="status' + varCount + '"><option value="select">--Select</option><?php // /$obj->show_status();                         ?></select>';
                $node += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Effective On : &nbsp;&nbsp;<input type="text" name="status_date' + varCount + '" id="status_date' + varCount + '">';
                $node += '<span class="removeVar"></span></p>';
                $(this).parent().before($node);
                $("#status_date" + varCount).datepicker({
                    changeMonth: true,
                    changeYear: true,
                });

            });//<select name="status'+varCount+'" id="status'+varCount+'"><option value="select">Select</option></select>

        </script>-->
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
    if ($_GET['action'] == 'edit') {
        $id = $_GET['id'];
        $obj->edit_application($id);
    }

    if ($_GET['action'] == 'delete') {
        $id = $_REQUEST['id'];
        $sql = "delete application,application_status from application INNER JOIN application_status where application.id=$id and application_status.app_id=$id";
        mysql_query($sql);
        mysql_query("delete * from notifications where app_id=$id");
        $sql1 = "insert into log (user_id,action,comment) values('" . $_SESSION['id'] . "','Delete','application_id=$id')";
        mysql_query($sql1);
        $sid = mt_rand(1, 1000000);

        if (!headers_sent()) {
            header("location:applications_list.php?sid=$sid");
        } else {
            echo "<script>
			window.location.href='applications_list.php?sid=$sid'
			 </script>";
        }
    }
    ?>
    <body>
        <?php
        include_once 'include/menu.php';
        ?>
<!--        <script>

            $(function() {
                var availableTags = [
        <?php
//$sql = "select id,name from user where name!=''  order by name";
//$show = mysql_query($sql);
//while ($result = mysql_fetch_array($show)) {
//
//    echo '"' . $result['id'] . '-' . $result['name'] . '",';
//}
        ?>];
                $("#app_no1").autocomplete({
                    source: availableTags
                });

                var availableclientTags = [
        <?php
//$sql1 = "select id,lawfirm from client where lawfirm!=''  order by lawfirm";
//$show1 = mysql_query($sql1);
//while ($result1 = mysql_fetch_array($show1)) {
//
//    echo '"' . $result1['id'] . '-' . $result1['lawfirm'] . '",';
//}
        ?>];
                $("#client_no1").autocomplete({
                    source: availableclientTags
                });
            });
        </script>-->
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
                                <option <?php echo ($files == 'TM-6 Apln_Oppn') ? 'selected="selected"' : '' ?> >TM-6 Apln_Oppn</option>
                                <option <?php echo ($files == 'CS_TM-26 Regn_Rctn') ? 'selected="selected"' : '' ?> >CS_TM-26 Regn_Rctn</option>
                                <option <?php echo ($files == 'Watch Notice_Prop TM-5 Oppn') ? 'selected="selected"' : '' ?> >Watch Notice_Prop TM-5 Oppn</option>
                                <option <?php echo ($files == 'Prop TM-5 Oppn') ? 'selected="selected"' : '' ?> >Prop TM-5 Oppn</option>
                                <option <?php echo ($files == 'TM-5 Oppn') ? 'selected="selected"' : '' ?> >TM-5 Oppn</option>
                                <option <?php echo ($files == 'Watch Notice_Prop TM-26 Rctn') ? 'selected="selected"' : '' ?> >Watch Notice_Prop TM-26 Rctn</option>
                                <option <?php echo ($files == 'Prop TM-26 Rctn') ? 'selected="selected"' : '' ?> >Prop TM-26 Rctn</option>
                                <option <?php echo ($files == 'TM-26 Rctn') ? 'selected="selected"' : '' ?> >TM-26 Rctn</option>
                            </select></td></tr>
                    <tr>
                        <td> Apln/Regn No :</td><td>
                            <input type="text" size="50px" name="app_no" id="app_no" value="<?php echo $obj->application_no; ?>" autocomplete="off" />
                        </td>
                    </tr>
                    <tr> <td> Oppn/Rctn No :</td> <td><input type="text" name="rct_no" id="rct_no" autocomplete="off" value="<?php echo $obj->rctn_no; ?>" /> </td></tr>
                    <tr>
                        <td> Adversary's Mark :</td><td>
                            <input type="text" name="mark" id="mark" value="<?php echo $obj->mark; ?>" autocomplete="off" />
                            &nbsp;&nbsp;OR&nbsp;&nbsp;
                            <input type="file" name="file" />
                            &nbsp;&nbsp;<?php if ($obj->images != '') {
                                    ?><a href="upload/<?php echo $obj->images; ?>" onClick="return popitup(this.href)" target="_blank"><img src='/doc/images/preview_icon.jpg' height="30px" width="30px"></a><?php } ?></td>
                    </tr>
                    <tr>
                        <td> Adversary Entity :</td><td>
                            <div class="ui-widget"><select name="adversary_entity" id="adversary_entity" class="combobox"><option></option>
                                    <?php $obj->adversary_list($obj->adversary_entity); ?>
                                </select></div>
                            <a class="fancybox fancybox.iframe" href="adversary_iframe.php?pop=yes">Add Entity</a>
                        </td>
                    </tr>
                    <tr>
                        <td> Class(es) :</td><td>
                            <input type="text" name="classes" id="classes" value="<?php echo $obj->classes; ?>" autocomplete="off" />
                        </td>
                    </tr>
                    <tr>
                        <td> User :</td><td>
                        <!--<input type="text" name="user_proposed" id="user_proposed" value="<?php
                            //$user_dt=$obj -> user; list($y, $m, $d) = explode('-', $user_dt);
//$user_dt_format = "$m/$d/$y"; echo $user_dt_format
                            ?>" />
                        <input type="checkbox" name="proposed" id="proposed" onClick="prop();">Proposed to be used-->
                            <?php if ($obj->user == 0000 - 00 - 00) { ?>
                                <input type="text" name="user_proposed" id="user_proposed" style="display:none;" value="<?php
                                $user_dt = $obj->user;
                                list($y, $m, $d) = explode('-', $user_dt);
                                $user_dt_format = "$m/$d/$y";
                                echo $user_dt_format = '';
                                ?>" />
                                   <?php } else { ?>
                                <input type="text" name="user_proposed" id="user_proposed" value="<?php
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
                            <input type="text" name="filing_date" id="filing_date" value="<?php
                            echo $fil_dt = $obj->filing_date;
//                            list($y, $m, $d) = explode('-', $fil_dt);
//                            $filing_dt_format = "$m/$d/$y";
//                            echo $filing_dt_format
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
                    <tr> <td> Client's Mark(s) :</td> <td><input type="text" size="50px" name="client_marks" id="client_marks" value="<?php echo $obj->client_marks; ?>" autocomplete="off" /> </td></tr>
                    <tr>
                        <td> Priority Date :</td><td>
                            <input type="text" name="priority_date" id="priority_date" value="<?php
                            echo $prior_dt = $obj->priority_date;
                            ?>" />
                            <input type="button" id="fill_date" value="Fill Same As Filling Date">
                        </td>
                    </tr>
                    <tr>
                        <td> Forum :</td><td>
                            <select  name="jurisdiction" id="jurisdiction" >
                                <option value="<?php echo $obj->jurisdiction; ?>" selected="selected"><?php echo $obj->jurisdiction; ?></option>
                                <option>DEL</option>
                                <option>MUM</option>
                                <option>AMD</option>
                                <option>KOL</option>
                                <option>CHE</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td> Goods/Services :</td><td>						<textarea  rows="7" cols="40" name="goods_services" id="" class=""><?php echo $obj->goods_services; ?></textarea></td>
                    </tr>
                    <tr>
                        <td> Status Opposition :</td><td>
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
                                <div class="status"><p><label for="var1"><select name="status<?php echo $i ?>" id="status<?php echo $i ?>"><option value="select">--Select--</option>
                                                <?php echo $obj->show_status($id_st); ?></select>

                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            Effective On : <input type="text" name="status_date<?php echo $i ?>" id="status_date<?php echo $i ?>" value="<?php echo $date_st ?>" />&nbsp;<input type="button" value="Add to history" class="status_history" rel="<?php echo $i ?>" > &nbsp;&nbsp; </label>
                                    <?php } ?>
                                    <span class="removeVar"></span></p></div>
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
                            $sql = "select `alert`,`alert_name`,`toa` from `alert` where  status=0 and fid='$fid'";
                            $res = mysql_query($sql);
                            while ($row = mysql_fetch_array($res)) {
                                $alert = $row['alert'];
                                $alertname = $row['alert_name'];
                                $alertdate = $row['toa'];
                                if ($alertdate == '0000-00-00') {
                                    $alertdate = '';
                                }
                               echo '<div><input type="text" name="alert[]" id="alert" value="' . $alert . '" autocomplete="off" readonly/>&nbsp;';
                                echo '<input id="alertdate' . $increment . '"  name="alertdate[]" placeholder="Alert Date" value="' . $alertdate . '" readonly/>';
                                echo '<input id="alert_name' . $increment . '"  name="alert_name[]" placeholder="name" value="' . $alertname . '"  readonly>';
                                echo '&nbsp; <a href="javascript:void(0);" class="removeParent"><img class="icon" src="images/delete.png" alt="Del" title="Delete"></a></div>';
                                $increment++;
                            }
                            ?><?php if ($_SESSION['role'] == 'admin') { ?><p><span id="addVaralert">Add Alert</span></p><?php } ?>
                             

                        </td></tr>
                    <tr>
                        <td> Client Ref :</td><td>
                            <input type="text" name="cl_ref_no" id="cl_ref_no" value="<?php echo $obj->cl_ref_no; ?>" />
                        </td>
                    </tr>
                    <tr><td> ALG Ref :</td> <td>
                            <input type="text" size="10px" name="alg_ref_no" id="alg_ref_no" value="<?php echo strtoupper($cat_category); ?>" />-
                            <input type="text" size="10px" name="applicant_ref_no" maxlength="3" id="applicant_ref_no" class="applicant_ref_no" value="<?php echo $alg_applicant_code; ?>" readonly />-
                            <input type="text" size="10px" name="client_ref_no" maxlength="3" id="client_ref_no" class="client_ref_no" value="<?php echo $alg_client_code; ?>" readonly />-
                            <input type="text" size="10px" name="priority_ref_no" id="priority_ref_no" value="<?php echo $alg_priority_date_format; ?>" />-
                            <input type="text" size="10px" maxlength="4" name="year_ref_no" id="year_ref_no" value="<?php echo $alg_serialno; ?>" />
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
                        $alg_rct_no = $get4['alg_rct_no'];
                        if ($alg_rct_no == '') {
                            $styleDisplay = 'display:none;';
                        } else {
                            $styleDisplay = 'display:block;';
                        }
                        $alg_adversary_name = $get4['alg_adversary_name'];
                        $alg_adversary_mark = $get4['alg_adversary_mark'];
                        $alg_app_no = $get4['alg_app_no'];
                        $alg_class = $get4['alg_class'];
                        $alg_client_mark = $get4['alg_client_mark'];
                        $sid = mt_rand(1, 1000000);
                    }
                    ?>
                    <tr> <td> ALG File :</td> <td>
                            <input type="text" size="10px" name="alg_forum" id="alg_forum" value="<?php echo $alg_forum; ?>" readonly />
                            File Type : <input type="text" name="alg_file_tyle" id="alg_file_tyle" value="<?php echo $alg_file_type; ?>" readonly />
                            <!--<div id="showvariable"> </div>-->
                            Rctn : <input type="text" style="<?php echo $styleDisplay; ?>" name="alg_rct_no" id="alg_rct_no" value="<?php echo $alg_rct_no; ?>" readonly /><br>
                            Adv Name : <input type="text" name="alg_adversary_name" id="alg_adversary_name" value="<?php echo $alg_adversary_name; ?>" readonly />
                            Adv Mark : <input type="text" name="alg_adversary_mark" id="alg_adversary_mark" value="<?php echo $alg_adversary_mark; ?>" readonly />
                            Apln : <input type="text" name="alg_app_no" id="alg_app_no" value="<?php echo $alg_app_no; ?>" readonly />
                            Class : <input type="text" name="alg_class" id="alg_class" value="<?php echo $alg_class; ?>" readonly />
                            Client Mark : <input type="text" name="alg_client_mark" id="alg_client_mark" value="<?php echo $alg_client_mark; ?>" readonly />
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
                    <tr><th>Date of Generation</th><th>Notification Name</th><th>Date of Deletation</th></tr>
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
                        //echo "SELECT status_name, time_to_execute, radio  FROM `status` where parent_id='" . $value . "' order by status_order";
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
                /* $not_sql = "SELECT a.app_id,a.status_effective_on_date, a.status, s.status_name ,DATEDIFF( now(), STR_TO_DATE( a.status_effective_on_date, '%Y-%m-%d')  ) as ef_day,  s1.id as child_id, s1.time_to_execute FROM `application_status` a, `status` s, `status` s1 where a.status=s.id and s1.parent_id=a.status and a.status_effective_on_date!='' and a.app_id = '$obj->id'";
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
                  } */
                echo '<a href="add_application.php" style="float: left;">New Application</a>';
                echo '<a href="applications_list.php" style="float: left;margin-left:140px;">View Application</a>';
                echo '<a href="welcome.php" style="float: right;">Close Application</a>';
                ?>
            </form>
        </div>


        <script>
            (function ($) {
                $.widget("custom.combobox", {
                    _create: function () {
                        this.wrapper = $("<span>")
                                .addClass("custom-combobox")
                                .insertAfter(this.element);

                        this.element.hide();
                        this._createAutocomplete();
                        this._createShowAllButton();
                    },
                    _createAutocomplete: function () {
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
                            autocompleteselect: function (event, ui) {
                                ui.item.option.selected = true;
                                this._trigger("select", event, {
                                    item: ui.item.option
                                });
                            },
                            autocompletechange: "_removeIfInvalid"
                        });
                    },
                    _createShowAllButton: function () {
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
                                .mousedown(function () {
                                    wasOpen = input.autocomplete("widget").is(":visible");
                                })
                                .click(function () {
                                    input.focus();

                                    // Close if already visible
                                    if (wasOpen) {
                                        return;
                                    }

                                    // Pass empty string as value to search for, displaying all results
                                    input.autocomplete("search", "");
                                });
                    },
                    _source: function (request, response) {
                        var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
                        response(this.element.children("option").map(function () {
                            var text = $(this).text();
                            if (this.value && (!request.term || matcher.test(text)))
                                return {
                                    label: text,
                                    value: text,
                                    option: this
                                };
                        }));
                    },
                    _removeIfInvalid: function (event, ui) {

                        // Selected an item, nothing to do
                        if (ui.item) {
                            return;
                        }

                        // Search for a match (case-insensitive)
                        var value = this.input.val(),
                                valueLowerCase = value.toLowerCase(),
                                valid = false;
                        this.element.children("option").each(function () {
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
                        this._delay(function () {
                            this.input.tooltip("close").attr("title", "");
                        }, 2500);
                        this.input.data("ui-autocomplete").term = "";
                    },
                    _destroy: function () {
                        this.wrapper.remove();
                        this.element.show();
                    }
                });
            })(jQuery);

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
                $("#adversary_entity").combobox({
                    select: function (event, ui) {
                        var adv_ent = $(this).val();
                        $.ajax({
                            type: 'post',
                            url: 'check_adv_entity_code.php?adv_entity_id=' + adv_ent,
                            data: $(this).serialize(),
                            success: function (data) {
                                if (data) {
                                    $("#alg_adversary_name").val(data);
                                }
                            }
                        });
                    }
                });
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
                $('#file_type').change(function () {
                    var fl = $("#file_type").val();
                    $("#alg_file_tyle").val(fl);
                    if (fl == 'TM-6 Apln_Oppn' || fl == 'CS_TM-26 Regn_Rctn') {
                        $("#alg_rct_no").show();
                        $("#alg_adversary_name").show();
                        $("#alg_adversary_mark").show();
                        $("#alg_app_no").show();
                        $("#alg_class").show();
                        $("#alg_client_mark").show();
                        var rct = $("#rct_no").val();
                        $("#alg_rct_no").val(rct);
                    } else if (fl == 'Watch Notice_Prop TM-5 Oppn' || fl == 'Prop TM-5 Oppn' || fl == 'Watch Notice_Prop TM-26 Rctn' || fl == 'Prop TM-26 Rctn') {
                        $("#alg_client_mark").show();
                        $("#alg_adversary_name").show();
                        $("#alg_app_no").show();
                        $("#alg_class").show();
                        $("#alg_adversary_mark").show();
                        $("#alg_rct_no").hide().val('');
                    } else if (fl == 'TM-5 Oppn' || fl == 'TM-26 Rctn') {
                        $("#alg_rct_no").show();
                        $("#alg_client_mark").show();
                        $("#alg_adversary_name").show();
                        $("#alg_app_no").show();
                        $("#alg_class").show();
                        $("#alg_adversary_mark").show();
                        var rct = $("#rct_no").val();
                        $("#alg_rct_no").val(rct);
                    }
                });
                $('#app_no,#rct_no,#mark,#classes,#client_marks,#client_ref_no,#applicant_ref_no').keyup(function () {
                    var cli_ref = $("#client_ref_no").val();
                    var app_ref = $("#applicant_ref_no").val();
                    var apn = $("#app_no").val();
                    var rct = $("#rct_no").val();
                    var mrk = $("#mark").val();
                    var cls = $("#classes").val();
                    var clmrk = $("#client_marks").val();
                    $(".client_ref_no").val(cli_ref);
                    $(".applicant_ref_no").val(app_ref);
                    $("#alg_app_no").val(apn);
                    var fll = $("#file_type").val();
                    if (fll !== 'Watch Notice_Prop TM-5 Oppn' && fll !== 'Prop TM-5 Oppn' && fll !== 'Watch Notice_Prop TM-26 Rctn' && fll !== 'Prop TM-26 Rctn') {
                        $("#alg_rct_no").val(rct);
                    }
                    $("#alg_adversary_mark").val(mrk);
                    $("#alg_class").val(cls);
                    $("#alg_client_mark").val(clmrk);
                });
                $('#jurisdiction,#priority_date').change(function () {
                    var forum = $("#jurisdiction").val();
                    $("#alg_forum").val(forum);
                    var priority_ref = $("#priority_date").val();
                    $("#priority_ref_no").val(priority_ref);
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
                                        $node +='<input id="alert_name' + varCount + '" name="alert_name[]" placeholder="name">';
                                        $node += '<span class="removeVar"></span>&nbsp; <a href="javascript:void(0);" class="removeParent"><img class="icon" src="images/delete.png" alt="Del" title="Delete"></a></div>';
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

        <?php
        if ($_POST) {
            $id = $_POST['id'];
            $file_type = $_POST['file_type'];
            $application_no = $_POST['app_no'];
            $rct_no = $_POST['rct_no'];
            $mark = addslashes($_POST['mark']);
            $adversary_entity = $_POST['adversary_entity'];
            $image_named = $_POST['file'];
            $class = $_POST['classes'];
            $classes = str_replace(' ', ',', $class);
            $user = $_POST['user_proposed'];
            $filing_date = $_POST['filing_date'];

            $applicant = $_POST['applicant'];
            $client = $_POST['client'];
            $client_marks = addslashes($_POST['client_marks']);

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

            session_start();

            $obj->update_application($id, $file_type, $application_no, $rct_no, $mark, $adversary_entity, $image_named, $classes, $user, $filing_date, $applicant, $client, $client_marks, $priority_date, $jurisdiction, $goods_services, $pend_rec_cor, $history_sheet, $cl_ref_no, $alg_ref_no, $applicant_ref_no, $client_ref_no, $priority_ref_no, $year_ref_no);
            // $status, $status_date, $status2, $status2_date, $status3, $status3_date, $status4, $status4_date,$status5, $status5_date,
        }
        ?>

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