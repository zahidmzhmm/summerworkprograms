<?php
error_reporting(1);
include dirname(__DIR__, 3) . '/app/main.php';
$status = $_POST['status'];
$id = $_GET['id'];
$mem_data = app\Sql::Select_single("select * from tbl_member where users_id='$id'");
$medoo = new \Medoo\Medoo($database);
$update = $medoo->update('tbl_member', ['status' => $status], ['users_id' => $id]);
if ($update) {
    $message = 'Status Updated Successfully';
    $return_url = 'home.php?modules=users&action=users&id=' . $id . "";
} else {
    $message = 'An error occured while updating this member. Please try again.';
    $return_url = $_SERVER['HTTP_REFERER'];
}

app\Web::message($message);
app\Web::return_to_page($return_url . "&pg=" . @$_REQUEST["pg"]);

?>
