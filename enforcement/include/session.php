<!--- session start here--->
<?php
@session_start();
if( !isset($_SESSION["username"])){
	$sid = mt_rand(1, 1000000);
	if (!headers_sent()) {
	header("Location:  index.php");
	} else {
			echo "<script>
			window.location.href='index.php?sid=$sid'
			 </script>";
		}
}
?>
<!--- session close here--->