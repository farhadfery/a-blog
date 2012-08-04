<?php
  if(isset($_GET['news']))
  {
	 include("class/news.php");
	 $news= new News();
	 $result = $news->Update(htmlspecialchars($_GET['news']));
	 
	 echo"Ok";
	 }
?>