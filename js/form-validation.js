jQuery(document).ready(function($){
    // hide messages
    $("#error").hide();
    $("#success").hide();

    // on submit...

    $("#contactForm #submit").click(function(){
        $("#error").hide();

        var name = $("input#name").val();
        if(name == ""){
            $("#error").fadeIn().text("Name required.");
            $("input#name").focus();
            return false;
        }

        var email = $("input#email").val();
        if(email == ""){
            $("#error").fadeIn().text("Email required");
            $("input#email").focus();
            return false;
        }

        var phone = $("input#phone").val();
        if(phone == ""){
            $("#error").fadeIn().text("Phone required");
            $("input#phone").focus();
            return false;
        }

        var subject = $("input#subject").val();
        if(subject == ""){
            $("#error").fadeIn().text("Subject required");
            $("input#subject").focus();
            return false;
        }

        var message = $("textarea#message").val();
        if(message == ""){
            $("#error").fadeIn().text("Message required");
            $("input#message").focus();
            return false;
        }

        // send mail php
        var sendMailUrl = "contact.php";
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
        }
        else {
            $("#error").fadeIn().text("Please click checkbox.");
        }
    }
    return false;
});