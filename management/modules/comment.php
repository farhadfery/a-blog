<?php 
	include_once('auth.php');
    include_once("includes/class/comment.php");
    include_once('includes/class/Template.php');
$Template=new Template();
$Template->load_file('Template/comment/comment.html');
$color= array ("white","#CCC");
$index=0;
 $comment=new Comment();
 $select=$comment->SelectAll();
 if($select){
 while ($row=mysql_fetch_assoc($select)){
	   if($row['status']==1){
         $Template->add_block('TR-GALLERY',array('ID'=>$row['id'],
		                                         'SUBJECT'=>$row['subject'],
		                                         'NAME'=>$row['name'],
												 'EMAIL'=>$row['email'],
												 'COMMENT'=>$row['comment'],
												 'COLOR'=>$color[$index])); 
	   }
     if($row['status']==3){
         $Template->add_block('TR-CONTACT',array('ID'=>$row['id'],
		                                         'SUBJECT'=>$row['subject'],
		                                         'NAME'=>$row['name'],
												 'EMAIL'=>$row['email'],
												 'COMMENT'=>$row['comment'],
												 'COLOR'=>$color[$index]) );  							
	   }
     if($row['status']==2){
         $Template->add_block('TR-ARTICLE',array('ID'=>$row['id'],
		                                         'SUBJECT'=>$row['subject'],
		                                         'NAME'=>$row['name'],
												 'EMAIL'=>$row['email'],
												 'COMMENT'=>$row['comment'],
												 'COLOR'=>$color[$index])); 
	   }
 	$index=1 - $index;
	 }
 }else{echo".ارتباط با پایگاه داده قطع شده است";}
	 
	 $Template->print_template();
?>
