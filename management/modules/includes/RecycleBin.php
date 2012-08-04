<?php
include_once "class/RecycleBin.php";

//----------------------------RecycleBin-------------------//
if(isset($_POST['RecycleBinDelete']) AND is_numeric($_POST['RecycleBinDelete']))
{
	$id=(int)$_POST['RecycleBinDelete'];
	$del=new RecycleBin();
	$result=$del->Delete($id);
}
if(isset($_POST['RecycleBinRestore']) AND is_numeric($_POST['RecycleBinRestore']))
{
	$id=(int)$_POST['RecycleBinRestore'];
	$del=new RecycleBin();
	$result=$del->RestoreRecycleBin($id);
	echo "0";
}
?>