<?php

require_once 'db.php';
foreach ($_GET as $key => $value) {
    mysql_query("DELETE FROM `query` WHERE id= " . $value) || die(mysql_error());
}
echo 'ok';
