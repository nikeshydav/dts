{"data":[<?php
require_once 'include/session.php';
include "configure/connectivity.php";

$i = 1;
$date = 'a.toa<="' . date('Y-m-d') . '"';

$s = "select a.id, a.fid, a.alert,a.alert_name, a.toa, ys.all_alg_data, ft.all_alg_file_data from alert a, application ap, alg_file_type ft, year_serialno ys where " . $date . " and a.toa!='0000-00-00' and a.status=0 and a.del='0000-00-00' and ap.id=a.fid and ap.id=ft.alg_file_app_id and ap.id=ys.alg_app_id GROUP BY a.id";
$res = mysql_query($s);
$num_rows = mysql_num_rows($res);
while ($row = mysql_fetch_array($res)) {
    $data['DT_RowId'] = $row['id'] .'_'.$row['fid'];
    $data['alert'] = $row['alert'];
    $data["all_alg_file_data"] = $row['all_alg_file_data'];
    $data['all_alg_data'] = $row['all_alg_data'] ;
    $data["toa"] = $row['toa'];
    $data['alert_name'] = ($row['alert_name'] != '') ? $row['alert_name'] : '';
    echo json_encode($data);
    if ($i < $num_rows)
        echo ',';
    $i++;
}
?>],"options":[]}