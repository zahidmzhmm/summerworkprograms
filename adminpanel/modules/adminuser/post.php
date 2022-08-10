<?php

$id=$_GET['id']	;
$admin_user=Admin::find($id);

$new_data=array(
	"title"=>$_POST['fullname'],
	"password"=>$_POST['password'],
	"fromemail"=>$_POST['fromemail'],
	"toemail"=>$_POST['toemail'],
	"sitename"=>$_POST['sitename'],
	"date"=>date("Y-m-d"),


);


	if(@$_POST['action']=='new'){
		$date=date("Y-m-d");
		$insert_sql="INSERT INTO uio_faq (
												title,
												content,
												registered_date,
												status
												)
				VALUES 
												(
												'$title',
												'$details',
												'$date',
												'$status'
												)";
		if(sql::Query_Insert($insert_sql)){
			$message='FAQ Added Successfully';
			$return_url='home.php?modules=faq&action=faq';
		}else{
			$message='Ann error occured while adding new FAQ. Please try again.';
			$return_url=$_SERVER['HTTP_REFERER'];	
		}	
	}else{

		$success=$admin_user->update_attributes($new_data);
		if($success){
			$message='Administrator Users  Updated Successfully';
			$return_url='home.php?modules=adminuser&action=adminuser';
		}else{
			$message='An error occured while updating this FAQ. Please try again.';
			$return_url=$_SERVER['HTTP_REFERER'];	
		}
	}	
	message($message);
	return_to_page($return_url);
?>
