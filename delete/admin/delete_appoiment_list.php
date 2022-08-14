<?php
include "includes/includes.php";

$conn = include('../mysql-db.php');

$id = $_GET["id"];

$conn = new mysqli($conn["servername"], $conn["username"], $conn["password"], $conn["dbname"]);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM appointment_time_list WHERE id=".$id;

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
echo '<script>location.href="home.php?modules=appointment&action=view"</script>';
header('Location: home.php?modules=appointment&action=view');
?>
