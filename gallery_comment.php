<?php
if(isset($_GET['Gid']) and (!empty($_GET['Gid'])))
{
include("management/modules/includes/class/comment.php");
$Gid=htmlspecialchars($_GET['Gid']);
$Gid=str_replace("'"," ",$Gid);
$gallery=new Comment();
$status="1";
$comment=$gallery->SelectSubject($Gid,$status);
while($row=@mysql_fetch_assoc($comment))
{
	?>
     <fieldset>
        <?php echo $row['name'];?>:
        <?php echo $row['comment'];?>
        <?php
           if($row['answer']!="")
		     {
		    ?>
			   <blockquote><?PHP echo $row['answer'];?></blockquote>
           <?php
		   }
		?>
     </fieldset>   
    <?php
}
}
?>