// JavaScript Document
$(document).ready(function() {
	 $(".del").click(function() {
		
			var id= $(this).attr("ImgId");
		$.ajax({
			type: "GET",
				url:"modules/includes/about.php",
				data:"id="+id,			
				 success:function(data){
					  $(".tbl"+id).fadeOut(900);          					   
					   } ,
					 error : function(a,b,c){
					  	alert(c);
						return false; 
					 }
				});
				
	});
	
	 $(".insert").click(function() {
		alert( $("#description").val());
		 alert("sfsfs");
		/*$.ajax({ 
			 url:"includes/about.php",
				data:"filename="+name,			
				 success:function(data){
		               alert(data);
					   } ,
					 error : function(a,b,c){
					  	alert(c); 
					 }
				});*/
	});	
	
	
});