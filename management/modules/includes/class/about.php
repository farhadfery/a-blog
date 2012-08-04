<?php
include_once 'db-config.php';
  class About
 {
	  private $link=null;
	  
	  public function About()  
	  {
		  $this->Connect();
	  }
	  private function Connect()
	  {
		 if($this->link==null || !mysql_ping($this->link))  {
		   $this->link= @mysql_connect(DB_SERVER,DB_SERVER_USERNAME,DB_SERVER_PASSWORD)or die('Database does not exit.');
		 }
		 mysql_select_db(DB_DATABASE) or die('Database does not exit.');
		 mysql_query("SET NAMES 'UTF8'");	  
	  } 
	  
	  public function Insert($description,$image)
	  {
		  $this->Connect();
		  $result=mysql_query("INSERT INTO `about`(`description`, `image`) VALUES ('$description','$image')");
		  return mysql_affected_rows();
	  }
	  public function Select_Count_Page()
	  {
		$this->Connect();
		$result=mysql_query("SELECT COUNT( `id` )FROM `about`");  
		return $result;
	  }	  
	  public function Select_Section_Page($page,$per_page)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `about` ORDER BY `id` LIMIT $page , $per_page");  
		return $result;
	  }
	  public function SelectAll()
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `about` ORDER BY `id`");  
		return $result;
	  }
	  public function Select($id)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `about` WHERE id='$id'");  
		return $result;
	  }
	  public function Delete($DeleteId)
	  {
		  $this->Connect();
		  $result=mysql_query("DELETE FROM `about` WHERE id in ($DeleteId) ");
		  return mysql_affected_rows();
	  }
	  public function Update($description,$image,$id)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `about` SET `description`='$description',`image`='$image' WHERE id='$id'");
		  return mysql_affected_rows();
	  }

 }
?>