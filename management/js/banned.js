// JavaScript Document
$(document).ready(function(){
	$('#insert').click(function(){
	
	var ip = $('.textip').val();
	var mass = $(".mass").val();

		$.ajax({
			type: "GET",
				url:"includes/banned.php",
				data:"ip="+ip+"&mass="+mass,			
				 success:function(data){
					
		    		  $('.textip').val("");
					  $('.mass').val("");        					   
					   } ,
					 error : function(a,b,c){
					  	alert(c);
						return false; 
					 }
				});
		
	});
	//////////----------------------////////////////
	$('#del').click(function(){
		var id=$(this).attr("Delid");
		$.ajax({
			type: "GET",
				url:"includes/banned.php",
				data:"id="+id,			
				 success:function(data){
                             $('#del').parent().parent().fadeOut(500);       					   
					   } ,
					 error : function(a,b,c){
					  	alert(c);
						return false; 
					 }
				});
		
		});
	
	
	});
