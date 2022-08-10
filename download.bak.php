<?php
session_start();
include "pdf.php";
include "third_party/DataAccess.php";


if(!@$_SESSION["user_id"] || @$_SESSION["user_id"]!=$_GET["id"]) { header("location:login.php");exit;}
$id=$_GET["id"];
GetCompletedForm($id,"D");

?>


