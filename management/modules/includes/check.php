<?php
session_start();
if(isset($_POST['UserName']) AND !empty($_POST['UserName']) 
                             AND isset($_POST['UserPass']) AND !empty($_POST['UserPass']) ){
	require_once('class/db-config.php');
    require_once ('class/login.php');
	
	mysql_connect(DB_SERVER,DB_SERVER_USERNAME,DB_SERVER_PASSWORD);
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	$UName=clean($_POST['UserName']);
	$UPass=clean($_POST['UserPass']);
	$salt_pass="this-is-uniq-hash-for-any-program-:D-".$UPass;
	$login= new Login();
	$result=$login->SelectUser($UName,base64_encode(md5($salt_pass)));
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			
			$salt="this-is-uniq-hash-for-any-program $UName";
			session_regenerate_id();
			  $_ip=isset ($_SERVER['HTTP_CLIENT_IP'])?
			  $_SERVER['HTTP_CLIENT_IP'] : "UNKNOWN";
			  $_ip.=isset ($_SERVER['HTTP_X_FORWARDED_FOR'])?
			  $_SERVER['HTTP_X_FORWARDED_FOR'] : "UNKNOWN";
			  $_ip.=isset ($_SERVER['REMOTE_ADDR'])?
			  $_SERVER['REMOTE_ADDR'] : "UNKNOWN";
			  
			  $_agent = isset ($_SERVER['HTTP_USER_AGENT']) ?
			  $_SERVER['HTTP_USER_AGENT'] : 'NO USER AGENT';
 
              $browser_data=$salt.$_ip.$_agent;
              $browser_hash=md5($browser_data);
			  $_SESSION['SESS_MEMBER_HASH']=$browser_hash;
			$ID=mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID']=$ID['id'];
			$_SESSION["SESS_MEMBER_NAME"] = $UName;
			session_write_close();
				echo "OK";
			exit();
		}else {
			//Login failed		 
			echo "NoUser";
			@mail("afshin@a-vitrin.ir","login","خطا در ورود به سیستم");
			exit();
		}
	}else {
		echo"Error";

	}
}
else{
	header("LOCATION:../index.php");
	}

?>
