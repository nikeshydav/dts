<?
include "class.docket.php";
$obj=new docket();
$appno=$_POST['appno'];
$lettertype=$_POST['lettertype'];
$recp=$_SESSION['email'];
$obj->show_letter($appno,$lettertype);
$recp=$_SESSION['email'];
$subject=$obj->sub;
$a=$obj->letterbody;
//$myFile = $_SERVER['DOCUMENT_ROOT']."/docketing_backup/asset/Letter.doc";
$myFile = "asset/Letter.doc";
$fh = fopen($myFile, 'a') or die("can't open file");
echo filesize($myFile);
/*fwrite($fh,$a);
fclose($fh);

function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
    $file = $path.$filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";
    if (mail($mailto, $subject, "", $header)) {
   $sid = mt_rand(1, 1000000);
  if (!headers_sent()) {
     	   
		
			header("location:send_letter.php?thanks=Your mail has been sent successfully.");
		} else {
			echo "<script>
			window.location.href='send_letter.php?thanks=Your mail has been sent successfully.'
			 </script>";
		}

    } else {
        echo "mail send ... ERROR!";
    }
}
$my_file = "Letter.doc";
//$my_path = $_SERVER['DOCUMENT_ROOT'].'/docketing_backup/asset/';
$my_path = "asset/";
$my_name = "Admin";
$my_mail = "docketing@mail.com";
$my_replyto = "docketing@mail.com";
$my_subject = $subject;
$my_message = "Hello,\r\n I hope it will help.\r\n\r\nSite Admin";
mail_attachment($my_file,$my_path,$recp,$my_mail,$my_name,$my_replyto,$my_subject,$my_message);*/
?>