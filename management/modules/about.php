<?php 

  include_once('auth.php');	
  include_once("includes/class/about.php");
  include_once("includes/class/Template.php");

 $Template=new Template();
 $Template->load_file("Template/about/about.html");
 
 $folder ="../images/about";
 
	if(!is_dir($folder)) {
		 exit('پوشه مورد نظر موجود نميباشد!');
	}

  $folder_contents = scandir($folder);
  foreach ($folder_contents as $content) {
	 
     if(!is_file("$folder/$content")) {
         continue;
       }
          $extension = pathinfo("$folder/$content", PATHINFO_EXTENSION);
          $filename = basename($content);
          if($extension!="php")
		  {
           $Template->add_block('ImageName',array( 'Name'=>$filename));
          }
 }
  $about=new About();
  $result=$about->SelectAll();
    if($result){
	  while($row=mysql_fetch_assoc($result))
	  {
			$Template->add_block('About',array('ID'=>$row['id'],'DESCRIPTION'=>$row['description'],'IMAGE'=>$row['image']));	
	  }
	}else{
		  echo ".ارتباط با پایگاه داده قطع شده است";
		  }
	
 $Template->print_template();
?>
