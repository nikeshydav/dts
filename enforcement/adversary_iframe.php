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
                    <td valign="top"> Name :</td><td>
                        <input type="text" name="name" id="name" />
                    </td>
                </tr>
                <tr class="">
                    <td valign="top"> ADDRESS :</td><td><textarea  name="address" id="address" class=""> </textarea></td>
                </tr>
                <tr>
                    <td></td><td>
                        <input type="submit" id="submit_user" value="Submit" />
                    </td>
                </tr>
            </table>
        </form>
    <?php echo "<div style='Color:#FF0000; margin-top:15px;font-weight:bold; '>" . $_GET['created'] . "</div>"; ?>
    </div>
        <?php
if ($_POST) {

    $name = $_POST['name'];
    $address = $_POST['address'];
    session_start();
    include "class.docket.php";
    $obj = new docket();
    
    if($_GET['pop']=='yes'){
    $obj->add_adversary_client($name, $address,'yes');
    }else{
        $obj->add_adversary_client($name, $address);
    }
}
?>
