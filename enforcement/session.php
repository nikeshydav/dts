<?php
@session_start();
if (!isset($_SESSION["username"])) {
    if (!headers_sent()) {
        header("Location:  index.php");
        die();
    } else {
        echo "<script>window.location.href='index.php'</script>";
        die();
    }
}