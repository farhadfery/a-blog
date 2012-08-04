$(document).ready(function() {
     $('.slide').slideDown(2000);
 
	  $('#btn').click(function(){
        var User=$("#UserName").val().replace(/'/g,'');
        var Pass=$("#UserPass").val().replace(/'/g,'');
		    
		  if((User=="")||(Pass==""))
        {
           	$( "#dialog" ).html(".نام کار بری و رمز عبور را وارد کنید").fadeIn(1000)
			              .css("background-image","url(images/bg.png)").css("color","#FFF")
						  .delay(3000).fadeOut(1000);
						  exit();
        }
		
		$.ajax({
			  type:'POST',
			     url:"modules/includes/check.php",
				    data:"UserName="+User+"&UserPass="+Pass,
					success: function(data){
						if(data=="OK"){
							  $('.slide').slideUp(2000);
						 $( "#dialog" ).html(".ورود با موفقیت انجام شد").fadeIn(1000)
			                    .css("background-image","url(images/bg.png)").css("color","#FFF")
						                .delay(1000).fadeOut(1000,function(){window.location="admin.php"});	
						                         
						}
						if(data=="NoUser"){
					     	$( "#dialog" ).html(".کاربری با این مشخصات ثبت نشده است").fadeIn(1000)
			                   .css("background-image","url(images/bg.png)").css("color","#FFF")
						       .delay(3000).fadeOut(1000);
							}
						if(data=="Error")
						{
							$( "#dialog" ).html(".دوباره سعی کنید").fadeIn(1000)
			                   .css("background-image","url(images/bg.png)").css("color","#FFF")
						       .delay(3000).fadeOut(1000);	
						}
						}, 
						error :function(a,b,c){
							alert(c);
							}
			});

	  });
});


// 	 function Sendform()
//         {
//	   var u= document.getElementById("UserName").value;
//	   var p= document.getElementById("UserPass").value;
//	   if((u=="")||(p==""))
//	   {
//		   $( "#dialog" ).dialog({
//			   			show: "dorp",
//			            hide: "dorp"
//	   
//			   });
//	   }
//		else
//		   
//      		document.loginForm.submit();
//  }
    /////////////////////////..............................///////////////
