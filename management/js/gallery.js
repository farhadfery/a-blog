// JavaScript Document
///------------------------حذف آلبوم
$(document).ready(function() {
    
	$('.Del').click(function(){
		 var id=$(this).attr('DelId');
		 $.ajax({
			    type:'post',
				    url:"modules/includes/gallery.php",
					   data:"DelSection="+id,
					      success: function(data){
							    $('.Div'+id).fadeOut(500);
							  },error: function(a,b,c){
								     alert(b);								  
								  }			 
			 });
		})
	//-------------------------------------------------------
   //-----------------حذف عکس ها	
   
     	$('.GDel').click(function(){
	          var id=$(this).attr('DelId');
		 $.ajax({
			    type:'post',
				    url:"modules/includes/gallery.php",
					   data:"DEL="+id,
					      success: function(data){
							     $('.Div'+id).fadeOut(500);

							  },error: function(a,b,c){
								     alert(b);								  
								  }			 
			 });
		})
	
	//---------------------------------------------------------
   //--------------------------ویرایش آلبوم--------------------------------
     /*   $('.Edit').click(function(){
		   var id = $(this).attr('EditId');
		     $.ajax({
			    type:'post',
				    url:"modules/includes/gallery.php",
					   data:"DEL="+id,
					      success: function(data){
							     $('.Div'+id).fadeOut(500);

							  },error: function(a,b,c){
								     alert(b);								  
								  }			 
			 });
		   
		    
		 });*/
   
//------------------------------------------------	
});