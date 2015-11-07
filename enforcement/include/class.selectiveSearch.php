<?php
class selectivesearch {

    function select_search($download=FALSE) {

        $post= ($download)? $_SESSION : $_POST;
        
        $alg_file_no = $post['alg_file_data11'];
        $alg_ref_no = $post['alg_data'];
        $file_type_select = $post['file_type_select'];
        $trademark = $post['trademark'];
        $adv_domain_name_select = $post['adv_domain_name_select'];
        $adversary_entity_select = $post['adversary_entity_select'];
        $applicant_select = $post['applicant_select'];
        $client_select = $post['client_select'];
        $jurisdiction_select = $post['jurisdiction_select'];
        $client_marks_select = $post['client_marks_select'];
        $history_select = $post['history_select'];
        $status_select = $post['status_select'];
        $condition = '';
        $select_post = '';
        $download_search = '';
        if ($alg_file_no != '') {
            $condition .= "and a.id in (select algfl.alg_file_app_id from alg_file_type algfl where algfl.all_alg_file_data like '%" . $alg_file_no . "%')";
            $_SESSION['alg_file_data11']=$alg_file_no;
            $select_post .= ' Alg File No: '.$alg_file_no.';';
        }
        if ($alg_ref_no != '') {
            $condition .= "and a.id in (select alg.alg_app_id from year_serialno alg where alg.all_alg_data like '%" . $alg_ref_no . "%')";
            $_SESSION['alg_data']=$alg_ref_no;
            $select_post .= ' Alg Ref No: '.$alg_ref_no.'; ';
        }
        if ($file_type_select != '' && $file_type_select != 'select') {
            $condition .= "and a.file_type like '%$file_type_select%'";
            $_SESSION['file_type_select']=$file_type_select;
            $select_post .= ' File Type: '.$file_type_select.';';
        }
        if ($trademark != '') {
            $condition .= "and a.mark like '%$trademark%'";
            $_SESSION['trademark']=$trademark;
            $select_post .= ' Trademark: '.$trademark.';';
        }
        if ($adv_domain_name_select != '') {
            $condition .= "and a.adversary_domain_name like '%$adv_domain_name_select%'";
            $_SESSION['adv_domain_name_select']=$adv_domain_name_select;
            $select_post .= ' Adv Domain Name: '.$adv_domain_name_select.';';
        }
        if ($adversary_entity_select != '') {
            $condition .= "and a.adversary_entity in (select u.id from adversary_entity ae where ae.name like '%" . $adversary_entity_select . "%')";
            $_SESSION['adversary_entity_select']=$adversary_entity_select;
            $select_post .= ' Adversary Entity: '.$adversary_entity_select.';';
        }
        if ($applicant_select != '') {
            $condition .= "and a.applicant in (select u.id  from user u where u.name like '%" . $applicant_select . "%')";
            $_SESSION['applicant_select']=$applicant_select;
            $select_post .= ' Client Entity: '.$applicant_select.';';
        }
        if ($client_select != '') {
            $condition .= "and a.client in (select u.id  from user u where u.name like '%" . $client_select . "%')";
            $_SESSION['client_select']=$client_select;
            $select_post .= ' Intermediary Entity: '.$client_select.';';
        }
        if ($jurisdiction_select != '' && $jurisdiction_select != 'select') {
            $condition .= "and a.jurisdiction like '%" . $jurisdiction_select . "%'";
            $_SESSION['jurisdiction_select']=$jurisdiction_select;
            $select_post .= ' Forum: '.$jurisdiction_select.';';
        }
        if ($client_marks_select != '') {
            $condition .= "and a.client_marks like '%$client_marks_select%'";
            $_SESSION['client_marks_select']=$client_marks_select;
            $select_post .= ' Client Marks: '.$client_marks_select.';';
        }
        if ($history_select != '') {
            $condition .= "and a.history like '%$history_select%'";
            $_SESSION['history_select']=$history_select;
            $select_post .= ' History: '.$history_select.'; ';
        }
        if ($status_select != '') {
            $condition .=" and g.status_name like '%" . $status_select . "%'";
            $_SESSION['status_select']=$status_select;
            $select_post .= ' status: '.$status_select.';';
        }
        $c = ($_POST) ? '<table border="1px" width="100%"><tr><td><b>#</b></td>' : "#\t";
        if ($post['alg_file_no_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>ALG File</b></td>' : "ALG File\t";
            $_SESSION['alg_file_no_chk']='yes';
        }
        if ($post['alg_ref_no_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>ALG Ref</b></td>' : "ALG Ref\t";
            $_SESSION['alg_ref_no_chk']='yes';
        }
        if ($post['file_type_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>File Type</b></td>' : "File Type\t";
            $_SESSION['file_type_chk']='yes';
        }
        if ($post['trademark_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Adversary Mark</b></td>' : "Adversary Mark\t";
            $_SESSION['trademark_chk']='yes';
        }
        if ($post['adv_domain_name_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Adv Domain Name</b></td>' : "Adv Domain Name\t";
            $_SESSION['adv_domain_name_select_chk']='yes';
        }
        if ($post['adversary_entity_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Adversary Entity</b></td>' : "Adversary Entity\t";
            $_SESSION['adversary_entity_select_chk']='yes';
        }
        if ($post['applicant_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Client Entity</b></td>' : "Client Entity\t";
            $_SESSION['applicant_select_chk']='yes';
        }
        if ($post['client_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Intermediary Entity</b></td>' : "Intermediary Entity\t";
            $_SESSION['client_select_chk']='yes';
        }
if ($post['jurisdiction_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Forum</b></td>' : "Forum\t";
            $_SESSION['jurisdiction_select_chk']='yes';
        }
        if ($post['client_marks_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Client Marks</b></td>' : "Client Marks\t";
            $_SESSION['client_marks_select_chk']='yes';
        }
        if ($post['history_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>History</b></td>' : "History\t";
            $_SESSION['history_select_chk']='yes';
        }
        if ($post['status_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Status Enforcement</b></td>' : "Status Enforcement\t";
            $_SESSION['status_select_chk']='yes';
        }
        $c .= ($_POST) ? '</tr>' : "\n";
         $sql = "select *,(SELECT name FROM user WHERE id = a.client ) AS client, (SELECT name FROM user WHERE id = a.applicant) AS applicant,
            (SELECT name FROM adversary_entity WHERE id = a.adversary_entity) AS adversaryentity,
            (SELECT all_alg_data FROM year_serialno WHERE alg_app_id = a.id) AS algno,
            (SELECT all_alg_file_data FROM alg_file_type WHERE alg_file_app_id = a.id) AS algflno
            from application a, getappstatus g where a.id>1 and g.app_id=a.id $condition";        

        $show = mysql_query($sql);
        $res = mysql_query($sql);
        $nums = mysql_num_rows($res);
        if ($nums >= 1) {
            $i = 0;
            while ($get = mysql_fetch_array($res)) {

                $i++;
                $id = $get['id'];
                $all_alg_file_data = $get['algflno'];
                $all_alg_file_data = str_replace('&nbsp;', ' ', $all_alg_file_data);
                $all_alg_file_data = str_replace('&nbsp', ' ', $all_alg_file_data);
                $all_alg_data = $get['algno'];
                $file_type = $get['file_type'];
                $mark = $get['mark'];
                $adversary_domain_name = $get['adversary_domain_name'];
                $adversaryentity = $get['adversaryentity'];
                $applicant = $get['applicant'];
                $client = $get['client'];
$jurisdiction = $get['jurisdiction'];
                $client_marks = $get['client_marks'];
                $status = $get['status'];
                $history1 = $get['history'];
                $history = strip_tags(str_replace(array("\n", "\r"), ' ', $history1));
                $status_name = $get['status_name'];
                $sid = mt_rand(1, 1000000);
                $app_name = $get['applicant'];
                $cli_name = $get['client'];
                $c .= ($_POST) ? '<tr>' : "\n";
                $c .= ($_POST) ? '<td>' . $i . '</td>' : "$i\t";
                if ($post['alg_file_no_chk']) {
                    $c .= ($_POST) ? '<td>' . $all_alg_file_data . '</td>' : "$all_alg_file_data\t";                    
                }
                if ($post['alg_ref_no_chk']) {
                    $c .= ($_POST) ? '<td>' . $all_alg_data . '</td>' : "$all_alg_data\t";                    
                }
                if ($post['file_type_chk']) {
                    $c .= ($_POST) ? '<td>' . $file_type . '</td>' : "$file_type\t";                    
                }
                if ($post['trademark_chk']) {
                    $c .= ($_POST) ? '<td>' . $mark . '</td>' : "$mark\t";
                }
                if ($post['adv_domain_name_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $adversary_domain_name . '</td>' : "$adversary_domain_name\t";
                }
                if ($post['adversary_entity_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $adversaryentity . '</td>' : "$adversaryentity\t";
                }
                if ($post['applicant_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $app_name . '</td>' : "$app_name\t";
                }
                if ($post['client_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $cli_name . '</td>' : "$cli_name\t";
                }
if ($post['jurisdiction_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $jurisdiction  . '</td>' : "$jurisdiction \t";
                }
                if ($post['client_marks_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $client_marks . '</td>' : "$client_marks\t";
                }
                if ($post['history_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $history . '</td>' : "$history\t";
                }
                if ($post['status_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $status_name . '</td>' : "$status_name\t";
                }
                $c .= ($_POST) ? '<td valign="top"><a href="update_application.php?action=edit&id=' . $id . '&sid=' . $sid . '"><img class="icon" src="images/edit.png" alt="Edit" title="Edit" /></a></td>' : '';
                $c .= ($_POST) ? '</tr>' : "\n";
                                
            }
        }
        //$select_post_new = substr($select_post, 0, -2);
        //echo $download_search;
        echo $download_search = ($_POST) ? "<a href='excel.php'><h3 style='float:right;margin-right:150px;'>Download Current Search</h3></a>" : '';
        echo $select_post1 = ($_POST) ? "" : "Searh Results for:" .substr($select_post, 0, -1)."\n";
        echo $c;
    }
}
?>
