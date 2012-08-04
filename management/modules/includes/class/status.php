<?php 
include_once 'db-config.php';
 class Status
 {
	 private $link=null;
	  public function Status()
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
	  
	  public function Insert($section)
	  {
		  $this->Connect();
		  $result=mysql_query("INSERT INTO `message`(`Sections`) VALUES ('$section')");
		  return mysql_affected_rows();
	  }
	  public function Select_Count_Page()
	  {
		$this->Connect();
		$result=mysql_query("SELECT COUNT( `id` )FROM `article`");  
		return $result;
	  }	  
	  public function Select_Section_Page($page,$per_page)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `article` ORDER BY `id` LIMIT $page , $per_page");  
		return $result;
	  }
	  public function Select()
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `message` ORDER BY `id`");  
		return $result;
	  }
	  public function Delete($DeleteId)
	  {
		  $this->Connect();
		  $result=mysql_query("DELETE FROM `message` WHERE id in ($DeleteId)");
		  return mysql_affected_rows();
	  }
	  public function Update($id,$message,$status)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `message` SET `message`='$message',`status`='$status' WHERE id='$id'");
		  return mysql_affected_rows();
	  }
 }
?>