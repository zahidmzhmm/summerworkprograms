// JavaScript Document
    function checkForm(){
                 theform=document.form1
				 
				if (theform.main_category.value==""){ 
                     alert("Delivery Method  field is required")
                     theform.main_category.focus()
                     return false;
				   
               }
				 if (theform.modelname.value==""){ 
                     alert("Category Field is required")
                     theform.modelname.focus()
                     return false;
				               
                }
				if(theform.Password.value!=theform.confirmPassword.value){
				
				//if (theform.confirmPassword.value==""){ 
                     alert("Password differs. Please, enter new password again.")
					 theform.Password.focus()
                     theform.Password.value="";
					 theform.confirmPassword.value="";
                     return false;
				               
                }
				
				    if (theform.txtName.value==""){ 
                     alert("First name is required")
                     theform.txtName.focus()
                     return false;
                }
                  if (theform.txtlastname.value==""){ 
                     alert("Last name is required")
                     theform.txtlastname.focus()
                     return false;  
                }
                     if (theform.txthomephone.value==""){ 
                     alert("Phone number is required")
                     theform.txthomephone.focus()
                     return false;
                }
                     if (theform.txtEmail.value==""){ 
                     alert("email address is required")
                     theform.txtEmail.focus()
                     return false;
                }
                    
     // Check that the form has an email specified in the field called "email"
     var emailaddress = theform.txtEmail.value;
var emailexp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.(([a-z]{2,3})|(aero|coop|info|museum|name))$/i;
if (!emailexp.test(emailaddress)) { 
alert('Email address is missing or invalid, please check your email address')
theform.txtEmail.focus()
;return false;
}
                    
                

<!--
//Validate Emai
;function isEmail(strFieldName,strMsg)
{
     var strEmail = strFieldName.value;
     var bolValid = true;
     if(strEmail.length == 0){
          bolValid = false;
     }
     if(strEmail.length < 7){
          bolValid = false;
     }
     if(strEmail.lastIndexOf(" ") >0){
          bolValid = false;
     }
     var intLastDot = strEmail.lastIndexOf(".")
     if(intLastDot == -1 ||  strEmail.length - intLastDot >4){
          bolValid = false;
     }
     var intAt = strEmail.lastIndexOf("@")
     if(intAt == -1 ||  strEmail.length - intAt < 5){
          bolValid = false;
     }
     if(! bolValid){
          alert(strMsg.toUpperCase() +" is either empty or is not in the correct format");
               strFieldName.focus();
               }
     return bolValid;
}
function validateForm(fObj){
     if(!isEmail(fObj["email"],"email")){
          return false;
     }
     return true;
}

}


// -->
