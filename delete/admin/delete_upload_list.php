<?php
include "includes/includes.php";

$conn = include('../mysql-db.php');

$id = $_GET["id"];
$count = $_GET["count"];

$member = Member::find( $id );
// $list = UploadDocumentList::first();
$list = unserialize($member->upload_document_list);
array_splice($list, $count-1, 1); 

$list = serialize($list);

$member->upload_document_list = $list;
$member->save();

// $conn = new mysqli($conn["servername"], $conn["username"], $conn["password"], $conn["dbname"]);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 

// $sql = "UPDATE upload_document_list SET data='$list' WHERE id=1";

// if ($conn->query($sql) === TRUE) {
//     echo "Record updated successfully";
// } else {
//     echo "Error updating record: " . $conn->error;
// }

// $conn->close();

header('Location: home.php?modules=upload_documents&action=view&id='.$id);
?>