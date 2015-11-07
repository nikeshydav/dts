<?php
if (basename($_SERVER['SCRIPT_NAME']) == 'update_application.php') {
    ?>
<tr> <td> Client c & d date :</td> <td>
            <?php
            $ids = $obj->id;
            $sql = "SELECT ccd.client_date_id,ccd.client_cd_date,a.id FROM client_cd_date ccd, application a WHERE a.id=ccd.client_app_id and a.id = '" . $ids . "' order by id DESC ";
            $show = mysql_query($sql);
            $x = 0;
            while ($result = mysql_fetch_array($show)) {
                $client_date_id = $result['client_date_id'];
                $client_cd_date = $result['client_cd_date'];
                ?>
<script>
    $(function() {
        
$("#client_cd_date<?php echo $x ?>").datepicker({
changeMonth: true,
changeYear: true,
dateFormat: "yy-mm-dd"
});
});
</script>
                <div class="adversary_client_date"><p><label for="var1">
                            <input type="text" name="client_cd_date<?php echo $x ?>" id="client_cd_date<?php echo $x ?>" value="<?php echo $client_cd_date ?>" autocomplete="off" /><br><br>
                            <span class="removeCliDate" style="float: right;margin: -15px 5px 0 0;padding: 3px">Remove Client Date</span>
                        </label>
                        <?php
                        $x++;
                    }
                    ?>
                    </p></div>
                   <p><span id="addCliDate">Add Client Date</span></p>
        </td></tr>
    <?php
} else {
    ?>
    <tr> <td> Client c & d date :</td> <td>
            <div class="letter"><p><label for="var1">
                       <input type="text" name="client_cd_date0" id="client_cd_date0" autocomplete="off" />
                    </label>
                    </p></div>
                    <p><span id="addCliDate">Add Client Date</span></p>
        </td></tr>
    <?php
    $x = 1;
}
?>

<script>
var startingNocli = 0;
var $nodecli = "";
var varCountcli = <?php echo ( $x > 0 ? $x : 0 ) ?>;
$('.adversary_client_date').prepend($nodecli);

$('.removeCliDate').live('click', function() {
        if(varCountcli == 1){
            alert("Can't Remove Of This Client Date");
            return false;
        }
        $(this).parent().remove();
    varCountcli--;
});
$('#addCliDate').live('click', function() {

    $nodecli = '<p><input type="text" name="client_cd_date' + varCountcli + '" id="client_cd_date' + varCountcli + '" autocomplete="off">';
    $nodecli += '<br><br><span class="removeCliDate" style="float: right;margin: -15px 5px 0 0;padding: 3px">Remove Client Date</span></p>';
    $(this).parent().before($nodecli);
    $("#client_cd_date" + varCountcli).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    });
    varCountcli++;
});
</script>