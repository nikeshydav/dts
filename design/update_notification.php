<?php ini_set('display_errors', 'off');
require_once 'include/session.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Notification</title>
<link rel="stylesheet" href="css/jquery-ui.css" />
 <link rel="stylesheet" href="css/custom.css" />
 	<link rel="stylesheet" href="css/menu.css" />
 	  <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery-ui.js"></script>
<?php
include "class.docket.php";
$obj = new docket();
?>
</head>

<?php  
if ($_GET['action'] == 'edit') {
	$ides=$_GET['id'];
	$notice_id=$_GET['notice_id'];
	//$obj->edit_application($id);
	//$sql="select *,(SELECT s.status_name FROM application_status a_s, status s  WHERE s.id=a_s.status and a_s.app_id='$ides') AS status from application a where id='$ides'";	
	//$res=mysql_query($sql);
$getClients = mysql_query("select a.*,g.app_id,g.status_name from application a,getappstatus g
where a.id='$ides' and g.app_id='$ides' group by a.id");
                if($getClients === FALSE) {
                    die($getClients. mysql_error());
                }
	$row = mysql_fetch_array($getClients);
	$id = $row['id'];
	$status = $row['status'];
	$application_no = $row['application_no'];
	$dt=date("d-M-Y @ H:i:s");
	$history = $row['history']; //.'<p>---------------------------<br/> '.$status.' has been updated for '.$application_no.' on '.$dt.'</p>';	
	$sql1="update application set history='$history' where id='$id'";
	mysql_query($sql1);
	$sql3="update notifications set notify_status='1' where fid='$notice_id'";
	mysql_query($sql3);
	$sql4="insert into log (user_id,action,comment) values('".$_SESSION['id']."','update','application_id=$ides')";
	
	mysql_query($sql4);
	if (!headers_sent()) {
			header('location: update_application.php?action=edit&id='.$ides.'');
		} else {
			echo "<script>
			window.location.href='update_application.php?action=edit&id=$ides'
			 </script>";
		}
	//header('location: update_application.php?action=edit&id='.$id.'');
	}	

if ($_GET['action'] == 'delete') {
	$notice_id = $_REQUEST['notice_id'];
        $sql = "update notifications set notify_status='1', snooze='". date('Y-m-d') ."' where fid='$notice_id'";        
        mysql_query($sql);
        if (!headers_sent()) {
            header("location:notifications.php?sid=$sid");
        } else {
            echo "<script>window.location.href='notifications.php'</script>";
        }
        exit();
}
?>
<body> <?php
	include_once 'include/menu.php';
?>

<div class="content">
	
	<div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
<?php  
if ($_GET['action'] == 'snooze') {
	$id=$_GET['id'];
	$obj->edit_notification1($id);
	?>
    
    <form action='' method='post' >
		    <table align="center">
		    <tr><td>Snooze Date</td><td><input type='text' name='snooze' id='snooze' /> </td></tr>
			<tr><td>Comment</td><td><textarea name='comment' id='comment'><?php echo $obj->comment; ?></textarea></td></tr>
            <?php if($_SESSION['role']!='associate') { ?>
		    <tr><td colspan='2' align='center'><input type='submit'  id='submit' value='Update' /> </td></tr>
             <?php  } ?>
		      </table> </form>
<?php	} 	?>		
<?php
	if($_POST){
			$id = $_REQUEST['notice_id'];
		    $snooze = $_POST['snooze'];
			$comment = $_POST['comment'];
	        $obj -> snooze_notification($id,$snooze,$comment);}
?>

</div>	
</body>
</html>