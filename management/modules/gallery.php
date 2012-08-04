 <?php

	include_once('auth.php');
    include_once('includes/class/Template.php');
    include_once('includes/class/gallery.php');
	
	$Template=new Template();
	$Template->load_file('Template/gallery/gallery.html');
	$section=new Gallery();
		$result=$section->SelectAll_Section();
	while($row=@mysql_fetch_assoc($result)){
		
		$Template->add_block('SECTION',array('ID'=>$row['id'],'NAME'=>$row['name']));
	}
	$per_page=20;
	$pages_query=$section->GAllery_Select_Count_Page();
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
	$result=$section->GAllery_Select_Section_Page($start,$per_page);
	if($result){
	while($row=mysql_fetch_assoc($result)){
				$Template->add_block('PIC',array("ID"=>$row['id'],"NAME"=>$row['image_name'],"DESCRIPTION"=>$row['image_description'],
				                                                                                      "ADD"=>$row['image_add'],"SECTION"=>$row['image_section']));
	}
	}else{echo".ارتباط با پایگاه داده قطع شده است";}
	if($pages >1){
		for($x = 1; $x<=$pages; $x++ ){
			 $Template->add_block('PAGE',array('COUNT'=>$x));
			}
		}
	
    $Template->assign(array('PHOTOGRAPHER'=>$_SESSION['SESS_MEMBER_NAME']));
	 $Template->print_template();
?>