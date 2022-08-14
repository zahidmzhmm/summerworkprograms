<?php
session_start();

include "includes/includes.php";


################################# INPUT FILTER ############################################
$username = @$_POST['user_name'];
$password = @$_POST['user_password'];

################################# EMPTY CHECK #############################################
if ($username == '') {
    message('Username is empty.');
    return_to_page("adminindex.php");
}


if ($password == '') {
    message('Username is empty.');
    return_to_page("adminindex.php");
}


#################################################################################################


$admin_user = Admin::find_all_by_username_and_password($username, $password, array("limit" => 1));


if (sizeof($admin_user) > 0) {
    $raw = $admin_user[0];
    $user_name = $raw->username;
    $userid = $raw->user_id;
    $userinfo = array(
        'admin_user_name' => $user_name,
        'admin_user_id' => $userid
    );

    session::setSession($userinfo);

    return_to_page('home.php');


} else {
    return_to_page('adminindex.php?error=login');
}


?>
