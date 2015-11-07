<?php

ini_set('max_execution_time', '200');
include_once '../configure/connectivity.php';

function applications_list() {
   $sql = "select * from
(select GROUP_CONCAT(status_name)as status_name, aa.* from application aa, getappstatus s where aa.id=s.app_id group by s.app_id) as t1 left join
(select ys.* from year_serialno ys, application aa where ys.alg_app_id=aa.id) as t2
on t1.id=t2.alg_app_id left join
(select aft.* from alg_file_type aft, application aa where aft.alg_file_app_id=aa.id) as t3
on t1.id=t3.alg_file_app_id left join
(select uc.* from users_cli_mails uc, application aa where uc.app_id=aa.id) as t4
on t1.id=t4.app_id
 order by t1.filing_date DESC";

#$sql ="select aa.id,   aa.mark, aa.application_no, aa.filing_date, aa.applicant, aa.client, aa.classes, aa.jurisdiction, s.status_name,  aa.toe from application aa, getappstatus s where aa.id=s.app_id order by aa.filing_date DESC";

    $data = '{"data": [';
    $res = mysql_query($sql);
    $i = 0;
    while ($row = mysql_fetch_array($res)) {
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
        $rctn_no = $row['rctn_no'];
        $adversary_entity = $row['adversary_entity'];
        $fillingdate = $row['filing_date'];
        $date_filling = date('d M, Y', strtotime($fillingdate));
        $applicant = $row['applicant'];
        $client = $row['client'];
        $client_marks = $row['client_marks'];
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
        $status = str_replace('hidden,', '', $row['status_name']);
        $status = str_replace('hidden', '', $status);
        $status = str_replace("  ", ' ', $status );
        $status = str_replace("\t", '', $status );
        $status = str_replace("\n", '', $status );
//        $status_date = $row['status_effective_on_date'];
//        $date_effective_status = date('d M,Y', strtotime($status_date));
        $toe_unformatted = $row['toe'];
        $toe = date('d M,Y', strtotime($toe_unformatted));
        $sid = mt_rand(1, 1000000);
        $app_name = $row['applicant'];
        $cli_name = $row['client'];
        $all_alg_file_data = $row['all_alg_file_data'];

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

        $name_entity = '';
        if ($adversary_entity != '--Select--' && $adversary_entity != '') {
            $sql_entity = mysql_query("select name from adversary_entity where id in ($adversary_entity)");
            if ($sql_entity === FALSE) {
                die($sql_entity . mysql_error());
            }
            while ($row_entity = mysql_fetch_array($sql_entity)) {
                $name_entity .= $row_entity['name'];
            }
        }



        $exp_applicant = explode(',', $applicant);
        count($exp_applicant);
        $name_app = '';
        if (count($exp_applicant) > 0 && $applicant != '--Select--' && $applicant != '') {
            $getClients = mysql_query("select name from user where id in ($applicant)");
            if ($getClients === FALSE) {
                die("select name from user where id in ($applicant)" . mysql_error()); //  error handling
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
            if ($getEntity === FALSE) {
                die("select name from user where id in ($client)" . mysql_error()); //  error handling
            }
            while ($row4 = mysql_fetch_array($getEntity)) {
                $name_cli .= $row4['name'];
            }
        }

        $editicon = '<a href=\"update_application.php?action=edit&id=' . $id . '&sid=' . $sid . '\"><img class=\"icon\" alt=\"Edit\" title=\"Edit\" src=\"images/edit.png\"\/></a>';
        $delticon = '<a onclick=\" return confirm(\'do you really want to delete?\');\" href=\"update_application.php?action=delete&id=' . $id . '&sid=' . $sid . '\"><img class=\"icon\" alt=\"Delete\" title=\"Delete\" src=\"images/delete.png\"\/></a>';

        $data .='["' . $i . '","' . stripslashes($all_alg_file_data) . '", "' . $all_alg_data . '", "' . $trademark . ' ' . $img . '",
            "' . $file_type . '", "' . $app_no . '","' . stripslashes($rctn_no) . '", "' . stripslashes($name_entity) . '",
            "' . $date_filling . '", "' . $class . '", "' . stripslashes(htmlspecialchars($date_user_pro)) . '", "' . stripslashes(htmlspecialchars($name_app)) . '", "' . stripslashes(htmlspecialchars($name_cli)) . '",
            "' . $client_marks . '","' . $jurisdiction . '", "' . $goods_services . '", "' . trim($status) . '",
            "' . stripslashes(htmlspecialchars($name_mail_toNew)) . '", "' . stripslashes(htmlspecialchars($name_mail_forwardNew)) . '",
            "' . stripslashes(htmlspecialchars($name_mail_instructedNew)) . '", "' . $editicon.$delticon . '"], 
   ';
    }
    
    $data .='["","", "", "", "", "", "","", "", "", "", "", "", "", "","", "", "", "", "", "",""]';
    $data .='] }';


    $file = 'application_list.txt';
    file_put_contents($file, $data);
    chmod ( $file , 777 );
}

applications_list();

header("location:/dts/opposition/applications_list.php");