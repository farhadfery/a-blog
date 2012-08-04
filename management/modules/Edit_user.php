<?php

	include_once('auth.php');
	require_once('includes/class/login.php');
	require_once('includes/class/Template.php');
	
$Template = new Template();
$Template->load_file('Template/user/EditUser.html');
if(isset($_GET['id']) AND !empty($_GET['id']) AND is_numeric($_GET['id']))
{
	 $id=htmlspecialchars($_GET['id']);
	 $id=str_replace("'"," ",$id);
	 $id=str_replace("/"," ",$id);
	 $id=(int)$id;
	 $select=new Login();
     $result=$select->SelectId($id);
     while($row=@mysql_fetch_assoc($result))
		{
			$Template->assign(array('ID'=>$row['id'],'NAME'=>$row['UserName'],'EMAIL'=>$row['email'],'AVATAR'=>$row['avatar']));
		}

}else{
	header("location:?page=List_user");
	}

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
