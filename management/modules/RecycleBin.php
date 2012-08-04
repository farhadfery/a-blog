<?php
  include_once('auth.php');
  include_once('includes/class/RecycleBin.php');
  include_once("includes/class/Template.php");
  
  $Template=new Template();
  $Template->load_file("Template/article/RecycleBin.html");

   $article=new RecycleBin();
	$per_page=20;
	$pages_query=$article->Select_Count_Page();   
	
   if($pages_query){
	$pages =ceil(mysql_result($pages_query, 0 )/ $per_page);
	if(isset($_GET['count']) and is_numeric($_GET['count']))
	{
		$page=(int)$_GET['count'];
	}else{
		$page=1;
		}
	}else{
		echo".ارتباط با پایگاه داده قطع شده است";
		}
	$start =($page - 1) * $per_page;
	$result=$article->Select_Section_Page($start,$per_page);
	if($result){
      while ($row=mysql_fetch_assoc($result))
		  {
			$Template->add_block('RecycleBin',array('ID'=>$row['id'],'TITLE'=>$row['title']));
		   }
	}else{echo".ارتباط با پایگاه داده قطع شده است";}
	if($pages >1){
		for($x = 1; $x<=$pages; $x++ ){
			 $Template->add_block('PAGE',array('COUNT'=>$x));
			}
		}
	  $Template->print_template();
?>
