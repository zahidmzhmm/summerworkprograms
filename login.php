<?php
session_start();
include("config.php");


if ($_POST) {    //echo "test";exit;

    $email = $_POST['email'];
    $password = md5($_POST['password']);


    include "third_party/DataAccess.php";


    $members = Member::find("all", array("conditions" => array("email=? and password=?", $email, $password)));
    $user_data = false;
    if (sizeof($members) > 0) {
        $user_data = $members[0];
    }


    if (!$user_data) {

        session_destroy();
        $err_msg = "INVALID_LOGIN";


    } else {

        //set session
        //check activation status
        if ($user_data->acstatus == "INACTIVE") {
            session_destroy();
            $err_msg = "ACCOUNT_INACTIVE";
        } else {

            $_SESSION['user_id'] = $user_data->users_id;
            //redirect to profile page
            header("location:profile.php");
            exit;
        }
    }


}

$hide_slider = true;
?>
<?php include("includes/header.php"); ?>

<section class="grid">
    <div class="block-border">
        <h1>User Login </h1>

        <form name="login" action="" method="post" class="block-content form inline-small-label">
            <?php
            if (@$err_msg == 'INVALID_LOGIN') :

                ?>
                <ul class="message error no-margin">
                    <li> Invalid username or password.</li>
                </ul>
            <?php
            elseif (@$err_msg == 'ACCOUNT_INACTIVE') :

                ?>
                <ul class="message error no-margin">
                    <li> You haven't activated your account yet. Please activate your account.</li>
                </ul>
            <?php endif; ?>
            <fieldset>
                <p>
                    <label for="email">Email Address:</label>
                    <input type="text" name="email" id="email" value="" class="input-type-text"/>
                </p>
                <p>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" value="" class="input-type-text"/>
                </p>
                <a href="forgotpassword.php" style="font-weight: bold;">Forgot Password</a>
                <input type="hidden" name="register_posted" value="yes">
            </fieldset>
            <fieldset class="grey-bg no-margin">
                <p class="input-with-button">
                    <button type="submit" name="submit" onclick=" return login_check();">Login</button>

                </p>
            </fieldset>
        </form>

    </div>
</section>
<?php include("includes/footer.php"); ?>
<SCRIPT>
    $('input[type="text"]').focus(function () {
        $(this).addClass("focus");
    });
    $('input[type="text"]').blur(function () {
        $(this).removeClass("focus");
    });

    $('input[type="password"]').focus(function () {
        $(this).addClass("focus");
    });
    $('input[type="password"]').blur(function () {
        $(this).removeClass("focus");
    });

</SCRIPT>
<script language="JavaScript" type="text/javascript">
    function login_check() {

        if (trim(document.login.email.value) == "") {
            alert("Empty E-mail not allowed!");
            document.login.email.focus();
            return false;
        }

        if (trim(document.login.password.value) == "") {
            alert("Please enter your password");
            document.registerform.password.focus();
            return false;
        }

        return true;
    }

    function trim(str) {
        return str.replace(/^\s+|\s+$/g, '');
    }
</script>
<script language="JavaScript" type="text/javascript">
    function validateFields() {

        if (trim(document.registerform.firstname.value) == "") {
            alert("First Name is required");
            document.registerform.firstname.focus();
            return false;
        }
        if (trim(document.registerform.lastname.value) == "") {
            alert("Last Name is required");
            document.registerform.lastname.focus();
            return false;
        }

        if (trim(document.registerform.institution.value) == "") {
            alert("Please Select institution");
            document.registerform.institution.focus();
            return false;
        }


        if (trim(document.registerform.email.value) == "") {
            alert("Email is required");
            document.registerform.email.focus();
            return false;
        }
        if (trim(document.registerform.cemail.value) == "") {
            alert("Please enter the confirmation email .");
            document.registerform.cemail.focus();
            return false;
        }

        if (document.registerform.email.value != document.registerform.cemail.value) {
            alert("Email doesn't match. Please enter it again.");
            document.registerform.cemail.focus();
            return false;
        }

        if (document.registerform.email.value.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1) {
            alert("Your email is not valid");
            document.registerform.email.focus();
            return false;
        }

        if (document.registerform.cemail.value.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1) {
            alert("Your confirmation email is not valid");
            document.registerform.cemail.focus();
            return false;
        }


        if (trim(document.registerform.password.value) == "") {
            alert("Password missing.");
            document.registerform.password.focus();
            return false;
        }

        if (trim(document.registerform.repassword.value) == "") {
            alert("Please enter the confirmation password .");
            document.registerform.repassword.focus();
            return false;
        }


        if (document.registerform.password.value != document.registerform.repassword.value) {
            alert("Password doesn't match. Please enter it again.");
            document.registerform.repassword.focus();
            return false;
        }
        if (document.registerform.password.value.length <= 5) {
            alert("Password should be greater than 6 .");
            return false;
        }

        if (trim(document.registerform.code.value) == "") {
            alert("Please enter the security code.");
            document.registerform.code.focus();
            return false;
        }


        return true;

    }

    function trim(str) {
        return str.replace(/^\s+|\s+$/g, '');
    }


    function show() {


        if (document.registerform.institution.value == "Others") {

            document.getElementById(435).style.display = 'block';


        } else {
            document.getElementById(435).style.display = 'none';

        }
    }

</script>
