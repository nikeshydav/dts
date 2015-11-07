<?php
ini_set('display_errors', 'off');
require_once 'include/session.php';
?>
<html>
    <head>
        <title>ADD Adversary Client</title>
        <link rel="stylesheet" href="css/custom.css" />
        <link rel="stylesheet" href="css/menu.css" />
        <script src="js/jquery-1.8.3.min.js"></script>
        <script src="js/custom.js"></script>
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

    $name = addslashes($_POST['name']);
    $address = addslashes($_POST['address']);
    session_start();
    include "class.docket.php";
    $obj = new docket();
    
        $obj->add_adversary_client($name, $address);
}
?>

    </body>
</html>