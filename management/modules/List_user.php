<?php
	include_once('auth.php');
    require_once('includes/class/login.php');
    require_once('includes/class/Template.php');

$Template = new Template();
$Template->load_file('Template/user/List_User.html');

$select=new Login();
$result=$select->SelectAll();
$avatar="NoAvatar.jpg";
while($row=@mysql_fetch_assoc($result))
{
	$Template->add_block('USERS',array('ID'=>$row['id'],'NAME'=>$row['UserName'],'EMAIL'=>$row['email'],'AVATAR'=>$row['avatar'])); 

}

$Template->print_template();

?>
