<?php
ini_set('display_errors','off');
require_once 'include/session.php'; 
?>
<html>
 <head>
   <title>Send Letter</title>
   	 <link rel="stylesheet" href="css/jquery-ui.css" />
   	 <link rel="stylesheet" href="css/custom.css" />
   	 	<link rel="stylesheet" href="css/menu.css" />
     <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery-ui.js"></script>
 </head>
 <body>
 	<?php include "class.docket.php";
$obj=new docket();

?><?php include_once 'include/menu.php';?>
<script >
$(function() {
var availableTags = [
<?php
$sql="select application_no from application ";
$show=mysql_query($sql);
while($result=mysql_fetch_array($show)){
echo '"'.$result['application_no'].'",';
               }
	?> ];
		$( "#appno" ).autocomplete({
			source: availableTags
		});
	});
	</script>
<div class="content">
 
 	     <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
    
   <div>
<form action="send_mail.php" method="post">
<table>
<tr><td>Application Number:</td><td><input type="text" name="appno" id="appno"></td></tr>
<tr><td>Letter type:</td><td><select name="lettertype" id="lettertype">
<?php
$obj->docket();
$obj->letter_subject();
?>
</select></td></tr>
<?php
/*if($_POST)
{
	$appno=$_POST['appno'];
	$lettertype=$_POST['lettertype'];
	$obj->show_letter($appno,$lettertype);
	echo'<tr><td>Subject</td><td><input type="text" name="subject" size="80px" value="'. $obj->sub.'"/></td></tr>';
    echo '<tr><td valign="top">Letter Body</td><td><textarea name="letterbody"  rows="30" cols="60">'. $obj->letterbody .'</textarea></td></tr>';
    echo '<tr><td colspan="2" align="center"><input type="submit" value="Send Mail" id="submit"></td></tr>';
	
}*/
?>
<tr><td colspan="2" align="center"><input type="submit" value="submit" id="submit"></td></tr>
</table>
</form> 
</div>
 <?php echo "<div style='Color:#FF0000; margin-top:15px;font-weight:bold; '>".$_GET['thanks']."</div>";?>

</div> 
 </body>
 </html>