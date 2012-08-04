<?php 
 include_once("class/comment.php");
if(isset($_POST['subject']))
{

	$subject=$_POST['subject'];
	$name=htmlspecialchars($_POST['name']);
	$name=str_replace("'"," ", $name);
	$email=htmlspecialchars($_POST['email']);
	$email=str_replace("'"," ", $email);
	$email=strtolower($email);
	$comment_text=htmlspecialchars($_POST['comment_text']);
	$comment_text=str_replace("'"," ", $comment_text);
	$status=2;
	$comment= new Comment();
	$result=$comment->Insert($subject,$name,$email,$comment_text,$status);
	echo "ثیت شد.";

}

if(isset($_GET['Delid']))
{

	$id=$_GET['Delid'];
	$comment= new Comment();
	$result=$comment->Delete($id);
	header("Location:" .$_SERVER['HTTP_REFERER']);	
}

if(isset($_POST['GID'])){
	
    $Gid = (int)$_POST['GID'];
    $subject= htmlspecialchars($_POST['Gsubject']);
	$subject=str_replace("'"," ",$subject);
    $name=htmlspecialchars($_POST['name']);
	$name=str_replace("'"," ",$name);
    $email=htmlspecialchars($_POST['email']);
    $email=str_replace("'"," ",$email);
    $text=htmlspecialchars($_POST['text']);
    $text=str_replace("'"," ",$text);
	$status="1";
	$comment= new Comment();
	$result=$comment->Insert($Gid,$subject,$name,$email,$text,$status);
    
}

if(isset($_POST['UpId']))
{
    $id=$_POST['UpId'];
    $subject=htmlspecialchars($_POST['Upsubject']);
	$subject=str_replace("'"," ",$subject);
    $name=htmlspecialchars($_POST['name']);
	$name=str_replace("'"," ",$name);
    $email=htmlspecialchars($_POST['email']);
    $email=str_replace("'"," ",$email);
    $comment=htmlspecialchars($_POST['comment']);
    $comment=str_replace("'"," ",$comment);
	$answer=htmlentities($_POST['answer']);
	$answer=str_replace("'"," ",$_POST['answer']);
    $up=new Comment();
    $result=$up->Update($subject,$name,$email,$comment,$answer,$id);
    echo"ثبت با موفقیت انجام شد.";
}

  if(isset($_POST['UserName']))
  {
    $name=htmlspecialchars($_POST['UserName']);
	$name= str_replace("'"," ",$name);
	$email=htmlspecialchars($_POST['UserEmail']);
	$email=str_replace("'"," ",$email);
	$mess=htmlspecialchars($_POST['mess']);
	$mess=str_replace("'"," ",$mess);
	$Gid=0;
	$status=3;
	$subject="تماس با ما";
	$content=new Comment();
	$result=$content->Insert($Gid,$subject,$name,$email,$mess,$status);
    }

?>

