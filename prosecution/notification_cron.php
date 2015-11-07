<?php

include "class.docket.php";
$obj = new docket();

$sql = "Select * from (SELECT a.app_id, a.status,DATEDIFF( now(), STR_TO_DATE( a.status_effective_on_date, '%m/%d/%Y')  ) as ef_day,  s1.id as child_id, s1.time_to_execute FROM `application_status` a, `status` s, `status` s1 where a.status=s.id and s1.parent_id=a.status and a.status_effective_on_date!='') as tmp where ef_day>=time_to_execute";

$res = mysql_query($sql);
$i = $j = $k = 0;

while ($row = mysql_fetch_array($res)) {
    $i++;
    $id = $row['app_id'];
    #$status_id = $row['status'];
    $time_to_execute = $row['time_to_execute'];
    $ef_day = $row['ef_day'];
    $child_id = $row['child_id'];

    $notify = "select count(*) as tot from notifications where app_id='$id' and status_id='$child_id'";
    #echo '<br/>';
    $noftify_row = mysql_fetch_array(mysql_query($notify));
    if ($noftify_row['tot'] < 1) {
        echo "insert into  notifications(app_id,status_id) values ('$id','$child_id') ";
        mysql_query("insert into  notifications(app_id,status_id) values ('$id','$child_id') ");
        $k++;
    }
}

#$sql = "Select * from (SELECT a.app_id, a.status,DATEDIFF( now(), STR_TO_DATE( a.status_effective_on_date, '%Y-%m-%d')  ) as ef_day,  s1.id as child_id, s.radio, s1.time_to_execute FROM `application_status` a, `status` s, `status` s1 where a.status=s.id and s1.parent_id=a.status and a.status_effective_on_date!='') as tmp where ef_day>=time_to_execute";
$sql = "Select * from ( SELECT a.app_id, a.status,DATEDIFF( now(), STR_TO_DATE( a.status_effective_on_date, '%Y-%m-%d')  ) as ef_day,  s.id as child_id, s.radio, s.time_to_execute FROM `application_status` a, `status` s where a.status=s.parent_id and  a.status_effective_on_date!='') as tmp where ef_day>=time_to_execute";
$res = mysql_query($sql);
$i = $j = $l = 0;

while ($row = mysql_fetch_array($res)) {
    $i++;
    $id = $row['app_id'];
    #$status_id = $row['status'];
    $time_to_execute = $row['time_to_execute'];
    #$ef_day = $row['ef_day'];
    $child_id = $row['child_id'];
    $repeat = $row['radio'];

    $notify = "select count(*) as tot, DATE(toe) as toe from notifications where app_id='$id' and status_id='$child_id'";
    $noftify_row = mysql_fetch_array(mysql_query($notify));
    if ($noftify_row['tot'] < 1) {
        $sql = "insert into  notifications(app_id,status_id) values ('$id','$child_id') ";
        mysql_query($sql);
        $j++;
    } else if ($repeat) {
        $ts1 = strtotime($noftify_row['toe']);
        $ts2 = strtotime(date('Y-m-d'));
        $seconds_diff = $ts2 - $ts1;
        $days_last_executed = floor($seconds_diff / (3600 * 24));
        #echo ceil($days_last_executed / $time_to_execute) . ':' . $noftify_row['tot'] . '---<br />';
        if ((ceil($days_last_executed / $time_to_execute) - $noftify_row['tot']) >= 1) {
            echo $sql = "insert into  notifications(app_id,status_id) values ('$id','$child_id') ";
            mysql_query($sql) || die(mysql_error());
            echo '<b style="color:red">This is repeat</b><br />';
            $l++;
        }
    }
}
echo '<br/> Old date :' . $k;
echo '<br/> New date format:' . $j;
echo '<br/>Repeat:' . $l;
