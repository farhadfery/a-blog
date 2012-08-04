<?php
if(isset($_GET['ip']) and !empty($_GET['ip']))
{
	include_once("class/banned.php");
	$ip=htmlspecialchars($_GET['ip']);
	$ip=str_replace("'"," ", $ip);
	$mass=htmlspecialchars($_GET['mass']);
	$mass=str_replace("'"," ",$mass);
	$bann=new Bann();
	$save=$bann->Insert($ip,$mass);

}
if(isset($_GET['id']) and !empty($_GET['id']) and is_numeric($_GET['id']))
{
	 include_once("class/banned.php");
	 $id=str_replace("'"," ", $_GET['id']);
	 $id=htmlspecialchars($id);
	 $bann=new Bann();
     $save=$bann->Delete($id);
}
?>