<?php
error_reporting(1);
include dirname(__DIR__, 3) . '/app/main.php';

$appointment = $_POST['status'];
$id = $_GET['id'];
$appointment_status = $_POST['appointment_status'];
$appointment_approve_status = $_POST['appointment_approve_status'];
$appointment_date_time = $_POST['appointment_date_time'];
$appointment_type = $_POST['appointment_type'];

$medoo = new Medoo\Medoo($database);
$success = $medoo->update('tbl_member', [
    'appointment_type' => $appointment_type,
    'appointment_status' => $appointment_status,
    'appointment_approve_status' => $appointment_approve_status,
    'appointment_date_time' => $appointment_date_time,
    'appointment_fee' => $_POST['fee'],
], ['users_id' => $id]);

if ($success) {
    $message = 'Appointment Updated Successfully';
    $return_url = 'home.php?modules=users&action=users&id=' . $id . "";
} else {
    $message = 'An error occured while updating this member. Please try again.';
    $return_url = $_SERVER['HTTP_REFERER'];
}

app\Web::message($message);
app\Web::return_to_page($return_url . "&pg=" . @$_REQUEST["pg"]);

?>
