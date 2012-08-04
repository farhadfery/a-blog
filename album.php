<?php
 header("Pragma: cache");
 include('includes/Template.php');
 include('management/modules/includes/class/gallery.php');
 include_once"management/modules/includes/class/db-config.php";
 $Template = new Template();
 if(isset($_GET['Section']) AND !empty($_GET['Section']) AND is_numeric($_GET['Section']))
 {
	 	 $album= new Gallery();
	     $Name=$album->Select_Section($_GET['Section']);
		 $title=@mysql_fetch_assoc($Name);
		 if($title){
	          $Template->assign(array('TITLE'=>$title['name']));
		  }
		  
	 $sec=(int)$_GET['Section']; 	 
  	 $result= $album->SelectAlbum($sec);
	if(@mysql_num_rows($result)>0) 
	{
		while($row=@mysql_fetch_assoc($result))
		{
		   $Template->add_block('ALBUM',array('ALBUMID'=>$_GET['Section'],'ID'=>$row['id'],'IMAGETITLE'=>$row['image_name'],'ADD'=>$row['image_add']));
		}
	
	}else{
		   header('Location:index.php');
		 }
}
else{
	header('Location:index.php');
	}
 $Template->load_file('template/album.html');
 $Template->print_template();
?>