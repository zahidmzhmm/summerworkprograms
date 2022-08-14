<?php
session_start();
unset($_SESSION['userid']);
unset($_SESSION['username']);
unset($_SESSION['fullname']);
unset($_SESSION['emailid']);
unset($_SESSION['login_time']);
unset($_SESSION['last_login']);
unset($_SESSION['access_lvl']);
session_destroy();
//return_to_page('index.php');
header("Location: index.php");
?>