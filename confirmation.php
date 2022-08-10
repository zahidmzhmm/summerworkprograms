<?php
    session_start();ob_start();
	include("config.php");

	include "third_party/mail/class.phpmailer.php";
	
	include "pdf.php";
	
	
	
	$email=$_SESSION['email'];
	$member_sql	=	"SELECT * FROM tbl_member WHERE email ='$email'";
 	$member_data=sql::Select_single($member_sql);
	$fromemail='donotreply@summerworkprograms.com';
	
	
	
	$subject="Summer Work Programs Registration";
		$to=$email;
		$msg="<br>Dear&nbsp;".ucwords($member_data['firstname']).'&nbsp;' .ucwords($member_data['lastname']).",<br><br>";
		$msg .= '<p class="gen_txt">Thank you for registering to participate in the Summer Work & Travel Program.<br /><br />
Your unique registration number is '.ucwords($member_data['referenceid']).' and your application is pending activation while the registration will be carefully reviewed within the next 24 hours. <br /><br />
If successful, you will receive a confirmation email from the Program Administrator containing details of your status and notice of a scheduled appointment for the application processing.<br /><br />
You will be required to upload a clear scanned copy of your student ID Card, Admission Letter and passport sized photograph within 24 hours of this registration to enable us complete the review of your registration. If these documents are not uploaded within the stipulated period, your registration may be cancelled and further access to the portal restricted.<br /><br />
Also, your Administrative Fee payment must be made no later than 48 hours before your scheduled appointment in order to confirm your participation and appointment slot. If we do not receive your payment confirmation before your appointment date, your slot will be forfeited and appointment cancelled.<br /><br />
Please, note that you are required to bring the printed copy of your submitted registration form, duly signed by you and your parent to our office within the stipulated period to process your application package with the following documents:<br /><br />
- Administrative Fee payment teller<br />
- 4 passport sized photographs<br />
- Signed parental consent letter<br />
- Photocopy of International Passport<br />
- CV/Resume<br /><br />

Thank you as we look forward to processing your application.<br /><br />
 Regards, <br>
Summer Work Programs Processing Team<br>
</p>';

		$mail=new PHPMailer();
		$mail->IsMail();
		$mail->Subject=$subject;
		$mail->AddAddress($to, $member_data["firstname"]." ".$member_data["lastname"]);		
		$mail->SetFrom("$fromemail", "Summer Work Programs");
		$mail->Body=$msg;
		$mail->AddStringAttachment(GetCompletedForm($member_data["users_id"], "S"), $member_data["firstname"]." ".$member_data["lastname"].".pdf");

		if($mail->Send())	
//		if(@mail($to, $subject, $msg, $headers)){
			header("location:final_confirmation.php");
  //     } 
	?>

<?php include("includes/headerNew.php");?>


  <section class="grid">
			<div class="block-border">
           <h1>Thank you ! </h1>

             <div class="block-content">
              Dear <?php echo ucwords($member_data['firstname']);?>,<br /><br />
Thank you for registering to participate in the Summer Work & Travel Program.<br /><br />
Your unique registration number is <?php echo ucwords($member_data['referenceid']);?> and your application is pending activation while the registration will be carefully reviewed within the next 24 hours. <br /><br />
If successful, you will receive a confirmation email from the Program Administrator containing details of your status and a scheduled appointment for the application processing.<br /><br />
You will be required to upload a clear scanned copy of your student ID Card, Admission Letter and passport sized photograph within 24 hours of this registration to enable us complete the review of your registration.If these documents are not uploaded within the stipulated period, your registration may be cancelled and further access to the portal restricted.<br /><br />
Please, also note that you are expected to bring the printed copy of your submitted registration form, duly signed by you and your parent to our office within the stipulated period to process your application package with the following documents:<br /><br />
- Administrative Fee payment teller<br />
- 4 passport sized photographs<br />
- Signed parental consent letter<br />
- Photocopy of International Passport<br />
- CV/Resume<br /><br />
</p></div>
            </div>
            </section>
			<?php include("includes/footerNew.php");?>
            