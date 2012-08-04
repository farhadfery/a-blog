<?php
	include_once('auth.php');
    include_once('includes/class/Template.php');
	$template=new Template();
	$template->load_file("Template/statistics/statistics.html");	
    require_once('includes/class/article.php');
    $total=new article();
    $result=$total->SelectAll();
	$t_article=0;
	$template->assign(array('ARTICLE'=>0));
	  if($result){
		while (mysql_fetch_assoc($result))
		{
		$template->assign(array('ARTICLE'=>$t_article++));
		}
	  }
	//-------------------------------------------------------
	require_once('includes/class/section.php');
    $total=new Section();
    $result=$total->SelectAll();
	$t_section=0;
	$template->assign(array('section'=>0));
	  if($result){
		  while (mysql_fetch_assoc($result))
		  {
		  $template->assign(array('section'=>$t_section++));
		  }
	  }
	//-------------------------------------------------------
    $total=new article();
    $result=$total->Select_Count_Page();
	$t_archive=0;
	$template->assign(array('ARCHIVE'=>0));
	  if($result){
		  $template->assign(array('ARCHIVE'=>$t_archive++));

	  }
	  
    //$result=$total->select_article_delete();
	$t_delete=0;
	$template->assign(array('DELETE'=>0));
//	   if($result){
//		  while (mysql_fetch_assoc($result))
//		  {
//		  $template->assign(array('DELETE'=>$t_delete++));
//		  }
//	   }
	$template->print_template();
 ?>
 
