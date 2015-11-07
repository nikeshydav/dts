<?php
ini_set('display_errors', 'off');
require_once 'include/session.php';
?>
<?php
include "class.docket.php";
$obj = new docket();
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

        <!--Below are two js for editor
        <script type="text/javascript" src="editor/jscripts/tiny_mce/tiny_mce.js"></script>
        <script type="text/javascript" src="editor/jscripts/tarun.js"></script>  -->
        <style>
            #addVar,#addPetitioner,#addRespondent{background: none repeat scroll 0 0 #000000;color: #FFFFFF;padding: 3px;cursor: pointer;}
            .removePetitioner,.removeRespondent {background: none repeat scroll 0 0 #8d8d8d;color: #FFFFFF;padding: 3px;cursor: pointer;}
            .custom-combobox {position: relative;display: inline-block;}
            .custom-combobox-toggle {position: absolute;top: 0;bottom: 0;margin-left: -1px;padding: 0;/* support: IE7 */*height: 1.7em;*top: 0.1em;}
            .custom-combobox-input {margin: 0;padding: 0.3em;}
            .ui-state-default .ui-icon {background-image: url("images/ui-icons_888888_256x240.png");}
            .custom-combobox input { width:250px;}
        </style>  
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
                        <tr> <td> A/C Type :</td> <td><select  name="ac_type" id="ac_type" >
                                    <option value="none">--Select--</option>
                                    <option>LITN</option>
                                </select></td></tr>    
                        <tr> <td> Court  :</td> <td><input type="text" name="court" id="court" autocomplete="off" /></td></tr>
                        <tr> <td> Case Type :</td> <td><input type="text" name="case_type" id="case_type" autocomplete="off" /></td></tr>
                        <tr> <td> Case# :</td> <td><input type="text" name="case_hash" id="case_hash" autocomplete="off" /></td></tr>
                        <tr> <td> Client Entity :</td> <td>
                                <?php $obj->applicants(); ?>
                                <!--                                <a class="fancybox fancybox.iframe" href="iframe.php?pop=yes">Add Applicant</a>-->
                                <input type="text" maxlength="3" name="applicant_ref_no" id="applicant_ref_no" class="applicant_ref_no" autocomplete="off" /><br>
<div id="code_error_app"></div>
                                <a class="fancybox fancybox.iframe" href="iframe.php?pop=yes&current_ent=app_ent">Add Entity</a>
                            </td></tr>
                        <tr> <td> Intermediary Entity :</td> <td><?php $obj->clients(); ?>
                                <!--                                <a class="fancybox fancybox.iframe" href="iframe.php?popup=yes">Add Client</a>-->
                                <input type="text" maxlength="3" name="client_ref_no" id="client_ref_no" class="client_ref_no" autocomplete="off" /><br>
<div id="code_error_cli"></div>
                                <a class="fancybox fancybox.iframe" href="iframe.php?pop=yes&current_ent=cli_ent">Add Entity</a>
<!--                                <input type="text" name="client_no1" style="width:700px;" id="client_no1" /> -->
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
                       <tr> <td> Filing Date :</td> <td><input type="text" name="filing_date" id="filing_date" autocomplete="off" /> </td></tr>      
                       <?php include "petitioner.php"; ?>
                       <?php include "respondent.php"; ?>
                       <tr> <td> Petitioner(s)' Property(ies)  :</td> <td><input type="text" name="petitioner_property" id="petitioner_property" autocomplete="off" /></td></tr>
                      <tr> <td> Respondent(s)' Property(ies) :</td> <td><input type="text" name="respondent_property" id="respondent_property" autocomplete="off" /> </td></tr>
                        <tr> <td valign="top"> Status Litigation :</td> <td><div class="status"><p><label for="var1"><select name="status1" id="status"><option value="select">--Select--</option><?php $obj->show_status(); ?></select>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/> Effective On : &nbsp;&nbsp;<input type="text" name="status_date1" id="status_date1" autocomplete="off">&nbsp;&nbsp; </label>
                                        <span class="removeVar"></span></p></div>
                                <p> 
                                    <span id="addVar">Add Status</span>
                                </p>
                                <input type="hidden" name="total_status" value="1" id="total_status">   

                            </td></tr>
                        <tr> <td style="vertical-align: top;"> History Status :</td><td>
                                <?php $obj->history_sheet_status(); ?><br/>
                                <input type="text" id="history_name" autocomplete="off">&nbsp;
                                <input type="text" id="history_date" autocomplete="off">                                
                                <input type="button" value="Submit" id="history_submit">
                                <span id="history_txt"><textarea rows="7" cols="40" name="history" id="history" ></textarea></span></td></tr>
                        <tr> <td style="vertical-align: top;"> File Noting :</td> <td><textarea name="pending_record" id="pending_record"></textarea></td></tr>
                        <tr> <td> Client Ref :</td> <td><input type="text" name="cl_ref_no" id="cl_ref_no" autocomplete="off" /> </td></tr>
                        <tr> <td> Alg File :</td> <td>
                                 <input type="text" name="alg_file_text1" id="alg_file_text1" /> V 
                                 <input type="text" name="alg_file_text2" id="alg_file_text2" />
                                
                            </td></tr>
                        
                        <?php
                        $alg_sql = "SELECT alg_serialno from year_serialno where alg_id>=1 order by alg_id desc limit 0,1";
                        $alg_show = mysql_query($alg_sql);
                        //echo $numrows = mysql_num_rows($alg_show);
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
                        <input type="hidden" name="alg_ac_type" id="alg_ac_type" class="alg_ac_type" readonly/>
                        <input type="hidden" name="applicant_ref_no" id="applicant_ref_no" class="applicant_ref_no" readonly/>
                        <input type="hidden" name="client_ref_no" id="client_ref_no" class="client_ref_no" readonly/>
                        <input type="hidden" name="priority_ref_no" id="priority_ref_no" readonly />
                        <input type="hidden" name="year_ref_no" id="year_ref_no" value="<?php echo $total_score; ?>" readonly />                        
                        <tr> <td> </td> <td><input type="submit" id="submit_app" value="Submit" /> </td></tr>                                
                    </table>
                </form>
                <table><tr>


                    </tr> </table>
            </div>               
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
                $("#adversary_entity").combobox({
                                            select: function(event, ui) {
                                                var adv_ent = $(this).val();
                                                $.ajax({
                                                    type: 'post',
                                                    url: 'check_adv_entity_code.php?adv_entity_id=' + adv_ent,
                                                    data: $(this).serialize(),
                                                    success: function(data) {
                                                        if (data) {
                                                            $("#adversary_ent").val(data);
                                                        }
                                                    }
                                                });
                                            }
                                        });
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
                                    //$('.client_mail').html('');                  
                                    //$('.client_mail').append($AppemailOpt);
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
                                    //$('.client_mail').html('');
                                    //$('.client_mail').append($CliemailOpt);
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
                
                $('#ac_type').change(function() {
                                    var a = $("#ac_type").val();
                                    $("#alg_ac_type").val(a);
                                });
                
                $('#history_submit').live('click', function() {
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
                
               
                $('#dispute_type,#dispute_forum,#case_no,#mark_client,#adversary_do_name,#client_ref_no,#applicant_ref_no').keyup(function() {
                    var dispute_t = $("#dispute_type").val();
                    var dispute_f = $("#dispute_forum").val();
                    var case_n = $("#case_no").val();
                    var mar = $("#mark_client").val();
                    var cli_ref = $("#client_ref_no").val();
                    var app_ref = $("#applicant_ref_no").val();
                    $(".client_ref_no").val(cli_ref);
                    $(".applicant_ref_no").val(app_ref);
                    var adv_domain = $("#adversary_do_name").val();
                    $("#dispute_ty").val(dispute_t);
                    $("#dispute_fo").val(dispute_f);
                    $("#cas").val(case_n);
                    $("#cli_mark").val(mar);
                    
                    $("#adversary_do").val(adv_domain);
                    
                });
                var startingNo = 0;
                var $node = "";
                for (varCount = 0; varCount <= startingNo; varCount++) {
                    //var displayCount = varCount + 1;
                    //$node += '<p><label for="var' + displayCount + '">Variable ' + displayCount + ': </label><input type="text" name="var' + displayCount + '" id="var' + displayCount + '"><span class="removeVar"></span></p>';
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
            $ac_type = $_POST['ac_type'];
            $court = $_POST['court'];
            $case_type = $_POST['case_type'];
            $case_hash = $_POST['case_hash'];
            $applicant = $_POST['applicant'];
            $client = $_POST['client'];
            $filing_date = $_POST['filing_date'];
            $petitioner_property = $_POST['petitioner_property'];
            $respondent_property = $_POST['respondent_property'];
            $history = addslashes($_POST['history']);
            $pending_record = $_POST['pending_record'];
            $cl_ref_no = $_POST['cl_ref_no'];

            $obj->apply_new($ac_type, $court,$case_type, $case_hash, $applicant,$client,$filing_date,$petitioner_property,$respondent_property, $history, $pending_record, $cl_ref_no);
        }
        ?>        
    </body>
</html>
