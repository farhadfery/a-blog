<?php
	//Check whether the session variable SESS_MEMBER_ID is present or not
    //چک میکنیم ببینیم که در سشن آیدی کاربر وجود دارد یا نه
   if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: ../../login.php");
		exit();
	}
?>
<link href="css/menu.css" rel="stylesheet"/>
 <div style=" border-left:1px solid #CCC; float:right;"><a href="admin.php"> <img src="images/Home-icon.png" width="30px"/></a></div>
<ul class="mainlevel">
  <li class="mainlevel">تنظیمات وبلاگ
     <ul class="sublevel">
        <li class="sublevel"><a href="?page=about">درباره ما</a></li>
        <li class="sublevel"><a href="?page=options">تنظیمات</a></li>
        <li class="sublevel"><a href="?page=statistics">آمار وبلاگ</a></li>      
     </ul>
  </li>
  <li class="mainlevel">مدیریت محتوا
    <ul class="sublevel">
       <li class="sublevel"><a href="?page=status">سخن روز</a></li>
       <li class="sublevel"><a href="?page=Section">ایجاد بخش</a></li>
       <li class="sublevel"><a href="?page=article_new">ایجاد مطلب</a></li>
       <li class="sublevel"><a href="?page=article">ویرایش مطلب</a></li>
       <li class="sublevel"><a href="?page=article_delete">سطل زباله</a></li>
    </ul>
  
  </li>
  <li class="mainlevel">مدیریت کاربرها
     <ul class="sublevel">
       <li class="sublevel"><a href="?page=New_user">ایجاد کاربر</a></li>
       <li class="sublevel"><a href="?page=List_user">لیست کاربرها</a></li>
    </ul>
  </li>
  
  <li class="mainlevel">امکانات
     <ul class="sublevel">
       <li  class="sublevel"><a href="?page=friend_link">لینک دوستان</a></li>
       <li  class="sublevel"><a href="?page=file_manager">مدیریت فایل</a></li>
       <li  class="sublevel"><a href="?page=banned">لیست سیاه</a></li>
       <li  class="sublevel">گالری
           <ul class="submenu">
              <li class="submenu"><a href="?page=album">آلبوم</a></li>
              <li class="submenu"><a href="?page=gallery">عکس ها</a></li>
           </ul>
       </li>
     </ul>
  </li>
  
</ul>

<div id="date-time"><?php echo jdate("l - d , F , o " );?></div>
<div id="logout"> <a href="logout.php"><img src="images/imagebot.png" width="30px"/></a></div>


