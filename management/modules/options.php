<?php
/*   if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: index.php");
		exit();
	}*/
	include_once('auth.php');
    include("includes/class/Template.php");
    $Template=new Template();
	$Template->load_file('Template/option/option.html');
	 $ON="";
	 $OFF="";
       include("includes/class/option.php");
	   $option= new Option();
	   $message=$option->Select();
	   $row=@mysql_fetch_assoc($message);
	   if($row['status']=="on"){ $ON='checked="checked"';}
	   if($row['status']=="off"){$OFF='checked="checked"';}

	   $Template->assign(array('ON'=>$ON,'OFF'=>$OFF,'MESSAGE'=>$row['message']));




	   include_once("includes/class/section.php");
	   $section=new Section();
	   $result=$section->SelectAll();
	   while($row=@mysql_fetch_assoc($result))
		{
	     
		 $Template->add_block('NEWS',array('SECTION'=>$row['Sections']));
	
		}
             
       include_once('includes/class/config.php');
	   $config=new Config();
	   $result=$config->SelectAll();
	   $row=@mysql_fetch_assoc($result);
	     $Template->assign(array('TITLE'=>$row['title'],'EMAIL'=>$row['email'],'DESCRIPTION'=>$row['description'],'KEYWORDS'=>$row['keywords']));
     

$folder ="modules/includes/modules";
if(!is_dir($folder)) {
    exit('پوشه مورد نظر موجود نميباشد!');
}
$total=0;
$folder_contents = scandir($folder);

			 
			    foreach ($folder_contents as $content) {
					  if(!is_file("$folder/$content")) {
						  continue;
					  }
				  
					  $extension = pathinfo("$folder/$content", PATHINFO_EXTENSION);
					  $filename = basename($content, ".$extension");
					  $filesize = round(filesize("$folder/$content") / 1024, 2);
					  $url = "$_SERVER[HTTP_HOST]/$folder/$content";
					
                      $Template->add_block('MODELS',array('FILENAME'=>$filename));

					  
					  
					 
					 }
	$Template->print_template();				 
?>


