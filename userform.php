<?php
include "app/main.php";

if (!@$_SESSION["admin_user_id"] && (!@$_SESSION["user_id"] && @$_SESSION["user_id"] != $_GET["id"])) {
    // || @$_SESSION["user_id"] != $_GET["id"]
    header("location:login.php");
    exit;
}
$id = $_GET["id"];
$web = new \app\Web();
$web->GetCompletedForm($id, "D");

?>


