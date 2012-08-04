// JavaScript Document
$(document).ready(function() {
    $('#send').click(function(){
		var email=$('#txtemail').val();
		var subject=$('#txtsubject').val();
		var txtbody=$('#txtbody').val();
		
        $.ajax({
			type:'GET',
			   url:"modules/includes/Send_Email.php",
			      data:"email="+email+"&subject="+subject+"&txtbody="+txtbody,
				  success: function(data){
					  alert(data);
					  
					  },error: function(a,b,c){
						  alert(c);
					   }
			});		
		});
});