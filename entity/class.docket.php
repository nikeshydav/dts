<?php

include "configure/connectivity.php";
@session_start();

class docket {

    function docket() {
        
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
                header("location:welcome.php?sid=$sid");
            } else {
                echo "<script>
			window.location.href='welcome.php?sid=$sid'
			 </script>";
            }
        } else {
            $sid = mt_rand(1, 1000000);
            if (!headers_sent()) {
                header("location:index.php?err=The username or password you entered is incorrect.&?sid=$sid");
            } else {
                echo "<script>
			window.location.href='index.php?err=The username or password you entered is incorrect.&?sid=$sid'
			 </script>";
            }
        }
    }

    function add_app_client($name, $name_code, $address,$entity_type) {
        $sql = "insert into user (name,name_code,address,entity_type) values('$name','$name_code','$address','$entity_type')";
        mysql_query($sql);
        $id = mysql_insert_id();
        $total_email = $_POST['total_email'];
        for ($i = 1; $i <= $total_email; $i++) {
            $name_add = addslashes($_POST['name' . $i]);
            $designation_add = addslashes($_POST['designation' . $i]);
            $address_add = addslashes($_POST['address' . $i]);
            $email_add = addslashes($_POST['email' . $i]);
            if ($name_add != '') {
                $sql2 = "insert into user_entity_email (user_id,name,designation,address,email) values
                    ('" . $id . "','$name_add','$designation_add','$address_add','$email_add')";
                mysql_query($sql2);
            }
        }
        $sid = mt_rand(1, 1000000);
        if (!headers_sent()) {
            header("location:add_user.php?created=New Applicant/Client has been created successfully.?sid=$sid");
        } else {
            echo "<script>
			window.location.href='add_user.php?created=New Applicant/Client has been created successfully.&?sid=$sid'
			 </script>";
        }
    }

    function add_adversary_client($name, $address) {

        $sql = "INSERT INTO adversary_entity (name, address)VALUES('$name','$address')";
        mysql_query($sql);
        $sid = mt_rand(1, 1000000);
        if (!headers_sent()) {
            header("location:add_adversary.php?created=New Adversary Client has been created successfully.?sid=$sid");
        } else {
            echo "<script>
			window.location.href='add_adversary.php?created=New Adversary Client has been created successfully.&?sid=$sid'
			 </script>";
        }
    }

    function users_list($contactView = null) {
        //$selected = explode(',', $contactView);
        $sql = "select * from user ORDER BY name ASC";
        $res = mysql_query($sql);
        $i = 0;
        while ($get = mysql_fetch_array($res)) {
            $i++;
            $id = $get['id'];
            $name = $get['name'];
            $name_code = $get['name_code'];
            $entity_type = $get['entity_type'];
            $address = $get['address'];            
           
            $allContactDetails = '';
            $sql_rec = "select * from user_entity_email where user_id=$id";
            $get_rec = mysql_query($sql_rec);
            while ($row_rec = mysql_fetch_array($get_rec)) {
                    $contact_name = $row_rec['name'];
                    $contact_designation = $row_rec['designation'];
                    $contact_address = $row_rec['address'];
                    $contact_email = $row_rec['email'].',';
                    $allContactDetails .= substr($contact_name .", ". $contact_designation .", ". $contact_address .", ". $contact_email, 0, -1) . "<br>";
                } 
                
            $sid = mt_rand(1, 1000000);
            if ($contactView) {
               echo '<tr><td>' . $i . '</td><td>' . $name . '</td><td>' . $name_code . '</td><td>' . $address . '</td><td>' . $allContactDetails . '</td>' .
                '<td><a href="update.php?action=edit&id=' . $id . '&?sid=' . $sid . '"><img class="icon" src="images/edit.png" alt="Edit" title="Edit" /></a>';
                if ($_SESSION['role'] == 'admin') {
                    echo '<a  onclick=" return confirm(\'do you really want to delete?\');"  href="update.php?action=delete&id=' . $id . '&?sid=' . $sid . '">
            <img class="icon" src="images/delete.png" alt="Delete" title="Delete" /></a>';
                }
                echo '</td></tr>'; 
            } else {
                echo '<tr><td>' . $i . '</td><td>' . $name . '</td><td>' . $name_code . '</td><td>' . $entity_type . '</td>' .
                '<td><a href="update.php?action=edit&id=' . $id . '&?sid=' . $sid . '"><img class="icon" src="images/edit.png" alt="Edit" title="Edit" /></a>';
                if ($_SESSION['role'] == 'admin') {
                    echo '<a  onclick=" return confirm(\'do you really want to delete?\');"  href="update.php?action=delete&id=' . $id . '&?sid=' . $sid . '">
            <img class="icon" src="images/delete.png" alt="Delete" title="Delete" /></a>';
                }
                echo '</td></tr>';
            }
        }
    }

    function adversary_list() {

        $sql = "select * from adversary_entity";
        $res = mysql_query($sql);
        $i = 0;
        while ($get = mysql_fetch_array($res)) {
            $i++;
            $id = $get['id'];
            $name = $get['name'];
            $address = $get['address'];
            echo '<tr><td>' . $i . '</td><td>' . $name . '</td><td>' . $address . '</td><td><a href="updateadversary.php?action=edit&id=' . $id . '"><img class="icon" src="images/edit.png" alt="Edit" title="Edit" /></a>';
            if ($_SESSION['role'] == 'admin') {
                echo '<a onclick=" return confirm(\'do you really want to delete?\');" href="updateadversary.php?action=delete&id=' . $id . '&?sid=' . $sid . '"><img class="icon" src="images/delete.png" alt="Delete" title="Delete" /></a>';
            }
            echo '</td></tr>';
        }
    }

    function delete_user($id) {

        $sql = "delete from user where id=$id";
        mysql_query($sql);
        $sql_del = "delete from user_entity_email where user_id=$id";
        mysql_query($sql_del);
        $sid = mt_rand(1, 1000000);
        $sql1 = "insert into log (user_id,action,comment) values('" . $_SESSION['id'] . "','Delete','user_id=$id')";
        mysql_query($sql1);

        if (!headers_sent()) {
            header("location:users_list.php?sid=$sid");
        } else {
            echo "<script>
			window.location.href='users_list.php?sid=$sid'
			 </script>";
        }
    }

    function delete_adversary($id) {

        $sql = "delete from adversary_entity where id=$id";
        $sid = mt_rand(1, 1000000);
        mysql_query($sql);

        if (!headers_sent()) {
            header("location:adversary_list.php?sid=$sid");
        } else {
            echo "<script>
			window.location.href='adversary_list.php?sid=$sid'
			 </script>";
        }
    }

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

    function edit_adversary($id) {
        $sql = "select * from adversary_entity where id='$id'";
        $res = mysql_query($sql);
        while ($get = mysql_fetch_array($res)) {
            $this->id = $get['id'];
            $this->name = $get['name'];
            $this->address = $get['address'];
        }
    }

    function update_user($id, $name, $name_code, $address,$entity_type) {

        $sql = "UPDATE user SET name='$name',name_code='$name_code',address='$address', entity_type='$entity_type' WHERE id='$id'";
        mysql_query($sql);
        $sql_delete = "delete from user_entity_email where user_id='$id'";
        mysql_query($sql_delete);
        $total_email = $_POST['total_email'];
        for ($i = 1; $i <= $total_email; $i++) {
            $name_add = addslashes($_POST['name' . $i]);
            $designation_add = addslashes($_POST['designation' . $i]);
            $address_add = addslashes($_POST['address' . $i]);
            $email_add = addslashes($_POST['email' . $i]);
            if ($name_add != '') {
                $sql2 = "insert into user_entity_email (user_id,name,designation,address,email) values
                    ('" . $id . "','$name_add','$designation_add','$address_add','$email_add')";
                mysql_query($sql2);
            }
        }
        //exit();
        $sid = mt_rand(1, 1000000);
        if (!headers_sent()) {
            header("location:users_list.php?sid=$sid");
        } else {
            echo "<script>
			window.location.href='users_list.php?sid=$sid'
			 </script>";
        }
    }

    function update_adversary($id, $name, $address) {

        $sql = "update adversary_entity set name='" . $name . "',address='" . $address . "' where id=" . $id . "";
        if (mysql_query($sql)) {
            echo '<script> location.href="adversary_list.php"</script>';
        }
    }

    function change_pass($id, $pass, $repass) {

        if ($pass == $repass) {
            $sql = "update admin SET pass='$pass' where id='$id'";
            mysql_query($sql);
            $sid = mt_rand(1, 1000000);
            if (!headers_sent()) {
                header("location:change_pass.php?updated=Your password has been updated successfully&?sid=$sid");
            } else {
                echo "<script>
			window.location.href='change_pass.php?updated=Your password has been updated successfully&?sid=$sid'
			 </script>";
            }
        } else {
            $sid = mt_rand(1, 1000000);
            if (!headers_sent()) {
                header("location:change_pass.php?updated=Password did not match&?sid=$sid");
            } else {
                echo "<script>
			window.location.href='change_pass.php?updated=Password did not match&?sid=$sid'
			 </script>";
            }
        }
    }

    function add_admin_manager($name, $password, $email, $mobile, $address, $role) {

        $sql = "insert into admin (username,pass,email,mobile,address,role) values('$name','$password','$email','$mobile','$address','$role')";
        mysql_query($sql);
        $sid = mt_rand(1, 1000000);

        if (!headers_sent()) {
            header("location:create_admin_manager.php?created=New User has been created successfully.?sid=$sid");
        } else {
            echo "<script>
			window.location.href='create_admin_manager.php?created=New User has been created successfully.&?sid=$sid'
			 </script>";
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
            if ($_SESSION['role'] == 'admin') {
                echo '<a onclick=" return confirm(\'do you really want to delete?\');" href="update_admin_mgr.php?action=delete&id=' . $id . '&?sid=' . $sid . '"><img class="icon" src="images/delete.png" alt="Delete" title="Delete" /></a></td></tr>';
            }
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
            header("location:list_admin_mgr.php?sid=$sid");
        } else {
            echo "<script>
			window.location.href='list_admin_mgr.php?sid=$sid'
			 </script>";
        }
    }

    function delete_admin_mgr($id) {

        $sql = "delete from admin where id=$id";
        $sid = mt_rand(1, 1000000);
        mysql_query($sql);

        if (!headers_sent()) {
            header("location:list_admin_mgr.php?sid=$sid");
        } else {
            echo "<script>
			window.location.href='list_admin_mgr.php?sid=$sid'
			 </script>";
        }
    }

}

?>
