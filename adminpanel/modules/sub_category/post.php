<?php
	$menuname		= 	refine_data($_POST['sub_category']);
	$status			=	refine_data($_POST['status']);
	$type			=	refine_data($_POST['pagetype']);
	if($_POST['action']=='new'){
	if(sql::Select_single("SELECT * FROM kyl_category WHERE category_name='$menuname'")){
		$message='Sub-Category Name Already Exits';
		$return_url='home.php?modules=sub_category&action=new_category';	
	}else{
	$date=date("Y-m-d");
	$insert_sql="INSERT INTO kyl_category (
											category_name,
											registered_date,
											status
											)
			VALUES 
											(
											'$menuname',
											'$date',
											'$status'
											)";
if(sql::Query_Insert($insert_sql))
	{
		$message='Sub-Category Added Successfully';
		$return_url='home.php?modules=sub_category&action=sub_category';
	}
else
	{
		$message='Ann error occured while adding new category. Please try again.';
		$return_url=$_SERVER['HTTP_REFERER'];	
	}	}

}else{
	$id=$_GET['id']	;
	$menuname 		= 	refine_data($_POST['sub_category']);
	$status			=	refine_data($_POST['status']);
	$type			=	refine_data($_POST['pagetype']);	
		$update_sql="UPDATE kyl_category SET category_name='$menuname',status='$status' WHERE category_id='$id'";
		if(sql::update_query($update_sql))
		{
		$message='Sub-Category Updated Successfully';
			$return_url='home.php?modules=sub_category&action=sub_category';
			}else{
				$message='An error occured while updating this category. Please try again.';
				$return_url=$_SERVER['HTTP_REFERER'];	
			}
//}	
}	
	message($message);
	return_to_page($return_url);

?>
