<?php
session_start();
include "includes/includes.php";
$type = @$_POST['appointment_type'];
$appointment_lists = AppointmentTimeList::find("all", array("type" => $type));
$listOptions = '<option value="">Select Appointment Date</option>';
foreach ($appointment_lists as $appointment_list) {
    $listOptions .= '<option value="' . $appointment_list->date_time->format('Y-m-d H:i') . '">' . $appointment_list->date_time->format('Y-m-d H:i') . '</option>';
}
echo json_encode(['status' => 'succ', 'listOptions' => $listOptions]);
