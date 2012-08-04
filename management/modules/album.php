 <?php

	include_once('auth.php');
	include('includes/class/Template.php');
	include_once('includes/class/gallery.php');
	
	$Template=new Template();
	$Template->load_file('Template/gallery/album.html');
	
	$section=new Gallery();
	$per_page=12;
	$pages_query=$section->Select_Count_Page();   //mysql_query("SELECT COUNT( `id` ) FROM `section-gallery`");
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
		}
	$start =($page - 1) * $per_page;
	$result=$section->Select_Section_Page($start,$per_page);
	if($result){
	while($row=mysql_fetch_assoc($result)){
			$Template->add_block('ALBUM',array('IMAGE'=>$row['album_cover'],'SECTION'=>$row['name'],'ID'=>$row['id']));
	}
	}else{echo".ارتباط با پایگاه داده قطع شده است";}
	if($pages >=1){
		for($x = 1; $x<=$pages; $x++ ){
			 $Template->add_block('PAGE',array('COUNT'=>$x));
			}
		}
	
	$Template->print_template();

?>