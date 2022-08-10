<?php
include "includes/includes.php";

$conn = include('../mysql-db.php');

$appointment_date_time = $_POST["appointment_date_time"];
$id = $_POST["id"];
echo $id;
return;

// Create connection
$conn = new mysqli($conn["servername"], $conn["username"], $conn["password"], $conn["dbname"]);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE tbl_member SET appointment_date_time='$appointment_date_time' WHERE id=1";


if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>