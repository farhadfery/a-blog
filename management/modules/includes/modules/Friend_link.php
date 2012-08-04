<div id="menu">
   <div class="title_right_menu">لینک دوستان</div>
         <div class="friend_link">
           <ul >
     <?php
  include("management/includes/class/friend_link.php");
  $freind = new Friend_link();
  $result = $freind->SelectAll();
  while($row=mysql_fetch_assoc($result))
  {
	  ?>
       <li style="margin-right:10px;margin-left:10px; margin-top:5px; font-weight:bold; border:1px solid #CCC; background:url(../images/li.png); padding-right:3px; border-radius:3px; "><a target="_blank" href="<?php echo $row['link']?>"><?php echo $row['name']."<br>";?></a></li>
      <?php
  }
?>
</ul>
</div>
</div>