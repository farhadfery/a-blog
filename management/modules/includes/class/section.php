<?php 
include_once 'db-config.php';
 class Section
 {
	  private $link=null;
	  
	  public function Section()
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
		$result=mysql_query("SELECT COUNT( `id` )FROM `article`");  
		return $result;
	  }	  
	  public function Select_Section_Page($page,$per_page)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `section` ORDER BY `id` LIMIT $page , $per_page");  
		return $result;
	  }	  
	  public function Insert($section)
	  {
		  $this->Connect();
		  $result=mysql_query("INSERT INTO `section`(`Sections`) VALUES ('$section')");
		  return mysql_affected_rows();
	  }
	  public function SelectAll()
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `section` ORDER BY `id`");  
		return $result;
	  }
	  public function Delete($DeleteId)
	  {
		  $this->Connect();
		  $result=mysql_query("DELETE FROM `section` WHERE id in ($DeleteId)");
		  return mysql_affected_rows();
	  }
	  public function Update($id,$section)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `section` SET `Sections`='$section' WHERE id='$id'");
		  return mysql_affected_rows();
	  }
 }
?>