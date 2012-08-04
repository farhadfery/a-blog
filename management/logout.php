<?php
   session_start();

 //متغییرهایی که در سشن ذخیره شدن آنست میشن

 	unset ($_SESSION["SESS_MEMBER_ID"]);
	unset($_SESSION["SESS_MEMBER_NAME"]);
    header("location: index.php");


?>