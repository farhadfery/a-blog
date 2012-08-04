<?php 
include_once 'db-config.php';
 class News
 {
	  private $link=null;
	  
	  public function News()
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
	  
//	  public function Insert($section)
//	  {
//		  $this->Connect();
//		  $result=mysql_query("INSERT INTO `message`(`Sections`) VALUES ('$section')");
//		  return mysql_affected_rows();
//	  }
	  public function Select()
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `news` ORDER BY `id`");  
		return $result;
	  }
//	  public function Delete($DeleteId)
//	  {
//		  $this->Connect();
//		  $result=mysql_query("DELETE FROM `message` WHERE id in ($DeleteId)");
//		  return mysql_affected_rows();
//	  }
	  public function Update($news)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `news` SET `news`='$news'");
		  return mysql_affected_rows();
	  }
 }
?>