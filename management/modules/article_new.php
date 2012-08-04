<?php
/*   if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: index.php");
		exit();
	}*/
	 include_once('auth.php');
     require_once('includes/class/section.php');
     include("includes/class/Template.php");
	 
	 $Template=new Template();
	 $Template->load_file('Template/article/article-new.html');
   $section=new Section();
   $result=$section->SelectAll();
       if($result){                                                                  
        while ($row=mysql_fetch_assoc($result))
			{
			   $Template->add_block('OPTION',array('ID'=>$row['id'], 'SECTION'=>$row['Sections'])) ;
			}
	     }else{echo".ارتباط با پایگاه داده قطع شده است";}
   
	
	if(isset($_GET['Folder']))
{
$_Folder=$_GET['Folder'];
} else
     { 
	   $_Folder="upload";
	 }

$folder ="../images/upload";
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
					  if($extension!="php"){
						  
						  $Template->add_block('IMAGE',array('UP-FOLDER'=>$_Folder,
						                                          'CONTENT'=>$content,
															        'FILENAME'=>$filename,
															           'FILESIZE'=>$filesize,
															                'FOLDER'=>$folder));

			                 }
					 }
			   
   $Template->print_template();                              
   ?>

