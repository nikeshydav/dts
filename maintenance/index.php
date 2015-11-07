<!DOCTYPE html>
<html>
 <head>
   <title>Login  Page</title>
   <link href="css/login-box.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="css/custom.css" />
  <?php
  ini_set('display_errors','off');
  ?>
  </head>
 <body>     
<div class="content">
<div id="login-box">
<?php include "class.docket.php";
$obj=new docket();

?>
<H2>Login</H2>
<br />
<form action="check_login.php" method="post">
 <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/><br/>
     <label for="password">Password:</label>
     <input style="margin-left:5px;" type="password" size="20" id="passowrd" name="password"/>
     <br/> <br/>
     <input type="submit" value="Login"/>
     <?php echo "<div style='margin-top:15px;font-weight:bold; '>".$_GET['err']."</div>";?>
</form>

</div>
</div>
</body>
</html>


 


