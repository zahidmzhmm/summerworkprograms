<?php
session_start();
ob_start();
include "third_party/DataAccess.php";
include("config.php");

include "third_party/mail/class.phpmailer.php";

include "bg-form-pdf.php";


$email = "admin@summerworkprograms.com";
$fromemail = 'donotreply@summerworkprograms.com';

$member_data = Member::find($_SESSION["user_id"]);

$id = $member_data->users_id;
$mem_data = Member::find($id);
$mem_data->participant_statement_link = 'close';
$success = $mem_data->save();
// 
//   $update_sql = "UPDATE `tbl_member` SET `participant_statement_link`='close' WHERE users_id ='$member_data->users_id'";
// sql::update_query($update_sql);
// print_r($member_data);
// return;
$subject = "Summer Work Programs Participant Statement";
$to = $email;
$msg = "Sender " . ucwords($member_data->fname) . ' ' . ucwords($member_data->lname) . ",";

$mail = new PHPMailer();
$mail->IsMail();
$mail->Subject = $subject;
$mail->AddAddress($to, "");
$mail->SetFrom("$fromemail", "Summer Work Programs");
$mail->Body = $msg;
$mail->AddStringAttachment(GetCompletedForm($member_data->users_id, "S", $_POST), $member_data->fname . " " . $member_data->lname . ".pdf");

if ($mail->Send()) {
}
header("location:profile.php");
return;
//		if(@mail($to, $subject, $msg, $headers)){
header("location:final_confirmation.php");
//     }
?>
