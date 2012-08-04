<?php
include_once 'db-config.php';
  class Friend_link
 {
	  private $link=null;
	  
	  public function Friend_link()
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
	  
	  public function Insert($name,$link)
	  {
		  $this->Connect();
		  $result=mysql_query("INSERT INTO `friend-link`(`name`, `link`) VALUES ('$name','$link')");
		  return mysql_affected_rows();
	  }
	  public function Select_Count_Page()
	  {
		$this->Connect();
		$result=mysql_query("SELECT COUNT( `id` )FROM `friend-link`");  
		return $result;
	  }	  
	  public function Select_Section_Page($page,$per_page)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `friend-link` ORDER BY `id` LIMIT $page , $per_page");  
		return $result;
	  }		  
	  public function SelectAll()
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `friend-link` ORDER BY `id`");  
		return $result;
	  }
	  public function Select($id)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `friend-link` WHERE id='$id'");  
		return $result;
	  }
	  public function Delete($DeleteId)
	  {
		  $this->Connect();
		  $result=mysql_query("DELETE FROM `friend-link` WHERE id in ($DeleteId) ");
		  return mysql_affected_rows();
	  }
	  public function Update($id,$name,$link)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `friend-link` SET `name`='$name',`link`='$link' WHERE id='$id'");
		  return mysql_affected_rows();
	  }

 }
?>