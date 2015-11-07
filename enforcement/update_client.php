<?php
require_once 'include/session.php';
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Update Client</title>
		<link rel="stylesheet" href="css/custom.css" />
		<link rel="stylesheet" href="css/menu.css" />
		<script src="js/jquery-1.8.3.min.js"></script>
		<script src="js/custom.js"></script>
		<?php
		include "class.docket.php";
		$obj = new docket();
		?>
	</head>
	<?php
	if ($_GET['action'] == 'edit') {
		$id = $_GET['id'];
		$obj -> edit_client($id);
	}

	if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete') {
		$id = $_REQUEST['id'];
		$obj -> delete_client($id);
	}
	?>
	<body>
		<?php
		include_once 'include/menu.php';
		?>
		<div class="content">

			<div class="welcome">
				<h3>Welcome <?php   echo $_SESSION['username'] ?>!
				</h3>
			</div>

			<table align="center">
				<form action="" method="post">
					<input type="hidden" name="id" value="<?php echo $obj -> id; ?>" />
					<tr>
						<td valign="top">CLIENT :</td><td>
						<input type="text" name="lawfirm" value="<?php echo $obj -> lawfirm; ?>"/>
						</td>
					</tr>
					<tr>
						<td valign="top">E-MAIL:</td><td>
						<input type="text" name="client_email" value="<?php echo $obj -> emailid; ?>"/>
						</td>
					</tr>
					
					<tr>
						<td valign="top">ADDRESS:</td><td>						<textarea  name="client_address" ><?php echo $obj -> address; ?></textarea></td>
					</tr>
					<!--<tr><td valign="top">ROLE :</td>
					<td>Applicant
					<input <?php if($obj->role=='applicant') {echo "checked='checked'";}?>  type="radio" name="role" value="applicant"  /><br/>
					Client
					<input <?php if($obj->role=='client') {echo "checked='checked'";}?>  type="radio" name="role" value="client"  /><br/>
					Both
					<input <?php if($obj->role=='both') {echo "checked='checked'";}?> type="radio" name="role" value="both" /><br/>
					</td>
					</tr>-->
					<?php if($_SESSION['role']!='associate') {
					?>
					<tr>
						<td align="center" colspan="2">
						<input type="submit" value="update" />
						</td>
					</tr>
					<?php  } ?>
				</form>
			</table>
		</div>
		<?php if($_POST){
$id=$_POST['id'];
$lawfirm=$_POST['lawfirm'];
$client_email=$_POST['client_email'];
$client_address=$_POST['client_address'];
session_start();

$obj->update_client($id,$lawfirm,$client_email,$client_address);

}
		?>
	</body>
</html>