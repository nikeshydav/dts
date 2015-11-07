<?php

require_once 'include/session.php'; 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>update admin</title>
 <link rel="stylesheet" href="css/custom.css" />
 	<link rel="stylesheet" href="css/menu.css" />
 	 <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/custom.js"></script>
<?php
include "class.docket.php";
$obj=new docket();
?>
</head>
<?php
if( $_GET['action']=='edit')
{
	  $id=$_GET['id'];
	  $obj->edit_admin_mgr($id);
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete')
{
	$id=$_REQUEST['id'];
	$obj->delete_admin_mgr($id);
}

?>
<body> <?php include_once 'include/menu.php';?>
<div class="content">
<div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
<table align="center">
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $obj->id;   ?>" />
<input type="hidden" name="role" value="<?php echo $obj->role;   ?>" />
<tr><td>Name:</td><td><input type="text" name="name" value="<?php echo $obj->name;   ?>"/></td></tr>
<tr><td>Password:</td><td><input type="password" name="password" value="<?php echo $obj->password;   ?>"/></td></tr>
<tr><td>E-mail:</td><td><input type="text" name="email" value="<?php echo $obj->emailid;   ?>"/></td></tr><tr>
<td>Mobile:</td><td><input type="text" name="mobile" value="<?php echo $obj->mobile;   ?>"/></td></tr>
<tr><td>Address:</td><td><textarea  name="address" ><?php echo $obj->address;   ?></textarea></td></tr>
<?php if($_SESSION['role']!='associate') { ?>
<tr><td align="center" colspan="2"><input type="submit" value="update" /></td></tr>
<?php  } ?>
</form>
</table>
</div>
<?php if($_POST){
$id=$_POST['id'];
$name=$_POST['name'];
$password=$_POST['password'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$role=$_POST['role'];

session_start();

$obj->update_admin_mgr($id,$name,$password,$email,$mobile,$address,$role);

}
		?>
</body>
</html>