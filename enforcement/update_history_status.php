<?php
ini_set('display_errors', 'on');
require_once 'include/session.php'; 


include "class.docket.php";
$obj=new docket();

 if($_POST){
$id=$_POST['id'];
$history_status_name=$_POST['history_status_name'];

$obj->update_history_status($id,$history_status_name);
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update History Status</title>
 <link rel="stylesheet" href="css/custom.css" />
 	<link rel="stylesheet" href="css/menu.css" />
 	 <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/custom.js"></script>

</head>
<?php
if( $_GET['action']=='edit')
{
	  $id=$_GET['id'];
	  $obj->edit_history_status($id);
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete')
{
	$id=$_REQUEST['id'];
	$obj->delete_history_status($id);
}

?>
<body> <?php include_once 'include/menu.php';?>
<div class="content">
	
	<div class="welcome"><h3>Welcome <?php   echo $_SESSION['username'] ?>!</h3></div>
    
<table align="center">
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $obj->id;   ?>" />
<tr><td>History Status Name : </td><td><input type="text" name="history_status_name" value="<?php echo $obj->history_status_name; ?>"></td></tr> 
<tr><td align="center" colspan="2"><input type="submit" value="update" /></td></tr>
</form></table>
</div>
</body>
</html>