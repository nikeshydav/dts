<?php
ini_set('display_errors', 'off');
require_once 'include/session.php';

if ($_POST) {

    $name = addslashes($_POST['name']);
    $name_code = $_POST['name_code'];
    $address = addslashes($_POST['address']);
    $entity_type = addcslashes($_POST['entity_type']);

    session_start();
    include "class.docket.php";
    $obj = new docket();
    $obj->add_app_client($name, $name_code, $address,$entity_type);
}
?>
<html>
    <head>
        <title>ADD Entity</title>
        <link rel="stylesheet" href="css/custom.css" />
        <link rel="stylesheet" href="css/menu.css" />
        <script src="js/jquery-1.8.3.min.js"></script>
        <script src="js/custom.js"></script>
        <style>
            #addEmail {background: none repeat scroll 0 0 #000000;color: #FFFFFF;padding: 3px;cursor: pointer;}
            .removeEmail {background: none repeat scroll 0 0 #8d8d8d;color: #FFFFFF;padding: 3px;cursor: pointer;}
        </style>
    </head>
    <body>
        <?php include_once 'include/menu.php'; ?>
        <div class="content">

            <div class="clear">
                <h3>Welcome <?php echo $_SESSION['username'] ?>!
                </h3>
            </div>
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
                    <tr>
                        <td valign="top"> Entity Type :</td><td>
                            <input type="text" class="" name="entity_type" id="entity_type" />
                        </td>
                    </tr>
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
            <?php echo "<div style='Color:#FF0000; margin-top:15px;font-weight:bold; '>" . $_GET['created'] . "</div>"; ?>
        </div>
    </body>
</html>