<?php 
if(isset($_POST['name'])){

include('../config/config.php'); ;
$to=$Email;
$subject=$_POST['subject'];
$body=$_POST['body'];
$headers='';
$headers.="Form: ".$_POST['email']."\r\n";
$headers.="Reply-To:".$_POST['email']."\r\n";
$headers.='X-Mailer: PHP/'.phpversion();
mail($to,$subject,$body,$headers);
/*echo"<script language='javascript'>window.location='../index.php?page=contact' </script>";*/
if(mail==1)
{
	echo"ok";
	}
	else{
		 echo"nok";
		}
}

?>