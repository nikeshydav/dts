<?php

include "class.docket.php";
$obj = new docket();

//$sql = "SELECT a.app_id, a.status,DATEDIFF( now(), STR_TO_DATE( a.status_effective_on_date, '%m/%d/%Y')  ) as ef_day,  s.parent_id, s.time_to_execute FROM `application_status` a, `status` s where a.status=s.id and a.status_effective_on_date!=''";
#$sql = "SELECT a.app_id, a.status,DATEDIFF( now(), STR_TO_DATE( a.status_effective_on_date, '%m/%d/%Y')  ) as ef_day,  s1.id as child_id, s1.time_to_execute FROM `application_status` a, `status` s, `status` s1 where a.status=s.id and s1.parent_id=a.status and a.status_effective_on_date!=''";

$sql = "Select * from (SELECT a.app_id, a.status,DATEDIFF( now(), STR_TO_DATE( a.status_effective_on_date, '%m/%d/%Y')  ) as ef_day,  s1.id as child_id, s1.time_to_execute FROM `application_status` a, `status` s, `status` s1 where a.status=s.id and s1.parent_id=a.status and a.status_effective_on_date!='') as tmp where ef_day>=time_to_execute";

$res = mysql_query($sql);
$i = $j = 0;

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
    }
}



$sql = "Select * from (SELECT a.app_id, a.status,DATEDIFF( now(), STR_TO_DATE( a.status_effective_on_date, '%Y-%m-%d')  ) as ef_day,  s1.id as child_id, s1.time_to_execute FROM `application_status` a, `status` s, `status` s1 where a.status=s.id and s1.parent_id=a.status and a.status_effective_on_date!='') as tmp where ef_day>=time_to_execute";

$res = mysql_query($sql);
$i = $j = 0;

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
    }
}
