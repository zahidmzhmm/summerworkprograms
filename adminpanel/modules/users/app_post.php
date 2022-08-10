<?php

$appointment = $_POST['status'];


$id = $_GET['id'];
$appointment_status = $_POST['appointment_status'];
$appointment_approve_status = $_POST['appointment_approve_status'];
$appointment_date_time = $_POST['appointment_date_time'];
$appointment_type	=	$_POST['appointment_type'];
$mem_data              = Member::find( $id );
$mem_data->appointment_type = $appointment_type;
$mem_data->appointment_status = $appointment_status;
$mem_data->appointment_approve_status = $appointment_approve_status;
$mem_data->appointment_date_time = $appointment_date_time;
$success               = $mem_data->save();

if ( $success ) {
	$message    = 'Appointment Updated Successfully';
	$return_url = 'home.php?modules=users&action=users&id=' . $id . "";
} else {
	$message    = 'An error occured while updating this member. Please try again.';
	$return_url = $_SERVER['HTTP_REFERER'];
}

message( $message );
return_to_page( $return_url . "&pg=" . @$_REQUEST["pg"] );

?>
