<div id="menu">
   <div class="title_right_menu">اخبار</div>
<ul class="news-ul">
         <?php
            $news=new Articles();
			$result=$news->select_news("0","اخبار");
			while ($row=mysql_fetch_assoc($result))
			{
				?>
				<li class="news-li"><?php echo $row['title'];?></li>
                <?php
			}
		 ?>
         
</ul>
</div>
</div>