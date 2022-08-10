<?php
session_start();
include "third_party/DataAccess.php";
include "includes/includes.php";
include( 'third_party/mail/class.phpmailer.php' );
include( 'config.php' );
$conn = include('mysql-db.php');
$member = Member::find( $_SESSION["user_id"] );
// echo '<pre>';
// print_r($member);exit;
$appointment_date_time = $_POST["appointment_date_time"];
$appointment_type = $_POST['appointment_type'];
$id = $_POST["id"];

// Create connection
$conn = new mysqli($conn["servername"], $conn["username"], $conn["password"], $conn["dbname"]);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE tbl_member SET appointment_date_time='$appointment_date_time',appointment_type='$appointment_type',appointment_approve_status='pending' WHERE users_id='$id'";

if ($conn->query($sql) === TRUE) {
  //send notificaion email to admin
  $mail = new PHPMailer();
  $mail->IsHTML( true );
  $mail->IsMail();
  $mail->SetFrom( NO_REPLY_EMAIL );
  $mail->Subject = "A New Appointment Request";
  $msgAd = "<br>Dear Applicant,<br><br>";
  $msgAd .= "--------------------------\n";
  $msgAd .= "  You have made a new Appointment Request. If your request is approved, further details and confirmation will be sent to you.   \n\n";
  $msgAd .= "--------------------------\n";
  // $msgAd .= "<br/>Student ".$member->fname." ".$member->lname." choose ".$appointment_date_time." as ".$appointment_type." appointment date.";
  $msgAd .= "<br><br>" .
            "
     __________ <br />
     Thank you ! <br>
     Summer Work Programs <br>
     Besor Associates<br>
     Lagos State, Nigeria 100001<br>
     info@summerworkprograms.com<br>
     www.summerworkprograms.com.\n";
  $mail->MsgHTML( $msgAd );
  $address = $member->email;
  $mail->AddAddress( $address );
  @$mail->Send();


  /*Email for admin.*/
  $mail2 = new PHPMailer();
  $mail2->IsHTML( true );
  $mail2->IsMail();
  $mail2->SetFrom( NO_REPLY_EMAIL );
  $mail2->Subject = "A New Appointment Request";
  $msgAd = "<br>Dear Administrator,<br><br>";
  $msgAd .= "--------------------------\n";
  $msgAd .= "   A NEW Appointment Request    \n\n";
  $msgAd .= "--------------------------\n";
  $msgAd .= "<br/>You have received an appointment request from ".$member->fname." ".$member->lname." for ".$appointment_date_time." and the choice of ".$appointment_type." . Thank you.";
  $msgAd .= "<br><br>" .
            "
     __________ <br />
     Thank you ! <br>
     Summer Work Programs <br>
     Besor Associates<br>
     Lagos State, Nigeria 100001<br>
     info@summerworkprograms.com<br>
     www.summerworkprograms.com.\n";
  $mail2->MsgHTML( $msgAd );
  $address = ADMIN_EMAIL;
  $mail2->AddAddress( $address );
  @$mail2->Send();
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
echo '<script>alert("Your appointment request has been submitted for review");location.href="profile.php"</script>';
//header('Location: bg-form.php');
?>
