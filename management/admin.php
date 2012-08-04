<?php
  include_once('modules/auth.php');
  include_once("modules/includes/class/date_time.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>مدیریت سایت</title>
    <link type="text/css" href="css/main.css" rel="stylesheet" />
    <link type="text/css" href="css/css.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.8.17.custom.css"/>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<div class="header" >
<?php require_once("modules/includes/style/header.php");?>
</div>
<?php require_once("modules/includes/style/panel.php"); ?>
<div class="main">

    <?php
$pages= array('archive','album','edit_album','Section','article_new','article','Edit_user','List_user','about_edit'
              ,'options','statistics','New_user','article_edit','RecycleBin','file_manager','status','about','friend_link','comment','banned','backup'
			  ,'gallery','edit_gallery','comment_view','UserSendEmail');	
	  
if (isset($_GET['page']))
{
	$page=htmlentities($_GET['page'],ENT_QUOTES);
	if(in_array($page,$pages)){
        require("modules/$page.php");
	}else{
		header('LOCATION: admin.php');
		}
}
else{

	require("modules/statistics.php");
}
?>
 
</div>

</body>
</html>