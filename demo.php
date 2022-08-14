<?php
session_start();
ob_start();
include "third_party/DataAccess.php";
include("config.php");

include "third_party/mail/class.phpmailer.php";

// include "bg-form-pdf.php";

//send activation code email to user
$mail1 = new PHPMailer();
$mail1->IsHTML(true);
$mail1->IsMail();
$mail1->SetFrom(NO_REPLY_EMAIL, "Summer Work Programs");
$mail1->Subject = "Verify Your Summer Work Registration";

$msg = "Dear parth patel,<br/><br/>

        
Welcome to Summer Work Programs!<br/><br/>

Thank you for starting our registration process.<br/><br/>
 
We are requesting that you validate your email address. This is required because of one of the following reasons<br/>

1. You are creating a new account and we want to be sure you a human not a spambot.<br/>

2. You are requesting to a new account with he Summer Work Programs and hence must be validated to complete the registration process.<br/><br/>

You need to complete this process in order to access the 2nd part of the complete registration form. To verify your email address and continue with your registration and account creation, please click this link:<br/><br/>

and enter your verification code:<br/><br/>

If the link above does not open, please copy the URL and paste it into the address box on your browser. Then enter the 'verification code'.<br/><br/>

Sincerely,<br/><br/>

__________<br/> 
Thank you !<br/> 
Summer Work Programs <br/>
Besor  Associates<br/>
Lagos State, Nigeria 100001<br/>
info@summerworkprograms.com<br/>
www.summerworkprograms.com.<br/>";
// $mail1->IsSMTP();
$mail1->MsgHTML($msg);

$mail1->AddAddress("parth.fadadu@yahoo.com", "parth");

@$mail1->Send();