<?php
  include_once 'includes/class/Template.php';
  include_once 'includes/class/gallery.php';
  $Template = new Template();
  $Template->load_file('Template/gallery/edit_album.html');
  
  if(isset($_GET['id']) and !empty($_GET['id']) and is_numeric($_GET['id']))  
  {
	 
   }
  
  
  
  $Template->print_template(); 
?>