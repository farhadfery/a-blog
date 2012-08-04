<?php
   session_start();
include('includes/Template.php');
$Template=new Template();
 require_once('management/modules/includes/class/article.php');
 require_once("management/modules/includes/class/status.php");
 require_once("management/modules/includes/class/section.php"); 
 require_once("management/modules/includes/class/option.php"); 
 require_once("management/modules/includes/class/banned.php"); 
 require_once("management/modules/includes/class/config.php");

 header("Pragma: cache");


 ob_start();
///////////////////////////////////////
$config=new Config();
$result=$config->SelectAll();
$row=@mysql_fetch_assoc($result);
$Template->assign(array('TITLE'=>$row['title'],'DESCRIPTION'=>$row['description'],'KEYWORDS'=>$row['keywords']));
//////////////////////////////////////
  $off=new Option();
  $off=$off->Select();
  if($off){
  while ($row=@mysql_fetch_assoc($off)){
   $of=$row['status'];
   $mess=$row['message'];
	}
	 if($of=="off"){  	
	 $Template->load_file('template/off.html');
	 $Template->assign(array('MESS'=>$mess));
	 $Template->print_template();
	  exit();
	} 
  }
//////////////////////////////
	$bann = new Bann();
	$_bann= $bann->SelectAll();
	$ip=$_SERVER['REMOTE_ADDR'];
	while ($row=@mysql_fetch_assoc($_bann)){
	$_ip=$row['ip'];
	$mass=$row['mass'];
	if ($ip == $_ip)
	 {
	 $Template->load_file('template/off.html');
	 $Template->assign(array('MESS'=>$mass,'TITLE'=>$headr));
	 $Template->print_template();
	  exit();
	 }
	}
//////////////////////////////	
       $status=new Status();
       $result=$status->Select();
       $row=@mysql_fetch_assoc($result);
       $status= $row['message'];
	   $Template->assign(array('STATUS'=>$status));
       /////////////////////////////////////////////
	    $select=new Section();
		   $result=$select->SelectAll();
			$tr=@mysql_num_rows($result);
	            if($tr>0){
	             while ($row=@mysql_fetch_assoc($result)){
		    
                 $Template->add_block('RMENU',array('ID'=>$row['id'],'RIGHTMENU'=>$row['Sections']));
            
		      }  
	         }
	else
	{
	// echo "مطلبی برای مشاهد وجود ندارد";	
	}
	 
/////////////////////////////////////////////////////////////
   
  include("management/modules//includes/class/friend_link.php");
  $freind = new Friend_link();
  $result = $freind->SelectAll();
  while($row=@mysql_fetch_assoc($result))
  {
      $Template->add_block('FLINK',array('LINK'=>$row['link'],'NAME'=>$row['name']));
  }

	////////////////////////////////////////////////////////////////////


   $session=session_id();
   $time=time();
   $time_c=$time - 10;
    $tbl_name="useronline";
   $select_session=@mysql_query("SELECT * From $tbl_name WHERE session = '$session' "); 
   $row=@mysql_num_rows($select_session);
   if($row=="0")
   {
	  $query="INSERT INTO $tbl_name(session,time) VALUES ('$session','$time')";
	   @mysql_query($query);
	  }

   $ql=@mysql_query("SELECT * From $tbl_name");
   $num=@mysql_num_rows($ql);
   @mysql_query("DELETE FROM `useronline` WHERE time < $time_c");
   $Template->assign(array('CONT'=>$num,'IP'=>$_SERVER['REMOTE_ADDR']));
	///////////////////////////////////////////////////////////////////////
	$folder ="images/Slider";
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
                           $Template->add_block('SLIDER',array('CONTENT'=>$content));
			                 }
					 }

	        
	////////////////////////////////////////////////////////////////////
   $article= new Article();	
	$per_page=13;
	$pages_query=$article->Select_Count_Page();  
	if($pages_query){
		$pages =ceil(mysql_result($pages_query, 0 )/ $per_page);
	 if(isset($_GET['count']) and is_numeric($_GET['count']))
	 {
		$page=(int)$_GET['count'];
	}else{
		$page=1;
		}
	}else{
		echo".ارتباط با پایگاه داده قطع شده است";
		exit();
		}
	$start =($page - 1) * $per_page ; 
	$result=$article->Select_Section_Page($start,$per_page);
	if($result){
      while ($row=@mysql_fetch_assoc($result))
		  {
			$Template->add_block('TblArticle',array("ID"=>$row['id'],"TITLE"=>$row['title']));
		   }
	}else{echo".ارتباط با پایگاه داده قطع شده است";}
	if($pages >1){
		for($x = 1; $x<=$pages; $x++ ){
			  
			  $Template->add_block('PAGES',array('PAGE'=>$x));
			}
		}
		
		

   $result=$article->selectAll();
   $tr=@mysql_num_rows($result);
   $num= ceil($tr/5);///ceil خروجی را گرد میکند به نزدیک ترن عدد بزرگ
   	if($num > 1)
	{
		for($i=1 ; $i <= $num ; $i++)
		{
        
		}
	}
	else
	{
	 //echo "مطلبی برای مشاهد وجود ندارد";	
	}
	//////////////////////////////////////////////////////////////////////
	///////////////////////گالری
	 include_once('management/modules/includes/class/gallery.php');
	 $gallery=new Gallery;
	 $result=$gallery->SelectAll_Section();
	 while($row=@mysql_fetch_assoc($result))
        {
			$Template->add_block("GALLERY",array('ID'=>$row['id'],'NAME'=>$row['name'],'ADD'=>$row['album_cover']));
		}	
	  
	////////////////////////////////////	
    ///درباره ما
    require_once("management/modules/includes/class/about.php");
	$about=new About();
	$result=$about->SelectAll();
	while($row=@mysql_fetch_assoc($result))
	{
		$Template->add_block('ABOUT',array('DESC'=>$row['description'],'IMAGE'=> $row['image']));
		}
   //////////////////////////////////////////////////
   
     $Template->load_file('template/index.html');
	 $Template->print_template();


    // پایان ذخیره اطلاعات در کش
    ob_end_flush();

?>