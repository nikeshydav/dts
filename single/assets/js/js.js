$(window).load(function () {

    var js_date_format = 'yy-mm-dd';

    /*
     * login 
     */
    $('.forgot-pass').click(function (event) {
        $(".pr-wrap").toggleClass("show-pass-reset");
        return  false;
    });

    $('.pass-reset-submit').click(function (event) {
        $(".pr-wrap").removeClass("show-pass-reset");
    });


    /*    $('.navbar a').click(function () {
     $('.navbar li').removeClass('active');
     $(this).parent().addClass('active');
     })
     */
    $('#field-alg_ref').change(function () {
        console.log($(this).val());
    });


    var items = [];
    var userlist = [];
    var items_query=[];
    var userlist_query = [];
    $.getJSON("/dts/single/index.php/alerts/get_user_list", function (data) {
        $.each(data, function (key, val) {
            valuetext = val.replace(",", "");
            items.push("<option value='" + valuetext + "'>" + valuetext + "</li>");
            userlist.push("<option value='" + valuetext + "'>" + valuetext + "</li>");
            
            items_query.push("<option value='" + key + "'>" + val + "</li>");
            userlist_query.push("<option value='" + key + "'>" + val + "</li>");
        });
    });
    


    assign_user = function ($id, $select, $obj) {
        $url = window.location.pathname;
        db_group = 'maintenance';
        if ($url.search('prosecution') >= 1) {
            db_group = 'prosecution';
        }else if ($url.search('opposition') >= 1) {
            db_group = 'opposition';
        }else if ($url.search('patents') >= 1) {
            db_group = 'patents';
        }else if ($url.search('prosecution') >= 1) {
            db_group = 'prosecution';
        }else if ($url.search('enforcement') >= 1) {
            db_group = 'enforcement';
        }else if ($url.search('counseling') >= 1) {
            db_group = 'counseling';
        }else if ($url.search('domain') >= 1) {
            db_group = 'domain';
        }else if ($url.search('design') >= 1) {
            db_group = 'design';
        }else if ($url.search('iplitigation') >= 1) {
            db_group = 'iplitigation';
        }else if ($url.search('litigation') >= 1) {
            db_group = 'litigation';
        }

        $.post("/dts/single/index.php/alerts/update_assign_users",
                {alert_id: $id, user_id: $select, db_group: db_group}
        ).done(function () {
            $('#' + $id).html("<p class='editable'>" + $select + "</p>");
        });

        $('.editable').on('click', function () {
            $id = $(this).parent().attr('id');
            $(this).parent().html('<select  onchange="assign_user(\'' + $id + '\',this.value,$(this));"><option value="0" >Select User</option>' + items + '</select>');
        });
    }

    $('.ajax_list').on('click', '.editable', function () {
        $id = $(this).parent().attr('id');
        $(this).parent().html('<select  onchange="assign_user(\'' + $id + '\',this.value,$(this));"><option value="0" >Select User</option>' + items + '</select>');
    });

    $('.ajax_list').on('click', '.editable_action', function () {
        $id = $(this).attr('rel');
        $(this).parent().html('<select id="assign_alert_option_' + $id + '" onchange="assign_alert(\'' + $id + '\',this.value);"><option value="0" >Select Action</option><option value="1" >No Action</option><option value="2" >Create File Alert</option></select>');
        $('.datepicker-input').datepicker({
            dateFormat: js_date_format,
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true
        });
    });

    $('.ajax_list').on('click', '.datepicker-input', function () {
        $('.datepicker-input').datepicker({
            dateFormat: js_date_format,
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true
        });
    });


    assign_alert = function ($id, $select) {
        if ($select == '0') {
            $('#date_' + $id).hide();
            $('#alert_' + $id).hide();
            $("a[href^='save_alert/" + $id + "']").addClass('hidden');
        } else if ($select == '1' || $select == '2') {
            $('#date_' + $id).show();
            $('#alert_' + $id).show();
            $("a[href^='save_alert/" + $id + "']").removeClass('hidden');
        } else {
            $('#date_' + $id).show();
            $('#alert_' + $id).show();
            $("a[href^='save_alert/" + $id + "']").removeClass('hidden');
        }
    }

    $('.ajax_list').on('click', '.save-alert', function () {
        $link = $(this).attr('href').split("/");
        $id = $link[1];
        $('#date_' + $id).show();
        $('#alert_' + $id).show();
        
        $url = window.location.pathname;
        db_group = 'maintenance';
        if ($url.search('prosecution') >= 1) {
            db_group = 'prosecution';
        }else if ($url.search('opposition') >= 1) {
            db_group = 'opposition';
        }else if ($url.search('patents') >= 1) {
            db_group = 'patents';
        }else if ($url.search('enforcement') >= 1) {
            db_group = 'enforcement';
        }else if ($url.search('counseling') >= 1) {
            db_group = 'counseling';
        }else if ($url.search('domain') >= 1) {
            db_group = 'domain';
        }else if ($url.search('design') >= 1) {
            db_group = 'design';
        }else if ($url.search('iplitigation') >= 1) {
            db_group = 'iplitigation';
        }else if ($url.search('litigation') >= 1) {
            db_group = 'litigation';
        }
        
        var date = $('#date_' + $id).val();
        var alerttype= $('#assign_alert_option_' + $id).val();
        if(alerttype!= '1' && date ==''){
            alert('Please add date before you save this query!');
            return false;
        }
   

        $.ajax({
            method: "POST",
            url: '/dts/single/index.php/alerts/save_alert/' + $id,
            data: {date: date, alert: $('#alert_' + $id).val(), db: db_group, alert_type: alerttype}
        }).done(function (msg) {
            if (msg == 'done') {
                alert("Alert Has been updated.");
                location.reload();
            } else {
                alert("Error!! Try again.");
            }
        });
        return false;
    });


    assign_user_query = function ($id, $select, $obj) {
        $url = window.location.pathname;
        console.log($url);
        db_group = 'maintenance';
        if ($url.search('prosecution') >= 1) {
            db_group = 'prosecution';
        }else if ($url.search('opposition') >= 1) {
            db_group = 'opposition';
        }else if ($url.search('patents') >= 1) {
            db_group = 'patents';
        }else if ($url.search('enforcement') >= 1) {
            db_group = 'enforcement';
        }else if ($url.search('counseling') >= 1) {
            db_group = 'counseling';
        }else if ($url.search('domain') >= 1) {
            db_group = 'domain';
        }else if ($url.search('design') >= 1) {
            db_group = 'design';
        }else if ($url.search('iplitigation') >= 1) {
            db_group = 'iplitigation';
        }else if ($url.search('litigation') >= 1) {
            db_group = 'litigation';
        }


        $.post("/dts/single/index.php/queries/update_assign_users",
                {alert_id: $id, user_id: $select, db_group: db_group}
        ).done(function () {
            var name = $($obj).find('option:selected').text();
            $('#' + $id).html("<p class='editable'>" + $($obj).find('option:selected').text() + "</p>");
        });

        $('.editable').on('click', function () {
            $id = $(this).parent().attr('id');
            $(this).parent().html('<select  onchange="assign_user(\'' + $id + '\',this.value,$(this));" ><option value="0" >Select User</option>' + items + '</select>');
        });
    }

    $('.ajax_list').on('click', '.editable_query', function () {
        $id = $(this).parent().attr('id');
        $(this).parent().html('<select  onchange="assign_user_query(\'' + $id + '\',this.value,$(this));"><option value="0" >Select User</option>' + items_query + '</select>');
    });


    assign_query = function ($id, $select) {
        if ($select == '0') {
            $('#date_' + $id).hide();
            $('#alert_' + $id).hide();
            $("a[href^='save/" + $id + "']").addClass('hidden');
        } else if ($select == '1') {
            $('#date_' + $id).hide();
            $('#alert_' + $id).hide();
            $("a[href^='save/" + $id + "']").removeClass('hidden');
        } else {
            $('#date_' + $id).show();
            $('#alert_' + $id).show();
            $("a[href^='save/" + $id + "']").removeClass('hidden');
        }

    }

    $('.ajax_list').on('click', '.query-save', function () {
        $link = $(this).attr('href').split("/");
        $id = $link[1];
        $('#date_' + $id).show();
        $('#alert_' + $id).show();
        var date = $('#date_' + $id).val();
        var alerttype= $('#assign_query_option_' + $id).val();
        if(alerttype!= '1' && date ==''){
            alert('Please add date before you save this query!');
            return false;
        }
        
        $.ajax({
            method: "POST",
            url: '/dts/single/index.php/queries/save/' + $id,
            data: {date: date, alert: $('#alert_' + $id).val(), dts: $('#dts_' + $id).text(), alert_type: alerttype}
        }).done(function (msg) {
            if (msg == 'done') {
                alert("Query Has been updated.");
                location.reload();
            } else {
                alert("Error!! Try again.");
            }
        });
        return false;
    });

    $('.ajax_list').on('click', '.editable_action_query', function () {
        $id = $(this).attr('rel');
        $file = '';
        if($('#ref_' + $id).text()!='......'){
            $file = '<option value="2" >Create File Alert</option>';
        }
        $(this).parent().html('<select id="assign_query_option_' + $id + '"  onchange="assign_query(\'' + $id + '\',this.value);"><option value="0" >Select Action</option><option value="1" >No Action</option>'+$file+'<option value="3" >Create Calender Alert</option></select>');
        $('.datepicker-input').datepicker({
            dateFormat: js_date_format,
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true
        });
    });

    $('.datepicker-input').datepicker({
        dateFormat: js_date_format,
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true
    });
    
    
    $('.ajax_list').on('click', '.editable_dts', function () {
        $id = $(this).attr('rel');
        $(this).parent().html('<input  id="ref_' + $id + '" onblur="assign_ref(\'' + $id + '\',this.value, \''+ $('#dts_' + $id).text() +'\');" value="" />');        
    });
    
    assign_ref=function($id, $select,$dts) {
        //alert($id +':'+$select+':'+$dts);
        $.ajax({
            method: "POST",
            url: '/dts/single/index.php/queries/assign_ref/' + $id,
            data: {id: $id, ref: $select, db: $dts}
        }).done(function (msg) {
            if (msg == 'done') {
                alert("Alg Ref. Has been updated.");
                location.reload();
            } else {
                alert("Error!! Try again.");
            }
        });
    }


});