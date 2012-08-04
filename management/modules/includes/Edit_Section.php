<?php
require_once('class/section.php');
  if (isset($_GET['id']))
  {
	  $id=$_GET['id'];
	  $section=htmlspecialchars($_GET['name']);
	$update= new Section();
	$result=$update->Update($id,$section);
	//header("location: admin.php?page=Section.php");
	echo "ok";
  }
 
?>