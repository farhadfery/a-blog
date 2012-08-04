<?php 
include_once("class/status.php");
  if(isset($_GET['id'])){
    $id=$_GET['id'];
	$m=htmlspecialchars($_GET['message']);
	$s=$_GET['status'];
	$status= new Status();
	$result=$status->Update($id,$m,$s);
	print ("ok");
	
  }
?>