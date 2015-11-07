<?php

include_once 'db.php';
$value = $_REQUEST['value'];
switch ($_REQUEST['columnId']) {
    case 1:
        $values_update = '`subject` ="' . addslashes($value) . '"';
        break;

    case 2:
        $date = explode('/', $value);
        $values_update = '`receipt_date` ="' . $date[2].'-'.$date[0].'-'.$date[1] . '"';
        $value = $date[2].'-'.$date[0].'-'.$date[1];
        break;
    case 3:
        $date = explode('/', $value);
        $values_update = '`deletion_date` ="' . $date[2].'-'.$date[0].'-'.$date[1] . '"';
        $value = $date[2].'-'.$date[0].'-'.$date[1];
        break;
    case 4:
        $values_update = '`name` ="' . addslashes($value) . '"';
        break;
    
    case 5:
        $values_update = '`dts`="' . $value . '"';
        break;

    default:
        break;
}
$update = "UPDATE  `query` SET  " . $values_update . " WHERE id=" . $_POST['id'];
mysql_query($update) || die(mysql_error());
echo $value;
