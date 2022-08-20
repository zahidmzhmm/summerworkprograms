<?php
include dirname(__DIR__) . '/app/main.php';
$session = new \app\Session();


################################# INPUT FILTER ############################################
$username = @$_POST['user_name'];
$password = @$_POST['user_password'];

################################# EMPTY CHECK #############################################
if ($username == '') {
    app\Web::message('Username is empty.');
    app\Web::return_to_page("adminindex.php");
}


if ($password == '') {
    app\Web::message('Username is empty.');
    app\Web::return_to_page("adminindex.php");
}


#################################################################################################

$admin_user = app\Sql::Select_single("select * from tbl_admin where username='$username' and password='$password'");

if ($admin_user && !empty($admin_user)) {
    $user_name = $admin_user['username'];
    $userid = $admin_user['user_id'];
    $userinfo = array(
        'admin_user_name' => $user_name,
        'admin_user_id' => $userid
    );
    $session::setSession($userinfo);
    app\Web::return_to_page('home.php');

} else {
    app\Web::return_to_page('adminindex.php?error=login');
}


?>
