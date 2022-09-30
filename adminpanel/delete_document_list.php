<?php
include "../app/main.php";
$id = $_GET["id"];
$count = $_GET["count"];

$member = app\Sql::Select_single("SELECT support_document_list FROM tbl_member where users_id='$id'");
if ($member) {
    $member = (object)$member;
    $list = unserialize($member->support_document_list);
    array_splice($list, $count - 1, 1);
    $list = serialize($list);
    $medoo = new Medoo\Medoo($database);
    $medoo->update('tbl_member', ['support_document_list' => $list], ['users_id' => $id]);
}
header('Location: home.php?modules=support_documents&action=view&id=' . $id);

?>