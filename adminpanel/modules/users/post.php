<?php
		$id=$_GET['id']	;
		$gender				=	refine_data($_POST['gender']);
		$firstname			= 	refine_data($_POST['firstname']);
		$lastname			= 	refine_data($_POST['lastname']);
		$address			=	refine_data($_POST['address']);
		$address2			=	refine_data($_POST['address2']);
		$city			    =	refine_data($_POST['city']);
		$postcode			=	refine_data($_POST['postcode']);
		$state			    =	refine_data($_POST['state']);
		$countries			=	refine_data($_POST['country']);
		$email        		=   refine_data($_POST['email']);
		$month_dob  		=   refine_data($_POST['month_dob']);
		$day_dob  			=   refine_data($_POST['day_dob']);
		$year_dob  			=   refine_data($_POST['year_dob']);
		$password			=	refine_data($_POST['password']);
		$access_level		=	refine_data($_POST['access_level']);
		$status				=	refine_data($_POST['status']);
		
		$q_update = "UPDATE tbl_member SET ";
		$q_update .= "gender = '$gender',";
		$q_update .= "countries_id = '$countries',";
		$q_update .= "firstname = '$firstname',";
		$q_update .= "lastname = '$lastname',";
		
		$q_update .= "email = '$email',";
		$q_update .= "address = '$address',";
		$q_update .= "address2 = '$address2',";
		$q_update .= "city = '$city',";
		$q_update .= "postcode = '$postcode',";
		$q_update .= "state = '$state',";
		$q_update .= "dob_month = '$month_dob',";
		$q_update .= "dob_day = '$day_dob', ";
		$q_update .= "dob_year = '$year_dob', ";
		$q_update .= "password = '$password', ";
		$q_update .= "access_lvl = '$access_level', ";
		$q_update .= "status = '$status' ";	
		$q_update .= "WHERE users_id='$id'";
		
		if(sql::update_query($q_update)){
			$message='Users  Updated Successfully';
			$return_url='home.php?modules=users&action=users';
		}else{
			$message='An error occured while updating.';
			$return_url=$_SERVER['HTTP_REFERER'];	
		}
		
	message($message);
	return_to_page($return_url);
?>
