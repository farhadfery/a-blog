<?php

	 include_once('auth.php');
     require_once('includes/class/section.php');
	 require_once('includes/class/article.php');
	 include('includes/class/Template.php');
	 
	 $Template=new Template();									
	 $Template->load_file('Template/article/article-edit.html');
                                  

   $section=new Section();
   $result=$section->SelectAll();
        if($result){
   		   while ($row=mysql_fetch_assoc($result))
			  {
				 $Template->add_block('OP-SECTION',array('ID'=>$row['id'],'OPTION'=>$row['Sections']));
			  }
		  }else{echo".ارتباط با پایگاه داده قطع شده است";}

  if (isset($_GET['id']))
   {
	   $id=$_GET['id'];
       $article=new Article();
      $a_result=$article->Select($id);
		   if($a_result){  
		   $a_row=mysql_fetch_assoc($a_result);
			   $Template->assign(array('ID'=>$a_row['id'], 'TITLE'=>$a_row['title'], 'SECTION'=>$a_row['section'], 'FULLTEXT'=>$a_row['fulltext'],  'SUMMARY'=>$a_row['summary']));
		   }else{
			   echo".ارتباط با پایگاه داده قطع شده است";
			   }
								   
   }
   
   $Template->print_template();
   ?>

