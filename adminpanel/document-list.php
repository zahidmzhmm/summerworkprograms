<?php
include "includes/includes.php";

// $conn = include('../mysql-db.php');

// // Create connection
// $conn = new mysqli($conn["servername"], $conn["username"], $conn["password"], $conn["dbname"]);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 

$new_list = $_POST["new_list"];

$latest_list = [];
foreach ($new_list as $item) {
    if ($item != "") {
        $latest_list[] = $item;
    }
}
$id = $_GET["id"];

$list = Member::find($id);

$full_list = serialize(array_merge(unserialize($list->support_document_list), $latest_list));

$list->support_document_list = $full_list;
$list->save();

// $sql = "UPDATE support_document_list SET data='$full_list' WHERE id=1";

// if ($conn->query($sql) === TRUE) {
//     echo "Record updated successfully";
// } else {
//     echo "Error updating record: " . $conn->error;
// }

// $conn->close();

header('Location: home.php?modules=support_documents&action=view&id=' . $id);
?>