<?php
if(isset($_GET['Folder']))
{
	$_Folder=$_GET['Folder'];
    $uploads_dir = "../../../images/$_Folder";

if ($_FILES)
{
  $name = $_FILES['filename']['name'];
  switch($_FILES['filename']['type'])
  {
    case 'image/jpeg': $ext = 'jpg'; break;
    case 'image/pjpeg': $ext = 'jpg'; break;
    case 'image/gif': $ext = 'gif'; break;
    case 'image/png': $ext = 'png'; break;
    case 'image/tiff': $ext = 'tif'; break;
    default: $ext = ''; break;
  }
  if ($ext)
  {
    $n = "$name";
	$tmp_name=$_FILES['filename']['tmp_name'];
    move_uploaded_file($tmp_name,"$uploads_dir/$n" );
	header("Location:" .$_SERVER['HTTP_REFERER']."&ok");
  }
  else header("Location:".$_SERVER['HTTP_REFERER']."&error"); 
}
  else header("Location:".$_SERVER['HTTP_REFERER']."&error");

if(isset($_GET['del']))
{
	$myFile = "../../../images/$_Folder/".$_GET['del'];
    unlink($myFile);
	header("Location:" .$_SERVER['HTTP_REFERER']);

}
}else
{
	header("Location:" .$_SERVER['HTTP_REFERER']);
	
	}
?>