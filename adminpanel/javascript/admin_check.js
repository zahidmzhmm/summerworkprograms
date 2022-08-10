// JavaScript Document
function check()
{
	if(document.admin.user_name.value=='')
		{
			alert('Username Can\'t be empty.');
			document.admin.user_name.focus();
			return false;
		}
		
	if(document.admin.user_password.value=='')
		{
			alert('Password Can\'t be empty.');
			document.admin.user_password.focus();
			return false;
		}
return true;



}

