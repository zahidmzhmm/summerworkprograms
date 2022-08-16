<?php
session_start();

include "includes/includes.php";
$session = new session();


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


$admin_user = query("select * from tbl_admin where username='$username' and password='$password'");

$count = mysqli_num_rows($admin_user);
$data = mysqli_fetch_array($admin_user);

if ($count > 0) {
    $user_name = $data['username'];
    $userid = $data['user_id'];
    $userinfo = array(
        'admin_user_name' => $user_name,
        'admin_user_id' => $userid
    );
    $session::setSession($userinfo);
    return_to_page('home.php');

} else {
    return_to_page('adminindex.php?error=login');
}


?>
