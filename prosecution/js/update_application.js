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
    //$(".combobox").combobox();
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
    $('#fill_date').click(function() {
        var a = $("#filing_date").val();
        $("#priority_date").val(a);
        $("#priority_ref_no").val(a);
    });
    $('#priority_date').change(function() {
        var priority_date_ref = $("#priority_date").val();
        $("#priority_ref_no").val(priority_date_ref);
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
    $('#app_no,#classes,#mark,#client_ref_no,#applicant_ref_no').keyup(function() {

        var apn = $("#app_no").val();
        var cls = $("#classes").val();
        var mrk = $("#mark").val();
        var cli_ref = $("#client_ref_no").val();
        var app_ref = $("#applicant_ref_no").val();
        $(".client_ref_no").val(cli_ref);
        $(".applicant_ref_no").val(app_ref);
        $("#alg_apln").val(apn);
        $("#alg_class").val(cls);
        $("#alg_mark").val(mrk);
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