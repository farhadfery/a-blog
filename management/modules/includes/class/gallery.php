<?php
include_once 'db-config.php';
  class Gallery
 {
	  private $link=null;
	  
	  public function Gallery()
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
	  
	  public function Insert($name,$description,$add,$section,$sectionId,$PhotoGrapher)
	  {
		  $this->Connect();
		  $result=mysql_query("INSERT INTO 
		                         `gallery`(`image_name`, `image_description`,`image_add`,`image_section`,`Image_section_id`,`PhotoGrapher`) 
								   VALUES ('$name','$description','$add','$section','$sectionId','$PhotoGrapher')");
		  return mysql_affected_rows();
	  }
	  public function GAllery_Select_Count_Page()
	  {
		$this->Connect();
		$result=mysql_query("SELECT COUNT( `id` )FROM `gallery`");  
		return $result;
	  }	  
	  public function GAllery_Select_Section_Page($page,$per_page)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `gallery` ORDER BY `id` LIMIT $page , $per_page");  
		return $result;
	  }		  
	  public function SelectAll()
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `gallery` ORDER BY id DESC ");  
		return $result;
	  }
	  public function Select($id)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `gallery` WHERE id='$id'");  
		return $result;
	  }
	public function SelectAlbum($album)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `gallery` WHERE Image_section_id='$album'");  
		return $result;
	  }  
	  public function Delete($DeleteId)
	  {
		  $this->Connect();
		  $result=mysql_query("DELETE FROM `gallery` WHERE id in ($DeleteId) ");
		  return mysql_affected_rows();
	  }
	  public function Update($name,$description,$add,$section,$sectionId,$id)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `gallery` SET `image_name`='$name',`image_description`='$description',
		  `image_add`='$add',`image_section`='$section',`Image_section_id`=$sectionId WHERE id='$id'");
		  return mysql_affected_rows();
	  }
	  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  ///////////insert section 
	  public function Insert_Section($name,$image)
	  {
		  $this->Connect();
		  $result=mysql_query("INSERT INTO `section-gallery`(`name`,`album_cover`) VALUES ('$name','$image')");
		  return mysql_affected_rows();
	  }
	  public function Select_Count_Page()
	  {
		$this->Connect();
		$result=mysql_query("SELECT COUNT( `id` )FROM `section-gallery`");  
		return $result;
	  }	  
	  public function Select_Section_Page($page,$per_page)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `section-gallery` ORDER BY `id` LIMIT $page , $per_page");  
		return $result;
	  }
	  public function SelectAll_Section()
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `section-gallery` ");  
		return $result;
	  }
	  public function Select_Section($id)
	  {
		$this->Connect();
		$result=mysql_query("SELECT * FROM `section-gallery` WHERE id='$id'");  
		return $result;
	  }
	  public function Delete_Section($DeleteId)
	  {
		  $this->Connect();
		  $result=mysql_query("DELETE FROM `section-gallery` WHERE `id`=$DeleteId ");
		  return mysql_affected_rows();
	  }
	  public function Update_Section($name,$id)
	  {
		  $this->Connect();
		  $result=mysql_query("UPDATE `section-gallery` SET `name`='$name' WHERE id='$id'");
		  return mysql_affected_rows();
	  }

 }
?>