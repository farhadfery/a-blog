
<?php
   session_start();
 //متغییرهایی که در سشن ذخیره شدن آنست میشن
 	unset ($_SESSION["UserName"]);
	unset($_SESSION["UserPass"]);
  header("Refresh: 7; ../../index.php");

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>403 - Access forbidden!</title>
<style>
body{
	background-color:#CCC;
	}
.main{
	border:1px dashed #666;
	width:500px;
	height:100px;
	margin:100px auto 0 auto;
	background-color:#FFF;
	text-align:center;
	}
h4{margin-top:-10px;}	
</style>
</head>

<body>
  <div class="main">
        <h3>.شما اجازه دسترسی به این پوشه را ندارید</h3>
         <h4>.آی پی شما برای برسی بیشتر در سیستم ذخیره شد</h4>
         <h4><?php echo "IP:". $_SERVER['REMOTE_ADDR']; ?></h4>
   </div>
</body>
</html>
