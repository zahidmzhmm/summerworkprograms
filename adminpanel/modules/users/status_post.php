<?php

$status = $_POST['status'];


$id         = $_GET['id'];
$mem_data   = Member::find($id);

$mem_data->status=$status;
$success=$mem_data->save();

$update_sql = "UPDATE tbl_member SET status='$status' WHERE users_id ='$id'";

if ( $success ) {
	$message    = 'Status Updated Successfully';
	$return_url = 'home.php?modules=users&action=users&id=' . $id . "";
} else {
	$message    = 'An error occured while updating this member. Please try again.';
	$return_url = $_SERVER['HTTP_REFERER'];
}

message( $message );
return_to_page( $return_url . "&pg=" . @$_REQUEST["pg"] );

?>
