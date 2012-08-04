<?php
	include_once('auth.php');
?>

<link type="text/css" href="css/status.css" rel="stylesheet" />
<script language="javascript" src="js/status.js" charset="utf-8"></script>
<?php
require_once("includes/class/status.php");

 $status=new Status();
 $result=$status->Select();
 if($result){
 $row=mysql_fetch_assoc($result);
 }else{
	 echo".ارتباط با پایگاه داده قطع شده است";
	 exit;
	 }
?>
<div id="note">
<textarea id="note-text" name="note-text">
<?php print($row['message']);?>
</textarea>
<input  id="btnsave" type="button" value="ذخیره" />
<input type="checkbox" id="check"  />&nbsp;<label>مشاهده در صفحه اول</label>
</div>
