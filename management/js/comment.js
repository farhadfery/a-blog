// JavaScript Document
$(document).ready(function(){
    $('.insert').click(function(){
	  var UpId=$('#UpId').val();
	  var name=$('#name').val();
	  var email=$('#email').val();
	  var Upsubject=$('.Upsubject').val();	
	  var comment=$('#comment').val();
	  var answer=$('#answer').val();
      $.ajax({
		     type:'POST',
			    url:"modules/includes/comment.php",
				    data:"UpId="+UpId+"&Upsubject="+Upsubject+"&name="+name+"&email="+email+"&comment="+comment+"&answer="+answer,
					  success: function(data){
						  alert(data)
						  },error: function(a,b,c){
							  alert(b);
							  }
		   
		   });////ajax1
		   
		 $.ajax({
			type:'GET',
			   url:"modules/includes/Send_Email.php",
			         data:"email="+email+"&subject="+Upsubject+"&txtbody="+answer,
				  success: function(data){
					  alert(data);
					  window.location="?page=comment";
					  },error: function(a,b,c){
						  alert(c);
					   }
			});		
		});
		   

	
	});//document .ready
