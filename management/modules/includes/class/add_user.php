<?php

include_once 'db-config.php';
   class AddUser
 {
	  private $link=null;
	  
	  public function AddUser()
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
	  
	  public function Insert($UserName ,$Userpass)
	  {
		  $this->Connect();
		  $result=mysql_query("INSERT INTO `login`(`UserName`, `UserPass`) VALUES ('$UserName' ,'$Userpass')");
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
	  public function Select($id)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `login` WHERE id='$id'");  
		return $result;
	  }
	 public function SelectAll()
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `login` ");  
		return $result;
	  }
	  public function Delete($DeleteId)
	  {
		  $this->Connect();
		  $result=mysql_query("DELETE FROM `login` WHERE id='$DeleteId'");
		  return mysql_affected_rows();
	  }
	  public function Update($oldpass,$UserName ,$Userpass)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `login` SET `UserName`='$UserName',`UserPass`='$Userpass' WHERE `UserPass`='$oldpass'");
		  return mysql_affected_rows();
	  }
 }
?>