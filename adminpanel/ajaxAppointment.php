<?php
error_reporting(0);
include dirname(__DIR__, 1) . '/app/main.php';
$type = @$_POST['appointment_type'];
$medoo = new \Medoo\Medoo($database);
$appointment_lists = $medoo->select('appointment_time_list', '*', ["type" => $type]);
$listOptions = '<option value="">Select Appointment Date</option>';
foreach ($appointment_lists as $appointment_list) {
    $appointment_list = (object)$appointment_list;
    $listOptions .= '<option value="' . $appointment_list->date_time . '">' . $appointment_list->date_time . '</option>';
}
echo json_encode(['status' => 'success', 'listOptions' => $listOptions]);
