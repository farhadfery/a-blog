// JavaScript Document
$(document).ready(function(){
	
	$("#insert").click(function(){
		
		news = $("#news").val();
			
		$.ajax({
			type: "GET",
				url:"modules/includes/news.php",
				data:"news="+news,			
				 success:function(data){
					  alert(data);         					   
					   } ,
					 error : function(a,b,c){
					  	alert(c);
						return false; 
					 }
				});
				
		});
	
	
	});