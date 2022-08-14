<?php
include "includes/includes.php";

$conn = include('../mysql-db.php');

// Create connection
$conn = new mysqli($conn["servername"], $conn["username"], $conn["password"], $conn["dbname"]);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET["id"];
$new_list = $_POST["new_list"];

$latest_list = [];
foreach ($new_list as $item) {
    if ($item != "") {
        $latest_list[] = $item;
    }
}

$member = Member::find($id);
// $list = UploadDocumentList::first();
// print_r($member);
// return;
if ($member != null && $member->upload_document_list != null && $member->upload_document_list != "") {
    $full_list = serialize(array_merge(unserialize($member->upload_document_list), $latest_list));
} else {
    $full_list = serialize($latest_list);
    // $sql = "INSERT INTO tbl_member (upload_document_list) VALUES ('$latest_list')";
}
$member->upload_document_list = $full_list;
$member->save();
// $sql = "UPDATE tbl_member SET upload_document_list='$full_list' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

header('Location: home.php?modules=upload_documents&action=view&id=' . $id);
?>