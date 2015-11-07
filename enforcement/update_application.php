<?php
require_once 'include/session.php';
include "class.docket.php";
$obj = new docket();
?>
<?php
if ($_POST) {
    $id = $_POST['id'];
    $file_type = $_POST['file_type'];
    $mark = addslashes($_POST['mark']);
    $domain_name = addslashes($_POST['domain_name']);
    $adversary_entity = $_POST['adversary_entity'];
    $image_named = $_POST['file'];
    $filing_date = $_POST['filing_date'];

    $applicant = $_POST['applicant'];
    $client = $_POST['client'];
    $client_marks = addslashes($_POST['client_marks']);

    $priority_date = $_POST['priority_date'];
    $jurisdiction = $_POST['jurisdiction'];
    $prior_use_india = $_POST['prior_use_india'];
    $prior_use_international = $_POST['prior_use_international'];
    $prior_use_adversary = $_POST['prior_use_adversary'];
    $history_sheet = addslashes($_POST['history_sheet']);
    $cl_ref_no = $_POST['cl_ref_no'];

    $alg_ref_no = $_POST['alg_ref_no'];
    $applicant_ref_no = $_POST['applicant_ref_no'];
    $client_ref_no = $_POST['client_ref_no'];
    $priority_ref_no = $_POST['priority_ref_no'];
    $year_ref_no = $_POST['year_ref_no'];

    session_start();

    $obj->update_application($id, $file_type, $mark, $domain_name, $adversary_entity, $image_named, $filing_date, $applicant, $client, $client_marks, $priority_date, $jurisdiction, $prior_use_india, $prior_use_international, $prior_use_adversary, $history_sheet, $cl_ref_no, $alg_ref_no, $applicant_ref_no, $client_ref_no, $priority_ref_no, $year_ref_no);
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
            #addVar,#addAdvLetter,#addAdvLetter{background: none repeat scroll 0 0 #000000;color: #FFFFFF;padding: 3px;cursor: pointer;}
            .removeAdvLetter,.removeCliDate {background: none repeat scroll 0 0 #8D8D8D;color: #FFFFFF;cursor: pointer;}
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
                    <tr> <td> File Type :</td> <td><select  name="file_type" id="file_type">                                   
                                <option value="none">--Select--</option>
                                <?php
                                $files = $obj->file_type;
                                ?>
                                <option <?php echo ($files == 'Prop C&D') ? 'selected="selected"' : '' ?> >Prop C&D</option>
                                <option <?php echo ($files == 'C&D') ? 'selected="selected"' : '' ?> >C&D</option>
                                <option <?php echo ($files == 'Prop C&D, Prop INDRP/UDRP') ? 'selected="selected"' : '' ?> >Prop C&D, Prop INDRP/UDRP</option>
                                <option <?php echo ($files == 'C&D, Prop INDRP/UDRP') ? 'selected="selected"' : '' ?> >C&D, Prop INDRP/UDRP</option>
                                <option <?php echo ($files == 'Prop C&D, Prop INDRP') ? 'selected="selected"' : '' ?> >Prop C&D, Prop INDRP</option>
                                <option <?php echo ($files == 'Prop C&D, Prop UDRP') ? 'selected="selected"' : '' ?> >Prop C&D, Prop UDRP</option>
                                <option <?php echo ($files == 'C&D, Prop INDRP') ? 'selected="selected"' : '' ?> >C&D, Prop INDRP</option>
                                <option <?php echo ($files == 'C&D, Prop UDRP') ? 'selected="selected"' : '' ?> >C&D, Prop UDRP</option>
                            </select></td></tr>
                    <tr>
                        <td> Adversary Mark :</td><td>
                            <input type="text" size="50px" name="mark" id="mark" value="<?php echo $obj->mark; ?>" autocomplete="off" />
                            &nbsp;&nbsp;OR&nbsp;&nbsp;
                            <input type="file" name="file" />
                            &nbsp;&nbsp;<?php if ($obj->images != '') {
                                    ?><a href="upload/<?php echo $obj->images; ?>" onClick="return popitup(this.href)" target="_blank"><img src='/doc/images/preview_icon.jpg' height="30px" width="30px"></a><?php } ?></td>
                    </tr>
                    <tr> <td> Adversary Domain Name :</td> <td><input type="text" name="domain_name" id="domain_name" value="<?php echo $obj->adversary_domain_name; ?>" autocomplete="off" /></td></tr>
                    <tr>
                        <td> Adversary Entity:</td><td>
                            <div class="ui-widget">
                                <select name="adversary_entity[]" id="adversary_entity" class="combobox"><option></option>
                                    <?php $obj->adversary_list($obj->adversary_entity); ?>
                                </select>

                                <?php
                                $i_app_adversary_entity = 1;
                                $sql_app_adversary_entity = "SELECT * FROM `app_adversary_entity` where aid='$id'";
                                $result_app_adversary_entity = mysql_query($sql_app_adversary_entity);
                                while ($row_app_adversary_entity = mysql_fetch_array($result_app_adversary_entity)) {
                                    echo '<br /><div><br /></div>';
                                    echo '<select name="adversary_entity[]" id="adversary_entity' . $i_app_adversary_entity . '" class="combobox"><option></option>';
                                    $obj->adversary_list($row_app_adversary_entity['adversary_entity']);
                                    echo '</select>';
                                    $i_app_adversary_entity++;
                                }
                                ?>
                            </div>
                            </div>&nbsp;<p><span id="add_adversery_box">Add More Adversary Entity</span></p>
                            <a class="fancybox fancybox.iframe" href="adversary_iframe.php?pop=yes">Add New Adversary Entity</a>
                        </td>
                    </tr>                   
                    <tr>
                        <td> Date of file opening :</td><td>
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
                    <tr> <td> Clients Mark(s) :</td> <td><input type="text" size="50px" name="client_marks" id="client_marks" value="<?php echo $obj->client_marks; ?>" autocomplete="off" /> </td></tr>
                    <tr>
                        <td> Date of file closing :</td><td>
                            <input type="text" name="priority_date" id="priority_date" value="<?php echo ($obj->priority_date == '0000-00-00') ? '' : $obj->priority_date ?>" />
                            <input type="button" id="fill_date" value="Fill Same As Filling Date">
                        </td>
                    </tr>
                    <tr> <td> Forum :</td> <td>
                            <select  name="jurisdiction" id="jurisdiction" >
                                <option value="<?php echo $obj->jurisdiction; ?>" selected="selected"><?php echo $obj->jurisdiction; ?></option>
                                <option>DEL</option>
                                <option>MUM</option>
                                <option>KOL</option>
                                <option>CHE</option>
                            </select></td></tr>
                    <?php include 'client_cd_date.php'; ?>
                    <?php include 'adversary_letter_date.php'; ?>
                    <tr> <td> Client's Date of Prior use (India) :</td> <td>
                            <input type="text" name="prior_use_india" id="prior_use_india" value="<?php echo ($obj->clients_date_india == '0000-00-00') ? '' : $obj->clients_date_india; ?>" autocomplete="off" />
                            <input type="checkbox" name="proposed" id="proposed1" onClick="pro('proposed1', 'prior_use_india');">Proposed to be used
                        </td></tr>
                    <tr> <td> Client's Date of Prior use (International) :</td> <td>
                            <input type="text" name="prior_use_international" id="prior_use_international" value="<?php echo ($obj->clients_date_international == '0000-00-00') ? '' : $obj->clients_date_international; ?>" autocomplete="off" />
                            <input type="checkbox" name="proposed" id="proposed2" onClick="pro('proposed2', 'prior_use_international');">Proposed to be used
                        </td></tr>
                    <tr> <td> Adversary's date of prior use :</td> <td>
                            <input type="text" name="prior_use_adversary" id="prior_use_adversary" value="<?php echo ($obj->adversary_date == '0000-00-00') ? '' : $obj->adversary_date; ?>" autocomplete="off" />
                            <input type="checkbox" name="proposed" id="proposed3" onClick="pro('proposed3', 'prior_use_adversary');">Proposed to be used
                        </td></tr>
                    <tr>
                        <td> Status Enforcement :</td><td>
                            <?php
                            $ids = $obj->id;
                            $sql = "SELECT s.id, s.status_name,ast.app_id,ast.status_effective_on_date FROM status s, application_status ast WHERE s.id=ast.status and ast.app_id = '" . $ids . "' and ast.status!=1 order by id DESC ";
                            //exit();
                            $show = mysql_query($sql);
                            $i = 0;
                            while ($result = mysql_fetch_array($show)) {
                                $id_st = $result['id'];
                                $date_st = $result['status_effective_on_date'];
                                $i++;
                                ?>
                                <div class="status"><p><label for="var1"><select name="status<?php echo $i ?>" id="status<?php echo $i ?>"><option value="select">--Select--</option>
                                                <?php echo $obj->show_status($id_st); ?></select>

                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            Effective On : <input type="text" name="status_date<?php echo $i ?>" id="status_date<?php echo $i ?>" value="<?php echo $date_st ?>" />&nbsp;&nbsp; </label>
                                    <?php } ?>
                                    <span class="removeVar"></span></p></div>
                            <p> 
                                <span id="addVar">Add Status</span>
                            </p>
                            <input type="hidden" name="total_status" value="<?php echo $i ?>" id="total_status">  
                            <?php $count_value = $i; ?>
                        </td>
                    </tr>
                    </td></tr>                    
                    <tr> <td style="vertical-align: top;"> History Sheet :</td><td>
                            <?php $obj->history_sheet_status(); ?>
                            <input type="text" id="history_name" autocomplete="off">&nbsp;
                            <input type="text" id="history_date" autocomplete="off">
                            <input type="button" value="Submit" id="history_submit">
                            <div><br /></div>
                            <span id="history_txt"><textarea rows="7" cols="40" name="history_sheet" id="history_sheet" ><?php echo strip_tags($obj->history_sheet); ?></textarea></span></td></tr>




                    <tr class="alert_p"> <td> Alert :</td> <td>
                            <?php
                            $fid = $_GET['id'];
                            $increment = 0;
                            $sql = "select `alert`, `toa` from `alert` where status=0 and fid='$fid'";
                            $res = mysql_query($sql);
                            while ($row = mysql_fetch_array($res)) {
                                $alert = $row['alert'];
                                $alertdate = $row['toa'];
                                if ($alertdate == '0000-00-00') {
                                    $alertdate = '';
                                }
                                echo '<div><input type="text" name="alert[]" id="alert" value="' . $alert . '" autocomplete="off" />&nbsp;';
                                echo '<input id="alertdate' . $increment . '"  name="alertdate[]" placeholder="Alert Date" value="' . $alertdate . '" class="alert_datepicker">';
                                echo '&nbsp; <a href="javascript:void(0);" class="removeParent"><img class="icon" src="images/delete.png" alt="Del" title="Delete"></a></div>';
                                $increment++;
                            }
                            ?><p><span id="addVaralert">Add Alert</span></p>

                        </td></tr>

                    <tr>
                        <td> Client Ref :</td><td>
                            <input type="text" name="cl_ref_no" id="cl_ref_no" value="<?php echo $obj->cl_ref_no; ?>" autocomplete="off" />
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
                    }
                    ?>
                    <tr> <td> ALG File :</td> <td>
                            <input type="text" size="10px" name="alg_forum" id="alg_forum" value="<?php echo $alg_forum; ?>" readonly />
                            File Type : <input type="text" size="10px" name="alg_file_tyle" id="alg_file_tyle" value="<?php echo $alg_file_type; ?>" readonly />
                            Client Mark : <input type="text" size="10px" name="alg_client_mark" id="alg_client_mark" value="<?php echo $alg_client_mark; ?>" readonly />
                            Adversary Name : <input type="text" size="15px" name="alg_adversary_name" id="alg_adversary_name" value="<?php echo $alg_adversary_name; ?>" readonly />
                            Adversary Mark : <input type="text" size="15px" name="alg_adversary_mark" id="alg_adversary_mark" value="<?php echo $alg_adversary_mark; ?>"  />
                            Adversary Domain Name : <input type="text" style="<?php echo $adStyle ?>" size="15px" name="alg_adversary_domain_name" id="alg_adversary_domain_name" value="<?php echo $alg_adversary_domain_name; ?>" readonly />
                            <?php
//                            echo $apln_show;
//                            echo $rctn_show;
                            ?>
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

                    $status_effective_on_date = $not_row['status_effective_on_date'];
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

        <script src="js/comobox.js" ></script>
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
                                    $(".combobox").combobox({
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
                                    $('#history_submit').live('click', function () {
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

                                        $historyHtmlStucture = '<textarea rows="7" cols="40" name="history_sheet" id="history_sheet">' + history_sheet_val + blank + x + '&nbsp;' + z + '&nbsp;' + y + '</textarea>';
                                        $("#history_txt textarea").remove();
                                        $("#history_txt").html($historyHtmlStucture);

                                        $("#history_sheet_status").val('');
                                        $("#history_date").val('');
                                        $("#history_name").val('');
                                    });
                                    $('#file_type').change(function () {
                                        var fl = $("#file_type").val();
                                        $("#alg_file_tyle").val(fl);
//                    if (fl == 'Prop C&D, Prop INDRP/UDRP' || fl == 'C&D, Prop INDRP/UDRP') {
//                        $("#alg_client_mark").show();
//                        $("#alg_adversary_name").show();
//                        $("#alg_adversary_mark").show();
//                        $("#alg_adversary_domain_name").show();
//                        var dom_nm = $("#domain_name").val();
//                        $("#alg_adversary_domain_name").val(dom_nm);
//                    } else {
//                        $("#alg_client_mark").show();
//                        $("#alg_adversary_name").show();
//                        $("#alg_adversary_mark").show();
//                        $("#alg_adversary_domain_name").hide().val('');
//                    }

                                        if (fl == 'Prop C&D' || fl == 'C&D') {
                                            $("#alg_client_mark").show();
                                            $("#alg_adversary_name").show();
                                            $("#alg_adversary_mark").show();
                                            $("#alg_adversary_domain_name").hide().val('');
                                        } else {
                                            $("#alg_client_mark").show();
                                            $("#alg_adversary_name").show();
                                            $("#alg_adversary_mark").show();
                                            $("#alg_adversary_domain_name").show();
                                            var dom_nm = $("#domain_name").val();
                                            $("#alg_adversary_domain_name").val(dom_nm);
                                        }
                                    });
                                    $('#mark,#domain_name,#client_marks,#client_ref_no,#applicant_ref_no').keyup(function () {
                                        var mrk = $("#mark").val();
                                        var dom_nm = $("#domain_name").val();
                                        var cl_mrk = $("#client_marks").val();
                                        var cli_ref = $("#client_ref_no").val();
                                        var app_ref = $("#applicant_ref_no").val();
                                        $(".client_ref_no").val(cli_ref);
                                        $(".applicant_ref_no").val(app_ref);
                                        $("#alg_adversary_mark").val(mrk);
                                        var fll = $("#file_type").val();
//                    if (fll !== 'Prop C&D' && fll !== 'C&D') {
//                        $("#alg_adversary_domain_name").val(dom_nm);
//                    }
                                        $("#alg_client_mark").val(cl_mrk);
                                    });
                                    $('#jurisdiction').change(function () {
                                        var forum = $("#jurisdiction").val();
                                        $("#alg_forum").val(forum);
                                    });
                                    var startingNo = 0;
                                    var $node = "";
                                    for (varCount = '<?php echo $count_value ?>'; varCount <= startingNo; varCount++) {
                                    }
                                    $('.status').prepend($node);

                                    $('#addVar').live('click', function () {

                                        varCount++;
                                        $('#total_status').val(varCount);

                                        $node = '<p><select name="status' + varCount + '" id="status' + varCount + '"><option value="select">Select</option><?php $obj->show_status(); ?></select>';
                                        $node += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Effective On : &nbsp;&nbsp;<input type="text" autocomplete="off" name="status_date' + varCount + '" id="status_date' + varCount + '">';
                                        $node += '<span class="removeVar"></span></p>';
                                        $(this).parent().before($node);
                                        $("#status_date" + varCount).datepicker({
                                            changeMonth: true,
                                            changeYear: true,
                                            dateFormat: "yy-mm-dd"
                                        });
                                    });

                                    $('#addVaralert').on('click', function () {
                                        varCount++;
                                        $('#total_alert').val(varCount);
                                        $node = '<div><input type="text" name="alert[]" id="alert' + varCount + '" autocomplete="off" />';
                                        $node += '&nbsp;';
                                        $node += '<input id="alertdate' + varCount + '"  name="alertdate[]" placeholder="Alert Date" class="alert_datepicker"/>';
                                        $node += '<span class="removeVar"></span>&nbsp; <a href="javascript:void(0);" class="removeParent"><img class="icon" src="images/delete.png" alt="Del" title="Delete"></a></div>';
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

                                function pro(id, pid) {
                                    var ischecked = $('#' + id).attr('checked') ? true : false;
                                    var a = $("#" + pid);
                                    if (ischecked) {
                                        $(a).hide();
                                    } else {
                                        $(a).show();
                                        $(a).val('');
                                    }
                                }
        </script>
        <style>
            .custom-combobox {position: relative;display: inline-block;}
            .custom-combobox-toggle {position: absolute;top: 0;bottom: 0;margin-left: -1px;padding: 0;/* support: IE7 */*height: 1.7em;*top: 0.1em;}
            .custom-combobox-input {margin: 0;padding: 0.3em;}
        </style>

    </body>
</html>