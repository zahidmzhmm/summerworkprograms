<?php
error_reporting(1);
include __DIR__ . '/app/main.php';

if (isset($_POST['id'], $_POST['appointment_type'], $_POST['appointment_date_time'])) {
    $medoo = new Medoo\Medoo($database);
    $appointment_type = $_POST['appointment_type'];
    $appointment_date_time = Carbon\Carbon::parse($appointment_date_time);
    $id = $_POST['id'];
    $sql = "update tbl_member set `appointment_type`='$appointment_type', `appointment_date_time`='$appointment_date_time' where users_id='$id'";
    app\Sql::update($sql);
}
header("location:profile.php");