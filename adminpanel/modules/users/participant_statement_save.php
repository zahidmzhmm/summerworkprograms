<?php

$status = $_POST['participant_statement_link'];


$id         = $_GET['id'];
$mem_data   = Member::find($id);

$mem_data->participant_statement_link=$status;
$success=$mem_data->save();

$update_sql = "UPDATE tbl_member SET participant_statement_link='$status' WHERE users_id ='$id'";
//sql::update_query($update_sql);


if ( $success ) {
	$message    = 'Participant statement link Updated Successfully';
	$return_url = 'home.php?modules=users&action=users&id=' . $id . "";
} else {
	$message    = 'An error occured while updating this member. Please try again.';
	$return_url = $_SERVER['HTTP_REFERER'];
}

message( $message );
return_to_page( $return_url . "&pg=" . @$_REQUEST["pg"] );

?>
