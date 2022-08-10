<?php
include "includes/includes.php";

$conn = include('../mysql-db.php');

// Create connection
$conn = new mysqli($conn["servername"], $conn["username"], $conn["password"], $conn["dbname"]);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$new_date_time = $_POST["new_date_time"];
$type = $_POST['type'];
if($new_date_time != null && $new_date_time != ""){
	$sql = "INSERT INTO appointment_time_list (date_time,type) VALUES ('$new_date_time','$type')";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}
	$conn->close();
}
echo '<script>location.href="home.php?modules=appointment&action=view"</script>';
header('Location: home.php?modules=appointment&action=view');
?>
