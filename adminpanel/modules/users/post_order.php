<?php
	
	$situation			=	refine_data($_POST['situation']);
	
	if($_POST['action']=='new'){
	
	

	}else{
	$id=$_GET['id'];
	$situation			=	refine_data($_POST['situation']);	
		$update_sql="UPDATE ak_user_order SET order_active='$situation' WHERE order_id ='$id'";
		
		if(sql::update_query($update_sql))
		{
			$message='Order  Updated Successfully';
			$return_url='home.php?modules=users&action=users';
			}else{
				$message='An error occured while updating this Order. Please try again.';
				$return_url=$_SERVER['HTTP_REFERER'];	
			}
//}	
}	
	message($message);
	return_to_page($return_url);

?>
