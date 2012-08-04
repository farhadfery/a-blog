<?php
  include_once('auth.php');
  include_once("includes/class/Template.php");
$Tamplate=new Template();
$Tamplate->load_file("Template/user/UserSendEmail.html");
  if(isset($_GET['email']) AND !empty($_GET['email'])){
	  $email=$_GET['email'];
	   $Tamplate->assign(array('EMAIL'=>$email)); 
	  }else{
		  header("Location: admin.php");
		  }
$Tamplate->print_template();	
?>