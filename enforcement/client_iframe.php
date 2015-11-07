<?php
ini_set('display_errors', 'off');
require_once 'include/session.php';
?>
<link rel="stylesheet" href="css/jquery.fancybox.css" />
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <link rel="stylesheet" href="css/custom.css" />
        <link rel="stylesheet" href="css/menu.css" />
        <script src="js/jquery-1.8.3.min.js"></script>

        <script src="js/jquery-ui.js"></script>
        <script src="js/jquery.fancybox.js"></script>
        <script src="js/custom.js"></script>
    <div>
        <form action="" method="post" id="alg_form">
            <table>
                <tr>
                    <td valign="top"> CLIENT :</td><td>
                        <input type="text" class="" name="lawfirm" id="lawfirm" />
                    </td>
                </tr>
                <tr>
                    <td valign="top"> CLIENT CODE :</td><td>
                        <input type="text" class="" name="lawfirm_code" maxlength="3" style="width:400px;" id="lawfirm_code" autocomplete="off" />
                        <div id="client_code_error"></div>
                    </td>
                </tr>
                <tr>
                    <td valign="top"> E-MAIL :</td><td>
                        <input type="text" name="client_email" id="client_email" />
                    </td>
                </tr>         
                <tr class="">
                    <td valign="top"> ADDRESS :</td><td><textarea  name="client_address" id="client_address" class=""> </textarea></td>
                </tr>
                <tr>
                    <td></td><td>
                        <input type="submit"  id="submit_client" value="Submit" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php //$created=''; ?>
    <?php echo "<div style='Color:#FF0000; margin-top:15px;font-weight:bold; '>" . $_GET['created'] . "</div>"; ?>

<?php
if ($_POST) { 
    
    $lawfirm = $_POST['lawfirm'];
    $lawfirm_code = $_POST['lawfirm_code'];
    $client_email = $_POST['client_email'];
    $client_address = $_POST['client_address'];

    session_start();
    include "class.docket.php";
    $obj = new docket();
    $obj->add_client_lawfirm($lawfirm, $lawfirm_code, $client_email, $client_address);
}
?>