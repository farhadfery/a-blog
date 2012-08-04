<?php
require_once('class/article.php');
//------------------Insert Article--------------//
if(isset($_POST['title']))
{
	$title =htmlspecialchars( $_POST['title']);
	$summary =$_POST['summary'];
	$fulltext =$_POST['fulltext'];
	$section = htmlspecialchars($_POST['section']);
	$article= new Article();
	$result=$article->Insert($title,$summary,$fulltext,$section);
	header('location: ../../admin.php?page=article_new');
 }
 
//-----------------Archive------------------------// 
if (isset($_POST['ArticleDelete']) and is_numeric($_POST['ArticleDelete']))
  {
	$id=(int)$_POST['ArticleDelete'];
	$delete= new Article();
	$result=$delete->Delete($id);
  }


if(isset($_POST['ArticleArchive']) and is_numeric($_POST['ArticleArchive']))
{
	$id=(int)$_POST['ArticleArchive'];
	$archive=new Article();
	 $result=$archive->Archive($id);
}

//---------------------Update-------------------//
if(isset($_POST['id'])){
$article=new  Article();
$id=$_POST['id'];
$title=htmlspecialchars($_POST['UPtitle']);
$summary=$_POST['UPsummary'];
$fulltext=$_POST['UPfulltext'];
$section=htmlspecialchars($_POST['UPsection']);
$result=$article->Update($id,$title,$summary,$fulltext,$section);
header('location: ../../admin.php?page=article');
}

?>