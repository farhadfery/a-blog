<?php
	//Start session
	session_start();
   if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '') || 
                                 (!isset($_SESSION['SESS_MEMBER_HASH']) || (trim($_SESSION['SESS_MEMBER_HASH']=='')))) {
		 session_destroy();							 
		header("location: index.php");
		exit();
	}


?>