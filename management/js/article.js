// JavaScript Document
    $(document).ready(function() {
            $(".Article-Delete").click(function(){
			 var id =$(this).attr("DelId");
		       	$.ajax({
					   type:'POST',
					      url:"modules/includes/article.php",
						     data:"ArticleDelete="+id,
					              success: function(data){
									    $("#"+id).fadeOut(500);
									  
									  },error: function(a,b,c)
									  {
										  alert(a,b,c);
										  }
					}) 
			 })
			 

			$(".Article-Archive").click(function(){
				 var id=$(this).attr("DelId");
				   	$.ajax({
					   type:'POST',
					      url:"modules/includes/article.php",
						     data:"ArticleArchive="+id,
					              success: function(data){
									    $("#"+id).fadeOut(500);
									  
									  },error: function(a,b,c)
									  {
										  alert(a,b,c);
										  }
					}) 
				
				}) 
				
				
		   //---------------------------------------------//
		  //-------------------// Archive //-----------------//
		   $(".r_archive").click(function(){
			    var id=$(this).attr("DelId");
			       $.ajax({
					      type:'POST',
						     url:"modules/includes/archive.php",
							    data:"ArchiveRestore="+id,
								   success: function(data){
									       $("#"+id).fadeOut(500);
									   },error: function(a,b,c){
										     alert(c);
										   } 
					   });
			   
			   })
			   
			$(".del_archive").click(function(){
			    var id=$(this).attr("DelId");
			       $.ajax({
					      type:'POST',
						     url:"modules/includes/archive.php",
							    data:"ArchiveDel="+id,
								   success: function(data){
									       $("#"+id).fadeOut(500);
									   },error: function(a,b,c){
										     alert(c);
										   } 
					   });
			   
			   })
			   
		   //---------------------------------------------//
		  //-------------------// RecycleBin //-----------------//
		   $(".RecycleBin-Delete").click(function(){
			    var id=$(this).attr("DelId");
			       $.ajax({
					      type:'POST',
						     url:"modules/includes/RecycleBin.php",
							    data:"RecycleBinDelete="+id,
								   success: function(data){
									       $("#"+id).fadeOut(500);
									   },error: function(a,b,c){
										     alert(c);
										   } 
					   });
			   
			   })
			   
			$(".RecycleBin-Restore").click(function(){
			    var id=$(this).attr("DelId");
			       $.ajax({
					      type:'POST',
						     url:"modules/includes/RecycleBin.php",
							    data:"RecycleBinRestore="+id,
								   success: function(data){
									          $("#"+id).fadeOut(500);
									   },error: function(a,b,c){
										     alert(c);
										   } 
					   });
			   
			   }) 
		//-------------------------------------------------
   $(".btn_summary").click(function(){
	     $("#td_summary").css("display", "block"); 
		 $(".btn_summary").attr("disabled", "disabled");
	   });
    $("#close_summary").click(function(){
		$("#td_summary").css("display","none");
		$(".btn_summary").removeAttr("disabled");
		});	
	$('.showimage').click(function(){
			  $('.imagelist').show();
		})
	$('#close_image').click(function(){
			  $('.imagelist').css("display", "none");
		})	
    });