<?php
include_once 'db-config.php';
  class Config
 {
	 
	  private $link=null;
	  
	  public function Config()
	  {
		  $this->Connect();
	  }
	  private function Connect()
	  {
		 if($this->link==null || !mysql_ping($this->link))  {
		  $this->link= @mysql_connect(DB_SERVER,DB_SERVER_USERNAME,DB_SERVER_PASSWORD) or die('Database does not exit.');
		   }
		 mysql_select_db(DB_DATABASE) ;
		 mysql_query("SET NAMES 'UTF8'");	  
	  } 
	  
	  public function Insert($title,$email,$pass)
	  {
		  $this->Connect();
		  $result=mysql_query("INSERT INTO `config`(`title`, `email`,`pass`) VALUES ('$title','$email','$pass')");
		  return mysql_affected_rows();
	  }
	  public function Select_Count_Page()
	  {
		$this->Connect();
		$result=mysql_query("SELECT COUNT( `id` )FROM `config`");  
		return $result;
	  }	  
	  public function Select_Section_Page($page,$per_page)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `config` ORDER BY `id` LIMIT $page , $per_page");  
		return $result;
	  }		  public function SelectAll()
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `config` ORDER BY `id`");  
		return $result;
	  }
	  public function Select($id)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `config` WHERE id='$id'");  
		return $result;
	  }
	  public function Delete($DeleteId)
	  {
		  $this->Connect();
		  $result=mysql_query("DELETE FROM `config` WHERE id in ($DeleteId) ");
		  return mysql_affected_rows();
	  }
	  public function UpdateTitle($title,$email,$description,$keywords) 
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `config` SET `title`='$title',`email`='$email',`description`='$description',`keywords`='$keywords'");
		  return mysql_affected_rows();
	  }
	  public function UpdateEmail($email,$pass)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `config` SET `email`='$email',`pass`='$pass' ");
		  return mysql_affected_rows();
	  }

 }
?>