<?php
require_once("class/section.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$delete= new Section();
	$result=$delete->Delete($id);
	//header("location: admin.php?page=Section.php");
	//if($result > 0) {
    //    $result = 'ok';
  //  } 
  print "ok";
  }
 // else{ header("location: access-denied.php");}



?>