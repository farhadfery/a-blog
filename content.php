<?php

    require_once("management/modules/includes/class/news.php");
    require_once('management/modules/includes/class/article.php');
	require_once('management/modules/includes/class/comment.php');

if(isset($_POST['id']) or (isset($_POST['Sid']))){
	    $article=new Article();
        $result=$article->Select_Section_Page(0,5);
		$tr=@mysql_num_rows($result);
		if($tr>0)
		{
			while ($row=@mysql_fetch_assoc($result))
			{
				?>

<div class="div-contant">
  <div class="ArticleTitle"><h4><?php echo $row['title']; ?></h4></div>
   <div class="fulltext"><?php echo $row['fulltext'];?></div>
  <div class="R_more" id="<?php echo $row['id'];?>">
    <div class="close" onClick="hd(<?php echo $row['id'];?>)"></div>
    <?php echo $row['summary'];?> </div>
  <div class="span"> 
    <!-- <input onClick="showContact(<?php //echo $row['id'];?>)" class="Btncontact" type="button" value="نظر"/> -->
    <?php
					 if($row['summary']!="")
					 {
						 ?>
    <input class="Btncontact" onClick="showContact(<?php echo $row['id'];?>)" type="button" value="ادامه مطلب"/>
    <?php
					 }
					 ?>
  </div>
</div>
<?php
					}  
		}
		
		else
		{
		// echo "مطلبی برای مشاهد وجود ندارد";	
		}
	 
}
if(isset($_POST['Pid']))
{
	    $Pid=$_POST['Pid'];	
	    $article=new Article();
        $result=$article->Select($Pid);
		$row=@mysql_fetch_assoc($result);
		?>

<div class="div-contant">
  <div class="ArticleTitle"><h4><?php echo $row['title']; ?></h4></div>
      <div class="fulltext">
       <?php echo $row['fulltext'];?> 
        <?php echo $row['summary'];?>
       </div> 
</div>
<?php	
}
?>

<?php
if(isset($_POST['SectionId']) AND !empty($_POST['SectionId']) AND is_numeric($_POST['SectionId']))
{
	$id=(int) $_POST['SectionId'];
	$article= new Article();
	$result=$article->SelectAll_IN_SECTION($id);
	if ($result){
	$row=mysql_fetch_assoc($result);
	?>
       <div class="div-contant">
          <div class="ArticleTitle"><h4><?php echo $row['title'];?></h4></div>
             <div class="fulltext">
              <?php echo $row['fulltext'];?> 
              <?php echo $row['summary'];?>
              </div>
       </div>
    
 <?php
	}else{
		 echo"مطلبی برای نمایش وجود ندارد .";
		}
}

?>