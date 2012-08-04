<style>
  .UserName{
	  border-bottom:1px solid #555;
	  border-left:1px solid #555;
	  border-right:1px solid #555;
	  border-radius:0 0 5px 5px;
	  margin-top:-5px;
	  background-image:url(images/menubg.png);
	  height:25px;
	  }
	  .UserName label{
		  margin-top:5px;
		  margin-right:10px;
		  font-size:12px;}
	 .answer{
      border:1px solid #555;
	  border-radius:5px;
	  margin-top:10px;
	  padding:10px 10px 10px 10px;
	   }	  
</style>
<?php
if(isset($_GET['subject']) and (!empty($_GET['subject'])))
{
include("includes/class/comment.php");
$subject=htmlspecialchars($_GET['subject']);
$subject=str_replace("'"," ",$subject);
$gallery=new Comment();
$status="1";
$comment=$gallery->SelectSubject($subject,$status);
while($row=@mysql_fetch_assoc($comment))
{
	?>
    <fieldset>
        <div class="UserName"> <label>نام: <?php echo $row['name'];?></label></div>
     	<div class="UserComment"><?php echo $row['comment'];?></div>
        <?php
           if($row['answer']!="")
		   {
			   ?>
			   <div class="answer"> <label>پیام مدیر :</label><br/> <?PHP echo $row['answer'];?></div> 
               <?php
		   }
		?>
     </fieldset>   
    <?php
}
}
?>