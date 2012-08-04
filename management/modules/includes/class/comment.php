<?php
include_once 'db-config.php';
  class Comment
 {
	  private $link=null;
	  
	  public function Comment()
	  {
		  $this->Connect();
	  }
	  private function Connect()
	  {
		 if($this->link==null || !mysql_ping($this->link))  {
		   $this->link= @mysql_connect(DB_SERVER,DB_SERVER_USERNAME,DB_SERVER_PASSWORD) or die('Database does not exit.');
		 }
		 mysql_select_db(DB_DATABASE);
		 mysql_query("SET NAMES 'UTF8'");	  
	  } 
	  
	  public function Insert($Gid,$subject,$name,$email,$comment_text,$status)
	  {
		  $this->Connect();
		  $result=mysql_query("INSERT INTO `user_comment`(`GalleryId`,`subject`,`name`,`email`,`comment`,`status`) VALUES  ('$Gid','$subject','$name','$email','$comment_text','$status')");
		  return mysql_affected_rows();
	  }
	  public function Select_Count_Page()
	  {
		$this->Connect();
		$result=mysql_query("SELECT COUNT( `id` )FROM `user_comment`");  
		return $result;
	  }	  
	  public function Select_Section_Page($page,$per_page)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `user_comment` ORDER BY `id` LIMIT $page , $per_page");  
		return $result;
	  }	
	  public function SelectAll()
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `user_comment`");  
		return $result;
	  }
	  public function SelectSubject($Gid,$status)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `user_comment` WHERE GalleryId='$Gid' AND status = '$status'");  
		return $result;
	  }
	  public function Select($id)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `user_comment` WHERE id='$id'");  
		return $result;
	  }
	  public function Delete($DeleteId)
	  {
		  $this->Connect();
		  $result=mysql_query("DELETE FROM `user_comment` WHERE id ='$DeleteId' ");
		  return mysql_affected_rows();
	  }
	  public function Update($subject,$name,$email,$comment,$answer,$id)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `user_comment` SET `subject`='$subject',`name`='$name',`email`='$email',`comment`='$comment',`answer`='$answer'  WHERE id='$id'");
		  return mysql_affected_rows();
	  }

 }
?>