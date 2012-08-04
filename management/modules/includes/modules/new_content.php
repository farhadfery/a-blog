<div ><p style="">
<?php
   $article=new Articles();
   	$result=$article->select("0");
		while ($row=mysql_fetch_assoc($result))
		{
			
          echo $row['title']."<br>";
		}
         ?> 
</p>
</div>