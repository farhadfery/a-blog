<?php
include_once("class/archive.php");
if(isset($_POST['ArchiveRestore']) and is_numeric($_POST['ArchiveRestore']))
{
	$id=(int)$_POST['ArchiveRestore'];
	$Restore=new Archive();
	$resulte=$Restore->RestoreArchive($id);
	}
if(isset($_POST['ArchiveDel']) and is_numeric($_POST['ArchiveDel']))
{
	$id=(int)$_POST['ArchiveDel'];
	$Restore=new Archive();
	$resulte=$Restore->DeleteArchive($id);
	}
?>