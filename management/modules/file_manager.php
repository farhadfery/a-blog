<?php
	include_once('auth.php');
    include('includes/class/Template.php');
	
$Template=new Template();
$Template->load_file('Template/file_manager/file-manager.html');
if(isset($_GET['Folder']))
{
$_Folder=$_GET['Folder'];
} else
     { 
	   $_Folder="upload";
	 }


$folder ="../images/$_Folder";
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
						  
						  $Template->add_block('TR-FILE',array('UP-FOLDER'=>$_Folder,
						                                          'CONTENT'=>$content,
															        'FILENAME'=>$filename,
															           'FILESIZE'=>$filesize,
															                'FOLDER'=>$folder));

			                 }
					 }
			   
                     $Template->assign(array('UP-FOLDER'=>$_Folder));
    

/*if(isset($_GET['ok']))
//{
//	echo "<script>alert('فایل با موفقیت آپلود شد');</script>";
//}
//if(isset($_GET['error']))
//{
//	echo"<script>alert('آپلود فایل با مشکل مواجه شد');</script>";
//}*/
$Template->print_template();
?>


