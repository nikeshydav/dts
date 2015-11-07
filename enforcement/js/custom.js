$(function () {
    $('.alphabetsOnly').keyup(function () {
        this.value = this.value.replace(/[^a-z||A-Z\.||^0-9\.||\^$.,/\ ]/g, '');
    });

    $('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });

    $('#submit_user').click(function () {
        $('.invalid').removeClass('invalid');
        var name = $('#name').val();
        var name_code = $('#name_code').val();
        var email = $('#email').val();
        var lawfirm = $('#lawfirm').val();
        var lawfirm_code = $('#lawfirm_code').val();
        var address = $('#address').val();

        var mob = /^[1-9]{1}[0-9]{9}$/;
        var pattern_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (name == "") {
            $('#name').addClass('invalid');
            $('#name').focus();
            return false;
        }
        if (name_code == "") {
            $('#name_code').addClass('invalid');
            $('#name_code').focus();
            return false;
        }
        if (lawfirm_code == "") {
            $('#lawfirm_code').addClass('invalid');
            $('#lawfirm_code').focus();
            return false;
        }
        ;
    });
    $('#submit_client').click(function () {
        $('.invalid').removeClass('invalid');
        var lawfirm = $('#lawfirm').val();
        var lawfirm_code = $('#lawfirm_code').val();

        if (lawfirm == "") {
            $('#lawfirm').addClass('invalid');
            $('#lawfirm').focus();
            return false;
        }
        if (lawfirm_code == "") {
            $('#lawfirm_code').addClass('invalid');
            $('#lawfirm_code').focus();
            return false;
        }
    });
    $('#submit_app').click(function () {
        $('.invalid').removeClass('invalid');
        var app_no = $('#app_no').val();
        var mark = $('#mark').val();
        var classes = $('#classes').val();
        var filing_date = $('#filing_date').val();
        var applicant = $('#applicant').val();
        var client = $('#client').val();
        //var priority_date = $('#priority_date').val();
        var jurisdiction = $('#jurisdiction').val();
        //var status = $('#status').val();
        var cl_ref_no = $('#cl_ref_no').val();
        if (app_no == "") {
            $('#app_no').addClass('invalid');
            $('#app_no').focus();
            return false;
        }
        ;
        if (mark == "") {
            $('#mark').addClass('invalid');
            $('#mark').focus();
            return false;
        }
        ;
        if (classes == "") {
            $('#classes').addClass('invalid');
            $('#classes').focus();
            return false;
        }
        ;
        if (filing_date == "") {
            $('#filing_date').addClass('invalid');
            $('#filing_date').focus();
            return false;
        }
        ;
        if (applicant == "") {
            alert("Please Enter Client Entity");
            return false;
        }
        ;

        if (client == "") {
            alert("Please Enter Intermediary Entity ");
            return false;
        }
        ;
        /*if (priority_date == "") {
         $('#priority_date').addClass('invalid');
         $('#priority_date').focus();
         return false;
         }*/
        if (jurisdiction == "select") {
            alert("Please Enter jurisdiction");
            return false;
        }
        //if (status == "select") {
        //alert("Please Enter status");
        //return false;
        //}
        ;
    });
    /*
     * start by manish on 12/3/14
     */
    $('#name_code').keyup(function () {
        this.value = this.value.toUpperCase();
        var x = $("#name_code").val().toUpperCase();
        $.ajax({
            type: 'post',
            url: 'checknamecode.php?name_code=' + x,
            data: $(this).serialize(),
            success: function (data) {
                if (data) {
                    $('#code_error').html(data).addClass('error');
                    $('#submit_user').attr('disabled', 'disabled');
                } else {
                    $('#code_error').html('').removeClass('error');
                    $('#submit_user').removeAttr('disabled');
                }
            }
        });
    });
    $('.fancybox').fancybox();
    $("#status_list").sortable({
        update: function () {
            $("#status_list li").each(function (index) {
                id = $(this).attr('rel');
                sno = index + 1;
                $.post("reorderstatus.php", {o: index, id: id});
                $('#order' + id + ' dl > dt:first-child').html(sno);
            });
        }
    });
    /*
     * end by manish on 12/3/14
     */
    $("#priority_date,#filing_date,#prior_use_india,#prior_use_international,#prior_use_adversary,#status_date,#status_date1,#status_date2,#status_date3,#status_date4,#status_date5,#status_date6,#status_date7,#status_date8,#status_date9,#status_date10,#snooze,#priority_ref_no,#history_date,#adversary_letter_date0,#client_cd_date0").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    });

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

    $('#add_adversery_box').live('click', function () {
        varCount++;
        $('#total_status').val(varCount);
        $ae = $('#adversary_entity').html();
        $node = '<p><select name="adversary_entity[]" id="adversary_entity' + varCount + '" class="combobox">' + $ae + '</select>';
        $node += '<span class="removeVar"></span></p>';
        $(this).parent().before($node);
        $("#adversary_entity" + varCount).combobox({
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

    });
    $('.removeParent').on('click',function(){
       $(this).parent() .remove();
    });
});
