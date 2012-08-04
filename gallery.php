<?php
 header("Pragma: cache");
include_once('includes/Template.php');
include_once('management/modules/includes/class/login.php');
include_once('management/modules/includes/class/gallery.php');
include_once('management/modules/includes/class/db-config.php');
$Template = new Template();


 if(isset($_GET['Gallery'])and !empty($_GET['Gallery']) and is_numeric($_GET['Gallery']))
 {  
     mysql_connect(DB_SERVER,DB_SERVER_USERNAME,DB_SERVER_PASSWORD);
	 $id=htmlspecialchars($_GET['Gallery']);
	 $id=mysql_real_escape_string($id);
	 $gallery=new Gallery();
	 $result=$gallery->Select($id);
	 
	 if(@mysql_num_rows($result)>0)
	 {
     $row=@mysql_fetch_assoc($result);
	 
	 $user= new Login();
	 $user=$user->SelectPhotoGrapher($row['PhotoGrapher']);
	 $result=@mysql_fetch_assoc($user);
	 $Template->assign(array('ID'=>$row['id'],'IMAGETITLE'=>$row['image_name'],'ADD'=>$row['image_add'],'DESCRIPTION'=>$row['image_description'],
	 'PG'=>$row['PhotoGrapher'],'AVATAR'=>$result['avatar']));//'ALBUMID'=>$_GET['section'],
	 
	 }else{
		header("Location: index.php");
		 }
		  //////////////////////////////////////////////////
		  $Nid=$id+1;
           $next=$gallery->Select($Nid);
		   $next=mysql_fetch_assoc($next);
		   if($next['id']!=''){ 
		   $Template->assign(array('NEXT'=> $next['id']));
		   }else{
			    $Template->assign(array('NEXT'=> $_GET['Gallery']));
			   }
		 //////////////////////////////////////////////////
		   $Pid=$id-1;
           $next=$gallery->Select($Pid);
		   $next=mysql_fetch_assoc($next);
		   if($next['id']!=''){
		   $Template->assign(array('PREVIOUS'=> $next['id']));
		   }else{
			   $Template->assign(array('PREVIOUS'=> $_GET['Gallery']));
			   }
		////////////////////////////////////////////////// 
		 
 }else{
		  header("Location: index.php");
		 }

 $Template->load_file('template/gallery.html');
 $Template->print_template();
?>