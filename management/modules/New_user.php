<?php
	include_once('auth.php');
require_once('includes/class/add_user.php');
include_once('includes/class/Template.php');

$Template= new Template();
$Template->load_file('Template/user/user.html');

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
          if($extension!="php"){
 
         $Template->add_block('AVATAR',array( 'IMAGE'=>$filename));
		
                  }
      
 }

$Template->print_template();
?>
