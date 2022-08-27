<?php
include __DIR__ . '/app/main.php';

function RandomString($length)
{

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for ($p = 0; $p < $length; $p++) {
        $string .= @$characters[mt_rand(0, strlen($characters))];
    }

    return $string;
}

$error_status = 1;


if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $member = \app\Sql::Select_single("select * from tbl_member where email='$email'");
    if (isset($member['status']) && $member['status'] != 'CLOSED') {
        if ($member || !empty($member)) {
            $_SESSION['err_msg'] = "EMAIL_EXIST";
            header("location:user-register.php");
            exit;
        }
    }
    //all good to go
    $_SESSION["firstname"] = $_POST["firstname"];
    $_SESSION["lastname"] = $_POST["lastname"];
    $_SESSION["institution"] = $_POST["institution"];
    $_SESSION["email"] = $_POST["email"];

    if ($_POST["institution"] == "Others") {
        $_SESSION["OtherInst"] = $_POST["Others"];
    }


    $password = md5($_POST["password"]);
    $actcode = RandomString(5);

    $member_data = [
        "res_countries" => $_SESSION["res_country"],
        "fname" => $_POST["firstname"],
        "lname" => $_POST["lastname"],
        "email" => $_POST["email"],
        "password" => $password,
        "dob" => sprintf("%s-%s-%s", $_SESSION["dob_year"], $_SESSION["dob_month"], $_SESSION["dob_day"]),
        "name_institution" => $_SESSION["institution"] == "Others" ? $_POST["Others"] : $_SESSION["institution"],
        "date_joined" => date('Y-m-d'),
        "acstatus" => "INACTIVE",
        "actcode" => $actcode,
        "status" => "INCOMPLETE",
        "referenceid" => $_POST["password"]

    ];
    $res_country = $_SESSION['res_country'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $dob = sprintf("%s-%s-%s", $_SESSION["dob_year"], $_SESSION["dob_month"], $_SESSION["dob_day"]);
    $name_ins = $_SESSION["institution"] == "Others" ? $_POST["Others"] : $_SESSION["institution"];
    $date_joined = date('Y-m-d');
    $acstatus = "INACTIVE";
    $status = "INCOMPLETE";
    $referenceid = ucwords(RandomString(5));

    $insert = \app\Sql::insert("INSERT INTO `tbl_member` (`res_countries`, `fname`, `lname`, `email`, `password`, `dob`, `name_institution`, `date_joined`, `acstatus`, `actcode`, `status`, `referenceid`)
                                                    values   ('$res_country', '$fname', '$lname', '$email', '$password', '$dob', '$name_ins', '$date_joined', '$acstatus', '$actcode', '$status', '$referenceid')");
    if ($insert) {

        $_SESSION['reg_status'] = 1;
        $error_status = 0;


        //send activation code email to user
        $mail1 = new \app\Mailer();
        $mail1->mail->Subject = "Verify Your Summer Work Registration";
        $msg = "Dear " . $_POST["firstname"] . " " . $_POST["lastname"] . ",<br/><br/>


Welcome to Summer Work Programs!<br/><br/>

Thank you for starting our registration process.<br/><br/>

We are requesting that you validate your email address. This is required because of one of the following reasons<br/>

1. You are creating a new account and we want to be sure you a human not a spambot.<br/>

2. You are requesting to a new account with he Summer Work Programs and hence must be validated to complete the registration process.<br/><br/>

You need to complete this process in order to access the 2nd part of the complete registration form. To verify your email address and continue with your registration and account creation, please click this link:<br/><br/>

<a href='" . SITE_URL . "activate.php?code=$actcode'>" . SITE_URL . "activate.php?code=$actcode</a><br/><br/>

and enter your verification code: $actcode<br/><br/>

If the link above does not open, please copy the URL and paste it into the address box on your browser. Then enter the 'verification code'.<br/><br/>

Sincerely,<br/><br/>

__________<br/>
Thank you !<br/>
Summer Work Programs <br/>
Besor  Associates<br/>
Lagos State, Nigeria 100001<br/>
info@summerworkprograms.com<br/>
www.summerworkprograms.com.<br/>";
        $mail1->mail->MsgHTML($msg);
        $mail1->mail->AddAddress($_POST["email"], $_POST["firstname"] . " " . $_POST["lastname"]);

        @$mail1->mail->send();


        //send notificaion email to admin
        $mail2 = new \app\Mailer();
        $mail2->mail->Subject = "A NEW REGISTRATION HAS BEEN DONE";

        $msgAd = "<br>Dear Administrator,<br><br>";
        $msgAd .= "--------------------------\n";
        $msgAd .= "   A NEW REGISTRATION HAS BEEN DONE    \n\n";
        $msgAd .= "--------------------------\n";
        $msgAd .= "<br><br>" .
            "
			User Details:<br/>
			<strong>Username:</strong> " . $_POST["email"] . "<br>
			<strong>Full Name:</strong>  " . $_POST["firstname"] . " &nbsp;  " . $_POST["lastname"] . "

			 <br/><br/>
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
        session_destroy();

    }
}

$act_token = @$_REQUEST["code"];
if ($act_token) $error_status = 0;
$show_slider = false;
include("includes/header.php");

?>

<section class="grid">
    <div class="block-border">
        <h1 class="information">Account Activation</h1>
        <div class="block-content">
            <?php if (@$_SESSION["err_msg"] == "INVALID_CODE"): ?>
                <ul class="message error no-margin">
                    <li> Invalid Activation code.</li>
                </ul>
                <?php
                unset($_SESSION['err_msg']);
            endif; ?>
            <p>
                <?php if (!$error_status): ?>
                <?php if (@$_SESSION['reg_status'] == 1):
                    unset($_SESSION['reg_status']);
                    ?>
                    Thank you very much for completing the registration to create a profile. A confirmation email has been sent to your address.
                <?php endif; ?>
                Enter the activation code from your email into the space below to complete the registration
                process.</p>
            <form class="form inline-small-label" method="post" action="register.php">
                <p>
                    <label for="act_code">Activation code:</label>
                    <input type="text" name="act_code"/>
                </p>
                <fieldset class="grey-bg no-margin">
                    <button type="submit"> Activate</button>
                </fieldset>
            </form>
        <?php else: ?>
            <h1 class="information">Error Occured</h1>
            <div class="block-content form">
                <p>An error occured during registration. Please click the button below to try again.</p>
                <fieldset class="grey-bg no-margin">
                    <button type="button" onClick="parent.location='user-register.php'">Retry</button>
                </fieldset>
            </div>
        <?php endif; ?>
        </div>
</section>
<?php include("includes/footer.php"); ?>
