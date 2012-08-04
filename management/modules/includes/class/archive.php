<?php
include_once 'db-config.php';
  class Archive
 {
	  private $link=null;
	  
	  public function Archive()
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
	  
	  public function Select_Count_Page()
	  {
		$this->Connect();
		$result=mysql_query("SELECT COUNT( `id` )FROM `article` WHERE archive ='1' AND `delete`='0' ORDER BY `id`");  
		return $result;
	  }	  
	  public function Select_Section_Page($page,$per_page)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `article` WHERE archive ='1' AND `delete`='0' ORDER BY `id` LIMIT $page , $per_page");  
		return $result;
	  }
	  public function DeleteArchive($DeleteId)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `article` SET `archive`='0' ,`delete`='1'  WHERE id='$DeleteId'");
		  return mysql_affected_rows();
	  }
	  public function RestoreArchive($ArchiveId)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `article` SET `archive`='0'  WHERE id='$ArchiveId'");
		  return mysql_affected_rows();
	  }
 }
?>