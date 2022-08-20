<?php


namespace app;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Mailer
{
    public $mail;
    public $exception;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->exception = new Exception();
        $this->mail->SMTPDebug = SMTP_DEBUG;
        $this->mail->isSMTP();
        $this->mail->Host = SMTP_HOST;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = SMTP_USER;
        $this->mail->Password = SMTP_PASS;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->Port = SMTP_PORT;
        $this->mail->setFrom(SMTP_USER, "Summer Work Programs");
    }
}