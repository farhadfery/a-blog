<?php
    if(!isset($_GET['name'])) {
        header("location: access-denied.php");
        exit();
    }
    include("class/section.php");
	  
	  $name=htmlspecialchars($_GET['name']);
	  $section = new Section();
	  $query=$section->Insert($name);
	  print("ok");
      //header("Location:" .$_SERVER['HTTP_REFERER']);
?>