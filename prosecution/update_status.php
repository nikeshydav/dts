<?php
ini_set('display_errors', 'on');
require_once 'include/session.php'; 


include "class.docket.php";
$obj=new docket();

 if($_POST){
$id=$_POST['id'];
$status_name=$_POST['status_name'];
$parent_status=$_POST['parent_status'];
$radio_option=$_POST['radio_option'];
$time_to_execute=$_POST['time_to_execute'];


//session_start();

$obj->update_status($id,$status_name,$parent_status,$radio_option,$time_to_execute);

}

$parent_id = '';
		?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Status</title>
 <link rel="stylesheet" href="css/custom.css" />
 	<link rel="stylesheet" href="css/menu.css" />
 	 <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/custom.js"></script>

</head>
<?php
if( $_GET['action']=='edit')
{
	  $id=$_GET['id'];
	  $obj->edit_status($id);
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete')
{
	$id=$_REQUEST['id'];
	$obj->delete_status($id);
}

?>
<body> <?php include_once 'include/menu.php';?>
<div class="content">
	
	<div class="welcome"><h3>Welcome <?php   echo $_SESSION['username'] ?>!</h3></div>
    
<table align="center">
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $obj->id;   ?>" />
<tr><td>Status Name : </td><td><input type="text" name="status_name" value="<?php echo $obj->status_name; ?>"></td></tr>    
<tr><td>Parent Status : </td><td>
<select name="parent_status" id="parent_status" >
<option> -- Select -- </option>
<?php $parent_id = $obj->parent_id;
		$sql = "select id, status_name from status where id!='1'";	
		$query = mysql_query($sql);
		while($row=mysql_fetch_array($query)){
		$id = $row['id'];
		$status_name = $row['status_name'];
	 ?>
	<option value="<?php echo $id  ?>"  <?php echo ($parent_id==$id) ? 'selected="selected"':'' ?> ><?php echo $status_name; ?> </option>
<?php } ?>
	 </select></td></tr>
<tr><td valign="top">Repeat : </td><td>
<input type="radio" name="radio_option" <?php echo ($obj->radio_option==1) ? 'checked="checked"' : '';   ?> value="1" id="radio">Yes
<input type="radio" name="radio_option" <?php echo ($obj->radio_option==0) ? 'checked="checked"' : '';   ?> value="0" id="radio">No
</td></tr>

<tr><td>Time To Execute : </td><td><input type="text" name="time_to_execute" value="<?php echo $obj->time_to_execute; ?>" size="4"> days</td></tr>
<?php if($_SESSION['role']!='associate') { ?>
<tr><td align="center" colspan="2"><input type="submit" value="update" /></td></tr>
<?php  } ?>
</form></table>
</div>

</body>
</html>