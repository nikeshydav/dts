<?php
ini_set('display_errors', 'off');
require_once 'include/session.php';
?>
<html>
	<head>
		<title>ADD Client/Applicant Page</title>
		<link rel="stylesheet" href="css/custom.css" />
			<link rel="stylesheet" href="css/menu.css" />
		<script src="js/jquery-1.8.3.min.js"></script>
		<script src="js/custom.js"></script>
	</head>
	<body>
		 <?php include_once 'include/menu.php';?>
		<div class="content">
			
			<div class="clear">
				<h3>Welcome <?php echo $_SESSION['username'] ?>!
				</h3>
			</div>
			
			<div>
				<form action="" method="post">
					<table>
							<input type="hidden"  name="id" value="<?php echo $_SESSION['id']; ?>" />
						<tr>
							<td> Password :</td><td>
							<input type="password" "  name="pass" id="pass" />
							</td>
						</tr>
						<tr>
							<td> Confirm Password :</td><td>
							<input type="password" name="repass" id="repass" />
							</td>
						</tr>
						<tr>
						<tr>
							<td></td><td>
							<input type="submit"  id="submit_pass" value="Update" />
							</td>
						</tr>
					</table>
				</form>
			</div>
			<?php echo "<div style='Color:#FF0000; margin-top:15px;font-weight:bold; '>" . $_GET['updated'] . "</div>"; ?>
		</div>
		<?php if($_POST){
$id=$_POST['id'];
$pass=$_POST['pass'];
$repass=$_POST['repass'];

session_start();
include "class.docket.php";
$obj = new docket();
$obj->change_pass($id,$pass,$repass);

}
		?>
	</body>
</html>