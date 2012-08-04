// JavaScript Document
$(document).ready(function() {
	 var Gid= $('#GID').val();
	 //$('.comment').load('gallery_comment.php?subject='+subject);
	 $.ajax({
		   type:"GET",
		     url:"gallery_comment.php",
			   data:"Gid="+Gid,
			   success: function(data){
				      $('.comment').html(data);
				   },error: function(a,b,c){
					   
					   alert(c);
					   return false;
					   }
		 });
    $('#insert').click(function(){
	  	var GID= $('#GID').val();
		var subject= $('#imagetitle').val();
		var name=$('#name').val();
		var email=$('#email').val();
        var text=$('#text').val();
        if(name==""){
			  $('#name').css("background-color","#CC0");
			  $('#name').focus();
			  exit();
			  }
		    $('#name').focusin(function(){
				 $('#name').css("background-color","#FFF");
				 $('#name').val("");

				});	  
        if(email==""){
			$('#email').css("background-color","#CC0");
			$('#email').focus();
			     exit();
			}
			$('#email').focusin(function(){
				  $('#email').css("background-color","#FFF");
			      $('#email').val("")
				});
				
		if(text==""){
			$('#text').css("background-color","#CC0");
			$('#text').focus();
			 exit();		
			}
			$('#text').focusin(function(){
				$('#text').css("background-color","#FFF");
				$('#text').val("");
				})
		
		$.ajax({
			type: "POST",
				url:"management/modules/includes/comment.php",
				data:"GID="+GID+"&Gsubject="+subject+"&name="+name+"&email="+email+"&text="+text,			
				 success:function(data){
		                  $('#text').val('');
						  $('#text').css("background-color","#FFF");
						  $('#email').val('');
						  $('#email').css("background-color","#FFF");
						  $('#name').val('');
						  $('#name').css("background-color","#FFF");
		                //$('.comment').load('gallery_comment.php?subject='+subject);
				 $.ajax({ type:"GET",
				            url:"gallery_comment.php",
							    data:"Gid="+Gid,
		                     success: function(data){
			                           $('.comment').html(data);
			                        },
							 error: function(a,b,c){
				                         alert(c);
				                         return false;
					                 } 
									 });
		  				  
						  } ,
					 error : function(a,b,c){
					  	alert(c);
						return false; 
					 }
		
	})
	
});	
});