$(function() {
    $('.alphabetsOnly').keyup(function() {
        this.value = this.value.replace(/[^a-z||A-Z\.||^0-9\.||\^$.,/\ ]/g, '');
    });

    $('.numbersOnly').keyup(function() {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });




    $('#submit_user').click(function() {
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
        /*if (!pattern_email.test(email)) {
         $('#email').addClass('invalid');
         $('#email').focus();
         return false;
         };
         if (mob.test($.trim(mobile)) == false) {
         $("#mobile").addClass('invalid');
         $("#mobile").focus();
         return false;
         }
         if (lawfirm == "") {
         $('#lawfirm').addClass('invalid');
         $('#lawfirm').focus();
         return false;
         };
         if (address == "") {
         $('#address').addClass('invalid');
         $('#address').focus();
         return false;
         };*/


        /*var role = document.getElementsByName('role');
         var isRoleChecked = false;
         for ( i = 0; i < role.length; i++) {
         if (role[i].checked) {
         isRoleChecked = true;
         i = role.length;
         }
         }
         if (!isRoleChecked) {
         alert('Please select a Role');
         return false;
         }*/

    });
    $('#submit_client').click(function() {
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
    $('#submit_app').click(function() {
        $('.invalid').removeClass('invalid');
        var app_no = $('#app_no').val();
        var mark = $('#mark').val();
        var classes = $('#classes').val();
        //var user_proposed = $('#user_proposed').val();
        var filing_date = $('#filing_date').val();
        var applicant = $('#applicant').val();
        var client = $('#client').val();
        var priority_date = $('#priority_date').val();
        var jurisdiction = $('#jurisdiction').val();
        //var goods_services = $('#goods_services').val();
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
//        if (user_proposed == "") {
//            $('#user_proposed').addClass('invalid');
//            $('#user_proposed').focus();
//            return false;
//        }
//        ;

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
            alert("Please Intermediary Entity");
            return false;
        }
        ;
        if (priority_date == "") {
            $('#priority_date').addClass('invalid');
            $('#priority_date').focus();
            return false;
        }
        if (jurisdiction == "select") {
            alert("Please Enter Forum");
//            $('#jurisdiction').addClass('invalid');
//            $('#jurisdiction').focus();
            return false;
        }
//        if (goods_services == "") {
//            alert("Please Enter goods_services");
////            $('#goods_services').addClass('invalid');
////            $('#goods_services').focus();
//            return false;
//        }
        //if (status == "select") {
        //alert("Please Enter status");
//            $('#status').addClass('invalid');
//            $('#status').focus();
        //return false;
        //}
        ;

        /*	if (priority_date == "") {
         $('#priority_date').addClass('invalid');
         $('#priority_date').focus();
         return false;
         };
         
         if (cl_ref_no == "") {
         $('#cl_ref_no').addClass('invalid');
         $('#cl_ref_no').focus();
         return false;
         };*/
    });
    $('#submit_alg').click(function() {
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
    /*
     * start by manish on 12/3/14
     */
    $('#name_code').keyup(function() {
        this.value = this.value.toUpperCase();
        var x = $("#name_code").val().toUpperCase();
        $.ajax({
            type: 'post',
            url: 'checknamecode.php?name_code=' + x,
            data: $(this).serialize(),
            success: function(data) {
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

    /*$('#lawfirm_code').keyup(function() {
     var y = $("#lawfirm_code").val();
     $.ajax({
     type: 'post',
     url: 'checknamecode.php?lawfirm_code=' + y,
     data: $(this).serialize(),
     success: function(data) {
     if (data) {
     $('#client_code_error').html(data).addClass('error');
     $('#submit_client').attr('disabled','disabled');
     } else {
     $('#client_code_error').html('').removeClass('error');
     $('#submit_client').removeAttr('disabled');
     }
     }
     });
     });*/
//    $('#lawfirm_code').keyup(function() {
//        var xs = $("#name_code").val();
//        var ys = $("#lawfirm_code").val();
//        var qw = 'Please enter different values';
//    if(xs == ys){
//        $('#client_code_error').html(qw).addClass('error');
//        //alert('Please enter different values');
//        $('#submit_user').attr('disabled','disabled');
//    }else{
//        $('#client_code_error').html('').removeClass('error');
//        $('#submit_user').removeAttr('disabled');
//    }
//     });
//    $('#createpplicant').click(function() {
//$('#add_form').css("display", "block");
//return false;
//});
//$('#removepplicant').click(function(){
//    $('#add_form').css("display", "none");
//    return false;
//});
//$('#alg_form').submit(function(){
//    var az = $("#name_code").val();
//    //alert(az);
//var mn = $("#applicant_ref_no").val(az);
//alert(mn);
//});
    $('.fancybox').fancybox();
    $("#status_list").sortable({
        update: function() {
            $("#status_list li").each(function(index) {
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
    $("#priority_date,#filing_date,#user_proposed,#status_date,#status_date1,#status_date2,#status_date3,#status_date4,#status_date5,#status_date6,#status_date7,#status_date8,#status_date9,#status_date10,#snooze,#priority_ref_no,#history_date,#status_recordals_date1").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    });
});


function popitup(url) {
    newwindow = window.open(url, 'name', 'height=500,width=550');
    if (window.focus) {
        newwindow.focus()
    }
    return false;
}