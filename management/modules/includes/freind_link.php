   <?php
  if(isset($_GET['name']))
  {
	  include_once("class/friend_link.php");
	   $name = htmlspecialchars($_GET['name']);
	  $link=htmlspecialchars($_GET['link']);
	  $freind= new Friend_link();
	  $result=$freind->Insert($name,$link);
  }
  
?>

   <?php
if(isset($_GET['id']))
{
	  include_once("class/friend_link.php");
      $id = $_GET['id'];
	  $freind= new Friend_link();
	  $result=$freind->Delete($id);

}

?>

<?php
  if(isset($_GET['editid']))
  {
	  include_once("class/friend_link.php");
      $id = htmlspecialchars($_GET['editid']);
	  $name=htmlspecialchars($_GET['editname']);
	  $link=htmlspecialchars($_GET['link']);
	  $freind= new Friend_link();
	  $result=$freind->Update($id,$name,$link);

  }
?>