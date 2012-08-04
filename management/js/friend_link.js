// JavaScript Document
	
$(document).ready(function(){
   
	$("#insert").click(function(){
		 var name = $("#name").val();
		 var tflink = $("#tflink").val();
			 if(name==""){
			 $("#name").css("background-color","#F60")
			 }else{$("#name").css("background-color","#FFF")}
		
	  		if(tflink==""){
			 $("#tflink").css("background-color","#F60")
			 }else{$("#tflink").css("background-color","#FFF")}
			 if(tflink=="" || name==""){
				 exit();
				   }
				   
		$.ajax({
			type: "GET",
				url:"modules/includes/freind_link.php",
				data:"name="+name+"&link="+tflink,			
				 success:function(data){
					 	document.location="admin.php?page=friend_link";
					  	 $("#name").val("");
						 $("#tflink").val("");          					   
					   } ,
					 error : function(a,b,c){
					  	alert(c);
						return false; 
					 }
				});
				  
			 
		 });
		 
	$("#del").click(function(){
           var ids="";
            $(".chdel:checked").each(function(){
			ids +=$(this).val()+",";
			
			});
           if (ids=="")
		   {
			   alert("عنوانی برای حذف انتخاب نشده است");
			   exit();
			   
		   }
			ids = ids.substring(0, ids.length-1);
		if(confirm("!مطمئنید که قصد حذف این رکورد را دارید؟ این غیرقابل‌بازگشت خواهد بود"))
		  {
			$.ajax({
				type: "GET",
				url:"modules/includes/freind_link.php",
				data:"id="+ids,
				 success:function(data){
					$(".chdel:checked").each(function(){
						      $(this).parent().parent().fadeOut(500);
													   
						   });
					 } ,
					 error : function(a,b,c){
					  	alert(c); 
					 }
				});
			  }
			 });
	 var Edit_Id = "" ;		 
	$(".edit").dblclick(function(){
		 $("#insert").css("display","none")
		 $("#edit").css("display","block")
	     $("#name").val($(this).attr("name"));
		 $("#tflink").val($(this).attr("Edit-link")); 
		  Edit_Id=$(this).attr("Edit-id")
		 
		});
		
	$("#edit").click(function(){
		 var id=Edit_Id;
		 var name = $("#name").val();
		 var Edit_Link = $("#tflink").val();
		$.ajax({
				type: "GET",
				url:"modules/includes/freind_link.php",
				data:"editid="+id+"&editname="+name+"&link="+Edit_Link,
				 success:function(data){
		     			 $("#insert").css("display","block")
						 $("#edit").css("display","none")
						 $("#name").val("");
						 $("#tflink").val("");
						 document.location="admin.php?page=friend_link";
					
					 } ,
					 error : function(a,b,c){
					  	alert(c); 
					 }
				});
		})			 
			 
});

	