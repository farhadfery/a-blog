<?php  

	//Check whether the session variable SESS_MEMBER_ID is present or not
    //چک میکنیم ببینیم که در سشن آیدی کاربر وجود دارد یا نه
   if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: ../../login.php");
		exit();
	}
?>
<div class="control_panel" id="panel">
<a href="?page=archive">
	<div id="inner_control_panel"class="settings" style=" background:url(images/archive.png)" >
		<div id="inner_control_panel_header" class="icon-header" >آرشیو مطالب</div>
	</div>
</a>
<a href="?page=Section">
	<div id="inner_control_panel"style="background:url(images/folder_add.png)">
		<div id="inner_control_panel_header" class="icon-header" >ایجاد بخش</div>
	</div>
</a>
<a href="?page=article_new">
	<div id="inner_control_panel"style="background:url(images/note_add.png)">
		<div id="inner_control_panel_header" class="icon-header" >مطلب جدید</div>
	</div>
</a>
<a href="?page=article">
	<div id="inner_control_panel"style="background:url(images/note_edit.png)">
		<div id="inner_control_panel_header" class="icon-header" >ویرایش مطلب</div>
	</div>
</a>
<a href="?page=comment">
	<div id="inner_control_panel"style="background:url(images/user_comment.png)">
		<div id="inner_control_panel_header" class="icon-header" >نظرات کاربران</div>
	</div>
</a>
<a href="?page=List_user">
	<div id="inner_control_panel"style="background:url(images/user_edit.png)">
		<div id="inner_control_panel_header" class="icon-header" >لیست کاربران</div>
	</div>
</a>
<a href="?page=file_manager">
	<div id="inner_control_panel"style="background:url(images/file-manager.png)">
		<div id="inner_control_panel_header" class="icon-header" >مدیریت فایل ها</div> 
	</div>
</a>
<a href="?page=RecycleBin">
	<div id="inner_control_panel"style="background:url(images/exit.png)">
		<div id="inner_control_panel_header" class="icon-header" >سطل زباله</div>
	</div>
</a>
</div>