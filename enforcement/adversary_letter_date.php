<?php
if (basename($_SERVER['SCRIPT_NAME']) == 'update_application.php') {
    ?>
<tr> <td> Adversary Letter Date :</td> <td>
            <?php
            $ids = $obj->id;
            $sql = "SELECT ald.adv_date_id,ald.adversary_letter_date,a.id FROM adversary_letter_date ald, application a WHERE a.id=ald.adv_app_id and a.id = '" . $ids . "' order by id DESC ";
            $show = mysql_query($sql);
            $i = 0;
            while ($result = mysql_fetch_array($show)) {
                $adv_date_id = $result['adv_date_id'];
                $adversary_letter_date = $result['adversary_letter_date'];
                ?>
<script>
    $(function() {
        
$("#adversary_letter_date<?php echo $i ?>").datepicker({
changeMonth: true,
changeYear: true,
dateFormat: "yy-mm-dd"
});
});
</script>
                <div class="adversary_letter"><p><label for="var1">
                            <input type="text" name="adversary_letter_date<?php echo $i ?>" id="adversary_letter_date<?php echo $i ?>" value="<?php echo $adversary_letter_date ?>" autocomplete="off" /><br><br>
                            <span class="removeAdvLetter" style="float: right;margin: -15px 5px 0 0;padding: 3px">Remove Adversary Date</span>
                        </label>
                        <?php
                        $i++;
                    }
                    ?>
                    </p></div>
                   <p><span id="addAdvLetter">Add Adversary Date</span></p>
        </td></tr>
    <?php
} else {
    ?>
    <tr> <td> Adversary Letter Date :</td> <td>
            <div class="letter"><p><label for="var1">
                       <input type="text" name="adversary_letter_date0" id="adversary_letter_date0" autocomplete="off" />
                    </label>
                    </p></div>
                    <p><span id="addAdvLetter">Add Adversary Date</span></p>
        </td></tr>
    <?php
    $i = 1;
}
?>

<script>
var startingNoAdv = 0;
var $nodeAdv = "";
var varCountAdv = <?php echo ( $i > 0 ? $i : 0 ) ?>;
$('.adversary_letter').prepend($nodeAdv);

$('.removeAdvLetter').live('click', function() {
        if(varCountAdv == 1){
            alert("Can't Remove Of This Adversary Date");
            return false;
        }
        $(this).parent().remove();
    varCountAdv--;
});
$('#addAdvLetter').live('click', function() {

    $nodeAdv = '<p><input type="text" name="adversary_letter_date' + varCountAdv + '" id="adversary_letter_date' + varCountAdv + '" autocomplete="off">';
    $nodeAdv += '<br><br><span class="removeAdvLetter" style="float: right;margin: -15px 5px 0 0;padding: 3px">Remove Adversary Date</span></p>';
    $(this).parent().before($nodeAdv);
    $("#adversary_letter_date" + varCountAdv).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    });
    varCountAdv++;
});
</script>