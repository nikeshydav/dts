<?php
ini_set('display_errors','off');
require_once 'include/session.php'; 
?>
<html>
 <head>
     <meta http-equiv="content-type" content="text/html; charset=utf-8" />
   <title>Send Email</title>
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
		$( "#app_no" ).autocomplete({
			source: availableTags
		});
	});
	</script>
<div class="content">
 
 	     <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
    
   <div>
  	<form action="" method="post">
   <table>
   	
<tr> <td> Application Number </td> <td><input type="text" name="app_no" id="app_no" /> </td></tr>
<tr> <td> Email Type </td> <td><select name="email_type" id="email_type">
<?php
$obj->docket();
$obj->mail_subject();
?>
	 </select> </td></tr>
	  <?php if($_POST){ 
  
  $app_no=$_POST['app_no'];
  $email_sub_id=$_POST['email_type'];
  $obj->show_final_email($app_no,$email_sub_id);
  echo'<tr><td>Subject</td><td><input type="text" name="subject" size="80px" value="'. $obj->sub.'"/></td></tr>';
  echo '<tr><td valign="top">Mail Body</td><td><textarea name="mailbody"  rows="30" cols="60">'. $obj->mailbody .'</textarea></td></tr>';
  
 // $obj->apply_new($app_no,$mark,$classes,$filing_date,$applicant,$client,$priority_date,$status,$cl_ref_no);
  
  	  }
     ?>
    
<tr> <td> </td> <td><input type="submit"  id="submit" value="Submit" /> </td></tr>
   </table>
   </form>
   </div>   
     <?php echo "<div style='Color:#FF0000; margin-top:15px;font-weight:bold; '>".$_GET['created']."</div>";?>
   </div>
  
 </body>
</html>