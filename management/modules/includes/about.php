<?php
include("class/about.php");
if(isset($_POST['description']) AND !empty($_POST['description']))
{
	$description=$_POST['description'];
	$image=$_POST['image'];
    $about=new About();
	$result=$about->Insert($description,$image);
	header("Location: ../../admin.php?page=about");
	exit();
}

if(isset($_GET['id']) AND !empty($_GET['id']) AND is_numeric($_GET['id']))
{
	$id=(int)$_GET['id'];
	$delete= new About();
	$result=$delete->Delete($id);
}
if(isset($_POST['edit-id']) AND !empty($_POST['edit-id']) AND is_numeric($_POST['edit-id']))
{
	$id=$_POST['edit-id'];
	$description=$_POST['edit-description'];
	$image=$_POST['image'];
    $about=new About();
	$result=$about->Update($description,$image,$id);
		header("Location: ../../admin.php?page=about");
		exit();
  }
  else 
    {
	   $id=$_POST['edit-id'];
       header("Location: ../../admin.php?page=about_edit&id=$id&cmd=error");
	}


?>