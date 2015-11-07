<?php
@session_start();
$_SESSION['login'] = 'bug';
header('location: index.php');