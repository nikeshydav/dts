<?php
if ($_SERVER['HTTP_HOST'] == 'localhost') {    
    $con = mysql_connect("localhost", "root", "fromhar") || die(mysql_error());
    mysql_select_db('dts_queries') || die(mysql_error());
} else {
    $con = mysql_connect("localhost", "root", "india987#$") || die(mysql_error());
    mysql_select_db('algdts-queries') || die(mysql_error());
}
