<?php
if (basename($_SERVER['SCRIPT_NAME']) == 'update_application.php') {
    ?>
    <tr> <td> Status Recordals :</td> <td>
            <?php
            $ids = $obj->id;
            $sql = "SELECT a.id,sr.status_recordals,sr.status_recordals_date FROM application a, status_recordals sr WHERE a.id=sr.status_recordals_app_id and a.id = '" . $ids . "' order by id DESC ";
            $show = mysql_query($sql);
            $i = 0;
            while ($result = mysql_fetch_array($show)) {
                $status_recordals = $result['status_recordals'];
                $status_recordals_date = $result['status_recordals_date'];
                $i++;
                ?>
            <script>
    $(function() {
        
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
                            <option <?php echo ($status_recordals == 'TM-16 - ALG Substitution as agent') ? 'selected="selected"' : '' ?> >TM-16 - ALG Substitution as agent</option>
                            <option <?php echo ($status_recordals == 'TM-16 - Name/address change of Applicant') ? 'selected="selected"' : '' ?> >TM-16 - Name/address change of Applicant</option>
                            <option <?php echo ($status_recordals == 'TM-16 - Deletion of Goods/Services') ? 'selected="selected"' : '' ?> >TM-16 - Deletion of Goods/Services</option>
                            <option <?php echo ($status_recordals == 'TM-16 - Minor modification of mark') ? 'selected="selected"' : '' ?> >TM-16 - Minor modification of mark</option>
                            <option <?php echo ($status_recordals == 'TM-16 - Class number change') ? 'selected="selected"' : '' ?> >TM-16 - Class number change</option>
                            <option <?php echo ($status_recordals == 'TM-16 - Use-claim change') ? 'selected="selected"' : '' ?> >TM-16 - Use-claim change</option>
                        </select></label>
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
                        <option>TM-16 - ALG Substitution as agent</option>
                        <option>TM-16 - Name/address change of Applicant</option>
                        <option>TM-16 - Deletion of Goods/Services</option>
                        <option>TM-16 - Minor modification of mark </option>
                        <option>TM-16 - Class number change</option>
                        <option>TM-16 - Use-claim change</option>
                    </select></label><br>
                <label>Effective On : <input type="text" name="status_recordals_date1" id="status_recordals_date1" autocomplete="off"></label>
                <span class="removeVar"></span></div>
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
    var startingNoP = 0;
    var $nodeP = "";
    var varCountP = <?php echo ( $i > 0 ? $i : 0 ) ?>;

    $('.removeStatusRecordals').live('click', function() {
        $(this).parent().remove();
    });

    $('#addStatusRecordals').live('click', function() {

        varCountP++;
        $('#total_status_recordals').val(varCountP);

        $nodeP = '<div><label><select name="status_recordals' + varCountP + '" id="status_recordals' + varCountP + '">' +
                '<option value="select">--Select--</option>' +
                '<option>TM-16 - ALG Substitution as agent</option>' +
                '<option>TM-16 - Name/address change of Applicant</option>' +
                '<option>TM-16 - Deletion of Goods/Services</option>' +
                '<option>TM-16 - Minor modification of mark </option>' +
                '<option>TM-16 - Class number change</option>' +
                '<option>TM-16 - Use-claim change</option>' +
                '</select></label><br>';
        $nodeP += '<label>Effective On : <input type="text" name="status_recordals_date' + varCountP + '" id="status_recordals_date' + varCountP + '" autocomplete="off"></label>';
        $nodeP += '<br><br><span class="removeStatusRecordals" style="float: right;margin: -15px 5px 0 0;padding: 3px">Remove Status Recordals</span></div>';
        $(this).parent().before($nodeP);
        $("#status_recordals_date" + varCountP).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    });
    });
</script>