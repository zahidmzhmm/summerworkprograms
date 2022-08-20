<?php
error_reporting(1);
include dirname(__DIR__, 3) . '/app/main.php';
$id = $_GET['id'];
$admin_user = app\Sql::Select_single("select * from tbl_admin where user_id='$id'");

$new_data = array(
    "title" => $_POST['fullname'],
    "password" => $_POST['password'],
    "fromemail" => $_POST['fromemail'],
    "toemail" => $_POST['toemail'],
    "sitename" => $_POST['sitename'],
    "date" => date("Y-m-d"),
);

$medoo = new \Medoo\Medoo($database);

if (@$_POST['action'] == 'new') {
    $date = date("Y-m-d");
    /*$insert_sql = "INSERT INTO uio_faq (
												title,
												content,
												registered_date,
												status
												)
				VALUES 
												(
												'$title',
												'$details',
												'$date',
												'$status'
												)";
    if (sql::Query_Insert($insert_sql)) {
        $message = 'FAQ Added Successfully';
        $return_url = 'home.php?modules=faq&action=faq';
    } else {
        $message = 'Ann error occured while adding new FAQ. Please try again.';
        $return_url = $_SERVER['HTTP_REFERER'];
    }*/
    $message = 'Ann error occured while adding new FAQ. Please try again.';
    $return_url = $_SERVER['HTTP_REFERER'];
} else {
    $success = $medoo->update('tbl_admin', $new_data, ['user_id' => $id]);
    if ($success) {
        $message = 'Administrator Users  Updated Successfully';
        $return_url = 'home.php?modules=adminuser&action=adminuser';
    } else {
        $message = 'An error occured while updating this FAQ. Please try again.';
        $return_url = $_SERVER['HTTP_REFERER'];
    }
}
app\Web::message($message);
app\Web::return_to_page($return_url);
?>
