// JavaScript Document
   var inEditMode=false;
   var tid ="";
    $(document).ready(function() {
		
		$(".o").dblclick(function(){
		var name=$(this).attr("val");
	    $("#TfEdit").val(name);
		var id=$(this).attr("idval");
		tid=id;
		$("#hid").val(id);
		$("#edit").fadeIn(500);
			});
			
	$("#close").click(function(){
		$("#edit").fadeOut(500);
		});
///ویرایش اطلاعات
	/*$(".datarow").dblclick(function(){
		if(inEditMode)
		return;
		inEditMode=true;
	  $(this).children().each(function(){	
		 if ($(this).attr("class")!="opdel")
		{ 
		  var inp="<input class='inp {2}' type='text' value='{0}' old='{1}'/>";
			   inp=inp.replace("{0}", $(this).html()).replace("{1}", $(this).html()).replace("{2}",$(this).attr("shenase"));
			    $(this).html(inp);
		  }
		 });
		 $(this).children().last().html($(this).children().last().html()+$("#btn").html());
		         
		 
		 $(".cancel").click(function(){
			 inEditMode=false;
			 tr= $(this).parent().parent();
			 tr.children().each(function(){
				 if($(this).attr("class")!="opdel"){
					 $(this).html($(this).children().first().attr("old"));
					 $("#btn").css("dispaly","none");
					 }
				 });
			 });
		});*/
	$("#BtnEdit").click(function(){
		var id=$("#hid").val();
		 var name=$("#TfEdit").val();
	 	  	 
		 $.ajax({
				url:"modules/includes/Edit_section.php?id="+id+"&name="+name,
				 success:function(data){
                     //$(".main").load("Section.php");
					 //window.location="admin.php?page=Section.php";
					 $("#td"+tid).html(name);
					 $("#edit").fadeOut(500);
					 } ,
					 error : function(a,b,c){
					  	alert(c); 
					 }
				});
		});	
////حذف اطلاعات 		
        $("#del").click(function() {
			var ids="";
            $(".chdel:checked").each(function(){
			ids +=$(this).val()+",";
			});
           if (ids=="")
		   {
			   alert("عنوانی برای حذف انتخاب نشده است");
		   }
			ids = ids.substring(0, ids.length-1);
	   if(confirm("!مطمئنید که قصد حذف این رکورد را دارید؟ این غیرقابل‌بازگشت خواهد بود"))
		  {
		   $.ajax({
				url:"modules/includes/Delete_section.php?id="+ids,
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
		
//-----------------ثبت اطلاعات--------------------
//-----------------------------------------------
		$("#insert").click(function() {
			
			var name = $("#tfsection").val();
		   $.ajax({
				url:"modules/includes/new_section.php?name="+name,
				 success:function(data){
                           // alert("ثبت اطلاعات با موفقیت انجام شد");
						 window.location="admin.php?page=Section";

					 } ,
					 error : function(a,b,c){
					  	alert(c); 
					 }
				});
        });
		
//----------------------------
$("#Refresh").click(function(){
  window.location="admin.php?page=Section";
});
    });
	
