<?php
ini_set('display_errors','off');
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
				<form action="" method="post" autocomplete="off">
					<table>
						<tr>
							<td valign="top"> NAME :</td><td>
							<input type="text" class="alphabetsOnly" name="name" id="name" />
							</td>
						</tr>
                        <tr>
							<td valign="top"> Password :</td><td>
							<input type="password" class="alphabetsOnly" name="password" id="password" />
							</td>
						</tr>
						<tr>
							<td valign="top"> E-MAIL :</td><td>
							<input type="text" name="email" id="email" />
							</td>
						</tr>
						<tr>
							<td valign="top"> MOBILE :</td><td>
							<input type="text" class="numbersOnly" name="mobile" id="mobile" />
							</td>
						</tr>
						<tr class="">
							<td valign="top"> ADDRESS :</td><td><textarea  name="address" id="address" class=""> </textarea></td>
						</tr>
						<tr>
							<td valign="top">ROLE :</td><td>
							Admin
							<input type="radio" name="role" value="admin"  /><br/>
							Manager
							<input type="radio" name="role" value="manager"  /><br/>
                            Associate
							<input type="radio" name="role" value="associate"  />
							</td>
						</tr>
						<tr>
							<td></td><td>
							<input type="submit"  id="submit_user" value="Submit" />
							</td>
						</tr>
					</table>
				</form>
			</div>
			<?php echo "<div style='Color:#FF0000; margin-top:15px;font-weight:bold; '>" . $_GET['created'] . "</div>"; ?>
		</div>
		<?php if($_POST){

$name=$_POST['name'];
$password=$_POST['password'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$role=$_POST['role'];

session_start();
include "class.docket.php";
$obj = new docket();
$obj->add_admin_manager($name,$password,$email,$mobile,$address,$role);

}
		?>
	</body>
</html>