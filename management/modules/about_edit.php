<?php 
 include_once('auth.php');	
 include_once("includes/class/about.php");
 include_once("includes/class/Template.php");
 
$Template=new Template();
$Template->load_file("Template/about/about-edit.html");
 
 $folder ="../images/about";
	  if(!is_dir($folder)) {
		  exit('پوشه مورد نظر موجود نميباشد!');
	  }

$folder_contents = scandir($folder);

	if(isset($_GET['id']) and !empty($_GET['id']) and is_numeric($_GET['id'])){
		$id=(int)$_GET['id'];
		$about=new About();
		$result=$about->Select($id);
	        if($result) {
			  if( mysql_num_rows($result)!=0){
				  $row=mysql_fetch_assoc($result);
				}else{header("location: admin.php");}
			}else{echo".ارتباط با پایگاه داده قطع شده است";}
				
	}else{
		header("Location: admin.php");
	}

if ($result==0)
{
	header("location: admin.php");
}


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


$Template->assign(array('ID'=>$row['id'] , 'DESCROPTION'=>$row['description'], 'IMAGE'=>$row['image']));

  if(isset($_GET['cmd']))
  {
	  echo'<script language="javascript">alert("برای کار بر عکس انتخاب کنید");</script>';
 }
 $Template->print_template();
?>
