<?php
   include_once('auth.php');	
   require_once("includes/class/section.php");
   include_once('includes/class/Template.php');
   $Template=new Template();
   $Template->load_file('Template/section/section.html');
  $color= array ("white","#CCC");
  $index=0;
  $section=new Section();
  $result = $section->SelectAll();
  if($result){
  $tr = mysql_num_rows($result);
	 if($tr>0)
	 {
	
		  while ($row=mysql_fetch_assoc($result))
		  {

 				$Template->add_block('TR-SECTION',array('ID'=>$row['id'],'SECTION'=>$row['Sections'],'COLOR'=>$color[$index]));
			   $index=1 - $index;
		  }
	 }
  }else{echo".ارتباط با پایگاه داده قطع شده است";}
	$Template->print_template(); 
?>
