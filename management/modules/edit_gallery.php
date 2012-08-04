 <?php
 
	include_once('auth.php');
if(isset($_GET['EDIT'])){	
include('includes/class/Template.php');
include('includes/class/gallery.php');

$Template=new Template();
$Template->load_file('Template/gallery/edit_gallery.html');

$section=new Gallery();
$result=$section->SelectAll_Section();
while($row=@mysql_fetch_assoc($result)){
   $Template->add_block('SECTION',array('SectionID'=>$row['id'],'NAME'=>$row['name']));
   
}
$gallery=new Gallery();
$result=$gallery->Select($_GET['EDIT']);
while($row=@mysql_fetch_assoc($result))
{
	$Template->assign(array("ID"=>$row['id'],"NAME"=>$row['image_name'],"DESCRIPTION"=>$row['image_description'],"ADD"=>$row['image_add'],"SECTION"=>$row['image_section']));
}
$Template->print_template();
}
else{
	
	header("Location: admin.php");
	}
?>