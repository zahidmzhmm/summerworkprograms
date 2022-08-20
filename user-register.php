<?php
session_start();

if (isset($_POST['register_posted']) && $_POST['register_posted'] == 'yes') {
    $_SESSION['res_country'] = $_POST["country"];
    $_SESSION['dob_year'] = $_POST['dob_year'];
    $_SESSION['dob_month'] = $_POST['dob_month'];
    $_SESSION['dob_day'] = $_POST['dob_month'];
}


if (!isset($_SESSION['res_country']) && empty($_SESSION['res_country'])) {
    header("location:signup.php");
}
include("includes/header.php");
?>

<section class="grid">

    <div class="block-border">

        <h1 class="information">User Registration</h1>

        <form name="registerform" id="registerform" method="post" action="activate.php"
              class="form block-content inline-label">
            <fieldset>

                <?php
                echo "invalid capta result: " . @$_SESSION["captcha_result"] == "-1";

                // echo "dddd: ".isset($_SESSION['eMsgg']);

                if (@$_SESSION['err_msg'] == 'EMAIL_EXIST'): ?>
                    <ul class="message error no-margin">
                        <li>
                            Your E-Mail Address already exists in our records - please log in with the e-mail address or
                            create an account with a different email address.
                        </li>
                    </ul>

                    <?php
                    @$_SESSION['err_msg'] = "";
                endif;

                ?>

                <p class="required">

                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" id="firstname" value="<?php echo @$_SESSION['firstname']; ?>"
                           class="input-type-text"/>
                    (as it appears on passport)
                </p>

                <p class="required">
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" id="lastname" value="<?php echo @$_SESSION['lastname']; ?>"
                           class="input-type-text"/>
                    (as it appears on passport)
                </p>


                <p class="required">

                    <label for="institution">Name of Institution: </label>
                    <?php $institution = @$_SESSION["institution"]; ?>

                    <select name="institution" class="" onChange="show()">

                        <option value=""> --- Select one ---</option>
                        <option value="Babcock University"
                                <?php if ($institution == 'Babcock University'): ?>selected="selected"<?php endif; ?>>
                            Babcock University
                        </option>
                        <option value="Bowen University"
                                <?php if ($institution == 'Bowen University'): ?>selected="selected"<?php endif; ?>>
                            Bowen University
                        </option>
                        <option value="Redeemers University"
                                <?php if ($institution == 'Redeemers University'): ?>selected="selected"<?php endif; ?>>
                            Redeemers University
                        </option>
                        <option value="Covenant University"
                                <?php if ($institution == 'Covenant University'): ?>selected="selected"<?php endif; ?>>
                            Covenant University
                        </option>
                        <option value="Others"
                                <?php if ($institution == "Others"): ?>selected="selected"<?php endif; ?>>Others
                        </option>
                    </select>
                </p>


                <p id="435" style=" <?php if ($institution != "Others")
                    echo "display:none;" ?> ">

                    <label for="email">Specify</label>

                    <input name="Others" type="text" class="text" value="<?php echo @$_SESSION['OtherInst']; ?>">

                </p>


                <p class="required">

                    <label for="email">Email Address:</label>

                    <input type="text" name="email" id="email" value="<?php echo @$_SESSION['email']; ?>"
                           class="input-type-text"/>
                    (Please DO NOT use Yahoo email)
                </p>

                <p class="required">

                    <label for="cemail">Confirm Email Address:</label>

                    <input type="text" name="cemail" id="cemail" value="<?php echo @$_SESSION['email']; ?>"
                           class="input-type-text"/>

                </p>

                <p class="required">

                    <label for="password">Password:</label>

                    <input type="password" name="password" id="password" class="input-type-text"/>

                </p>

                <p class="required">

                    <label for="repassword">Confirm Password:</label>

                    <input type="password" name="repassword" id="repassword" class="input-type-text"/>


                </p>


            </fieldset>


            <fieldset class="grey-bg no-margin">


                <button type="submit" onclick="return validateFields()">Next</button>

                <button class="red" onclick="window.location='cancel.php'; return false;">Cancel</button>


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

            document.registerform.Others.value = "";

        }

    }


    function creatpdf() {

        document.registerform.method = 'post';

        document.registerform.action = 'create-pdf-user.php';

        document.registerform.submit();

    }


</script>
