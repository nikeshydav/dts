<?php
ini_set('display_errors', 'on');
require_once 'include/session.php';
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Update User</title>
		<link rel="stylesheet" href="css/jquery.fancybox.css" />
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <link rel="stylesheet" href="css/custom.css" />
        <link rel="stylesheet" href="css/menu.css" />
        <script src="js/jquery-1.8.3.min.js"></script>

        <script src="js/jquery-ui.js"></script>
        <script src="js/jquery.fancybox.js"></script>
        <script src="js/custom.js"></script>
		<?php
		include "class.docket.php";
		$obj = new docket();
		?>
<style>
            #addEmail {background: none repeat scroll 0 0 #000000;color: #FFFFFF;padding: 3px;cursor: pointer;}
            .removeEmail {background: none repeat scroll 0 0 #8d8d8d;color: #FFFFFF;padding: 3px;cursor: pointer;}
        </style>
	</head>
	<?php
	if ($_GET['action'] == 'edit') {
		$id = $_GET['id'];
		$obj -> edit_user($id);
	}

	if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete') {
		$id = $_REQUEST['id'];
		$obj -> delete_user($id);
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

			
				<form action="" method="post">
<table align="center">
					<input type="hidden" name="id" value="<?php echo $obj -> id; ?>" />
					<tr>
						<td valign="top">APPLICANT/CLIENT NAME:</td><td>
						<input type="text" name="name" value="<?php echo $obj -> name; ?>"/>
						</td>
					</tr>
                                        <tr>
						<td valign="top">APPLICANT/CLIENT CODE:</td><td>
						<input type="text" name="name_code" id="name_code" maxlength="3" value="<?php echo $obj -> name_code; ?>"/>
                                                <div id="code_error"></div>
						</td>
					</tr>
					<tr>
						<td valign="top">ADDRESS:</td><td>						<textarea  name="address" ><?php echo $obj -> address; ?></textarea></td>
					</tr>
					<?php include_once 'entity_email.php'; ?>
					<?php if($_SESSION['role']!='associate') {
					?>
					<tr>
						<td align="center" colspan="2">
						<input type="submit" id="submit_user" value="update" />
						</td>
					</tr>
					<?php  } ?>
</table>
				</form>
			
		</div>
		<?php if($_POST){
$id=$_POST['id'];
$name=addslashes($_POST['name']);
$name_code=$_POST['name_code'];
$address=$_POST['address'];

session_start();

$obj->update_user($id,$name,$name_code,$address);

}
		?>
	</body>
</html>
