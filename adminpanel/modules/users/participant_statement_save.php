<?php

$status = $_POST['participant_statement_link'];
$id = $_GET['id'];
$mem_data = (object)app\Sql::Select_single("select * from tbl_member where users_id='$id'");

$update_sql = "UPDATE tbl_member SET participant_statement_link='$status' WHERE users_id ='$id'";
$success = app\Sql::update($update_sql);
if ($success) {
    $message = 'Participant statement link Updated Successfully';
    $return_url = 'home.php?modules=users&action=users&id=' . $id . "";
} else {
    $message = 'An error occured while updating this member. Please try again.';
    $return_url = $_SERVER['HTTP_REFERER'];
}

\app\Web::message($message);
\app\Web::return_to_page($return_url . "&pg=" . @$_REQUEST["pg"]);

?>
