<?php
error_reporting(1);
include dirname(__DIR__, 3) . '/app/main.php';
//########################################## Get Data ###############################
$id = $_GET['id'];
$medoo = new \Medoo\Medoo($database);
$medoo->delete('tbl_visa_history', ['user_id' => $id]);
$medoo->delete('tbl_travel_history', ['user_id' => $id]);
$medoo->delete('tbl_member', ['users_id' => $id]);

//###################################################################################

//############# Redirect #######################
\app\Web::return_to_page($_SERVER['HTTP_REFERER']);
?>