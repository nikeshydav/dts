<?php
ini_set('display_errors', 'off');
require_once 'include/session.php';

unset($_SESSION['alg_file_data11']);
unset($_SESSION['alg_data']);
unset($_SESSION['file_type_select']);
unset($_SESSION['application_number']);
unset($_SESSION['trademark']);
unset($_SESSION['applicant_select']);
unset($_SESSION['client_select']);
unset($_SESSION['class_select']);
unset($_SESSION['jurisdiction_select']);
unset($_SESSION['history_select']);
unset($_SESSION['pending_select']);
unset($_SESSION['filling_select']);
unset($_SESSION['priority_select']);
unset($_SESSION['status_select']);
unset($_SESSION['status_recordals_select']);

unset($_SESSION['alg_file_no_chk']);
unset($_SESSION['alg_ref_no_chk']);
unset($_SESSION['file_type_chk']);
unset($_SESSION['application_number_chk']);
unset($_SESSION['trademark_chk']);
unset($_SESSION['applicant_select_chk']);
unset($_SESSION['client_select_chk']);
unset($_SESSION['class_select_chk']);
unset($_SESSION['filling_select_chk']);
unset($_SESSION['priority_select_chk']);
unset($_SESSION['jurisdiction_select_chk']);
unset($_SESSION['history_select_chk']);
unset($_SESSION['pending_select_chk']);
unset($_SESSION['status_select_chk']);
unset($_SESSION['status_recordals_chk']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Selective Search</title>
        <link rel="stylesheet" href="css/custom.css" />
        <link rel="stylesheet" href="css/menu.css" />
        <script type="text/javascript">
            function checkall(objForm)
            {
                len = objForm.elements.length;
                var i = 0;
                for (i = 0; i < len; i++) {
                    if (objForm.elements[i].type == 'checkbox')
                        objForm.elements[i].checked = objForm.check_all.checked;
                }
            }
        </script>
        <?php
        include "class.docket.php";
        include "include/class.selectiveSearch.php";
        $obj = new docket();
        $sective = new selectivesearch();
        ?>

    </head>
    <body> <?php include_once 'include/menu.php'; ?>
        <div class="content1" id="friendslist">
            <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>                
            <form action="" method="post">     
                <label><input type="text" name="alg_file_data11" id="alg_file_data" value="<?php echo $_POST['alg_file_data11'] ?>" class="tf">ALG File</label>
                <label><input type="text" name="alg_data" id="alg_data" value="<?php echo $_POST['alg_data'] ?>" class="tf">ALG Ref</label>
                <label><select name="file_type_select" id="file_type_select" class="tf" style="width: 140px;"><option value="select">--Select--</option>
                        <option>TM-1</option>
                        <option>TM-2</option>
                        <option>TM-3</option>
                        <option>TM-4</option>
                        <option>TM-8</option>
                        <option>TM-37</option>
                        <option>TM-51</option>
                        <option>TM-52</option>
                        <option>TM-64</option>
                        <option>TM-65</option>
                        <option>TM-66</option>
                        <option>TM-67</option>
                        <option>TM-68</option>
                        <option>TM-69</option></select> File Type
                </label>
                <label><input type="text" name="application_number" id="application_number" value="<?php echo $_POST['application_number'] ?>" class="tf">Registration No.</label>
                <label><input type="text" name="trademark" id="trademark" value="<?php echo $_POST['trademark'] ?>" class="tf">Mark
                </label>
                <label><input type="text" name="applicant_select" id="applicant_select" value="<?php echo $_POST['applicant_select'] ?>">Client Entity
                </label>
                <label><input type="text" name="client_select" id="clientt_select" value="<?php echo $_POST['client_select'] ?>">Intermediary Entity
                </label><label><input type="text" name="class_select" id="class_select" value="<?php echo $_POST['class_select'] ?>" class="tf">Class(es)
                </label><label><input type="text" name="filling_select" id="filling_select" value="<?php echo $_POST['filling_select'] ?>" class="tf">Filing Date
                </label><label><input type="text" name="priority_select" id="priority_select" value="<?php echo $_POST['priority_select'] ?>" class="tf">Priority Date
                </label>
                <label><select name="jurisdiction_select" id="jurisdiction_select" class="tf" style="width: 140px;"><option value="select">--Select--</option>
                        <option>New Delhi</option>
                        <option>Mumbai</option>
                        <option>Ahmedabad</option>
                        <option>Kolkata</option>
                        <option>Chennai</option></select> Forum<?php //echo $_POST['jurisdiction_select']   ?>
                </label><label><input type="text" name="history_select" id="history_select" value="<?php echo $_POST['history_select'] ?>" class="tf">History
                </label><label><input type="text" name="pending_select" id="pending_select" value="<?php echo $_POST['pending_select'] ?>" class="tf">Pending Recordal
                </label><label><input type="text" name="status_select" id="status_select" value="<?php echo $_POST['status_select'] ?>" class="tf">Status Maintenance
                </label><label><select name="status_recordals_select" id="status_recordals_select" style="width: 140px;">
                        <option value="select">--Select--</option>
                        <option>TM-16</option>
                        <option>TM-24</option>
                        <option>TM-33</option>
                        <option>TM-34</option>
                        <option>TM-35</option>
                        <option>TM-36</option>
                        <option>TM-40</option>
                        <option>TM-50</option>
                    </select>Status Recordals</label><br><br>

                <label><input type="checkbox" <?php echo ($_POST['alg_file_no_chk'] == "yes" ?  'checked="checked"' : '')  ?> value="yes" name="alg_file_no_chk" id="alg_file_no_chk" class="tf">ALG File</label>
                <label><input type="checkbox" <?php echo ($_POST['alg_ref_no_chk'] == "yes" ?  'checked="checked"' : '')  ?> value="yes" name="alg_ref_no_chk" id="alg_ref_no_chk" class="tf">ALG Ref</label>
                <label><input type="checkbox" <?php echo ($_POST['file_type_chk'] == "yes" ?  'checked="checked"' : '')  ?> value="yes" name="file_type_chk" id="file_type_chk" class="tf">File Type</label>
                <label><input type="checkbox" <?php echo ($_POST['application_number_chk'] == "yes" ?  'checked="checked"' : '')  ?> value="yes" name="application_number_chk"  id="application_number_chk" class="tf">Registration No.</label>
                <label><input type="checkbox" <?php echo ($_POST['trademark_chk'] == "yes" ?  'checked="checked"' : '')  ?> value="yes" name="trademark_chk"  id="trademark_chk" class="tf">Mark
                </label><label><input type="checkbox" <?php echo ($_POST['applicant_select_chk'] == "yes" ?  'checked="checked"' : '')  ?> value="yes" name="applicant_select_chk"  id="applicant_select_chk">Client Entity
                </label><label><input type="checkbox" <?php echo ($_POST['client_select_chk'] == "yes" ?  'checked="checked"' : '')  ?> value="yes" name="client_select_chk"  id="clientt_select_chk">Intermediary Entity
                </label><label><input type="checkbox" <?php echo ($_POST['class_select_chk'] == "yes" ?  'checked="checked"' : '')  ?> value="yes" name="class_select_chk"  id="class_select_chk" class="tf">Class(es)
                </label><label><input type="checkbox" <?php echo ($_POST['filling_select_chk'] == "yes" ?  'checked="checked"' : '')  ?> value="yes" name="filling_select_chk"  id="filling_select_chk" class="tf">Filing Date<br>
                </label><label><input type="checkbox" <?php echo ($_POST['priority_select_chk'] == "yes" ?  'checked="checked"' : '')  ?> value="yes" name="priority_select_chk"  id="priority_select_chk" class="tf">Priority Date<br>
                </label><label><input type="checkbox" <?php echo ($_POST['jurisdiction_select_chk'] == "yes" ?  'checked="checked"' : '')  ?> value="yes" name="jurisdiction_select_chk"  id="jurisdiction_select_chk" class="tf">Forum<br>
                </label><label><input type="checkbox" <?php echo ($_POST['history_select_chk'] == "yes" ?  'checked="checked"' : '')  ?> value="yes" name="history_select_chk"  id="history_select_chk" class="tf">History<br>
                </label><label><input type="checkbox" <?php echo ($_POST['pending_select_chk'] == "yes" ?  'checked="checked"' : '')  ?> value="yes" name="pending_select_chk"  id="pending_select_chk" class="tf">Pending Recordal<br>
                </label><label><input type="checkbox" <?php echo ($_POST['status_select_chk'] == "yes" ?  'checked="checked"' : '')  ?> value="yes" name="status_select_chk"  id="status_select_chk" class="tf">Status Maintenance<br>
                </label><label><input type="checkbox" <?php echo ($_POST['status_recordals_chk'] == "yes" ?  'checked="checked"' : '')  ?> value="yes" name="status_recordals_chk"  id="status_recordals_chk" class="tf">Status Recordals<br>
                </label><label><input type="checkbox" name="all" id="check_all" checked="checked" onClick="checkall(this.form)" value="check_all">Select All</label>
                <br><br>          

                <input type="submit" name="selective_search" value="search">
            </form><br><br>

            <?php
            if ($_POST['selective_search']) {
                $sective->select_search();
            }
            ?>
        </div>

        <style>
            label{width: 150px;display: inline-block}	
        </style>
    </body>
</html>
