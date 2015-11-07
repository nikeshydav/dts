<?php
ini_set('display_errors', 'on');
require_once 'include/session.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Update Adversary</title>
        <link rel="stylesheet" href="css/jquery.fancybox.css" />
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <link rel="stylesheet" href="css/custom.css" />
        <link rel="stylesheet" href="css/menu.css" />
        <script src="js/jquery-1.8.3.min.js"></script>

        <script src="js/jquery-ui.js"></script>
        <script src="js/jquery.fancybox.js"></script>
        <script src="js/custom.js"></script>
        <?php
        include "class.docket.php";
        $obj = new docket();
        ?>
    </head>
    <?php
    if ($_GET['action'] == 'edit') {
        $id = $_GET['id'];
        $obj->edit_adversary($id);
    }

    if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete') {
        $id = $_REQUEST['id'];
        $obj->delete_adversary($id);
    }
    ?>
    <body>
        <?php
        include_once 'include/menu.php';
        ?>
        <div class="content">

            <div class="welcome">
                <h3>Welcome <?php echo $_SESSION['username'] ?>!
                </h3>
            </div>

            <table align="center">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $obj->id; ?>" />
                    <tr>
                        <td valign="top"> Name :</td><td>
                            <input type="text" name="name" id="name" value="<?php echo $obj->name ?>" />
                        </td>
                    </tr>
                    <tr class="">
                        <td valign="top"> ADDRESS :</td><td><textarea  name="address" id="address"><?php echo $obj->address ?></textarea></td>
                    </tr>
                    <tr>
                        <td></td><td>
                            <input type="submit" id="submit_user" value="Submit" />
                        </td>
                    </tr>
                </form>
            </table>
        </div>
        <?php
        if ($_POST) {
            $id = $_POST['id'];
            $name = addslashes($_POST['name']);
            $address = addslashes($_POST['address']);

            session_start();

            $obj->update_adversary($id, $name, $address);
        }
        ?>
    </body>
</html>
