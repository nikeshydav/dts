<?php
if (basename($_SERVER['SCRIPT_NAME']) == 'update.php') {
    ?>
<tr> <td> E-MAIL :</td> <td>
            <?php
            $ids = $obj->id;
            $sql = "SELECT u.id,uee.email FROM user u, user_entity_email uee WHERE u.id=uee.user_id and u.id = '" . $ids . "' order by id DESC ";
            $show = mysql_query($sql);
            $i = 0;
            while ($result = mysql_fetch_array($show)) {
                $auto_id = $result['auto_id'];
                $email = $result['email'];
                $i++;
                ?>
                <div class="email_id"><p><label for="var1">
                            <label><input type="text" name="email<?php echo $i; ?>" id="email<?php echo $i; ?>" value="<?php echo $email ?>" /></label>
                            <span class="removeEmail">Remove Email</span>
                        </label>
                        <?php
                        //$count_value = $i;
                    }
                    ?>
                    </p></div>
                   <p><span id="addEmail">Add Email</span></p>
                   <input type="hidden" name="total_email" value="<?php echo $i ?>" id="total_email">
        </td></tr>
    <?php
} else {
    ?>
    <tr> <td> E-MAIL :</td> <td>
            <div class="email_id"><p><label for="var1">
                        <label><input type="text" name="email1" id="email1"></label>
                    </label>
                    </p></div>
                    <p><span id="addEmail">Add Email</span></p>
                    <input type="hidden" name="total_email" value="1" id="total_email">
        </td></tr>
    <?php
    $i = 1;
}
?>

<script>
var startingNo = 0;
var $node = "";
var varCount = <?php echo ( $i > 0 ? $i : 0 ) ?>;
$('.email_id').prepend($node);

$('.removeEmail').live('click', function() {
        if(varCount == 1){
            alert("Can't Remove Of This Email");
            return false;
        }
        $(this).parent().remove();
    varCount--;
    $('#total_email').val(varCount);
});
$('#addEmail').live('click', function() {
        
        varCount++;
        $('#total_email').val(varCount);

    $node = '<p><label><input type="text" name="email' + varCount + '" id="email' + varCount + '"></label>';
    $node += '<br><br><span class="removeEmail" style="float: right;margin: -15px 5px 0 0;padding: 3px">Remove Email</span></p>';
    $(this).parent().before($node);
    
});
</script>