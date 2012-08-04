<?php
	include_once('auth.php');
	include('includes/class/Template.php');
	
	$Template=new Template();
	$Template->load_file('Template/friend_link/friend_link.html');
	$color= array ("white","#CCC");
	$index=0;
	  include("includes/class/friend_link.php");
	  $freind = new Friend_link();
	  $result = $freind->SelectAll();
	  while($row=@mysql_fetch_assoc($result))
	  {
		 $Template->add_block('FRIEND-LINK',array('COLOR'=>$color[$index],'ID'=>$row['id'],'NAME'=>$row['name'],'LINK'=>$row['link']));
		  $index=1 - $index; 
	  }
	  $Template->print_template();
?>
