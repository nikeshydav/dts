<?php
class selectivesearch {

    function select_search($download=FALSE) {

        $post= ($download)? $_SESSION : $_POST;
        
        $alg_file_no = $post['alg_file_data11'];
        $alg_ref_no = $post['alg_data'];
        $file_type_select = $post['file_type_select'];
        $application_number = $post['application_number'];
        $trademark = $post['trademark'];
        $applicant_select = $post['applicant_select'];
        $client_select = $post['client_select'];
        $class = $post['class_select'];
        $jurisdiction_select = $post['jurisdiction_select'];
        $history_select = $post['history_select'];
        $pending_select = $post['pending_select'];
        $filling_select = $post['filling_select'];
        $priority_select = $post['priority_select'];
        $status_select = $post['status_select'];
        $condition = '';
        $select_post = '';
        $download_search = '';
        if ($alg_file_no != '') {
            $condition .= "and a.id in (select algfl.alg_file_app_id from alg_file_type algfl where algfl.all_alg_file_data like '%" . $alg_file_no . "%')";
            $_SESSION['alg_file_data11']=$alg_file_no;
            $select_post .= 'Alg File No='.$alg_file_no.',';
        }
        if ($alg_ref_no != '') {
            $condition .= "and a.id in (select alg.alg_app_id from year_serialno alg where alg.all_alg_data like '%" . $alg_ref_no . "%')";
            $_SESSION['alg_data']=$alg_ref_no;
            $select_post .= 'Alg Ref No='.$alg_ref_no.',';
        }
        if ($file_type_select != '' && $file_type_select != 'select') {
            $condition .= "and a.file_type like '%$file_type_select%'";
            $_SESSION['file_type_select']=$file_type_select;
            $select_post .= 'File Type='.$file_type_select.',';
        }
        if ($application_number != '') {
            $condition .= "and a.application_no like '%$application_number%'";
            $_SESSION['application_number']=$application_number;
            $select_post .= 'Trademark No='.$application_number.',';
        }
        if ($trademark != '') {
            $condition .= "and a.mark like '%$trademark%'";
            $_SESSION['trademark']=$trademark;
            $select_post .= 'Trademark='.$trademark.',';
        }
        if ($applicant_select != '') {
            $condition .= "and a.applicant in (select u.id  from user u where u.name like '%" . $applicant_select . "%')";
            $_SESSION['applicant_select']=$applicant_select;
            $select_post .= 'Applicant='.$applicant_select.',';
        }
        if ($client_select != '') {
            $condition .= "and a.client in (select u.id  from user u where u.name like '%" . $client_select . "%')";
            $_SESSION['client_select']=$client_select;
            $select_post .= 'Client='.$client_select.',';
        }
        if ($class != '') {
            $condition .= "and a.classes like '%$class%'";
            $_SESSION['class_select']=$class;
            $select_post .= 'Class='.$class.',';
        }
        if ($jurisdiction_select != '' && $jurisdiction_select != 'select') {
            $condition .= "and a.jurisdiction like '%$jurisdiction_select%'";
            $_SESSION['jurisdiction_select']=$jurisdiction_select;
            $select_post .= 'Jurisdiction='.$jurisdiction_select.',';
        }
        if ($history_select != '') {
            $condition .= "and a.history like '%$history_select%'";
            $_SESSION['history_select']=$history_select;
            $select_post .= 'History='.$history_select.',';
        }
        if ($pending_select != '') {
            $condition .= "and a.pending_record like '%$pending_select%'";
            $_SESSION['pending_select']=$pending_select;
            $select_post .= 'Pending Recordal='.$pending_select.',';
        }
        if ($filling_select != '') {
            $condition .= "and a.filing_date like '%$filling_select%'";
            $_SESSION['filling_select']=$filling_select;
            $select_post .= 'Filling Date='.$filling_select.',';
        }
        if ($priority_select != '') {
            $condition .= "and a.priority_date like '%$priority_select%'";
            $_SESSION['priority_select']=$priority_select;
            $select_post .= 'Priority Date='.$priority_select.',';
        }
        if ($status_select != '') {
            //$condition .= "and aa.status in (select s.id from status s where s.status_name like '%" . $status_select . "%')";         
            $condition .=" and g.status_name like '%" . $status_select . "%'";
            $_SESSION['status_select']=$status_select;
            $select_post .= 'status='.$status_select.',';
        }
        $c = ($_POST) ? '<table border="1px" width="100%"><tr><td><b>S.no</b></td>' : "S.no\t";
        if ($post['alg_file_no_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Alg FIle No</b></td>' : "Alg File No\t";
            $_SESSION['alg_file_no_chk']='yes';
        }
        if ($post['alg_ref_no_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Alg Ref No</b></td>' : "Alg Ref No\t";
            $_SESSION['alg_ref_no_chk']='yes';
        }
        if ($post['file_type_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>File Type</b></td>' : "File Type\t";
            $_SESSION['file_type_chk']='yes';
        }
        if ($post['application_number_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Application Number</b></td>' : "Application Number\t";
            $_SESSION['application_number_chk']='yes';
        }
        if ($post['trademark_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Mark</b></td>' : "Mark\t";
            $_SESSION['trademark_chk']='yes';
        }
        if ($post['applicant_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Applicant</b></td>' : "Applicant\t";
            $_SESSION['applicant_select_chk']='yes';
        }
        if ($post['client_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Client</b></td>' : "Client\t";
            $_SESSION['client_select_chk']='yes';
        }
        if ($post['class_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Class</b></td>' : "Class\t";
            $_SESSION['class_select_chk']='yes';
        }
        if ($post['filling_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Filling Date</b></td>' : "Filling Date\t";
            $_SESSION['filling_select_chk']='yes';
        }
        if ($post['priority_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Priority Date</b></td>' : "Priority Date\t";
            $_SESSION['priority_select_chk']='yes';
        }
        if ($post['jurisdiction_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Jurisdiction</b></td>' : "Jurisdiction\t";
            $_SESSION['jurisdiction_select_chk']='yes';
        }
        if ($post['history_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>History</b></td>' : "History\t";
            $_SESSION['history_select_chk']='yes';
        }
        if ($post['pending_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Pending Record</b></td>' : "Pending Record\t";
            $_SESSION['pending_select_chk']='yes';
        }
        if ($post['status_select_chk']=='yes') {
            $c .= ($_POST) ? '<td><b>Status</b></td>' : "Status\t";
            $_SESSION['status_select_chk']='yes';
        }
        $c .= ($_POST) ? '</tr>' : "\n";
       $sql = "select *,(SELECT name FROM user WHERE id = a.client ) AS client, (SELECT name FROM user WHERE id = a.applicant) AS applicant,
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
                $all_alg_data = $get['algno'];
                $file_type = $get['file_type'];
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
                $status = $get['status'];
                $history1 = $get['history'];
                $history = strip_tags(str_replace(array("\n", "\r"), ' ', $history1));
                $pending_record = $get['pending_record'];
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
                if ($post['application_number_chk']) {
                    $c .= ($_POST) ? '<td>' . $application . '</td>' : "$application\t";                    
                }
                if ($post['trademark_chk']) {
                    $c .= ($_POST) ? '<td>' . $mark . '</td>' : "$mark\t";
                }
                if ($post['applicant_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $app_name . '</td>' : "$app_name\t";
                }
                if ($post['client_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $cli_name . '</td>' : "$cli_name\t";
                }
                if ($post['class_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $classes . '</td>' : "$classes\t";
                }
                if ($post['filling_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $date_filling . '</td>' : "$date_filling\t";
                }
                if ($post['priority_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $date_priority . '</td>' : "$date_priority\t";
                }
                if ($post['jurisdiction_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $jurisdiction . '</td>' : "$jurisdiction\t";
                }
                if ($post['history_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $history . '</td>' : "$history\t";
                }
                if ($post['pending_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $pending_record . '</td>' : "$pending_record\t";
                }
                if ($post['status_select_chk']) {
                    $c .= ($_POST) ? '<td>' . $status_name . '</td>' : "$status_name\t";
                }
                $c .= ($_POST) ? '<td valign="top"><a href="update_application.php?action=edit&id=' . $id . '&sid=' . $sid . '"><img class="icon" src="images/edit.png" alt="Edit" title="Edit" /></a></td>' : '';
                $c .= ($_POST) ? '</tr>' : "\n";
                                
            }
        }
        //echo $download_search;
        echo $download_search = ($_POST) ? "<a href='excel.php'><h3 style='float:right;margin-right:150px;'>Download Current Search</h3></a>" : '';
        echo $select_post1 = ($_POST) ? "" : "Search terms are=$select_post\n" ;
        echo $c;
    }
}
?>
