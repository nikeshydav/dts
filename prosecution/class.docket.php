<?php

include "configure/connectivity.php";
@session_start();

class docket {

    var $id = '';
    var $subject = '';
    var $mailbody = '';
    var $letterbody = '';

    function docket() {
        //$con = mysql_connect('localhost', 'root', '');
        //mysql_select_db('docket', $con);
    }

    function login($u, $p) {

        $sql = "select * from admin where username='$u' and pass='$p'";
        $query = mysql_query($sql);
        $num_row = mysql_num_rows($query);
        $row = mysql_fetch_assoc($query);
        if ($num_row > 0) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['pass'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['email'];
            $sid = mt_rand(1, 1000000);
            if (!headers_sent()) {
                header("location:welcome.php");
            } else {
                echo "<script>
            window.location.href='welcome.php'
             </script>";
            }
        } else {
            $sid = mt_rand(1, 1000000);
            if (!headers_sent()) {
                header("location:index.php?err=The username or password you entered is incorrect.");
            } else {
                echo "<script>
            window.location.href='index.php?err=The username or password you entered is incorrect.'
             </script>";
            }
        }
    }

    /*
     * start by manish on 12/3/14
     */

    function add_app_client($name, $name_code, $address, $pop = 'no') {
       $sql = "insert into user (name,name_code,address) values('$name','$name_code','$address')";
        //exit();
        mysql_query($sql);
        $id = mysql_insert_id();
        //$total_email = $_POST['total_email'];
        for ($i = 1; $i <= 30; $i++) {
            $email_add = $_POST['email' . $i];
            if ($email_add != '') {
                $sql2 = "insert into user_entity_email (user_id,email) values('" . $id . "','$email_add')";
                mysql_query($sql2);
            }
        }
        //exit();
        $sql1 = "insert into log (user_id,action,comment) values('" . $_SESSION['id'] . "','Add','user_id=$id, email_id=$email')";
        mysql_query($sql1);

        $sid = mt_rand(1, 1000000);
        if ($pop == 'yes') {
            return $id;
        } else {
            if (!headers_sent()) {
                header("location:add_user.php?created=New Applicant has been created successfully.");
            } else {
                echo "<script>
			window.location.href='add_user.php?created=New Applicant has been created successfully.'
			 </script>";
            }
        }
    }

    function add_client_lawfirm($lawfirm, $lawfirm_code, $client_email, $client_address) {
        echo $sql = "insert into client (lawfirm,lawfirm_code,client_email,client_address) values('$lawfirm','$lawfirm_code','$client_email','$client_address')";
        //exit();
        mysql_query($sql);
        $id = mysql_insert_id();
        $sql1 = "insert into log (user_id,action,comment) values('" . $_SESSION['id'] . "','Add','user_id=$id, email_id=$email')";
        mysql_query($sql1);
        $sid = mt_rand(1, 1000000);
        if (!headers_sent()) {
            header("location:add_client.php?created=New Client has been created successfully.");
        } else {
            echo "<script>
            window.location.href='add_client.php?created=New Client has been created successfully.'
             </script>";
        }
    }

    function apply_new($file_type, $app_no, $mark, $classes, $user, $filing_date, $applicant, $client, $priority_date, $jurisdiction, $goods_services, $history, $pending_record, $cl_ref_no) {

        $file = $_FILES['file'];
        $images = $file['name'];
        $type = $file['type'];
        $size = $file['size'];
        $tmppath = $file['tmp_name'];
        move_uploaded_file($tmppath, 'upload/' . $images);

    $sql = "insert into application (file_type,application_no,mark,images,classes,user_proposed,filing_date,applicant,client,priority_date,jurisdiction,goods_services,history,pending_record,cl_ref_no) values('$file_type','$app_no','$mark','$images','$classes','$user','$filing_date','$applicant','$client','$priority_date','$jurisdiction','$goods_services','$history','$pending_record','$cl_ref_no')";
//exit();
        mysql_query($sql);
        $id = mysql_insert_id();
$cli_mail_to = implode(', ', (array)$_POST['cli_mail_to']);
        $cli_mail_forward = implode(', ', (array)$_POST['cli_mail_forward']);
        $cli_mail_instructed = implode(', ', (array)$_POST['cli_mail_instructed']);
        $sql_cli_email = "insert into users_cli_mails(app_id,client_entity_id,inter_entity_id,cli_mail_to,cli_mail_forward,cli_mail_instructed)values('$id','$applicant','$client','$cli_mail_to','$cli_mail_forward','$cli_mail_instructed')";
        mysql_query($sql_cli_email);
$sql_status_hidden = "insert into application_status(app_id,status,status_effective_on_date )values('" . $id . "','1','')";
                mysql_query($sql_status_hidden);
        $total_status = $_POST['total_status'];
        for ($i = 1; $i <= $total_status; $i++) {
            $status_add = $_POST['status' . $i];
            $status_date_add = $_POST['status_date' . $i];
            if ($status_add != 'select') {
              $sql_status = "insert into application_status(app_id,status,status_effective_on_date )values('" . $id . "','" . $status_add . "','" . $status_date_add . "')";
                mysql_query($sql_status);
            }
        }        
        $total_status_recordals = $_POST['total_status_recordals'];
        for ($t = 1; $t <= $total_status_recordals; $t++) {
            $status_recordals = $_POST['status_recordals' . $t];
            $status_recordals_date = $_POST['status_recordals_date' . $t];
            if ($status_recordals != 'select') {
                $sql_status_recordals = "insert into status_recordals(status_recordals_app_id,status_recordals,status_recordals_date )values('" . $id . "','" . $status_recordals . "','" . $status_recordals_date . "')";
                mysql_query($sql_status_recordals);
            }
        }
        $sql1 = "insert into log (user_id,action,comment) values('" . $_SESSION['id'] . "','Add','application_id=$id')";
        mysql_query($sql1);

       $sql2 = "insert into year_serialno (alg_app_id,alg_doc_name,alg_applicant_code,alg_client_code,alg_priority_date,alg_serialno,all_alg_data)
            values('$id','" . strtoupper($_POST['alg_ref_no']) . "','" . $_POST['applicant_ref_no'] . "',
            '" . $_POST['client_ref_no'] . "','$priority_date','" . $_POST['year_ref_no'] . "',
            '" . addslashes(strtoupper($_POST['alg_ref_no'])) . "/" . addslashes($_POST['applicant_ref_no']) . "-" . addslashes($_POST['client_ref_no']) . "/" . addslashes(date("ymd", strtotime($priority_date))) . addslashes($_POST['year_ref_no']) . "')";
        //exit();   
        mysql_query($sql2);

       $sql3 = "insert into alg_file_type (alg_file_app_id,alg_file_type,alg_apln,alg_class,alg_mark,all_alg_file_data)
            values('$id','" . $_POST['alg_file_tyle'] . "','" . $_POST['alg_apln'] . "',
            '" . $classes . "','" . addslashes($_POST['alg_mark']) . "',
            '" . addslashes($_POST['alg_file_tyle']) . " " . addslashes($_POST['alg_apln']) . "-" . addslashes($classes) . " " . addslashes($_POST['alg_mark']) . "')";
        //exit();   
        mysql_query($sql3);

        $sid = mt_rand(1, 1000000);
        if (!headers_sent()) {
            header("location:show_application.php?created=New Application has been generated successfully.");
        } else {
            echo "<script>
                   window.location.href='show_application.php?created=New Application has been generated successfully.'
                   </script>";
        }
    }

//    function applicants($selected = null) {
//        $applicants = explode(',', $selected);
//
//        echo '<select name="applicant[]" multiple id="applicant" ><option>--Select--</option>';
//        $sql = "select id,name,lawfirm from user where name!=''  order by name";
//        $query = mysql_query($sql);
//        while ($row = mysql_fetch_array($query)) {
//            $id = $row['id'];
//            $name = $row['name'];
//            $lawfirm = $row['lawfirm'];
//            $selected = in_array($id, $applicants) ? ' selected="selected"' : '';
//            echo '<option value="' . $id . '" ' . $selected . ' >' . $name . '&nbsp;-&nbsp;' . $lawfirm . '</option>';
//        }
//        echo '</select>';
//    }

    function applicants($selected = null) {
        $applicants = explode(',', $selected);

        echo '<div class="ui-widget"><select name="applicant" id="applicant" class="combobox"><option></option>';
        $sql = "select id,name from user where name!=''  order by name";
        $query = mysql_query($sql);
        while ($row = mysql_fetch_array($query)) {
            $id = $row['id'];
            $name = $row['name'];
            $lawfirm = $row['lawfirm'];
            $selected = in_array($id, $applicants) ? ' selected="selected"' : '';
            echo '<option value="' . $id . '" ' . $selected . ' >' . $name . '</option>';
        }
        echo '</select></div>';
    }

    function clients($selectedcli = null) {
        $clients = explode(',', $selectedcli);

        echo '<div class="ui-widget"><select name="client" id="client" class="combobox" ><option></option>';
        $sql = "select id,name from user where name!='' order by name ";
        $query = mysql_query($sql);
        while ($row = mysql_fetch_array($query)) {
            $id = $row['id'];
            $lawfirm = $row['name'];
            $selected = in_array($id, $clients) ? ' selected="selected"' : '';
            echo '<option value="' . $id . '" ' . $selected . ' >' . $lawfirm . '</option>';
        }
        echo '</select></div>';
    }

    function history_sheet_status() {

        echo '<select name="history_sheet_status" id="history_sheet_status" ><option value="">--Select--</option>';
        $sql = "select id,history_status_name from history_status where history_status_name!=''  order by history_status_name";
        $query = mysql_query($sql);
        while ($row = mysql_fetch_array($query)) {
            $id = $row['id'];
            $history_name = $row['history_status_name'];
            echo '<option value="' . $history_name . '">' . $history_name . '</option>';
        }
        echo '</select>';
    }

    function users_list() {
        $sql = "select * from user ORDER BY name ASC";
        $res = mysql_query($sql);
        $i = 0;
        while ($get = mysql_fetch_array($res)) {
            $i++;
            $id = $get['id'];
            $name = $get['name'];
            $name_code = $get['name_code'];
            $sid = mt_rand(1, 1000000);
            echo '<tr><td>' . $i . '</td><td>' . $name . '</td><td>' . $name_code . '</td>' .
            '<td><a href="update.php?action=edit&id=' . $id . '&?sid=' . $sid . '"><img class="icon" src="images/edit.png" alt="Edit" title="Edit" /></a>';

            if ($_SESSION['role'] == 'admin') {
                echo '<a  onclick=" return confirm(\'do you really want to delete?\');"  href="update.php?action=delete&id=' . $id . '&?sid=' . $sid . '"><img class="icon" src="images/delete.png" alt="Delete" title="Delete" /></a></td></tr>';
            }
        }
    }

    function client_list() {
        $sql = "select * from client ORDER BY lawfirm ASC";
        $res = mysql_query($sql);
        $i = 0;
        while ($get = mysql_fetch_array($res)) {
            $i++;
            $id = $get['id'];
            $lawfirm = $get['lawfirm'];
            $emailid = $get['client_email'];
            $sid = mt_rand(1, 1000000);
            echo '<tr><td>' . $i . '</td><td>' . $lawfirm . '</td><td>' . $emailid . '</td><td><a href="update_client.php?action=edit&id=' . $id . '&?sid=' . $sid . '"><img class="icon" src="images/edit.png" alt="Edit" title="Edit" /></a>';
            if ($_SESSION['role'] != 'associate') {
                echo '<a  onclick=" return confirm(\'do you really want to delete?\');"  href="update_client.php?action=delete&id=' . $id . '&?sid=' . $sid . '"><img class="icon" src="images/delete.png" alt="Delete" title="Delete" /></a></td></tr>';
            }
        }
    }

    /*
     * end by manish on 12/3/14
     */

    /*function status_list() {

        $sql = "SELECT s.*, ps.status_name as parent_name, ps.id as parent_id  FROM `status` s LEFT JOIN  `status` ps on ps.id=s.parent_id where s.id!=1";
        $res = mysql_query($sql);
        $i = 0;
        while ($get = mysql_fetch_array($res)) {
            $i++;
            $id = $get['id'];
            $cycle1 = $get['cycle1'];
            if ($cycle1 == '') {
                $cyc1 = '';
            } else {
                $cyc1 = 'cycle&nbsp;' . $cycle1 . ',&nbsp;';
            }
            $cycle2 = $get['cycle2'];
            if ($cycle2 == '') {
                $cyc2 = '';
            } else {
                $cyc2 = 'cycle&nbsp;' . $cycle2 . ',&nbsp;';
            }
            $cycle3 = $get['cycle3'];
            if ($cycle3 == '') {
                $cyc3 = '';
            } else {
                $cyc3 = 'cycle&nbsp;' . $cycle3 . ',&nbsp;';
            }
            $cycle4 = $get['cycle4'];
            if ($cycle4 == '') {
                $cyc4 = '';
            } else {
                $cyc4 = 'cycle&nbsp;' . $cycle4 . ',&nbsp;';
            }
            $cycle5 = $get['cycle5'];
            if ($cycle5 == '') {
                $cyc5 = '';
            } else {
                $cyc5 = 'cycle&nbsp;' . $cycle5 . ',&nbsp;';
            }
            $status = $get['status_name'];
            $parent_status = $get['parent_name'];
            $radio_option = ($get['radio'] == 1) ? 'Yes' : 'No';
            $time_to_execute = $get['time_to_execute'];
            $sid = mt_rand(1, 1000000);

            echo '<tr><td>' . $i . '</td><td>' . $status . '</td><td>' . $parent_status . '</td><td>' . $radio_option . '</td><td>' . $time_to_execute . '</td><td><a href="update_status.php?action=edit&id=' . $id . '&?sid=' . $sid . '"><img class="icon" src="images/edit.png" alt="Edit" title="Edit" /></a>';
            if ($_SESSION['role'] != 'associate') {
                echo '<a  onclick=" return confirm(\'do you really want to delete?\');"  href="update_status.php?action=delete&id=' . $id . '&?sid=' . $sid . '"><img class="icon" src="images/delete.png" alt="Delete" title="Delete" /></a></td></tr>';
            }
        }
    }*/

    function history_status_list() {

        $sql = "SELECT * FROM  history_status";
        $res = mysql_query($sql);
        $i = 0;
        while ($get = mysql_fetch_array($res)) {
            $i++;
            $id = $get['id'];
            $history_status = $get['history_status_name'];
            $sid = mt_rand(1, 1000000);

            echo '<tr><td>' . $i . '</td><td>' . $history_status . '</td><td><a href="update_history_status.php?action=edit&id=' . $id . '&?sid=' . $sid . '">
                <img class="icon" src="images/edit.png" alt="Edit" title="Edit" /></a>
<a  onclick=" return confirm(\'do you really want to delete?\');"  href="update_history_status.php?action=delete&id=' . $id . '&?sid=' . $sid . '">
                    <img class="icon" src="images/delete.png" alt="Delete" title="Delete" /></a></td></tr>';
        }
    }

function delete_history_status($id) {

        $sql = "delete from history_status where id=$id";
        $sid = mt_rand(1, 1000000);
        mysql_query($sql);

        if (!headers_sent()) {
            header("location:history_status_view.php");
        } else {
            echo "<script>
            window.location.href='history_status_view.php'
             </script>";
        }
    }

    //.$cyc1,$cyc2,$cyc3,$cyc4,$cyc5.'</td><td>'
    /*
     * start by manish on 12/3/14
     */
    function delete_user($id) {

        $sql = "delete from user where id=$id";
        $sid = mt_rand(1, 1000000);
        mysql_query($sql);
        $sql1 = "insert into log (user_id,action,comment) values('" . $_SESSION['id'] . "','Delete','user_id=$id')";
        mysql_query($sql1);

        if (!headers_sent()) {
            header("location:users_list.php");
        } else {
            echo "<script>
            window.location.href='users_list.php'
             </script>";
        }
    }

    function delete_client($id) {

        $sql = "delete from client where id=$id";
        $sid = mt_rand(1, 1000000);
        mysql_query($sql);
        $sql1 = "insert into log (user_id,action,comment) values('" . $_SESSION['id'] . "','Delete','user_id=$id')";
        mysql_query($sql1);

        if (!headers_sent()) {
            header("location:client_list.php");
        } else {
            echo "<script>
            window.location.href='client_list.php'
             </script>";
        }
    }

    /*
     * end by manish on 12/3/14
     */

    function delete_status($id) {

        $sql = "delete from status where id=$id";
        $sid = mt_rand(1, 1000000);
        mysql_query($sql);

        if (!headers_sent()) {
            header("location:status_view.php");
        } else {
            echo "<script>
            window.location.href='status_view.php'
             </script>";
        }
    }

    /*
     * start by manish on 12/3/14
     */

    function edit_user($id) {

        $sql = "select * from user where id='$id'";
        $res = mysql_query($sql);
        while ($get = mysql_fetch_array($res)) {

            $this->id = $get['id'];
            $this->name = $get['name'];
            $this->name_code = $get['name_code'];
            $this->address = $get['address'];
        }
    }

    function edit_client($id) {

        $sql = "select * from client where id='$id'";
        $res = mysql_query($sql);
        while ($get = mysql_fetch_array($res)) {

            $this->id = $get['id'];
            $this->lawfirm = $get['lawfirm'];
            $this->emailid = $get['client_email'];
            $this->address = $get['client_address'];
        }
    }

    /*
     * end by manish on 12/3/14
     */

    function edit_status($id) {

        $sql = "select * from status where id='$id'";
        $res = mysql_query($sql);

        while ($get = mysql_fetch_array($res)) {

            $this->id = $get['id'];
            $this->status_name = $get['status_name'];
            $this->parent_id = $get['parent_id'];
            $this->radio_option = $get['radio'];
            $this->time_to_execute = $get['time_to_execute'];
        }
    }

    function edit_history_status($id) {

        $sql = "select * from history_status where id='$id'";
        $res = mysql_query($sql);

        while ($get = mysql_fetch_array($res)) {

            $this->id = $get['id'];
            $this->history_status_name = $get['history_status_name'];
        }
    }

    /*
     * start by manish on 12/3/14
     */

    function update_user($id, $name, $name_code, $address) {

        $sql = "UPDATE user SET name='$name',name_code='$name_code',address='$address' WHERE id='$id'";
        mysql_query($sql);
        $removeEmail = $_POST['removeEml'];
        foreach ($removeEmail as $key => $value) {
            if ($value != '') {
                $sql_delete = "delete from user_entity_email where email='$value'";
                mysql_query($sql_delete);
            }
        }
        $total_email = $_POST['total_email'];
        for ($te = 1; $te <= $total_email; $te++) {
            if (isset($_POST['email' . $te])) {
                $email_hidden = $_POST['email_hidden' . $te];
                $email_add_hidden = $_POST['email' . $te];
                if ($email_hidden != '') {
                    $sql2 = "UPDATE user_entity_email SET auto_id='$email_hidden',email='$email_add_hidden' WHERE user_id='$id' AND auto_id='$email_hidden'";
                    mysql_query($sql2);
                } else {
                    $sql3 = "insert into user_entity_email (user_id,email) values('" . $id . "','$email_add_hidden')";
                    mysql_query($sql3);
                }
            }
        }
        $sql1 = "insert into log (user_id,action,comment) values('" . $_SESSION['id'] . "','update','user_id=$id')";
        mysql_query($sql1);
        $sid = mt_rand(1, 1000000);

        if (!headers_sent()) {
            header("location:users_list.php");
        } else {
            echo "<script>
			window.location.href='users_list.php'
			 </script>";
        }
    }

    function update_client($id, $lawfirm, $client_email, $client_address) {

        $sql = "UPDATE client SET lawfirm='$lawfirm',client_email='$client_email',client_address='$client_address' WHERE id='$id'";
        mysql_query($sql);
        //$id=mysql_insert_id();
        $sql1 = "insert into log (user_id,action,comment) values('" . $_SESSION['id'] . "','update','user_id=$id')";
        mysql_query($sql1);
        $sid = mt_rand(1, 1000000);

        if (!headers_sent()) {
            header("location:client_list.php");
        } else {
            echo "<script>
            window.location.href='client_list.php'
             </script>";
        }
    }

    /*
     * end by manish on 12/3/14
     */

    function update_status($id, $status_name, $parent_status, $radio_option, $time_to_execute) {

        $sql = "UPDATE status SET status_name='$status_name',parent_id='$parent_status',radio='$radio_option',time_to_execute='$time_to_execute' WHERE id='$id'";

        mysql_query($sql);
        $sid = mt_rand(1, 1000000);

        if (!headers_sent()) {
            header("location:status_view.php");
        } else {
            echo "<script>
            window.location.href='status_view.php'
             </script>";
        }
    }

    function update_history_status($id, $history_status_name) {

        $sql = "UPDATE history_status SET history_status_name='$history_status_name' WHERE id='$id'";

        mysql_query($sql);
        $sid = mt_rand(1, 1000000);

        if (!headers_sent()) {
            header("location:history_status_view.php");
        } else {
            echo "<script>
            window.location.href='history_status_view.php'
             </script>";
        }
    }

    /*
     * Work by manish on 12/3/14
     */

    //(select name from user WHERE id = a.applicant)
    function applications_list() {

//         $sql = "select *,(select status_name from status WHERE id = ast.status ) AS status from application a, application_status ast where id>1 and ast.app_id=a.id order by filing_date desc, applicant asc "; */
//        $sql = "select *,(select GROUP_CONCAT(status_name) from application_status a, status s WHERE s.id=a.status  and a.app_id=aa.id) AS status,
//          (select alg_doc_name from year_serialno where alg_app_id=aa.id)as alg_doc_name,
//          (select alg_applicant_code from year_serialno where alg_app_id=aa.id)as alg_applicant_code,
//          (select alg_client_code from year_serialno where alg_app_id=aa.id)as alg_client_code,
//          (select alg_priority_date from year_serialno where alg_app_id=aa.id)as alg_priority_date,
//          (select alg_serialno from year_serialno where alg_app_id=aa.id)as alg_serialno
//          from application aa, application_status a where a.app_id=aa.id group by a.app_id order by aa.filing_date DESC";
//         $sql = "select * from 
//                (select GROUP_CONCAT(status_name)as status_name, aa.* from application aa, getappstatus s where aa.id=s.app_id group by s.app_id) as t1 left join
//                (select ys.* from year_serialno ys, application aa where ys.alg_app_id=aa.id) as t2
//                on t1.id=t2.alg_app_id order by t1.filing_date DESC";
   $sql = "select * from 
(select GROUP_CONCAT(status_name)as status_name, aa.* from application aa, getappstatus s where aa.id=s.app_id group by s.app_id) as t1 left join
(select ys.* from year_serialno ys, application aa where ys.alg_app_id=aa.id) as t2
on t1.id=t2.alg_app_id left join
(select aft.* from alg_file_type aft, application aa where aft.alg_file_app_id=aa.id GROUP BY id) as t3 
on t1.id=t3.alg_file_app_id left join
(select uc.* from users_cli_mails uc, application aa where uc.app_id=aa.id) as t4
on t1.id=t4.app_id
 order by t1.filing_date DESC";
        $res = mysql_query($sql);
        $i = 0;
        while ($row = mysql_fetch_array($res)) {
            //echo $row['applicant'];
            //(select lawfirm from user WHERE id = a.client ) AS client,
            $i++;
            $id = $row['id'];
            $trademark = $row['mark'];
            $images = $row['images'];
            if ($images == '') {
                $img = '';
            } else {
                $img = '<img src="/doc/images/preview_icon.jpg" height="30px" width="30px">';
            }
            $image_path = '/doc/upload/' . $images;
            $file_type = $row['file_type'];
            $app_no = $row['application_no'];
            $fillingdate = $row['filing_date'];
            $date_filling = date('d M, Y', strtotime($fillingdate));
            $applicant = $row['applicant'];
            $client = $row['client'];
            $class = $row['classes'];
            $last_key = preg_replace('/,([^,]*)$/', ' & \1', $class);
            $user = $row['user_proposed'];
            if ($user == '0000-00-00') {
                $date_user_pro = 'Proposed to be used';
            } else {
                $date_user_pro = date('d M, Y', strtotime($user));
            }
            $jurisdiction = $row['jurisdiction'];
            $goods_services = $row['goods_services'];
            $status = str_replace('hidden,', '', $row['status_name'] );
            $status = str_replace('hidden', '', $status );
            $status_date = $row['status_effective_on_date'];
            $date_effective_status = date('d M,Y', strtotime($status_date));
            $toe_unformatted = $row['toe'];
            $toe = date('d M,Y', strtotime($toe_unformatted));
            $sid = mt_rand(1, 1000000);
            $app_name = $row['applicant'];
            $cli_name = $row['client'];

            $alg_file_type = $row['alg_file_type']; 
            $alg_apln = $row['alg_apln'];
            $alg_class = $row['alg_class'];
            $alg_mark = $row['alg_mark'];
            $all_alg_file_data = $row['all_alg_file_data'];
            //$all_alg_file_data = $alg_file_type . '&nbsp;' . $alg_apln . '-' . $alg_class . '&nbsp;' . $alg_mark;

            $alg_doc_name = $row['alg_doc_name'];
            $alg_applicant_code = $row['alg_applicant_code'];
            $alg_client_code = $row['alg_client_code'];
            if ($alg_priority_date = $row['alg_priority_date']) {
                $alg_priority_date_format = date("ymd", strtotime($alg_priority_date));
            } else {
                $alg_priority_date_format = '';
            }
            $alg_serialno = $row['alg_serialno'];
            $all_alg_data = $row['all_alg_data'];
            $cl_ref_no = $row['cl_ref_no'];
            
            $status_recordals = '';
            $sql_rec = "select * from status_recordals where status_recordals_app_id=$id";
            $get_rec = mysql_query($sql_rec);
            while ($row_rec = mysql_fetch_array($get_rec)) {
                    $status_recordals .= $row_rec['status_recordals'].',';
                } 

            $cli_mail_to = $row['cli_mail_to'];
            $exp_mail_to = explode(',', $cli_mail_to);
            $name_mail_to = '';
            foreach ($exp_mail_to as $key => $value) {
                $res1_mail_to = "select email from user_entity_email where auto_id in ('$value')";
                $res2_mail_to = mysql_query($res1_mail_to);
                while ($row3_mail_to = mysql_fetch_array($res2_mail_to)) {
                    $name_mail_to .= $row3_mail_to['email'] . ',';                    
                }
            }
            $name_mail_toNew = '';
            $exp_mail_toNew = explode(',', $name_mail_to);
                    $last_key = end(array_keys($exp_mail_toNew));
                    foreach ($exp_mail_toNew as $key => $value) {
                        $name_mail_toNew .= $value;
                        if ($key == ($last_key - 1)) {
                            $name_mail_toNew .= "  ";
                        } else if ($key == $last_key) {
                            break;
                        } else {
                            $name_mail_toNew .= ", ";
                        }
                    }
            $cli_mail_forward = $row['cli_mail_forward'];
            $exp_mail_forward = explode(',', $cli_mail_forward);
            $name_mail_forward = '';
            foreach ($exp_mail_forward as $key => $value) {
                $res1_mail_forward = "select email from user_entity_email where auto_id in ('$value')";
                $res2_mail_forward = mysql_query($res1_mail_forward);
                while ($row3_mail_forward = mysql_fetch_array($res2_mail_forward)) {
                    $name_mail_forward .= $row3_mail_forward['email'] . ',';
                }
            }
            $name_mail_forwardNew = '';
            $exp_mail_forwardNew = explode(',', $name_mail_forward);
                    $last_key = end(array_keys($exp_mail_forwardNew));
                    foreach ($exp_mail_forwardNew as $key => $value) {
                        $name_mail_forwardNew .= $value;
                        if ($key == ($last_key - 1)) {
                            $name_mail_forwardNew .= "  ";
                        } else if ($key == $last_key) {
                            break;
                        } else {
                            $name_mail_forwardNew .= ", ";
                        }
                    }
            $cli_mail_instructed = $row['cli_mail_instructed'];
            $exp_mail_instructed = explode(',', $cli_mail_instructed);
            $name_mail_instructed = '';
            foreach ($exp_mail_instructed as $key => $value) {
                $res1_mail_instructed = "select email from user_entity_email where auto_id in ('$value')";
                $res2_mail_instructed = mysql_query($res1_mail_instructed);
                while ($row3_mail_instructed = mysql_fetch_array($res2_mail_instructed)) {
                    $name_mail_instructed .= $row3_mail_instructed['email'] . ',';
                }
            }
            $name_mail_instructedNew = '';
            $exp_mail_instructedNewNew = explode(',', $name_mail_instructed);
                    $last_key = end(array_keys($exp_mail_instructedNewNew));
                    foreach ($exp_mail_instructedNewNew as $key => $value) {
                        $name_mail_instructedNew .= $value;
                        if ($key == ($last_key - 1)) {
                            $name_mail_instructedNew .= "  ";
                        } else if ($key == $last_key) {
                            break;
                        } else {
                            $name_mail_instructedNew .= ", ";
                        }
                    } 
            $exp_applicant = explode(',', $applicant);
            count($exp_applicant);
            $name_app = '';
            if (count($exp_applicant) > 0 && $applicant != '--Select--' && $applicant != '') {
                $getClients = mysql_query("select name from user where id in ($applicant)");
                if($getClients === FALSE) {
                    die( "select name from user where id in ($applicant)". mysql_error()); // TODO: better error handling
                }
                while ($row3 = mysql_fetch_array($getClients)) {
                    $name_app .= $row3['name'];
                }
            }
            $exp_client = explode(',', $client);
            count($exp_client);
            $name_cli = '';
            if (count($exp_client) > 0 && $client != '--Select--' && $client != '') {
                $getEntity = mysql_query("select name from user where id in ($client)");
                if($getEntity === FALSE) {
                    die( "select name from user where id in ($client)". mysql_error()); // TODO: better error handling
                }
                while ($row4 = mysql_fetch_array($getEntity)) {
                    $name_cli .= $row4['name'];
                }
            }

            echo '<tr><td valign="top">' . $i . '</td><td valign="top">' . $all_alg_file_data . '</td><td valign="top">' . $all_alg_data . '</td><td valign="top">' . $trademark . '&nbsp;&nbsp;&nbsp;<a href="' . $image_path . '" onclick="return popitup(\'' . $image_path . '\')" target="_blank">' . $img . '</a></td><td valign="top">' . $file_type . '</td><td valign="top">' . $app_no . '</td><td valign="top">' . $date_filling . '</td><td valign="top">' . $class. '</td><td valign="top">' . $date_user_pro . '</td><td valign="top">' . $name_app . '</td><td valign="top">' . $name_cli . '</td><td valign="top">' . $jurisdiction . '</td><td valign="top">' . $goods_services . '</td><td valign="top">' . $status . '</td><td valign="top">' . $status_recordals . '</td><td valign="top">' . $cl_ref_no . '</td><td valign="top">' . htmlspecialchars($name_mail_toNew) . '</td><td valign="top">' . htmlspecialchars($name_mail_forwardNew) . '</td><td valign="top">' . htmlspecialchars($name_mail_instructedNew) . '</td><td valign="top"><a href="update_application.php?action=edit&id=' . $id . '&sid=' . $sid . '"><img class="icon" src="images/edit.png" alt="Edit" title="Edit" /></a>';

            if ($_SESSION['role'] != 'associate') {
                echo '<a onclick=" return confirm(\'do you really want to delete?\');" href="update_application.php?action=delete&id=' . $id . '&sid=' . $sid . '"><img class="icon" src="images/delete.png" alt="Delete" title="Delete" /></a></td></tr>';
            }
        }
    }

    function applications_list1() {

        $trade_no_name = $_POST['trade_no_name'];
        $status_name = $_POST['status_name'];
        $class_name = $_POST['class_name'];
        $condition = '';
        if ($trade_no_name != '') {
            $condition .= "and application_no like '%$trade_no_name%'";
        }
        if ($class_name != '' && $class_name != '0') {
            $condition .= "and classes like '%$class_name%'";
        }
        if ($status_name != '') {
            $condition .= "and ast.status like '%$status_name%'";
        }
        $sql = "select *,(SELECT name FROM user WHERE id = a.client ) AS client, (SELECT name FROM user WHERE id = a.applicant) AS applicant, (SELECT status_name FROM getappstatus WHERE app_id = ast.app_id) AS status from application a, application_status ast where id>'1' and ast.app_id=a.id $condition group by a.id";
        $res = mysql_query($sql);
        $i = 0;
        while ($row = mysql_fetch_array($res)) {
            $i++;
            $id = $row['id'];
            $trademark = $row['mark'];
            $app_no = $row['application_no'];
            $fillingdate = $row['filing_date'];
            $date_filling = date('d F,Y', strtotime($fillingdate));
            $applicant = $row['applicant'];
            $client = $row['client'];
            $class = $row['classes'];
            $jurisdiction = $row['jurisdiction'];
            //$status = $row['status'];
            $status = str_replace('hidden,', '', $row['status'] );
            $status = str_replace('hidden', '', $status );
            $toe_unformatted = $row['toe'];
            $toe = date('d F,Y', strtotime($toe_unformatted));
            $sid = mt_rand(1, 1000000);
            $app_name = $row['applicant'];
            $cli_name = $row['client'];

            echo '<tr><td>' . $i . '</td><td>' . $trademark . '</td><td>' . $app_no . "<br>(" . $date_filling . ')</td><td>' . $app_name . '</td><td>' . $cli_name . '</td><td>' . $class . '</td><td>' . $jurisdiction . '</td><td>' . $status . '</td><td>' . $toe . '</td><td><a href="update_application.php?action=edit&id=' . $id . '&sid=' . $sid . '"><img class="icon" src="images/edit.png" alt="Edit" title="Edit" /></a><a onclick=" return confirm(\'do you really want to delete?\');" href="update_application.php?action=delete&id=' . $id . '&sid=' . $sid . '"><img class="icon" src="images/delete.png" alt="Delete" title="Delete" /></a>
            </td></tr>';
        }
    }

    
    function snooze_notification($id, $snooze, $comment) {

        list($m, $d, $y) = explode('/', $snooze);
        $snooze_format = "$y-$m-$d";
        $sql = "update notifications set snooze='$snooze_format', comment='$comment' where fid=$id";
        //exit();
        mysql_query($sql);
        $sid = mt_rand(1, 1000000);
        if (!headers_sent()) {
            header("location:notifications.php");
        } else {
            echo "<script>
            window.location.href='notifications.php'
             </script>";
        }
    }

    function delete_notification($id) {

        //echo  $sql = "delete from notifications where fid=$id";
        echo $sql = "update notifications set notify_status='1' where fid='$id'";
        //exit();
        mysql_query($sql);
        $sid = mt_rand(1, 1000000);

        if (!headers_sent()) {
            header("location:notifications.php");
        } else {
            echo "<script>
            window.location.href='notifications.php'
             </script>";
        }
    }

    /*
     * end by manish on 12/3/14
     */

    function edit_notification($id) {

        $sql = "select * from application where id='$id'";
        $res = mysql_query($sql);
        while ($row = mysql_fetch_array($res)) {
            $this->id = $row['id'];
            $this->application_no = $row['application_no'];
            $this->mark = $row['mark'];
            $this->classes = $row['classes'];
            $this->filing_date = $row['filing_date'];
            $this->applicant = $row['applicant'];
            $this->client = $row['client'];
            $this->priority_date = $row['priority_date'];
            $this->status = $row['status'];
            $this->cl_ref_no = $row['cl_ref_no'];
        }
    }

    function edit_notification1($id) {

        $sql = "select * from notifications where nid='$id'";
        $res = mysql_query($sql);
        while ($row = mysql_fetch_array($res)) {
            $this->fid = $row['fid'];
            $this->comment = $row['comment'];
        }
    }

    function update_notification($id, $application_no, $mark, $classes, $filing_date, $applicant, $client, $priority_date, $status, $pend_rec_cor, $history_sheet, $cl_ref_no) {

        list($m, $d, $y) = explode('/', $filing_date);
        $filing_dt_format = "$y-$m-$d";
        list($m, $d, $y) = explode('/', $priority_date);
        $priority_dt_format = "$y-$m-$d";

        $sql = "UPDATE application SET application_no='$application_no',mark='$mark',classes='$classes',filing_date='$filing_dt_format',applicant='$applicant',client='$client',priority_date='$priority_dt_format',status='$status',cl_ref_no='$cl_ref_no' WHERE id='$id'";
        mysql_query($sql);
        $sid = mt_rand(1, 1000000);

        if (!headers_sent()) {
            header("location:notifications.php");
        } else {
            echo "<script>
            window.location.href='notifications.php'
             </script>";
        }
    }

    function num_notice() {
        $td = date('Y-m-d');
        #$sql = "select a.id,a.application_no,n.title from application a,notifications n where a.id=n.nid  ";
        $sql = "select n.fid,a.id,a.application_no,n.status_id,s.status_name from application a,notifications n, status s  where a.id=n.app_id  and s.id=n.status_id  and (n.snooze='$td' or n.snooze='0000-00-00') AND n.notify_status=0";
        $res = mysql_query($sql);
        $num_rows = mysql_num_rows($res);
        echo $num_rows;
    }

    function delete_application($id) {
        $sql = "delete application,application_status from application INNER JOIN application_status where application.id=$id and application_status.app_id=$id";
        mysql_query($sql);
        $sql1 = "insert into log (user_id,action,comment) values('" . $_SESSION['id'] . "','Delete','application_id=$id')";
        mysql_query($sql1);
        $sid = mt_rand(1, 1000000);

        if (!headers_sent()) {
            header("location:applications_list.php");
        } else {
            echo "<script>
            window.location.href='applications_list.php'
             </script>";
        }
    }

    function edit_application($id) {

        $sql = "select * from application a, application_status s where a.id='$id' and s.app_id='$id'";
//exit(); and ys.alg_app_id='$id'
        //$sql = "select s.status_name, a.* from application a, status s where a.id='$id' and a.status=s.id";
        $res = mysql_query($sql);
        while ($row = mysql_fetch_array($res)) {

            $this->id = $row['id'];
            $this->file_type = $row['file_type'];
            $this->application_no = $row['application_no'];
            $this->mark = $row['mark'];
            $this->images = $row['images'];
            $this->classes = $row['classes'];
            $this->user = $row['user_proposed'];
            $this->filing_date = $row['filing_date'];
            $this->applicant = $row['applicant'];
            $this->lawfirm = $row['client'];
            $this->priority_date = $row['priority_date'];
            $this->jurisdiction = $row['jurisdiction'];
            $this->goods_services = $row['goods_services'];
            $this->status = $row['status'];
            $this->status_date = $row['status_effective_on_date'];
            $this->pend_rec_cor = $row['pending_record'];
            $this->history_sheet = $row['history'];
            $this->cl_ref_no = $row['cl_ref_no'];

            $this->alg_doc_name = $row['alg_doc_name'];
            $this->alg_applicant_code = $row['alg_applicant_code'];
            $this->alg_client_code = $row['alg_client_code'];
            $this->alg_priority_date = $row['alg_priority_date'];
            $this->alg_serialno = $row['alg_serialno'];
        }
    }

    function update_application($id, $file_type, $application_no, $mark, $image_named, $classes, $user, $filing_date, $applicant, $client, $priority_date, $jurisdiction, $goods_services, $pend_rec_cor, $history_sheet, $cl_ref_no, $alg_ref_no, $applicant_ref_no, $client_ref_no, $priority_ref_no, $year_ref_no) {

        $file = $_FILES['file'];
        $image_name = $file['name'];
        $type = $file['type'];
        $size = $file['size'];
        $tmppath = $file['tmp_name'];
        move_uploaded_file($tmppath, 'upload/' . $image_name);
        if ($image_name != '') {
            $sql = "UPDATE application SET file_type='$file_type',application_no='$application_no',mark='$mark',images='$image_name',classes='$classes',user_proposed='$user',filing_date='$filing_date',applicant='$applicant',client='$client',priority_date='$priority_date',jurisdiction='$jurisdiction',goods_services='$goods_services',pending_record='$pend_rec_cor',history='$history_sheet',cl_ref_no='$cl_ref_no' WHERE id='$id'";
            mysql_query($sql);
        } else {
          $sql2 = "UPDATE application SET file_type='$file_type', application_no='$application_no',mark='$mark',images='$image_name',classes='$classes',user_proposed='$user',filing_date='$filing_date',applicant='$applicant',client='$client',priority_date='$priority_date',jurisdiction='$jurisdiction',goods_services='$goods_services',pending_record='$pend_rec_cor',history='$history_sheet',cl_ref_no='$cl_ref_no' WHERE id='$id'";
//exit();           
 mysql_query($sql2);
        }
 $sqlCliMailDel = "delete from users_cli_mails where app_id='$id'";
        mysql_query($sqlCliMailDel);
        $cli_mail_to = implode(', ', (array)$_POST['cli_mail_to']);
        $cli_mail_forward = implode(', ', (array)$_POST['cli_mail_forward']);
        $cli_mail_instructed = implode(', ', (array)$_POST['cli_mail_instructed']);
        $sql_cli_email = "insert into users_cli_mails(app_id,client_entity_id,inter_entity_id,cli_mail_to,cli_mail_forward,cli_mail_instructed)values('$id','$applicant','$client','$cli_mail_to','$cli_mail_forward','$cli_mail_instructed')";
        mysql_query($sql_cli_email);
        $sql3 = "delete from year_serialno where alg_app_id='$id'";
        mysql_query($sql3);
        $sql4 = "insert into year_serialno(alg_app_id,alg_doc_name,alg_applicant_code,alg_client_code,alg_priority_date,alg_serialno,all_alg_data)values('$id','$alg_ref_no','$applicant_ref_no','$client_ref_no','$priority_ref_no','$year_ref_no','$alg_ref_no/$applicant_ref_no-$client_ref_no/" . addslashes(date("ymd", strtotime($priority_ref_no))) . "$year_ref_no')";
        mysql_query($sql4);
        $sql5 = "delete from alg_file_type where alg_file_app_id='$id'";
        mysql_query($sql5);
        $sql6 = "insert into alg_file_type(alg_file_app_id,alg_file_type,alg_apln,alg_class,alg_mark,all_alg_file_data)values('$id','$file_type','$application_no','$classes','$mark','$file_type $application_no-$classes $mark')";
        mysql_query($sql6);

        $total_status = $_POST['total_status'];
        $sql_delete = "delete from application_status where app_id='$id'";
        mysql_query($sql_delete);
$sql_status_hidden = "insert into application_status(app_id,status,status_effective_on_date )values('" . $id . "','1','')";
                mysql_query($sql_status_hidden);
        for ($i = 1; $i <= $total_status; $i++) {
            $status_add = $_POST['status' . $i];
            $status_date_update = $_POST['status_date' . $i];
            if ($status_add != 'select') {
                $sql_insert = "insert into application_status(app_id,status,status_effective_on_date)values('" . $id . "','" . $status_add . "','" . $status_date_update . "')";
                mysql_query($sql_insert);
            }
        }
        $total_status_recordals = $_POST['total_status_recordals'];
        $sql_delete_status_recordals = "delete from status_recordals where status_recordals_app_id='$id'";
        mysql_query($sql_delete_status_recordals);
        for ($t = 1; $t <= $total_status_recordals; $t++) {
            $status_recordals = $_POST['status_recordals' . $t];
            $status_recordals_date = $_POST['status_recordals_date' . $t];
            if ($status_recordals != 'select' && $status_recordals != '') {
                $sql_status_recordals = "insert into status_recordals(status_recordals_app_id,status_recordals,status_recordals_date )values('" . $id . "','" . $status_recordals . "','" . $status_recordals_date . "')";
                mysql_query($sql_status_recordals);
            }
        }

        $sql1 = "insert into log (user_id,action,comment) values('" . $_SESSION['id'] . "','update','application_id=$id')";
        mysql_query($sql1);
        $sid = mt_rand(1, 1000000);

        if (!headers_sent()) {
            header("location:update_application.php?action=edit&id=$id&sid=$sid");
        } else {
            echo "<script>
            window.location.href='update_application.php?action=edit&id=$id&sid=$sid'
             </script>";
        }
    }

    function add_admin_manager($name, $password, $email, $mobile, $address, $role) {

        $sql = "insert into admin (username,pass,email,mobile,address,role) values('$name','$password','$email','$mobile','$address','$role')";
        mysql_query($sql);
        $sid = mt_rand(1, 1000000);

        if (!headers_sent()) {
            header("location:create_admin_manager.php?created=New User has been created successfully.");
        } else {
            echo "<script>
            window.location.href='create_admin_manager.php?created=New User has been created successfully.'
             </script>";
        }
    }

    function change_pass($id, $pass, $repass) {

        if ($pass == $repass) {
            $sql = "update admin SET pass='$pass' where id='$id'";
            mysql_query($sql);
            $sid = mt_rand(1, 1000000);

            if (!headers_sent()) {
                header("location:change_pass.php?updated=Your password has been updated successfully");
            } else {
                echo "<script>
            window.location.href='change_pass.php?updated=Your password has been updated successfully'
             </script>";
            }
        } else {
            $sid = mt_rand(1, 1000000);
            if (!headers_sent()) {
                header("location:change_pass.php?updated=Password did not match");
            } else {
                echo "<script>
            window.location.href='change_pass.php?updated=Password did not match'
             </script>";
            }
        }
    }

    function admin_mgr_list() {
        $sql = "select * from admin";
        $res = mysql_query($sql);
        $i = 0;
        while ($get = mysql_fetch_array($res)) {
            $i++;
            $id = $get['id'];
            $name = $get['username'];
            $emailid = $get['email'];
            $mobile = $get['mobile'];
            $role = $get['role'];
            $sid = mt_rand(1, 1000000);
            echo '<tr><td>' . $i . '</td><td>' . $name . '</td><td>' . $emailid . '</td><td>' . $mobile . '</td><td>' . $role . '</td><td><a href="update_admin_mgr.php?action=edit&id=' . $id . '&?sid=' . $sid . '"><img class="icon" src="images/edit.png" alt="Edit" title="Edit" /></a>';
            if ($_SESSION['role'] != 'associate') {
                echo '<a onclick=" return confirm(\'do you really want to delete?\');" href="update_admin_mgr.php?action=delete&id=' . $id . '&?sid=' . $sid . '"><img class="icon" src="images/delete.png" alt="Delete" title="Delete" /></a></td></tr>';
            }
        }
    }

    function delete_admin_mgr($id) {

        $sql = "delete from admin where id=$id";
        $sid = mt_rand(1, 1000000);
        mysql_query($sql);

        if (!headers_sent()) {
            header("location:list_admin_mgr.php");
        } else {
            echo "<script>
            window.location.href='list_admin_mgr.php'
             </script>";
        }
    }

    function edit_admin_mgr($id) {

        $sql = "select * from admin where id='$id'";
        $res = mysql_query($sql);
        while ($get = mysql_fetch_array($res)) {
            $this->id = $get['id'];
            $this->name = $get['username'];
            $this->password = $get['pass'];
            $this->emailid = $get['email'];
            $this->mobile = $get['mobile'];
            $this->address = $get['address'];
            $this->role = $get['role'];
        }
    }

    function update_admin_mgr($id, $name, $password, $email, $mobile, $address, $role) {

        $sql = "UPDATE admin SET username='$name',pass='$password',email='$email',mobile='$mobile',address='$address',role='$role' WHERE id='$id'";
        mysql_query($sql);
        $sid = mt_rand(1, 1000000);

        if (!headers_sent()) {
            header("location:list_admin_mgr.php");
        } else {
            echo "<script>
            window.location.href='list_admin_mgr.php'
             </script>";
        }
    }

    function insertmail() {

        $sql = "insert into mail(name,subject,mailbody)values('" . $_POST['name'] . "','" . $_POST['subject'] . "','" . $_POST['mail'] . "')";

        mysql_query($sql);
        $sid = mt_rand(1, 1000000);
        if (!headers_sent()) {
            header("location:create_email.php?created=New Email has been created successfully.");
        } else {
            echo "<script>
            window.location.href='create_email.php?created=New Email has been created successfully.'
             </script>";
        }
    }

    function insertletter() {

        $sql = "insert into letter(name,subject,letterbody)values('" . $_POST['name'] . "','" . $_POST['subject'] . "','" . $_POST['letter'] . "')";
        mysql_query($sql);
        $sid = mt_rand(1, 1000000);
        if (!headers_sent()) {
            header("location:create_letter.php?created=New Letter has been created successfully.");
        } else {
            echo "<script>
            window.location.href='create_letter.php?created=New Letter has been created successfully.'
             </script>";
        }
    }

    function insert_status() {

        $sql = "insert into status(parent_id,status_name,radio,time_to_execute)values('" . $_POST['parent_status'] . "','" . trim($_POST['add_status']) . "','" . $_POST['radio'] . "','" . $_POST['time_execute'] . "')";
        mysql_query($sql);
        $sid = mt_rand(1, 1000000);

        if (!headers_sent()) {
            header("location:add_status.php?created=New Status has been created successfully.");
        } else {
            echo "<script>
            window.location.href='add_status.php?created=New Status has been created successfully.'
             </script>";
        }
    }

    function insert_history_status() {

        $sql = "insert into history_status(history_status_name)values('" . $_POST['add_history_status'] . "')";
        mysql_query($sql);
        $sid = mt_rand(1, 1000000);

        if (!headers_sent()) {
            header("location:add_history_status.php?created=New History Status has been created successfully.");
        } else {
            echo "<script>
            window.location.href='add_history_status.php?created=New History Status has been created successfully.'
             </script>";
        }
    }

    function parent_status() {

        $sql = "select id,status_name from status where id!='1'";
        $show = mysql_query($sql);
        while ($result = mysql_fetch_array($show)) {

            $id = $result['id'];
            $status_name = $result['status_name'];
            echo '<option value="' . $id . '">' . $status_name . '</option>';
        }
    }

    function show_parent_status($id = null) {

        $where = '';
        if ($id !== null)
            $where = 'where parent_id != ' . $id;

        $sql = "select id,status_name from status  " . $where;
        $show = mysql_query($sql);

        while ($result = mysql_fetch_array($show)) {

            $id = $result['id'];
            $status_name = $result['status_name'];
            echo '<option value="' . $id . '">' . $status_name . '</option>';
        }
    }

    function time_to_execute_status() {

        $sql = "select id,time_to_execute from status";
        $show = mysql_query($sql);
        while ($result = mysql_fetch_array($show)) {

            $id = $result['id'];
            $time_to_execute = $result['time_to_execute'];
            echo '<option value="' . $id . '">' . $time_to_execute . '</option>';
        }
    }

    /*
     * This is help to display status of the project
     * @$selected
     */

    function show_status($selected = null) {

        $sql = "select id,status_name from status where id != '1' order by status_order";
        $show = mysql_query($sql);
        while ($result = mysql_fetch_array($show)) {
            $id = $result['id'];
            $status_name = $result['status_name'];
            $sel = ($selected == $id) ? '  selected="selected" ' : '';
            echo '<option value="' . $id . '" ' . $sel . '>' . $status_name . '</option>';
        }
    }

    function mail_subject() {

        $sql = "select id,name from mail";
        $res = mysql_query($sql);
        $i = 0;
        while ($get = mysql_fetch_array($res)) {

            $id = $get['id'];
            $name = $get['name'];
            echo '<option value="' . $id . '">' . $name . '</option>';
        }
    }

    function letter_subject() {
        $sql = "select id,name from letter";
        $res = mysql_query($sql);
        while ($get = mysql_fetch_array($res)) {
            $id = $get['id'];
            $name = $get['name'];
            echo '<option value="' . $id . '">' . $name . '</option>';
        }
    }

    function show_final_email($app_no, $email_sub_id) {

        $sql = "select * from mail where id='$email_sub_id' ";
        $res = mysql_query($sql);
        $i = 0;
        while ($get = mysql_fetch_array($res)) {
            $sql2 = "select *,(SELECT name FROM user WHERE id = a.client ) AS client, (SELECT name FROM user WHERE id = a.applicant) AS applicant from application a where application_no='$app_no' ";
            $res2 = mysql_query($sql2);
            $row = mysql_fetch_assoc($res2);
            $application = $row['mark'];
            $classes = $row['classes'];
            $ref_no = $row['cl_ref_no'];
            $filing_date = $row['filing_date'];
            $priority_date = $row['priority_date'];
            $address = $row['jurisdiction'];
            $applicant = $row['applicant'];
            $client = $row['client'];
            $this->id = $get['id'];
            $this->subject = $get['subject'];
            $mail_body = $get['mailbody'];
            $mail_body = str_replace("[application]", $application, $mail_body);
            $mail_body = str_replace("[appno]", $app_no, $mail_body);
            $mail_body = str_replace("[refno]", $ref_no, $mail_body);
            $mail_body = str_replace("[filling_date]", $filing_date, $mail_body);
            $mail_body = str_replace("[priority_date]", $priority_date, $mail_body);
            $mail_body = str_replace("[address]", $address, $mail_body);
            $mail_body = str_replace("[applicant]", $applicant, $mail_body);
            $mail_body = str_replace("[client]", $client, $mail_body);
            $mail_body = str_replace("[class]", $classes, $mail_body);
            $this->mailbody = $mail_body = str_replace("[class]", $classes, $mail_body);
        }

        $query = "SELECT *,(SELECT name FROM user WHERE id = a.client ) AS client, (SELECT name FROM user WHERE id = a.applicant) AS applicant FROM application a WHERE a.application_no =  '$app_no'";
        $query_res = mysql_query($query);
        while ($row = mysql_fetch_array($query_res)) {

            $client = $row['client'];
            $applicant = $row['applicant'];
            $classes = $row['classes'];
            $ref_no = $row['cl_ref_no'];
            $exp_class = explode(',', $classes);
            $last_key = end(array_keys($exp_class));
            foreach ($exp_class as $key => $value) {
                $ret .= $value;
                if ($key == ($last_key - 1)) {
                    $ret .= " & ";
                } else if ($key == $last_key) {
                    break;
                } else {
                    $ret .= ", ";
                }
            }

            $query2 = "select subject from mail where id='$email_sub_id'";
            $res2 = mysql_query($query2);
            $row2 = mysql_fetch_assoc($res2);
            $email_type = $row2['subject'];
            $email_type = str_replace("[application]", $application, $email_type);
            $email_type = str_replace("[applicant]", $applicant, $email_type);
            $email_type = str_replace("[appno]", $app_no, $email_type);
            $email_type = str_replace("[class]", $ret, $email_type);
            $email_type = str_replace("[filling_date]", $filing_date, $email_type);
            $email_type = str_replace("[priority_date]", $priority_date, $email_type);
            $email_type = str_replace("[refno]", $ref_no, $email_type);
            $this->sub = $new_sub = str_replace("[client]", $client, $email_type);
        }
    }

    function show_letter($appno, $lettertype) {
        $sql = "select * from letter where id='$lettertype'";
        $res = mysql_query($sql);
        $i = 0;
        while ($get = mysql_fetch_array($res)) {
            $sql2 = "select *,(SELECT name FROM user WHERE id = a.client ) AS client, (SELECT name FROM user WHERE id = a.applicant) AS applicant from application a where application_no='$appno' ";
            $res2 = mysql_query($sql2);
            $row = mysql_fetch_assoc($res2);
            $application = $row['name'];
            $classes = $row['classes'];
            $ref_no = $row['cl_ref_no'];
            $filing_date = $row['filing_date'];
            $priority_date = $row['priority_date'];
            $address = $row['jurisdiction'];
            $applicant = $row['applicant'];
            $client = $row['client'];
            $this->id = $get['id'];
            $this->subject = $get['subject'];
            $letter_body = $get['letterbody'];
            $letter_body = str_replace("[application]", $application, $letter_body);
            $letter_body = str_replace("[appno]", $appno, $letter_body);
            $letter_body = str_replace("[refno]", $ref_no, $letter_body);
            $letter_body = str_replace("[filling date]", $filing_date, $letter_body);
            $letter_body = str_replace("[priority date]", $priority_date, $letter_body);
            $letter_body = str_replace("[address]", $address, $letter_body);
            $letter_body = str_replace("[applicant]", $applicant, $letter_body);
            $letter_body = str_replace("[client]", $client, $letter_body);
            $this->letterbody = $letter_body = str_replace("[class]", $classes, $letter_body);
        }
        $query1 = "select *,(select name from user where id=a.client) as client, (select name from user where id=a.applicant) as applicant from application a where a.application_no =  '$appno'";
        $res = mysql_query($query1);
        while ($row = mysql_fetch_array($res)) {
            $client = $row['client'];
            $applicant = $row['applicant'];
            $classes = $row['classes'];
            $ref_no = $row['cl_ref_no'];
            $exp = explode(',', $classes);
            $lastkey = end(array_keys($exp));
            foreach ($exp as $key => $value) {
                $ret .= $value;
                if ($key == ($lastkey - 1)) {
                    $ret .= " & ";
                } else if ($key == $lastkey) {
                    break;
                } else {
                    $ret .= ", ";
                }
            }
        }
        $query2 = "select name,subject from letter where id='$lettertype'";
        $res = mysql_query($query2);
        $row1 = mysql_fetch_array($res);
        $lettertype = $row1['subject'];
        $lettertype = str_replace("[application]", $application, $lettertype);
        $lettertype = str_replace("[applicant]", $applicant, $lettertype);
        $lettertype = str_replace("[client]", $client, $lettertype);
        $lettertype = str_replace("[appno]", $appno, $lettertype);
        $lettertype = str_replace("[class]", $ret, $lettertype);
        $lettertype = str_replace("[refno]", $ref_no, $lettertype);
        $this->sub = $new_sub = str_replace("[client]", $client, $lettertype);
    }

    function grid() {
        $sql = "select * from mail";
        $res = mysql_query($sql);
        $i = 0;
        while ($get = mysql_fetch_array($res)) {
            $i++;
            $id = $get['id'];
            $name = $get['name'];

            echo '<tr><td>' . $i . '</td><td>' . $name . '</td><td><a href="updatemail.php?action=edit&id=' . $id . '"><img class="icon" src="images/edit.png" alt="Edit" title="Edit" /></a></td></tr>';
        }
    }

    function gridletter() {
        $sql = "select * from letter";
        $res = mysql_query($sql);
        $i = 0;
        while ($get = mysql_fetch_array($res)) {
            $i++;
            $id = $get['id'];
            $name = $get['name'];

            echo '<tr><td>' . $i . '</td><td>' . $name . '</td><td><a href="updateletter.php?action=edit&id=' . $id . '"><img class="icon" src="images/edit.png" alt="Edit" title="Edit" /></a></td></tr>';
        }
    }

    function show($id) {
        $sql = "select * from mail where id='$id'";
        $res = mysql_query($sql);
        while ($get = mysql_fetch_array($res)) {
            $this->id = $get['id'];
            $this->name = $get['name'];
            $this->subject = $get['subject'];
            $this->mailbody = $get['mailbody'];
        }
    }

    function showletter($id) {
        $sql = "select * from letter where id='$id'";
        $res = mysql_query($sql);
        while ($get = mysql_fetch_array($res)) {
            $this->id = $get['id'];
            $this->subject = $get['subject'];
            $this->letterbody = $get['letterbody'];
        }
    }

    function updatemail($id) {

        $sql = "update mail set name='" . addslashes($_POST['name']) . "', subject='" . addslashes($_POST['subject']) . "',mailbody='" . addslashes($_POST['mailbody']) . "' where id=" . $id . "";
        if (mysql_query($sql)) {
            echo '<script> location.href="gridmail.php"</script>';
        }
    }

    function updateletter($id) {

        $sql = "update letter set subject='" . $_POST['subject'] . "',letterbody='" . $_POST['letterbody'] . "' where id=" . $id . "";
        if (mysql_query($sql)) {
            echo '<script> location.href="gridletter.php"</script>';
        }
    }

    /*
     * Work by manish on 12/3/14
     */

    function search($app) {
        $sql = "select *,(SELECT name FROM user WHERE id = a.client ) AS client, (SELECT name FROM user WHERE id = a.applicant) AS applicant,
                    (SELECT status_name FROM getappstatus WHERE app_id = a.id) AS status from application a, application_status ast where a.application_no like '%" . $app . "%' 
                     or  a.mark like '%" . $app . "%' or  a.classes like '%" . $app . "%' or  a.filing_date like '%" . $app . "%'  or  a.applicant like '%" . $app . "%' 
                     or  a.client like '%" . $app . "%' or  a.priority_date like '%" . $app . "%' or  a.jurisdiction like '%" . $app . "%' or ast.status like '%" . $app . "%' 
                     or a.applicant in (select u.id  from user u where u.name like '%" . $app . "%') or a.client in (select u.id  from user u where u.name like '%" . $app . "%') 
                     or ast.status in (select s.id  from status s where s.status_name like '%" . $app . "%') group by a.id";
        //$sql1 = "select *,(select status_name from status WHERE id = ast.status)as st from application_status ast where ast.app_id=$id";
        //$show = mysql_query($sql1);
        $res = mysql_query($sql);
        $nums = mysql_num_rows($res);
        if ($nums >= 1) {
            $i = 0;
            while ($get = mysql_fetch_array($res)) {
                $i++;
                $id = $get['id'];
                $application = $get['application_no'];
                $mark = $get['mark'];
                $classes = $get['classes'];
                $filling_date = $get['filing_date'];
                $date_filling = date('d F,Y', strtotime($filling_date));
                $applicant = $get['applicant'];
                $client = $get['client'];
                $priority_date = $get['priority_date'];
                $date_priority = date('d F,Y', strtotime($priority_date));
                $jurisdiction = $get['jurisdiction'];
                //$status = $get['status'];
                $status = str_replace('hidden,', '', $get['status'] );
                $status = str_replace('hidden', '', $status );
                $history = $get['history'];
                $pending_record = $get['pending_record'];
                $sid = mt_rand(1, 1000000);
                $app_name = $get['applicant'];
                $cli_name = $get['client'];

                $output .= '<tr><td>' . $i . '</td><td>' . $application . '</td><td>' . $mark . '</td><td>' . $classes . '</td><td>' . $date_filling . '</td><td>' . $app_name . '</td><td>' . $cli_name . '</td><td>' . $date_priority . '</td><td>' . $jurisdiction . '</td><td>' . $status . '</td><td>' . $history . '</td><td>' . $pending_record . '</td></tr>';
            }
        }
        return $output;
    }

    function trademark_no_name() {

        $sql = "select id,application_no from application";
        $show = mysql_query($sql);
        while ($result = mysql_fetch_array($show)) {

            $id = $result['id'];
            $application_no = $result['application_no'];
            echo '<option value="' . $application_no . '">' . $application_no . '</option>';
        }
    }

    /*
     * end by manish on 12/3/14
     */
}

?>