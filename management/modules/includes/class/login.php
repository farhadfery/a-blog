<?php
include_once 'db-config.php';
 class Login
  {
	  private $link=null;
	  
	  public function Login()
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
      public function Insert($name,$pass,$email,$avatar)
	  {
		  $this->Connect();
		  $result=mysql_query("INSERT INTO `login`(`UserName`, `UserPass`, `email`, `avatar`) VALUES ('$name','$pass','$email','$avatar')");
		  return mysql_affected_rows();
	  }
	  public function Select_Count_Page()
	  {
		$this->Connect();
		$result=mysql_query("SELECT COUNT( `id` )FROM `login`");  
		return $result;
	  }	  
	  public function Select_Section_Page($page,$per_page)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `login` ORDER BY `id` LIMIT $page , $per_page");  
		return $result;
	  }	
	  public function SelectAll()
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `login` ORDER BY `id`");  
		return $result;
	  }
	  public function SelectId($id)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `login` WHERE id=$id LIMIT 0,1");  
		return $result;
	  }
 	  public function SelectPhotoGrapher($name)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `login` WHERE UserName='$name' LIMIT 0,1");  
		return $result;
	  }
	  public function SelectUser($UserName,$UserPass)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `login` WHERE UserName ='$UserName' and UserPass='$UserPass' LIMIT 0,1");  
		return $result;
	  }
	  public function Delete($DeleteId)
	  {
		  $this->Connect();
		  $result=mysql_query("DELETE FROM `login` WHERE id in ($DeleteId) ");
		  return mysql_affected_rows();
	  }
	  public function Update($name,$pass,$email,$avatar,$id)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `login` SET `UserName`='$name',`UserPass`='$pass',`email`='$email',`avatar`='$avatar' WHERE`id`=$id");
		  return mysql_affected_rows();
	  }

 }
?>