<?php
error_reporting(1);
include __DIR__ . '/app/main.php';

if (isset($_POST['id'], $_POST['appointment_type'], $_POST['appointment_date_time'])) {
    $medoo = new Medoo\Medoo($database);
    $appointment_type = $_POST['appointment_type'];
    $appointment_date_time = Carbon\Carbon::parse($appointment_date_time);
    $id = $_POST['id'];
    $userName = (object)app\Sql::Select_single("select * from tbl_member where users_id='$id'");
    $sql = "update tbl_member set `appointment_type`='$appointment_type', `appointment_date_time`='$appointment_date_time' where users_id='$id'";
    app\Sql::update($sql);
    $mail2 = new \app\Mailer();
    $mail2->mail->Subject = "A NEW APPOINTMENT REQUEST";

    $msgAd = "<br>Dear Administrator,<br><br>";
    $msgAd .= "--------------------------\n";
    $msgAd .= "   A NEW Appointment Request    \n\n";
    $msgAd .= "--------------------------\n";
    $msgAd .= "<br><br>" .
        "You have received an appointment request from ";
    $msgAd .= $userName->fname . ' ' . $userName->lname;
    $msgAd .= " for ";
    $msgAd .= $appointment_date_time;
    $msgAd .= " and the choice of online. Thank you.";
    $msgAd .= "<br/><br/>
			 __________ <br />
			 Thank you ! <br>
			 Summer Work Programs <br>
			 Badabeat Associates<br>
			 Lagos State, Nigeria 100001<br>
			 info@summerworkprograms.com<br>
			 www.summerworkprograms.com.\n";

    $mail2->mail->MsgHTML($msgAd);
    $mail2->mail->AddAddress(ADMIN_EMAIL);
    @$mail2->mail->send();
}
header("location:appointmentd.php");