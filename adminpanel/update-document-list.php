<?php
error_reporting(1);
include dirname(__DIR__, 1) . '/app/main.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("location:home.php?modules=users&action=users&pg=1");
}
$id = $_GET['id'];
$user_data = (object)app\Sql::Select_single("select * from tbl_member where users_id=$id");
$newList = $_POST['new_list'];
$oldList = $user_data->support_document_list;
$full_list = serialize(array_merge(unserialize($user_data->support_document_list), $newList));
$medoo = new Medoo\Medoo($database);
$medoo->update('tbl_member', ['support_document_list' => $full_list], ['users_id' => $id]);
header("location: home.php?modules=support_documents&action=view&id=" . $id);
