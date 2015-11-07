<?php
ini_set('display_errors', 'off');
require_once 'include/session.php';
?>
<link   rel="stylesheet" href="css/jquery.fancybox.css" />
<link   rel="stylesheet" href="css/jquery-ui.css" />
<link   rel="stylesheet" href="css/custom.css" />
<link   rel="stylesheet" href="css/menu.css" />
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/custom.js"></script>
<style>
    #addEmail {background: none repeat scroll 0 0 #000000;color: #FFFFFF;padding: 3px;cursor: pointer;}
    .removeEmail {background: none repeat scroll 0 0 #8d8d8d;color: #FFFFFF;padding: 3px;cursor: pointer;}
</style>
<?php
if ($_POST) {
    $name = addslashes($_POST['name']);
    $name_code = $_POST['name_code'];
    $address = $_POST['address'];

    session_start();
    include "class.docket.php";
    $obj = new docket();

    if ($_GET['pop'] == 'yes' && $_GET['current_ent'] == 'app_ent') {
        $entityid = $obj->add_app_client($name, $name_code, $address, 'yes');
        $sql = "select auto_id,email from user_entity_email where user_id='$entityid'";
        $res = mysql_query($sql);
        $emls = '';
        while ($row = mysql_fetch_array($res)) {
            $auto_id = $row['auto_id'];
            $emailId = $row['email'];
            $emls .= '<option value=\"' . $auto_id . '\">' . htmlspecialchars($emailId) . '</option>';
        }
        echo "<script>
            showTXT = '';
            $(function() {
                parent.$('#applicant').append(\"<option value='$entityid' selected='selected'>$name</option>\");
                showTXT= parent.$('#applicant option:selected').text();
                parent.$('#applicant').next().children('input ').val(showTXT);
                parent.$('.applicant_ref_no').val(\"$name_code\");
                parent.$('.client_mail').append('$emls');
                try {
                    parent.jQuery.fancybox.close();
                } catch (err) {
                    parent.$('#fancybox-overlay').hide();
                    parent.$('#fancybox-wrap').hide();
                }
            });
        </script>    
        ";
    } else if ($_GET['pop'] == 'yes' && $_GET['current_ent'] == 'cli_ent') {
        $entityid = $obj->add_app_client($name, $name_code, $address, 'yes');
        $sql = "select auto_id,email from user_entity_email where user_id='$entityid'";
        $res = mysql_query($sql);
        $emls = '';
        while ($row = mysql_fetch_array($res)) {
            $auto_id = $row['auto_id'];
            $emailId = $row['email'];
            $emls .= '<option value=\"' . $auto_id . '\">' . htmlspecialchars($emailId) . '</option>';
        }
        echo "<script>
            showTXT1 = '';
            $(function() {
                parent.$('#client').append(\"<option value='$entityid' selected='selected'>$name</option>\");
                showTXT1= parent.$('#client option:selected').text();
                parent.$('#client').next().children('input ').val(showTXT1);
                parent.$('.client_ref_no').val(\"$name_code\");
                parent.$('.client_mail').append('$emls');
                try {
                    parent.jQuery.fancybox.close();
                } catch (err) {
                    parent.$('#fancybox-overlay').hide();
                    parent.$('#fancybox-wrap').hide();
                }
            });
        </script>    
        ";
    } else {
        $obj->add_app_client($name, $name_code, $address);
    }
} else {
    ?>
    <div>
        <form action="" method="post" id="alg_form">
            <table>
                <tr>
                    <td valign="top"> APPLICANT/CLIENT NAME :</td><td>
                        <input type="text" class="" name="name" id="name" />
                    </td>
                </tr>
                <tr>
                    <td valign="top"> APPLICANT/CLIENT CODE :</td><td>
                        <input type="text" class="" name="name_code" maxlength="3" style="width:400px;" id="name_code" autocomplete="off" />
                        <div id="code_error"></div>
                    </td>
                </tr>
<!--                <tr>
                    <td valign="top"> E-MAIL :</td><td>
                        <input type="text" name="email" id="email" />
                    </td>
                </tr>-->
                <tr class="">
                    <td valign="top"> ADDRESS :</td><td><textarea  name="address" id="address" class=""> </textarea></td>
                </tr>
                <?php include_once 'entity_email.php'; ?>
                <tr>
                    <td></td><td>
                        <input type="submit" id="submit_user" value="Submit" />
                    </td>
                </tr>
            </table>
        </form>
        <?php echo "<div style='color:#FF0000; margin-top:15px;font-weight:bold;'>" . $_GET['created'] . "</div>"; ?>
    </div>
<?php } ?>