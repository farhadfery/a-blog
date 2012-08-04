<?php
   session_start();
   $session=session_id();
   $time=time();
   $time_c=$time-600;
   $tbl_name="useronline";
   mysql_connect("localhost","root","") or die("ارتباط با سرور برقرار نیست");
   mysql_select_db("UserOnline");
   $select_session=mysql_query("SELECT * From $tbl_name WHERE session = '$session' "); 
   $row=mysql_num_rows($select_session);
   if($row=="0")
   {
	  $query="INSERT INTO $tbl_name(session,time) VALUES ('$session','$time')";
	   mysql_query($query);
	  }

   $ql=mysql_query("SELECT * From $tbl_name");
   $num=mysql_num_rows($ql);
   echo "$num: نفر آنلاین" ;
   mysql_query("DELETE FROM `useronline` WHERE time < $time_c");
   
?>