
<?php
	include_once('auth.php');
    include_once('includes/class/Template.php');
$Template = new  Template();
$Template->load_file('Template/comment/comment_view.html');

if(isset($_GET['userid']) and (!empty($_GET['userid'])))
{
	$id=htmlspecialchars($_GET['userid']);
	$id=str_replace("'"," ",$id);
 include('includes/class/comment.php');
 $comment=new Comment();
 $result=$comment->Select($id);
 $row=@mysql_fetch_assoc($result);
 
 $Template->assign(array('ID'=>$row['id'],'NAME'=>$row['name'],'EMAIL'=>$row['email'],'SUBJECT'=>$row['subject'],'COMMENT'=>$row['comment'],'ANSWER'=>$row['answer']));
}
$Template->print_template();
?>
