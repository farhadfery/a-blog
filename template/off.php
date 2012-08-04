<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
 require_once("management/includes/class/option.php");
  $off=new Option();
  $off=$off->Select();
  $row=mysql_fetch_assoc($off);
   $of=$row['status'];
   echo $row['message'];

	 if($of=="on"){  	
       header("location: index.php");
	}
   
?>