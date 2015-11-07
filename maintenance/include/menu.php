<?php
include "configure/connectivity.php";
ini_set('display_errors', 'off');
?>
<style>
    .search-box {background-color: #161616;border-radius: 0px 0 10px 10px;top:5px;padding:0px;position: absolute;width: 300px;
                 right:-2px;z-index: 99;height:0px;overflow: hidden}
    #search:hover .search-box{height:95px; transition: height 1s;padding: 15px 10px;}
</style>
<div  id="search"  style="position: absolute;width:25px;z-index: 999;right:10px;top:18px;"><img src="media/images/menu.jpg" style="width:25px;"/>
    <div class="search-box">
        <form action="search.php" method="post"><input type="text" name="application" value="<?php echo $_POST['application'] ?>" /><input type="hidden" name="id" />&nbsp;&nbsp;<input type="submit" value="Search" /></form>
        <hr />
        <form action="advance.php" method="post" name="advance" style="float: left" ><input type="submit" value="Advance Search" name="advance" /></form>
        <form action="selective_search.php" method="post" name="Selective" ><input type="submit" value="Selective Search" name="Selective" /></form>
    </div>
</div>
<div id='cssmenu'>
    <ul>
        <li class='has-sub '><a href="<?php echo 'welcome.php?sid=' . mt_rand(1, 1000000); ?>" >Home</a></li>
        <li class='has-sub '><a href="#" >Add New</a>
            <ul>
                <li class='has-sub '><a href="<?php echo 'add_user.php?sid=' . mt_rand(1, 1000000); ?>" >Entity</a></li>
                <li class='has-sub '><a href="<?php echo 'add_application.php?sid=' . mt_rand(1, 1000000); ?>" >New Application </a></li>
                <?php if ($_SESSION['role'] == 'admin') { ?>	<li class='has-sub '><a href="<?php echo'create_admin_manager.php?sid=' . mt_rand(0, 1000000); ?>" >Admin/Manager </a></li>	<?php } ?> 
                <li class='has-sub '><a href="<?php echo'add_status.php?sid=' . mt_rand(0, 1000000); ?>" >Add Status </a></li>
                <li class='has-sub '><a href="<?php echo'add_history_status.php?sid=' . mt_rand(0, 1000000); ?>" >Add History Status </a></li>
                               <!-- <li class='has-sub '><a href="<?php //echo 'create_email.php?sid=' . mt_rand(1, 1000000);     ?>" >Create Email</a></li>
                                <li class='has-sub '><a href="<?php //echo 'send_email.php?sid=' . mt_rand(1, 1000000);     ?>" >Send Email</a></li>
                                <li class='has-sub '><a href="<?php //echo 'create_letter.php?sid=' . mt_rand(1, 1000000);     ?>" >Create Letter</a></li>
                                <li class='has-sub '><a href="<?php //echo 'send_letter.php?sid=' . mt_rand(1, 1000000);     ?>" >Send Letter</a></li>-->
            </ul>
        </li>


        <li class='has-sub '><a href="#" >View/Edit</a>
            <ul>
                <li class='has-sub '><a href="<?php echo'users_list.php?sid=' . mt_rand(1, 1000000); ?>" >Entity</a></li>
                <li class='has-sub '><a href="<?php echo'applications_list.php?sid=' . mt_rand(0, 1000000); ?>" >Applications </a></li>
                <li class='has-sub '><a href="<?php echo'calendar.php?sid=' . mt_rand(0, 1000000); ?>" >Show Calendar</a></li>
                <?php if ($_SESSION['role'] == 'admin') { ?><li class='has-sub '><a href="<?php echo'list_admin_mgr.php?sid=' . mt_rand(0, 1000000); ?>" >Admin/Manager </a></li><?php } ?>
                <li class='has-sub '><a href="<?php echo'status_view.php?sid=' . mt_rand(0, 1000000); ?>" >Status </a></li>
                <li class='has-sub '><a href="<?php echo'history_status_view.php?sid=' . mt_rand(0, 1000000); ?>" >History Status </a></li>
                               <!-- <li class='has-sub '><a href="<?php //echo 'gridmail.php?sid=' . mt_rand(1, 1000000);     ?>" >Email</a></li>
                                <li class='has-sub '><a href="<?php //echo 'gridletter.php?sid=' . mt_rand(1, 1000000);     ?>" >Letters</a></li>-->

            </ul></li>

        <?php if ($_SESSION['role'] == 'admin') { ?> <li class='has-sub '><a href="<?php echo'notifications.php?sid=' . mt_rand(0, 1000000); ?>" >
                    Notifications   (<?php
                    $td = date('Y-m-d');
                    $sql = "select n.fid,a.id,n.status_id,s.status_name from application a,notifications n, status s  where a.id=n.app_id  and s.id=n.status_id  and (n.snooze='$td' or n.snooze='0000-00-00') AND n.notify_status=0";
                    $res = mysql_query($sql);
                    $num_rows = mysql_num_rows($res);
                    echo $num_rows;
                    ?>)</a></li>
        <?php } ?>
        <?php if ($_SESSION['role'] == 'admin') { ?>
            <li class='has-sub '><a href="alert.php" >Alerts(<?php
                    $tot_alert = 0;
                    $date = (isset($_GET['particular_date'])) ? 'a.toa="' . $_GET['particular_date'] . '"' : 'a.toa<="' . date('Y-m-d') . '"';
                    $s = "select count(*) as tot from alert a, application ap where " . $date . "  and a.toa!='0000-00-00' and a.status='0' and a.del='0000-00-00' and ap.id=a.fid";
                    $r = mysql_fetch_array(mysql_query($s));
                    $tot_alert = $r['tot'];

                    $s = "select count(*) as tot from alert a where " . $date . " and a.toa!='0000-00-00' and a.status=0 and a.del='0000-00-00' and a.fid=0 GROUP BY a.id";
                    $sql_alert = mysql_query($s);
                    while ($r_alert = mysql_fetch_array($sql_alert)) {
                        $tot_alert = $tot_alert + $r_alert['tot'];
                    }
                    echo $tot_alert;
                    ?>)</a></li>
        <?php } ?>
                <?php if ($_SESSION['role'] == 'admin') { ?><li class='has-sub '><a href="<?php echo'change_pass.php?sid=' . mt_rand(0, 1000000); ?>">Change Password</a></li><?php } ?>
        <li class='has-sub '><a href="logout.php">Logout</a></li>                
    </ul>
</div>
