<?php
include_once 'db-config.php';
  class Bann
 {
	  private $link=null;
	  
	  public function Bann()
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
	  
	  public function Insert($ip,$mass)
	  {
		  $this->Connect();
		  $result=mysql_query("INSERT INTO `bann`(`ip`, `mass`) VALUES ('$ip','$mass')");
		  return mysql_affected_rows();
	  }
	  public function Select_Count_Page()
	  {
		$this->Connect();
		$result=mysql_query("SELECT COUNT( `id` )FROM `bann`");  
		return $result;
	  }	  
	  public function Select_Section_Page($page,$per_page)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `bann` ORDER BY `id` LIMIT $page , $per_page");  
		return $result;
	  }	
	  public function SelectAll()
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `bann` ORDER BY `id`");  
		return $result;
	  }
	  public function Select($id)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `bann` WHERE id='$id'");  
		return $result;
	  }
	  public function Delete($DeleteId)
	  {
		  $this->Connect();
		  $result=mysql_query("DELETE FROM `bann` WHERE id=$DeleteId");
		  return mysql_affected_rows();
	  }
	  public function Update($ip,$imess,$id)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `bann` SET `ip`='$ip',`mess`='$mess' WHERE id='$id'");
		  return mysql_affected_rows();
	  }

 }
?>