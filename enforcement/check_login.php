<?php
@session_start();
include "class.docket.php";
$u = $_POST['username'];
$p = $_POST['password'];

$obj = new docket();
$obj->login($u,$p);