// JavaScript Document
$(document).ready(function(){
	 $("#home").click(function(){
		$('.GalleryDiv').fadeIn(1000);
		$('.SlideShow').fadeIn(1000);
		$.ajax({
			type: "POST",
				url:"content.php",
				data:"id="+1,			
				 success:function(data){
				 $('#load').html('<img src="images/loader.gif"/>'); // <label>در حال بارگذاری</label>
					 $(".ContentDiv").fadeTo(100, 0.5,function(){
						 $('.ContentDiv').html(data);
						 	$(".ContentDiv").fadeTo(100,1); 
							  $('#load').html('');
						 });
						  					   
					   } ,
					 error : function(a,b,c){
					  	alert(c);
						return false; 
					 }
		
	}); 
		 });
		 
	 $("#Menu_gallery").click(function(){
		   window.location="images.php";
		 
		 })	 
	 $("#contact").click(function(){
		 $('.contact').slideDown(1000);
		 $('.MainDiv').fadeTo(1000,0.3);
		 $('.about').slideUp(1000);
		 })
	 $('.close').click(function(){
		 $('.contact').slideUp(1000);
		 $('.MainDiv').fadeTo(1000,1);
		 })
		 
	 $("#about").click(function(){
		 $('.about').slideDown(1000);
		 $('.MainDiv').fadeTo(1000,0.3);
		 $('.contact').slideUp(1000);
		 })
	 $('.close').click(function(){
		 $('.about').slideUp(1000);
		 $('.MainDiv').fadeTo(1000,1);
		 })		 
		 
$('#insert').click(function(){
	  var name=$('#UserName').val();
	  var email=$('#UserEmail').val();
	  var mess=$('#mess').val();
	  $.ajax({
			type: "POST",
				url:"management/modules/includes/comment.php",
				data:"UserName="+name+"&UserEmail="+email+"&mess="+mess,			
				 success:function(data){
					   	   $('#UserName').val("");
	                       $('#UserEmail').val("");
	                       $('#mess').val("");
						   $('.contact').slideUp(1000);
		                   $('.MainDiv').fadeTo(1000,1);
					   } ,
					 error : function(a,b,c){
					  	alert(c);
						return false; 
					 }
		
	});
	});
	
	
		$.ajax({
			type: "POST",
				url:"content.php",
				data:"id="+1,			
				 success:function(data){
				 $('#load').html('<img src="images/loader.gif"/>'); // <label>در حال بارگذاری</label>
					 $(".ContentDiv").fadeTo(100, 0.5,function(){
						 $('.ContentDiv').html(data);
						 	$(".ContentDiv").fadeTo(100,1); 
							  $('#load').html('');
						 });
						  					   
					   } ,
					 error : function(a,b,c){
					  	alert(c);
						return false; 
					 }
		
	}); 
		
 $(".p").click(function(){   
	 var id= $(this).attr("pageid");
		$.ajax({
			type: "POST",
				url:"content.php",
				data:"id="+id,			
				 success:function(data){
					  $('#load').html('<img src="images/loader.gif"/>'); // <label>در حال بارگذاری</label>
					 $(".ContentDiv").fadeTo(1000, 0.5,function(){
						   $('.ContentDiv').html(data);
						 	$(".ContentDiv").fadeTo(1000,1); 
							  $('#load').html('');
						 });
						  					   
					   } ,
					 error : function(a,b,c){
					  	alert(c);
						return false; 
					 }
		
	});	
	});

	})
	function showContact(id){
			$.ajax({
			type: "POST",
				url:"content.php",
				data:"Pid="+id,			
				 success:function(data){
					 $('#load').html('<img src="images/loader.gif"/>'); // <label>در حال بارگذاری</label>
					 $(".ContentDiv").fadeTo(1000, 0.5,function(){
						  $('.ContentDiv').html(data);
						 	 $(".ContentDiv").fadeTo(1000,1); 
							 $("#PageNum").hide();
							 $('#load').html('');
						 });  					   
					   } ,
					 error : function(a,b,c){
					  	alert(c);
						return false; 
					 }
		
	});
	 
	}		 
	//////////////////////////////////////////////////////////////////////////////
	
	$('.DivA').click(function(){
		     var id= $(this).attr('id');
			 $.ajax({
				     type:'post',
					    url:"content.php",
						   data:"SectionId="+id,
						      success: function(data){
								   $('#load').html('<img src="images/loader.gif"/>'); // <label>در حال بارگذاری</label>
								   $(".ContentDiv").fadeTo(1000, 0.5,function(){
									  $('.ContentDiv').html(data);
										 $(".ContentDiv").fadeTo(1000,1); 
										 $("#PageNum").hide();
										 $('#load').html('');
									 });  					   
								  
								  
								  },error: function(a,b,c){
									  
									  alert('b');
									  }
				 
				 });
		
		
		
		});
	
	
	///////////////////////////////////////////////////////////////////////////////
	 function comment(){
	 var subject=$("#subject").val();
     var name=$("#name").val();
	 var email=$("#email").val();
	 var comment_text=$("#comment_text").val();
	 if(email=="")
      {
		 alert ("لطفا ایمیل خود را وارد کنید"); 
		 exit(); 
	   }
	 	$.ajax({
			type: "POST",
				url:"management/modules/includes/comment.php",
				data:"subject="+subject+"&name="+name+"&email="+email+"&comment_text="+comment_text,			
				 success:function(data){
					 alert(data)
					       $("#name").val("");
						   $("#email").val("");
						   $("#comment_text").val("");
					// $('#load').html('<img src="images/loader.gif"/>'); // <label>در حال بارگذاری</label>
					 //$("#content").fadeTo(1000, 0.5,function(){
//						  document.getElementById("content").innerHTML = data;
//						 	 $("#content").fadeTo(1000,1); 
//							 $("#tdpage").hide();
//							 $('#load').html('');
//						 });  					   
					   } ,
					 error : function(a,b,c){
					  	alert(c);
						return false; 
					 }
		
	});
      }