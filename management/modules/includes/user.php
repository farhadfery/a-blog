<?php
if(isset($_GET['searchuser'])){
  include_once('class/login.php');
  $name=trim($_GET['searchuser']);
  $user = new Login();
  $search=$user->SelectAll();
  while ($row=mysql_fetch_assoc($search))
    {
		if($name==$row['UserName'])
		{
			echo"این نام کاربری قبلا ثبت شده است .";
		}
    }
  }
 if(isset($_GET['ValidateEmail']) AND !empty($_GET['ValidateEmail'])) {
	$email=$_GET['ValidateEmail'];

 if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
 {
	 echo "ایمیل نا معتبر است";
	 }
}

if(isset($_POST['UserName']) AND !empty($_POST['UserName']))
{   
    $salt="this-is-uniq-hash-for-any-program-:D-".$_POST['UserPass'];
	include_once('class/login.php');
	$name=htmlspecialchars($_POST['UserName'],ENT_QUOTES);
	$pass=base64_encode(md5($salt));
	$email=htmlspecialchars($_POST['UserEmail']);
	$avatar=$_POST['Image'];
	$add=new Login();
	$insert = $add->Insert($name,$pass,$email,$avatar);
	echo $insert;
}
if(isset($_POST['EditUserName']) and !empty($_POST['EditUserName']))
{
	$salt="this-is-uniq-hash-for-any-program-:D-".$_POST['EditUserPass'];
	include_once('class/login.php');
	$id=$_POST['EditId'];
	$name=htmlspecialchars($_POST['EditUserName']);
	$pass=base64_encode(md5($salt));
	$email=htmlspecialchars($_POST['EditUserEmail']);
	$avatar=$_POST['EditImage'];
	$edit=new Login();
	$Updata=$edit->Update($name,$pass,$email,$avatar,$id);
	echo $Updata;
}

if(isset($_GET['DEL']) AND !empty($_GET['DEL']) AND is_numeric($_GET['DEL']))
{
	$id=(int)$_GET['DEL'];
	include_once("class/login.php");
	$del=new Login();
	$result=$del->Delete($id);
	echo $result;
	}
?>