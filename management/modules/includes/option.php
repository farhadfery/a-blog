<?php
require_once('../includes/class/option.php');
if(isset($_POST['active']) AND !empty($_POST['active']))
{	
$status=htmlspecialchars($_POST['active']);
$message=htmlspecialchars($_POST['message']);
 $option=new Option();
 $result = $option->Update($status,$message);
header("Location:" .$_SERVER['HTTP_REFERER']);
}

?>