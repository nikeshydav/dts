<?php
ini_set('display_errors', 'off');
require_once 'include/session.php';

unset($_SESSION['alg_file_data11']);
unset($_SESSION['alg_data']);
unset($_SESSION['file_type_select']);
unset($_SESSION['trademark']);
unset($_SESSION['adv_domain_name_select']);
unset($_SESSION['adversary_entity_select']);
unset($_SESSION['applicant_select']);
unset($_SESSION['client_select']);
unset($_SESSION['jurisdiction_select']);
unset($_SESSION['client_marks_select']);
unset($_SESSION['history_select']);
unset($_SESSION['status_select']);

unset($_SESSION['alg_file_no_chk']);
unset($_SESSION['alg_ref_no_chk']);
unset($_SESSION['file_type_chk']);
unset($_SESSION['trademark_chk']);
unset($_SESSION['adv_domain_name_select_chk']);
unset($_SESSION['adversary_entity_select_chk']);
unset($_SESSION['applicant_select_chk']);
unset($_SESSION['client_select_chk']);
unset($_SESSION['jurisdiction_select_chk']);
unset($_SESSION['client_marks_select_chk']);
unset($_SESSION['history_select_chk']);
unset($_SESSION['status_select_chk']);
?>
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
                        <option>Prop C&D</option>
                        <option>C&D</option>
                        <option>Prop C&D, Prop INDRP/UDRP</option>
                        <option>C&D, Prop INDRP/UDRP</option>
                        <option>Prop C&D, Prop INDRP</option>
                        <option>Prop C&D, Prop UDRP</option>
                        <option>C&D, Prop INDRP</option>
                        <option>C&D, Prop UDRP</option></select> File Type
                </label>                
                <label><input type="text" name="trademark" id="trademark" value="<?php echo $_POST['trademark'] ?>" class="tf">Adversary Mark
                </label>
                <label><input type="text" name="adv_domain_name_select" id="adv_domain_name_select" value="<?php echo $_POST['adv_domain_name_select'] ?>" class="tf">Adv domain name
                </label>
                <label><input type="text" name="adversary_entity_select" id="adversary_entity_select" value="<?php echo $_POST['adversary_entity_select'] ?>" class="tf">Adversary Entity
                </label>
                <label><input type="text" name="applicant_select" id="applicant_select" value="<?php echo $_POST['applicant_select'] ?>">Client Entity
                </label>
                <label><input type="text" name="client_select" id="clientt_select" value="<?php echo $_POST['client_select'] ?>">Intermediary Entity
                </label>
                <label>
                    <select name="jurisdiction_select" id="jurisdiction_select" >
                        <option value="select">--Select--</option>
                        <option>DEL</option>
                        <option>MUM</option>
                        <option>KOL</option>
                        <option>CHE</option>
                    </select> Forum
                </label>
                <label><input type="text" name="client_marks_select" id="client_marks_select" value="<?php echo $_POST['client_marks_select'] ?>">Client Marks
                </label>
                <label><input type="text" name="history_select" id="history_select" value="<?php echo $_POST['history_select'] ?>" class="tf">History
                </label><label><input type="text" name="status_select" id="status_select" value="<?php echo $_POST['status_select'] ?>" class="tf">Status Enforcement
                </label><br><br>

                <label><input type="checkbox" <?php echo ($_POST['alg_file_no_chk'] == "yes" ? 'checked="checked"' : '') ?> value="yes" name="alg_file_no_chk" id="alg_file_no_chk" class="tf">ALG File</label>
                <label><input type="checkbox" <?php echo ($_POST['alg_ref_no_chk'] == "yes" ? 'checked="checked"' : '') ?> value="yes" name="alg_ref_no_chk" id="alg_ref_no_chk" class="tf">ALG Ref</label>
                <label><input type="checkbox" <?php echo ($_POST['file_type_chk'] == "yes" ? 'checked="checked"' : '') ?> value="yes" name="file_type_chk" id="file_type_chk" class="tf">File Type</label>                
                <label><input type="checkbox" <?php echo ($_POST['trademark_chk'] == "yes" ? 'checked="checked"' : '') ?> value="yes" name="trademark_chk" id="trademark_chk" class="tf">Adversary Mark
                </label><label><input type="checkbox" <?php echo ($_POST['adv_domain_name_select_chk'] == "yes" ? 'checked="checked"' : '') ?> value="yes" name="adv_domain_name_select_chk" id="adv_domain_name_select_chk" class="tf">Adv domain name
                </label><label><input type="checkbox" <?php echo ($_POST['adversary_entity_select_chk'] == "yes" ? 'checked="checked"' : '') ?> value="yes" name="adversary_entity_select_chk" id="adversary_entity_select_chk" class="tf">Adversary Entity
                </label><label><input type="checkbox" <?php echo ($_POST['applicant_select_chk'] == "yes" ? 'checked="checked"' : '') ?> value="yes" name="applicant_select_chk" id="applicant_select_chk">Client Entity
                </label><label><input type="checkbox" <?php echo ($_POST['client_select_chk'] == "yes" ? 'checked="checked"' : '') ?> value="yes" name="client_select_chk" id="client_select_chk">Intermediary Entity
                </label><label><input type="checkbox" <?php echo ($_POST['jurisdiction_select_chk'] == "yes" ? 'checked="checked"' : '') ?> value="yes" name="jurisdiction_select_chk" id="jurisdiction_select_chk">Forum
                </label><label><input type="checkbox" <?php echo ($_POST['client_marks_select_chk'] == "yes" ? 'checked="checked"' : '') ?> value="yes" name="client_marks_select_chk" id="client_marks_select_chk">Client Marks
                </label><label><input type="checkbox" <?php echo ($_POST['history_select_chk'] == "yes" ? 'checked="checked"' : '') ?> value="yes" name="history_select_chk" id="history_select_chk" class="tf">History<br>
                </label><label><input type="checkbox" <?php echo ($_POST['status_select_chk'] == "yes" ? 'checked="checked"' : '') ?> value="yes" name="status_select_chk" id="status_select_chk" class="tf">Status Enforcement<br>
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
