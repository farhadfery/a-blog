// JavaScript Document
$(document).ready(function() {
	$("#btnsave").click(function(){
	var  check=$("#check").attr("checked");
	 if(check== "checked"){
	 var status="on";
	 }else{
		 var status="off";
	 }
	 var id="1";
	 	 var m=$("#note-text").val();
            $.ajax({
				url:"modules/includes/status.php?id="+id+"&message="+m+"&status="+status,
				 success:function(data){
						alert("OKK");
						   
						
					 } ,
					 error : function(a,b,c){
					  	alert(c); 
					 }
					 });
	});
	});
