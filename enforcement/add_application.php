<?php
session_start();
require_once 'include/session.php';
include "class.docket.php";
$obj = new docket();
if ($_POST) {
    /*echo '<pre>';
    print_r($_POST);
    die();*/
    $file_type = $_POST['file_type'];
    $app_no = $_POST['app_no'];
    $mark = addslashes($_POST['mark']);
    $domain_name = addslashes($_POST['domain_name']);
    $adversary_entity = $_POST['alertdate'];
    $filing_date = $_POST['filing_date'];
    $applicant = $_POST['applicant'];
    $client = $_POST['client'];
    $client_marks = addslashes($_POST['client_marks']);
    $priority_date = $_POST['priority_date'];
    $jurisdiction = $_POST['jurisdiction'];
    $prior_use_india = $_POST['prior_use_india'];
    $prior_use_international = $_POST['prior_use_international'];
    $prior_use_adversary = $_POST['prior_use_adversary'];
    $history = addslashes($_POST['history']);
    $pending_record = $_POST['pending_record'];
    $cl_ref_no = $_POST['cl_ref_no'];
    $obj->apply_new($file_type, $mark, $domain_name, $adversary_entity, $filing_date, $applicant, $client, $client_marks, $priority_date, $jurisdiction, $prior_use_india, $prior_use_international, $prior_use_adversary, $history, $cl_ref_no);
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
        <script type="text/javascript"  src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript"  src="js/jquery-ui.js"></script>
        <script type="text/javascript"  src="js/jquery.fancybox.js"></script>
        <script type="text/javascript"  src="js/custom.js"></script>
        <style>
            #addVar,#addEntity,#addAdvLetter,#addCliDate{background: none repeat scroll 0 0 #000000;color: #FFFFFF;padding: 3px;cursor: pointer;}
            .removeAdvLetter,.removeCliDate {background: none repeat scroll 0 0 #8D8D8D;color: #FFFFFF;cursor: pointer;}
            .custom-combobox {position: relative;display: inline-block;}
            .custom-combobox-toggle {position: absolute;top: 0;bottom: 0;margin-left: -1px;padding: 0;/* support: IE7 */*height: 1.7em;*top: 0.1em;}
            .custom-combobox-input {margin: 0;padding: 0.3em;}
            .ui-state-default .ui-icon {background-image: url("images/ui-icons_888888_256x240.png");}
            .custom-combobox input { width:250px;}
            #addVaralert{background: none repeat scroll 0 0 #000000;color: #FFFFFF;padding: 3px;cursor: pointer;}
        </style>  
    </head>
    <body>
        <?php include_once 'include/menu.php'; ?>
        <div class="content">
            <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
            <div>
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr><td> File Type :</td>
                            <td><select  name="file_type" id="file_type" >
                                    <option value="none">--Select--</option>
                                    <option>Prop C&D</option>
                                    <option>C&D</option>
                                    <option>Prop C&D, Prop INDRP/UDRP</option>
                                    <option>C&D, Prop INDRP/UDRP</option>
                                    <option>Prop C&D, Prop INDRP</option>
                                    <option>Prop C&D, Prop UDRP</option>
                                    <option>C&D, Prop INDRP</option>
                                    <option>C&D, Prop UDRP</option>
                                </select></td></tr>                        
                        <tr><td> Adversary Mark  :</td> <td><input type="text" size="50px" name="mark" id="mark" autocomplete="off" />&nbsp;&nbsp;OR&nbsp;&nbsp;<input type="file" name="file"></td></tr>
                        <tr><td> Adversary Domain Name :</td> <td><input type="text" name="domain_name" id="domain_name" autocomplete="off" /></td></tr>
                        <tr><td> Adversary Entity  :</td> <td>
                                <div class="ui-widget"><select name="adversary_entity[]" id="adversary_entity" class="combobox"><option></option>
                                        <?php $obj->adversary_list('for_front'); ?>
                                    </select></div>&nbsp;<p><span id="add_adversery_box">Add Adversary</span></p>
                                <a class="fancybox fancybox.iframe" href="adversary_iframe.php?pop=yes">Add Entity</a>
                            </td></tr>
                        <tr><td> Date of file opening :</td> <td><input type="text" name="filing_date" id="filing_date" autocomplete="off" /></td></tr>
                        <tr><td> Client Entity :</td> <td>
                                <?php $obj->applicants(); ?>
                                <input type="text" maxlength="3" name="applicant_ref_no" id="applicant_ref_no" class="applicant_ref_no" autocomplete="off" /><br>
                                <div id="code_error_app"></div>
                                <a class="fancybox fancybox.iframe" href="iframe.php?pop=yes&current_ent=app_ent">Add Entity</a>
                            </td></tr>
                        <tr><td> Intermediary Entity :</td> <td><?php $obj->clients(); ?>
                                <!--                                <a class="fancybox fancybox.iframe" href="iframe.php?popup=yes">Add Client</a>-->
                                <input type="text" maxlength="3" name="client_ref_no" id="client_ref_no" class="client_ref_no" autocomplete="off" /><br>
                                <div id="code_error_cli"></div>
                                <a class="fancybox fancybox.iframe" href="iframe.php?pop=yes&current_ent=cli_ent">Add Entity</a>
                            </td></tr>
                        <tr><td>To</td>
                            <td>
                                <select name="cli_mail_to[]" multiple id="cli_mail_to" class="client_mail" ></select>
                            </td>
                        </tr>
                        <tr><td>Forward To</td>
                            <td>
                                <select name="cli_mail_forward[]" multiple id="cli_mail_forward" class="client_mail" ></select>
                            </td>
                        </tr>
                        <tr><td>Instructed By</td>
                            <td>
                                <select name="cli_mail_instructed[]" multiple id="cli_mail_instructed" class="client_mail" ></select>
                            </td>
                        </tr>
                        <tr><td> Clients Mark(s) :</td> <td><input type="text" size="50px" name="client_marks" id="client_marks" autocomplete="off" /> </td></tr>
                        <tr><td> Date of file closing :</td> <td><input type="text" name="priority_date" id="priority_date" autocomplete="off" />
                                <input type="button" id="fill_date" value="Fill Same As Filling Date">
                            </td></tr>
                        <tr><td> Forum :</td> <td>
                                <select  name="jurisdiction" id="jurisdiction" >
                                    <option value="select">--Select--</option>
                                    <option>DEL</option>
                                    <option>MUM</option>
                                    <option>KOL</option>
                                    <option>CHE</option>
                                </select></td></tr>
                        <?php include 'client_cd_date.php'; ?>
                        <?php include 'adversary_letter_date.php'; ?>
                        <tr><td> Client's Date of Prior use (India) :</td> <td>
                                <input type="text" name="prior_use_india" id="prior_use_india" autocomplete="off" />
                                <label> <input type="checkbox" name="proposed" id="proposed1" onClick="pro('proposed1', 'prior_use_india');">Proposed to be used</label>
                            </td></tr>
                        <tr><td> Client's Date of Prior use (International) :</td> <td>
                                <input type="text" name="prior_use_international" id="prior_use_international" autocomplete="off" />
                                <label><input type="checkbox" name="proposed" id="proposed2" onClick="pro('proposed2', 'prior_use_international');">Proposed to be used</label>
                            </td></tr>
                        <tr><td> Adversary's date of prior use :</td> <td>
                                <input type="text" name="prior_use_adversary" id="prior_use_adversary" autocomplete="off" />
                                <label><input type="checkbox" name="proposed" id="proposed3" onClick="pro('proposed3', 'prior_use_adversary');">Proposed to be used</label>
                            </td></tr>
                        <tr> <td valign="top"> Status Enforcement :</td> <td><div class="status"><p><label for="var1"><select name="status1" id="status"><option value="select">--Select--</option><?php $obj->show_status(); ?></select>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Effective On : &nbsp;&nbsp;<input type="text" name="status_date1" id="status_date1" autocomplete="off">&nbsp;&nbsp; </label>
                                        <span class="removeVar"></span></p></div>
                                <p> 
                                    <span id="addVar">Add Status</span>
                                </p>
                                <input type="hidden" name="total_status" value="1" id="total_status">   

                            </td></tr>
                        <tr> <td style="vertical-align: top;"> History Sheet :</td><td>
                                <?php $obj->history_sheet_status(); ?>
                                <input type="text" id="history_name" autocomplete="off">&nbsp;
                                <input type="text" id="history_date" autocomplete="off">
                                <input type="button" value="Submit" id="history_submit">
                                <div><br /></div>
                                <span id="history_txt"><textarea rows="7" cols="40" name="history" id="history" ></textarea></span></td></tr>                      
                        <tr><td> Alert :</td> <td><input type="text" name="alert[]" id="alert" autocomplete="off" /><input id="alertdate" name="alertdate[]" placeholder="Alert Date"><p><span id="addVaralert">Add Alert</span></p></td></tr>
                        <tr><td> Client Ref :</td> <td><input type="text" name="cl_ref_no" id="cl_ref_no" autocomplete="off" /> </td></tr>
                        <tr><td> ALG File :</td> <td>
                                <input type="text" size="10px" name="alg_forum" id="alg_forum" readonly />
                                <input type="text" size="10px" name="alg_file_tyle" id="alg_file_tyle" readonly />
                                <input type="text" size="10px" name="alg_client_mark" id="alg_client_mark" style="display: none" readonly />
                                <input type="text" size="15px" name="alg_adversary_name" id="alg_adversary_name" style="display: none" readonly />
                                <input type="text" size="15px" name="alg_adversary_mark" id="alg_adversary_mark" style="display: none" readonly />
                                <input type="text" size="15px" name="alg_adversary_domain_name" id="alg_adversary_domain_name" style="display: none" readonly />
                            </td></tr>
                        <?php
                        $cat_sql = "SELECT category from category where id='1'";
                        $cat_show = mysql_query($cat_sql);
                        while ($cat_result = mysql_fetch_array($cat_show)) {
                            $cat_category = $cat_result['category'];
                        }
                        $alg_sql = "SELECT alg_serialno from year_serialno where alg_id>=1 order by alg_id desc limit 0,1";
                        $alg_show = mysql_query($alg_sql);
                        while ($alg_result = mysql_fetch_array($alg_show)) {
                            $alg_category = $alg_result['alg_serialno'];
                            $score = $alg_category + 1;
                            $paddedScore = str_pad($score, 4, '0', STR_PAD_LEFT);
                            $paddedScore1 = $paddedScore % 10;
                            $paddedScore2 = ($paddedScore / 10) % 10;
                            $paddedScore3 = ($paddedScore / 100) % 10;
                            $paddedScore4 = ($paddedScore / 1000) % 10;
                            $total_score = $paddedScore4 . $paddedScore3 . $paddedScore2 . $paddedScore1;
                        }
                        ?>
                        <input type="hidden" name="alg_ref_no" id="alg_ref_no" value="<?php echo $cat_category ?>" readonly/>                           
                        <input type="hidden" name="applicant_ref_no" id="applicant_ref_no" class="applicant_ref_no" readonly/>
                        <input type="hidden" name="client_ref_no" id="client_ref_no" class="client_ref_no" readonly/>
                        <input type="hidden" name="priority_ref_no" id="priority_ref_no" readonly />
                        <input type="hidden" name="year_ref_no" id="year_ref_no" value="<?php echo $total_score; ?>" readonly />                        
                        <tr><td> </td> <td><input type="submit" id="submit_app" value="Submit" /> </td></tr>                                
                    </table>
                </form>
                <table><tr>


                    </tr> </table>
            </div>               
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
                });
                $('#history_submit').live('click', function () {
                    var history_sheet_val = $("#history").val();
                    if ($("#history_date").val() == '' && $("#history_name").val() == '' && $("#history_sheet_status").val() == '')
                        return false;
                    var history_firsttime = ($("#history").val().length);
                    if (history_firsttime > '0') {
                        var blank = "\n\====================\n\ ";
                    } else {
                        blank = '';
                        history_sheet_val = '';
                    }
                    var x = $("#history_sheet_status").val();
                    var y = $("#history_date").val();
                    var z = $("#history_name").val();

                    $historyHtmlStucture = '<textarea rows="7" cols="40" name="history" id="history">' + history_sheet_val + blank + x + '&nbsp;' + z + '&nbsp;' + y + '</textarea>';
                    $("#history_txt textarea").remove();
                    $("#history_txt").html($historyHtmlStucture);

                    $("#history_sheet_status").val('');
                    $("#history_date").val('');
                    $("#history_name").val('');
                });
                $('#domain_name').change(function(){
                    $("#alg_adversary_domain_name").val($(this).val());
                });
                $('#file_type').change(function () {
                    var fl = $("#file_type").val();
                    $("#alg_file_tyle").val(fl);
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
                    $("#alg_client_mark").val(cl_mrk);
                });
                $('#jurisdiction').change(function () {
                    var forum = $("#jurisdiction").val();
                    $("#alg_forum").val(forum);
                });
                var startingNo = 0;
                var $node = "";
                for (varCount = 0; varCount <= startingNo; varCount++) {
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
                    $st = $('#status').html();
                    $node = '<p><select name="status' + varCount + '" id="status' + varCount + '" >' + $st + '</select>';
                    $node += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Effective On : &nbsp;&nbsp;<input type="text" name="status_date' + varCount + '" id="status_date' + varCount + '">';
                    $node += '<span class="removeVar"></span></p>';
                    $(this).parent().before($node);
                    $("#status_date" + varCount).datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: "yy-mm-dd"
                    });
                });

                
                $('#addVaralert').live('click', function () {
                    varCount++;
                    $('#total_alert').val(varCount);
                    $node = '<p><input type="text" name="alert[]"  id="alert' + varCount + '"  autocomplete="off" />';
                    $node += '<input id="alertdate' + varCount + '"  name="alertdate[]" placeholder="Alert Date" >';
                    $node += '<span class="removeVar"></span></p>';
                    $(this).parent().before($node);
                    $("#alertdate" + varCount).datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: "yy-mm-dd"
                    });
                });
                $("#alertdate").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "yy-mm-dd"
                });
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
    </body>
</html>