<?php
ob_start();

include "bg-form-pdf.php";

$user_id = $_SESSION["user_id"];
$member_data = (object)\app\Sql::Select_single("select * from tbl_member where users_id='$user_id'");

$id = $member_data->users_id;
$medoo = new \Medoo\Medoo($database);
$medoo->update('tbl_member', ['participant_statement_link' => 'close'], ['users_id' => $id]);
$subject = "Summer Work Programs Participant Statement";
$msg = "Sender " . ucwords($member_data->fname) . ' ' . ucwords($member_data->lname) . ",";

$mail = new \app\Mailer();
$mail->mail->Subject = $subject;
$mail->mail->Body = $msg;
$mail->mail->addAddress(ADMIN_EMAIL2);
$mail->mail->AddStringAttachment(GetCompletedForm($member_data->users_id, "S", $_POST), $member_data->fname . " " . $member_data->lname . ".pdf");
$mail->mail->send();
header("location:profile.php");
return;
?>
