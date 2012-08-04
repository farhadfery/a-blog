<?php
include_once 'db-config.php';
  class Article
 {
	  private $link=null;
	  
	  public function Article()
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
	  
	  public function Insert($title,$summary,$fulltext,$section)
	  {
		  $this->Connect();
		  $result=mysql_query("INSERT INTO `article`(`title`, `summary`, `fulltext`, `section`) VALUES ('$title','$summary','$fulltext','$section')");
		  return mysql_affected_rows();
	  }
	  public function Select_Count_Page()
	  {
		$this->Connect();
		$result=mysql_query("SELECT COUNT( `id` )FROM `article` WHERE archive ='0' AND `delete`='0' ORDER BY `id`");  
		return $result;
	  }	  
	  public function Select_Section_Page($page,$per_page)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `article` WHERE archive ='0' AND `delete`='0' ORDER BY `id` DESC LIMIT $page , $per_page ");  
		return $result;
	  }
	  public function SelectAll()
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `article` WHERE archive!='off' AND `delete`!='1'  ORDER BY `id` DESC ");  
		return $result;
	  }
	  public function SelectAll_IN_SECTION($id)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `article` WHERE archive ='0' AND `delete`='0' AND `section`='$id' ORDER BY `id` DESC");  
		return $result;
	  }
	  public function Select($id)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `article` WHERE id='$id'");  
		return $result;
	  }
	  public function Delete($DeleteId)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `article` SET `delete`='1'  WHERE id='$DeleteId'");
		  return mysql_affected_rows();
	  }
	  public function Archive($ArchiveId)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `article` SET `archive`='1'  WHERE id='$ArchiveId'");
		  return mysql_affected_rows();
	  }
	  public function Update($id,$title ,$summary,$fulltext,$section)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `article` SET `title`='$title',`summary`='$summary',`fulltext`='$fulltext',`section`='$section' WHERE id='$id'");
		  return mysql_affected_rows();
	  }
 }
?>