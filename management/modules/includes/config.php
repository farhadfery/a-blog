<?php
 if(isset($_POST['title']) and !empty($_POST['title'])) 
 {
    include('class/config.php');
	$title=htmlspecialchars($_POST['title'],ENT_QUOTES);
	$email=htmlspecialchars ($_POST['email'],ENT_QUOTES);
	$description=htmlspecialchars ($_POST['description'],ENT_QUOTES);
	$keywords=htmlspecialchars ($_POST['keywords'],ENT_QUOTES);
	$config=new Config();
	$result=$config->UpdateTitle($title,$email,$description,$keywords);
	 header("Location:".$_SERVER['HTTP_REFERER']);
  }
 
	  
?>