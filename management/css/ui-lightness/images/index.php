<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>security system</title>
<style>
body{background-color:#000;}
.bg{margin-left:auto; margin-right:auto; margin-top:30px; width:800px; height:600px; background:url(../../../images/ban.jpg);}
.ip{
	color:#FFF;
	width:170px;
	height:30px;
	margin-top:315px;
	margin-left:85px;
	position:absolute;
	text-align:center;
	font-size:30px;
	}
</style>
</head>
<body >
<div class="bg">
<div class="ip">
<?php echo $_SERVER['REMOTE_ADDR'];?>
</div>



</div>

</body>
</html>

