<?php
if (basename($_SERVER['SCRIPT_NAME']) == 'update_application.php') {
    ?>
    <tr> <td> Status Recordals :</td> <td>
            <?php
            $ids = $obj->id;
            $sql = "SELECT a.id,sr.* FROM application a, status_recordals sr WHERE a.id=sr.status_recordals_app_id and a.id = '" . $ids . "' order by id DESC ";
            $show = mysql_query($sql);
            $i = 0;
            while ($result = mysql_fetch_array($show)) {
                $status_recordals = $result['status_recordals'];
                $status_recordals_for_16tm = $result['status_recordals_for_16tm'];
                $pick_file_textbox = $result['pick_file_textbox'];
                $status_recordals_date = $result['status_recordals_date'];
                $i++;
                ?>
                <script>
                    $(function () {

                        $("#status_recordals_date<?php echo $i ?>").datepicker({
                            changeMonth: true,
                            changeYear: true,
                            dateFormat: "yy-mm-dd"
                        });
                    });
                </script>
                <div>
                    <label><select name="status_recordals<?php echo $i; ?>" id="status_recordals<?php echo $i; ?>">
                            <option value="select">--Select--</option>
                            <option <?php echo ($status_recordals == 'TM-16') ? 'selected="selected"' : '' ?> >TM-16</option>
                            <option <?php echo ($status_recordals == 'TM-24') ? 'selected="selected"' : '' ?> >TM-24</option>
                            <option <?php echo ($status_recordals == 'TM-33') ? 'selected="selected"' : '' ?> >TM-33</option>
                            <option <?php echo ($status_recordals == 'TM-34') ? 'selected="selected"' : '' ?> >TM-34</option>
                            <option <?php echo ($status_recordals == 'TM-35') ? 'selected="selected"' : '' ?> >TM-35</option>
                            <option <?php echo ($status_recordals == 'TM-36') ? 'selected="selected"' : '' ?> >TM-36</option>
                            <option <?php echo ($status_recordals == 'TM-38') ? 'selected="selected"' : '' ?> >TM-38</option>
                            <option <?php echo ($status_recordals == 'TM-40') ? 'selected="selected"' : '' ?> >TM-40</option>
                            <option <?php echo ($status_recordals == 'TM-50') ? 'selected="selected"' : '' ?> >TM-50</option>
                            <option <?php echo ($status_recordals == 'TM-53') ? 'selected="selected"' : '' ?> >TM-53</option>
                        </select></label><br>
                    <?php if ($status_recordals == 'TM-16') { ?>
                        <div id="node_status_remove<?php echo $i; ?>">
                            <label><select name="status_recordals_for_16tm<?php echo $i ?>" id="status_recordals_for_16tm<?php echo $i ?>">
                                    <option value="select">--Select--</option>
                                    <option <?php echo ($status_recordals_for_16tm == 'ALG Substitution as agent') ? 'selected="selected"' : '' ?> >ALG Substitution as agent</option>
                                    <option <?php echo ($status_recordals_for_16tm == 'Name/address change of Applicant') ? 'selected="selected"' : '' ?> >Name/address change of Applicant</option>
                                    <option <?php echo ($status_recordals_for_16tm == 'Deletion of Goods/Services') ? 'selected="selected"' : '' ?> >Deletion of Goods/Services</option>
                                    <option <?php echo ($status_recordals_for_16tm == 'Minor modification of mark') ? 'selected="selected"' : '' ?> >Minor modification of mark</option>
                                    <option <?php echo ($status_recordals_for_16tm == 'Class number change') ? 'selected="selected"' : '' ?> >Class number change</option>
                                    <option <?php echo ($status_recordals_for_16tm == 'Use-claim change') ? 'selected="selected"' : '' ?> >Use-claim change</option>
                                    <option <?php echo ($status_recordals_for_16tm == 'Typographical error correction') ? 'selected="selected"' : '' ?> >Typographical error correction</option>
                                </select></label><br>
                        </div>
                    <?php } ?>
                    <div id="node_status<?php echo $i; ?>"></div>
                    <label>
                        <input type="text" name="pick_file<?php echo $i; ?>" id="pick_file<?php echo $i; ?>" style="<?php echo ($pick_file_textbox == '') ? 'display:none' : ''; ?>" value="<?php echo $pick_file_textbox ?>" autocomplete="off" />
                        <input type="checkbox" name="pick_file_chk<?php echo $i; ?>" id="pick_file_chk<?php echo $i; ?>" <?php echo ($pick_file_textbox == '') ? 'checked="checked"' : ''; ?>  class="pick_file_chk">Pick this file as lead file
                    </label><br>
                    <label>Effective On : <input type="text" name="status_recordals_date<?php echo $i; ?>" id="status_recordals_date<?php echo $i; ?>" value="<?php echo $status_recordals_date ?>" autocomplete="off"></label>
                    <span class="removeStatusRecordals">Remove Status Recordals</span>
                </div>
                <?php
            }
            ?>
            <!--                    </p></div>-->
            <p><span id="addStatusRecordals">Add Status Recordals</span></p>
            <input type="hidden" name="total_status_recordals" value="<?php echo $i ?>" id="total_status_recordals">
        </td></tr>
    <?php
} else {
    ?>
    <tr> <td valign="top"> Status Recordals :</td> <td><div><label><select name="status_recordals1" id="status_recordals1">
                        <option value="select">--Select--</option>
                        <option>TM-16</option>
                        <option>TM-24</option>
                        <option>TM-33</option>
                        <option>TM-34</option>
                        <option>TM-35</option>
                        <option>TM-36</option>
                        <option>TM-38</option>
                        <option>TM-40</option>
                        <option>TM-50</option>
                        <option>TM-53</option>
                    </select></label><br>
                <div id="node_status1"></div>
                <label class="status_recordal_label">
                    <div>
                        Lead  Regn #<input type="text" name="pick_file1" id="pick_file1" autocomplete="off" />
                        <input type="checkbox" name="pick_file_chk1" id="pick_file_chk1" class="pick_file_chk"><label for="pick_file_chk1">Pick this file as lead file </label>
                    </div>
                    <div class="clearfix"></div>
                    <div>
                        <span class="effect_date" id="effect_date1">Effective On :</span> <input type="text" name="status_recordals_date1" id="status_recordals_date1" autocomplete="off">
                    </div>
                </label>
                <span class="removeVar"></span></div>
            <div class="clearfix"></div>
            <p>
                <span id="addStatusRecordals">Add Status Recordals</span>
            </p>
            <input type="hidden" name="total_status_recordals" value="1" id="total_status_recordals">

        </td></tr>
    <?php
    $i = 1;
}
?>

<script>
    $("#pick_file_chk1").button();
    var startingNoP = 0;
    var $nodeP = "";
    var varCountP = <?php echo ( $i > 0 ? $i : 0 ) ?>;

    $('.removeStatusRecordals').live('click', function () {
        $(this).parent().remove();
    });

    $('#addStatusRecordals').live('click', function () {
        varCountP++;
        $('#total_status_recordals').val(varCountP);

        $nodeP = '<div><label><select name="status_recordals' + varCountP + '" id="status_recordals' + varCountP + '">' +
                '<option value="select">--Select--</option>' +
                '<option>TM-16</option>' +
                '<option>TM-24</option>' +
                '<option>TM-33</option>' +
                '<option>TM-34</option>' +
                '<option>TM-35</option>' +
                '<option>TM-36</option>' +
                '<option>TM-38</option>' +
                '<option>TM-40</option>' +
                '<option>TM-50</option>' +
                '<option>TM-53</option>' +
                '</select></label><br>';
        $nodeP += '<div id="node_status' + varCountP + '"></div>';
        $nodeP += '<label><div>Lead  Regn #<input type="text" name="pick_file' + varCountP + '" id="pick_file' + varCountP + '" autocomplete="off" />' +
                '<input type="checkbox" class="pick_file_chk" name="pick_file_chk' + varCountP + '" id="pick_file_chk' + varCountP + '"><label for="pick_file_chk' + varCountP + '">Pick this file as lead file </label></div><div class="clearfix"></div>';
        $nodeP += '<div><span  class="effect_date" id="effect_date' + varCountP + '">Effective On :</span> <input type="text" name="status_recordals_date' + varCountP + '" id="status_recordals_date' + varCountP + '" autocomplete="off"></div></label>';
        $nodeP += '<br><br><span class="removeStatusRecordals" style="float: right;margin: -15px 5px 0 0;padding: 3px">Remove Status Recordals</span></div>';
        $(this).parent().before($nodeP);
        $("#status_recordals_date" + varCountP).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });

        $(".pick_file_chk").button();
    });


<?php for ($j = 1; $j <= 10; $j++) { ?>;
        $("#pick_file_chk<?php echo $j ?>").live('click', function () {
            //alert(<?php //echo $j                                                          ?>);
            var ischecked = $('#pick_file_chk<?php echo $j ?>').attr('checked') ? true : false;
            if (ischecked) {
                $("#pick_file<?php echo $j ?>").hide();
                $('#pick_file<?php echo $j ?>').val('');
            } else {
                $("#pick_file<?php echo $j ?>").show();
            }
        });
        $("#status_recordals<?php echo $j ?>").live('change', function () {
            var st_rd = $("#status_recordals<?php echo $j ?>").val();
            switch (st_rd) {
                case 'TM-24':
                case 'TM-33':
                case 'TM-34':
                    $nodeStatus = '<label class="status_recordal_label"><div>PR#<input name="pr" ></div><div>Event Date#<input  name="event_Date" id="event_date<?php echo $j ?>"> </div><div>Pre-event#<input name="pre_event" > </div><div>Post-event#<input  name="post_event" > </div></label><br>';
                    $("#node_status<?php echo $j ?>").html($nodeStatus);
                    $("#event_date<?php echo $j ?>").datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: "yy-mm-dd"
                    });
                    console.log($(this).parent().siblings('label').children());
                    //$("#leadregn<?php echo $j ?>").text();
                    $("#effect_date<?php echo $j ?>").text('Date of filing :');
                    break;

                case 'TM-16':
                    $nodeStatus = '<label><select name="status_recordals_for_16tm<?php echo $j ?>" id="status_recordals_for_16tm<?php echo $j ?>">' +
                            '<option value="select">--Select--</option>' +
                            '<option>ALG Substitution as agent</option>' +
                            '<option>Name/address change of Applicant</option>' +
                            '<option>Deletion of Goods/Services</option>' +
                            '<option>Minor modification of mark</option>' +
                            '<option>Class number change</option>' +
                            '<option>Use-claim change</option>' +
                            '<option>Typographical error correction</option>' +
                            '</select></label><br>';
                    $("#node_status<?php echo $j ?>").html($nodeStatus);
                    $("#effect_date<?php echo $j ?>").text('Effective On :');
                    break;

                default:
                    $("#node_status_remove<?php echo $j ?>").remove();
                    $("#node_status<?php echo $j ?>").html('');
                    $("#effect_date<?php echo $j ?>").text('Effective On :');
            }

        });

<?php } ?>
</script>