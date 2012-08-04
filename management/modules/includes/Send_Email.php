
<?php
if(isset($_GET['email'])){
require_once("class/config.php");
require_once('email/class.phpmailer.php');
$config=new Config();
$result=$config->SelectAll();
$row=mysql_fetch_assoc($result);


$mail=new PHPMailer();
$mail->CharSet = 'UTF-8';
 
$body = $_GET['txtbody'];
  
$mail->host = "localhost";
$mail->username = $row['email'];
//$mail->password = $row['pass'];
 
$mail->SetFrom($row['email']);
$mail->Subject= $_GET['subject'];
$mail->MsgHTML($body);

$mail->AddAddress($_GET['email']);


 
if($mail->Send())
    echo 'با موفقیت ارسال شد.';
else
    echo 'ایمیل ارسال نشد. دوباره امتحان کنید';
	
 }

?> 