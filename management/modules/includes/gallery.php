<?php
if(isset($_POST['name']))
{
include_once('class/gallery.php');
$name=$_POST['name'];
$AlbumCover=$_POST['AlbumCover'];
$section=new Gallery();
$result=$section->Insert_Section($name,$AlbumCover);
header("Location:" .$_SERVER['HTTP_REFERER']);	

}
if(isset($_POST['add']))
{
	include_once('class/gallery.php');
	
	
	
	$name=htmlspecialchars($_POST['txtname']);
	$descripshin=htmlspecialchars($_POST['description']);
	$add=htmlspecialchars($_POST['add']);
	$section=htmlspecialchars($_POST['section']);
	$PhotoGrapher=htmlspecialchars($_POST['PHOTOGRAPHER']);
	$gallery=new Gallery();
	$album=$gallery->Select_Section($section);
	$sectionName=mysql_fetch_assoc($album);
	$result=$gallery->Insert($name,$descripshin,$add,$sectionName['name'],$section,$PhotoGrapher); 
	header("Location:".$_SERVER['HTTP_REFERER']);
	}
if(isset($_POST['DEL']))
{
	include_once('class/gallery.php');
	$id=$_POST['DEL'];
    $gallery=new Gallery();
	$result=$gallery->Delete($id);
	//header("Location:".$_SERVER['HTTP_REFERER']);
}
if(isset($_POST['editid']))
{
	include_once('class/gallery.php');
	$name=htmlspecialchars($_POST['txtname']);
	$description=htmlspecialchars($_POST['description']);
	$add=htmlspecialchars($_POST['editadd']);
	$section=htmlspecialchars($_POST['section']);
	$id=$_POST['editid'];
	$gallery=new Gallery();
    $album=$gallery->Select_Section($section);
	$sectionName=mysql_fetch_assoc($album);
	$result=$gallery->Update($name,$description,$add,$sectionName['name'],$section,$id);
	header("Location: ../../admin.php?page=gallery");
}
if(isset($_POST['DelSection']))
{
	include_once('class/gallery.php');
	$id=$_POST['DelSection'];
	$del = new Gallery();
	$result=$del->Delete_Section($id);
	//header('Location:'.$_SERVER['HTTP_REFERER']);
}	
?>