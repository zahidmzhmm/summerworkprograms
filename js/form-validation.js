jQuery(document).ready(function($) {

	// hide messages 
	$("#error").hide();
	$("#success").hide();
	
	// on submit...
	$("#contactForm #submit").click(function() {
		$("#error").hide();
		
		//required:
		
		//name
		var name = $("input#name").val();
		if(name == ""){
			$("#error").fadeIn().text("Name required.");
			$("input#name").focus();
			return false;
		}
		
		// email
		var email = $("input#email").val();
		if(email == ""){
			$("#error").fadeIn().text("Email required");
			$("input#email").focus();
			return false;
		}
		
		// phone
		var phone = $("input#phone").val();
		if(phone == ""){
			$("#error").fadeIn().text("Web required");
			$("input#phone").focus();
			return false;
		}
		
		
		// phone
		var institution = $("input#institution").val();
		if(institution == ""){
			$("#error").fadeIn().text("Institution required");
			$("input#institution").focus();
			return false;
		}
		
		// comments
		var comments = $("#comments").val();
		var comments = $("input#comments").val();
		if(institution == ""){
			$("#error").fadeIn().text("Comments required");
			$("input#comments").focus();
			return false;
		}
		
		// send mail php
		var sendMailUrl = "contact.php";
		
		//to, from & subject
		var to = $("#to").val();
		var from = $("#from").val();
		var subject = $("#subject").val();
		
						         
		// ajax
		$.ajax({
			type:"POST",
			url: sendMailUrl,
			data: $("#contactForm").serialize(),
			success: function(result){
					success(result);	
					
			}
		});
	});  
		
		
	// on success...
	 function success(status){
		
		 if(status==1){
	 		$("#success").fadeIn();
			 $("#contactForm").fadeOut();
		 }		 		 else if(status==2){		 		 $("#error").fadeIn().text("Prove that you are a human.");		}		 
		 else
		 	$("#error").fadeIn();	
	 	
	 }
	
    return false;
});

