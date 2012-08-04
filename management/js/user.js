// JavaScript Document
$(document).ready(function() {
	$('#name').focusout(function() {
        var name = $('#name').val();
		$.ajax({
			type:'GET',
			   url:"modules/includes/user.php",
			    data:"searchuser="+name,
				success: function(data){
					  if(data!=""){
						$('#mess').slideDown(1000).html(data).css('background-color','#FC7A9B');
						$('#name').focus();
					  }else{
						  $('#mess').slideUp(1000)
						  }
			      },
					error: function(a,b,c){
						alert(c);
						}
 			});
    });///#name
  $('#NewEmail').change(function(){
		   var email =$('#NewEmail').val();
			   $.ajax({
			       type:'GET',
		              url:"modules/includes/user.php",
						data:"ValidateEmail="+email,
					success: function(data){
						if(data !=""){
							$('#mess').slideDown(1000).html(data).css('background-color','#FC7A9B');
							$('#name').focus();
						  exit();
						}else{
							 $('#mess').slideUp(1000)
							}
						},error: function(a,b,c){
							alert(c);
							
							}	
						
				});
		   });        	
	
	$('#insert').click(function(){
		  var name=$('#name').val();
		  var pass=$('#NewPass').val();
		  var RPass=$('#NewRPass').val();
    	  var email=$('#NewEmail').val();
		  var image=$('#image').val();
		 if (name==""){
			
			$('#mess').slideDown(1000).html('نام کاربری را وارد کنید.').css('background-color','#FC7A9B').delay(5000).slideUp(1000);
			 exit();
			 } 
			 
		if(pass=="" || RPass==""){
			
		   $('#mess').slideDown(1000).html('رمز عبور را وارد کنید.').css('background-color','#FC7A9B').delay(5000).slideUp(1000);
			 exit();
			}	 
		if(email==""){
			
			$('#mess').slideDown(1000).html('ایمیل کاربر را وارد کنید.').css('background-color','#FC7A9B').delay(5000).slideUp(1000);
			 exit();
			}
				 
		if(pass==RPass){
			$.ajax({
			  type:'POST',
			       url:"modules/includes/user.php",
				      data:"UserName="+name+"&UserPass="+pass+"&UserEmail="+email+"&Image="+image,
					success: function(data){
						if(data=='1')
						{
						  $('#name').val("");
						  $('#NewPass').val("");
						  $('#NewRPass').val("");
						  $('#NewEmail').val("");
		                  $('#image').val("");
		                  $('#mess').slideDown(1000).html('کاربر با موفقیت ایجاد شد').css('background-color','#FC7A9B').delay(5000).slideUp(1000);
						}
						},error: function(a,b,c){
							alert(c);
							}  
			  });/////ajax
			  } else{
				   $('#mess').slideDown(1000).html('رمز را اشتباه وارد کردید.').css('background-color','#FC7A9B').delay(5000).slideUp(1000);
				  }//check pass
		
		})

//	   ////////////////////////////////////////////
$('#save').click(function(){
		  var name=$('#name').val();
		  var pass=$('#NewPass').val();
		  var RPass=$('#NewRPass').val();
    	  var email=$('#NewEmail').val();
		  var image=$('#image').val();
		  var id=$('#EditId').val()
		 if (name==""){
			
			$('#mess').slideDown(1000).html('نام کاربری را وارد کنید.').css('background-color','#FC7A9B').delay(5000).slideUp(1000);
			 exit();
			 } 
			 
		if(pass=="" || RPass==""){
			
		   $('#mess').slideDown(1000).html('رمز عبور را وارد کنید.').css('background-color','#FC7A9B').delay(5000).slideUp(1000);
			 exit();
			}	 
		if(email==""){
			
			$('#mess').slideDown(1000).html('ایمیل کاربر را وارد کنید.').css('background-color','#FC7A9B').delay(5000).slideUp(1000);
			 exit();
			}
				 
		if(pass==RPass){
			$.ajax({
			  type:'POST',
			       url:"modules/includes/user.php",
				      data:"EditUserName="+name+"&EditUserPass="+pass+"&EditUserEmail="+email+"&EditImage="+image+"&EditId="+id,
					success: function(data){
						if(data=='1')
						{
						  $('#name').val("");
						  $('#NewPass').val("");
						  $('#NewRPass').val("");
						  $('#NewEmail').val("");
		                  $('#image').val("");
						  window.location="admin.php?page=List_user";
						  }
						},error: function(a,b,c){
							alert(c);
							}  
			  });/////ajax
			  } else{
				   $('#mess').slideDown(1000).html('رمز را اشتباه وارد کردید.').css('background-color','#FC7A9B').delay(5000).slideUp(1000);
				  }//check pass
		
		})
	 ///////////////////////////////////////
	 $('.del').click(function(){
		var id = $(this).attr("DelId");
		  $.ajax({
			    type:'GET',
				  url:"modules/includes/user.php",
				    data:"DEL="+id,
					success: function(data){
 						$('.TBL'+id).fadeOut(1000)
						
						},error:function(a,b,c){
							alert(c)
							}
				  
			  });
		 
		 })
});