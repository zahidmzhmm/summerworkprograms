<?php
include dirname(__DIR__) . '/app/main.php';

$session = new \app\Session();

if (isset($_POST['user-reg'])) {
    var_dump($_POST);
}