<?php

require_once("app/main.php");
if ($_POST) {

    $secret = '0x9A2E2fa57f9925224dDA600cdbb231910A46d4F8';
    $verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret=' . $secret . '&response=' . $_POST['h-captcha-response'] . '&remoteip=' . $_SERVER['REMOTE_ADDR']);
    $responseData = json_decode($verifyResponse);
    if (!$responseData->success) {
        echo 0;
        exit;
    }
    //vars
    $subject = "SWT contact form (" . $_POST['name'] . ")";
    $to = "info@summerworkprograms.com";

    $from = $_POST['email'];

    //data
    $msg = "NAME: " . $_POST['name'] . "<br>\n";
    $msg .= "EMAIL: " . $_POST['email'] . "<br>\n";
    $msg .= "PHONE: " . $_POST['phone'] . "<br>\n";
    $msg .= "Subject: " . $_POST['subject'] . "<br>\n";
    $msg .= "Message: " . $_POST['message'] . "<br>\n";

    //Headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: <" . $from . ">\r\n";
    $headers .= 'Bcc: admin@summerworkprograms.com' . "\r\n";


    //send for each mail
    $status = "-1";

    if (mail($to, $subject, $msg, $headers)) {
        $status = 1;
    } else {
        $status = 0;
    }
    echo $status;
    exit;
}

$show_slider = false;
$page_title = 'Contact Us';
$page_titles_image = '3.jpg';
include "includes/header.php";
?>
<style>
    #recaptcha_response_field {
        height: 24px;
    }

    #recaptcha_privacy {
        margin-top: -10px;
    }
</style>

<script src='https://www.hCaptcha.com/1/api.js' async defer></script>
<section id="contact2" class="contact-2 pb-80">
    <div class="container">
        <div class="row">
            <!-- Contact panel #1 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="contact-panel">
                    <p class="contact__panel-desc">New User Documentation</p>
                    <a href="guide.pdf" class="btn btn__link">Registration Guide</a>
                </div><!-- /.contact-panel -->
            </div><!-- /.col-lg-3 -->
            <!-- Contact panel #2 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="contact-panel">
                    <p class="contact__panel-desc">Campus Representatives</p>
                    <a href="campus.php" class="btn btn__link">Campus Contacts</a>
                </div><!-- /.contact-panel -->
            </div><!-- /.col-lg-3 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /. Contact 2 -->

<!-- ==========================
    contact 1
=========================== -->
<section id="contact1" class="contact p-0">
    <div class="container-fluid col-padding-0">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="contact__banner align-v-h bg-overlay"
                     style="background-image: url(&quot;assets/images/banners/5.jpg&quot;); background-size: cover; background-position: center center;">

                    <div class="heading text-center" style="position:absolute">
                        <div class="heading__shape heading__shape-white"></div>
                        <h2 class="heading__title color-white">Questions? <br> Please Ask Us</h2>
                        <div class="heading__shape heading__shape-white"></div>
                    </div><!-- /.heading -->
                </div>
            </div><!-- /.contact-banner -->

            <div class="col-sm-12 col-md-6 col-lg-6 bg-gray">
                <div class="inner-padding">
                    <div class="heading">
                        <h2 class="heading__title lh-1 mb-50">Write To Us</h2>
                    </div><!-- /.heading -->
                    <p id="success" class="success">Your message has been sent successfully.</p>
                    <p id="error" class="warning">Error sending the message. Please try again later.</p>
                    <form id="contactForm" action="#" method="post">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control form-poshytip"
                                           title="Enter your full name" placeholder="Name">
                                </div>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" type="email"
                                           class="form-poshytip form-control" title="Enter your email address"
                                           placeholder="Email">
                                </div>
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="phone" id="phone" type="text" class="form-poshytip form-control"
                                           title="Enter your phone" placeholder="Phone">
                                </div>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="subject" id="subject" class="form-poshytip form-control"
                                           title="Enter subject" placeholder="Subject">
                                </div>
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group mb-30"><textarea name="message" id="message"
                                                                        class="form-poshytip form-control"
                                                                        title="Enter message"
                                                                        placeholder="Message"></textarea></div>
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="h-captcha col-sm-12" data-sitekey="bf00817b-aad5-4797-b063-6f100319a9cb">
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <button style="background-image:none" type="button" id="submit"
                                        class="btn btn__rounded btn__primary btn__hover3">Send Message
                                </button>
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->
                    </form>
                </div>
            </div><!-- /.col-lg-6 -->


        </div><!-- /.col-lg-6 -->

    </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.contact 1 -->


<?php include "includes/footer.php"; ?>
<script type="text/javascript" src="js/form-validation.js"></script>