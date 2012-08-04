<?php
	include_once('auth.php');
    include_once('includes/class/Template.php');
    include_once('includes/class/banned.php');

  $Template=new Template();
  $Template->load_file('Template/banned/banned.html');


  $bann=new Bann();
$select=$bann->SelectAll();
   if($select){
	  while($row=mysql_fetch_assoc($select))
	  {
		  $row['ip'];
		  $row['mass'];
		  $Template->add_block('TR-IP',array('ID'=>$row['id'],'IP'=>$row['ip'],'MASS'=>$row['mass']));
		  
	  }
   }else{echo".ارتباط با پایگاه داده قطع شده است";}
$Template->print_template();
?>