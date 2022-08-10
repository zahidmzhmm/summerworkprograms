<?php
include('adminpanel/functions/functions.php');
include('adminpanel/config/class.config.php');
include('adminpanel/classes/class.sql.php');
include "config.php";
include "mail/class.phpmailer.php";

session_start();

if ($_POST) {
    $act_codehash = md5($_POST["act_code"]);
    $data = sql::update_query("update tbl_member SET acstatus='ACTIVE' WHERE acstatus='INACTIVE' and actcode ='$act_codehash'");
    if (!$data) {
        @$_SESSION["err_msg"] = "INVALID_CODE";
        session_destroy();
        header("location:activate.php");
        exit;
    }


    $data = sql::Select_single("SELECT * FROM tbl_member WHERE actcode ='$act_codehash'");
    @$_SESSION["user_id"] = @$data["users_id"];


    //send welcome email to users
    $mail1 = new PHPMailer();
    //$mail1->SMTPDebug  =1;
    $mail1->IsHTML(true);
    $mail1->IsMail();
    //$mail1->SMTPAuth   = true;
    //		$mail1->Host       = HOST_NAME;
//			$mail1->Port       = SMTP_PORT;               
//			$mail1->Username   = NO_REPLY_EMAIL;
//			$mail1->Password   = AUTH_KEY;
    $mail1->SetFrom(NO_REPLY_EMAIL, "Summer Work Programs");
    $mail1->Subject = "Welcome to Summer Work Programs";

    $msg = "<p>Dear " . $data["firstname"] . " " . @$data["lastname"] . ",</p>
			 <br><p>Your account is now activated.</p></br>
			 
			  <p> --------------------------\n
			   YOUR  LOGIN DETAILS    \n
			   --------------------------\n</p>
			<p>  Welcome to Summer Work Programs.</p>  
		<p>Username and password to access the site is:<br/><br/>
		<strong>Username:</strong> " . @$data["email"] . "<br>
		<strong>Password:</strong> " . @$data["referenceid"] . "<br>		
		
		 </p>
		 <p>__________ <br />
		  Thank you ! <br>
		 Summer Work Programs <br>
		 Besor Associates<br>
		 Lagos State, Nigeria 100001<br>
		 info@summerworkprograms.com<br>
		 www.summerworkprograms.com.</p>";

    $msg = preg_replace("[\]", '', $msg);
    $mail1->MsgHTML($msg);

    $address = $data["email"];
    $mail1->AddAddress($address, @$data["firstname"] . " " . @$data["lastname"]);

    @$mail1->Send();


}

if (!@$_SESSION["user_id"])
    header("location:index.php");


$data = sql::Select_single("SELECT * FROM tbl_member WHERE users_id ='" . @$_SESSION["user_id"] . "'");


?>
<?php include("includes/header.php"); ?>
<link rel="stylesheet" type="text/css" href="css/flick/jquery-ui-1.8.24.custom.css">
<section class="grid">
    <div class="block-border">
        <h1 class="information">User Registration</h1>
        <form name="registerform" id="registerform" method="post" action="thankyou.php" enctype="multipart/form-data"
              class="form block-content inline-label">

            <fieldset>

                <?php if (@$_SESSION['err_msg'] == 'EMAIL_EXIST'): ?>


                    <ul class="message error no-margin">
                        <li>
                            Your E-Mail Address already exists in our records - please log in with the e-mail address or
                            create an account with a different email address.
                        </li>
                    </ul>

                    <?php
                    session_unregister("err_msg");
                endif; ?>


                <legend>PERSONAL DETAILS</legend>
                <p class="required">
                    <label for="firstname">First Name (as it appears on passport):</label>
                    <input type="text" name="fname" id="firstname" value="<?php echo @$data['firstname']; ?>"
                           class="input-type-text"/>
                </p>
                <p>
                    <label for="midname">Middle Name :</label>
                    <input type="text" name="midname" id="midname" value="<?php echo @$data['midname']; ?>"
                           class="input-type-text"/>
                </p>
                <p class="required">
                    <label for="lastname">Last Name (as it appears on passport):</label>
                    <input type="text" name="lname" id="lastname" value="<?php echo @$data['lastname']; ?>"
                           class="input-type-text"/>
                </p>

                <p class="required">
                    <label for="dob_month">Date of Birth: </label>
                    <select name="dob_month" id="dob_month">
                        <option value="">Month</option>
                        <option value="1" <?php if (@$data["dob_month"] == '1'): ?>selected="selected"<?php endif; ?>>
                            January
                        </option>
                        <option value="2" <?php if (@$data["dob_month"] == '2'): ?>selected="selected"<?php endif; ?>>
                            February
                        </option>
                        <option value="3" <?php if (@$data["dob_month"] == '3'): ?>selected="selected"<?php endif; ?>>
                            March
                        </option>
                        <option value="4" <?php if (@$data["dob_month"] == '4'): ?>selected="selected"<?php endif; ?>>
                            April
                        </option>
                        <option value="5" <?php if (@$data["dob_month"] == '5'): ?>selected="selected"<?php endif; ?>>
                            May
                        </option>
                        <option value="6" <?php if (@$data["dob_month"] == '6'): ?>selected="selected"<?php endif; ?>>
                            June
                        </option>
                        <option value="7" <?php if (@$data["dob_month"] == '7'): ?>selected="selected"<?php endif; ?>>
                            July
                        </option>
                        <option value="8" <?php if (@$data["dob_month"] == '8'): ?>selected="selected"<?php endif; ?>>
                            August
                        </option>
                        <option value="9" <?php if (@$data["dob_month"] == '9'): ?>selected="selected"<?php endif; ?>>
                            September
                        </option>
                        <option value="10" <?php if (@$data["dob_month"] == '10'): ?>selected="selected"<?php endif; ?>>
                            October
                        </option>
                        <option value="11" <?php if (@$data["dob_month"] == '11'): ?>selected="selected"<?php endif; ?>>
                            November
                        </option>
                        <option value="12" <?php if (@$data["dob_month"] == '12'): ?>selected="selected"<?php endif; ?>>
                            December
                        </option>
                    </select>
                    <select name="dob_day" id="dob_day">

                        <option value="">Day</option>
                        <?PHP


                        for ($i = 1; $i <= 31; $i++) {
                            $selected = ($i == $data["dob_day"]) ? "selected=\"selected\"" : "";
                            echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
                        }
                        ?>
                    </select>
                    <select name="dob_year" id="dob_year">
                        <option value="">- Years -</option>
                        <?PHP
                        for ($year = date('Y') - 17; $year >= 1993; $year--) {
                            $selected = ($year == $data["dob_year"]) ? "selected=\"selected\"" : "";
                            echo '<option value="' . $year . '" ' . $selected . '>' . $year . '</option>';
                        }
                        ?>
                    </select>
                </p>
                <p class="required">
                    <label for="age">Age:</label>
                    <input type="text" name="age" id="age" value="<?php echo @$data['age']; ?>" class="input-type-text"
                           size="2"/>
                </p>
                <p class="required">
                    <label for="gender">Gender:</label>
                    <select name="gender" class="">
                        <option value=""> --- Select one ---</option>
                        <option value="male"
                                <?php if (@$data['gender'] == 'male'): ?>selected="selected"<?php endif; ?>>Male
                        </option>
                        <option value="female"
                                <?php if (@$data['gender'] == 'female'): ?>selected="selected"<?php endif; ?>
                        >Female
                        </option>
                    </select>
                </p>
                <p class="required">
                    <label for="birth_country">Place of Birth:</label>
                    <?php createcountrycombo(@$data["birth_country"], "birth_country", "") ?>
                </p>

                <p class="required">
                    <label for="city_of_birth">City of Birth:</label>
                    <input type="text" name="city_of_birth" id="city_of_birth"
                           value="<?php echo @$data['city_of_birth']; ?>" class="input-type-text"/>
                </p>
                <p class="required">
                    <label for="no_siblings">Number of Siblings:</label>
                    <input type="text" name="no_siblings" id="no_siblings" value="<?php echo @$data['siblings']; ?>"
                           class="input-type-text"/>
                </p>
                <p class="required">
                    <label for="contact_address">Contact Address:</label>
                    <input type="text" name="contact_address" id="contact_address"
                           value="<?php echo @$data['contact_add']; ?>" class="input-type-text"/>
                </p>

                <p class="required">
                    <label for="mobile_no">Mobile No:</label>
                    <input type="text" name="mobile_no" id="mobile_no" value="<?php echo @$data['mobile_no']; ?>"
                           class="input-type-text"/>
                </p>
                <p class="required">
                    <label for="phone_no">Phone Number:</label>
                    <input type="text" name="phone_no" id="phone_no" value="<?php echo @$data['phone_no']; ?>"
                           class="input-type-text"/>
                </p>
                <p class="required">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" readonly value="<?php echo @$data['email']; ?>"
                           class="input-type-text"/>
                </p>
                <p>
                    <label for="passport_number">Passport Number:</label>
                    <input type="text" name="passport_number" id="school_code" value="<?php echo @$data['passport']; ?>"
                           class="input-type-text"/>
                </p>
            </fieldset>
            <fieldset>
                <legend>INSTITUTION DETAILS</legend>
                <p class="required">
                    <label for="inst">Name of Institution:</label>
                    <input type="text" name="inst" id="inst" value="<?php echo @$data["name_inst"]; ?>"
                           class="input-type-text"/>
                </p>
                <p class="required">
                    <label for="add_institution">Address of Institution:</label>
                    <input type="text" name="add_institution" id="add_institution"
                           value="<?php echo @$data['add_inst']; ?>" class="input-type-text"/>
                </p>

                <p class="required">
                    <label for="course_study">Course of Study:</label>
                    <input type="text" name="course_study" id="course_study" value="<?php echo @$data['course_std']; ?>"
                           class="input-type-text"/>
                </p>
                <p class="required">
                    <label for="level_study">Level of Study:</label>
                    <input type="text" name="level_study" id="level_study" value="<?php echo @$data['level_std']; ?>"
                           class="input-type-text"/>
                </p>
            </fieldset>
            <fieldset>
                <legend>PROGRAM DETAILS</legend>
                <p>
                    <label for="summer_holiday">Valid summer holiday:</label>
                    <input type="radio" name="summer_holiday" value="1"/>
                    &nbsp;Yes&nbsp;
                    <input type="radio" name="summer_holiday" value="0">
                    &nbsp;No </p>
                <p class="required">
                    <label for="holiday_start">Summer Holiday Starts:</label>
                    <input type="text" name="holiday_start" id="holiday_start"
                           value="<?php echo @$data['holiday_start']; ?>" class="input-type-text"/>
                    mm-dd-yyyy </p>
                <p class="required">
                    <label for="holiday_ends">Summer Holiday Ends:</label>
                    <input type="text" name="holiday_ends" id="holiday_ends"
                           value="<?php echo @$data['holiday_end']; ?>" class="input-type-text"/>
                    mm-dd-yyyy </p>
                <p class="required">
                    <label for="travel_exp">Previous travel experience:</label>
                    <input class="opt-travel-exp" <?php echo ($data["trvl_exp"]=="Yes")?"checked":"";?> type="radio" name="travel_exp" value="1"/>
                    &nbsp;Yes&nbsp;
                    <input class="opt-travel-exp" <?php echo ($data["trvl_exp"]=="No")?"checked":"";?> type="radio" name="travel_exp" value="0">
                    &nbsp;No </p>

                <p class="travel_history <?php echo $data["trvl_exp"]!="Yes"?"hidden":"" ?>">

                    <label for="opt_in_out_africa"> </label>
                    <input class="opt_in_out_africa" <?php echo ($data["trvl_inout_africa"]=="1")?"checked":"";?> type="radio" name="opt_in_out_africa" value="1"/>
                    &nbsp;Inside Africa&nbsp;
                    <input class="opt_in_out_africa" <?php echo ($data["trvl_inout_africa"]=="2")?"checked":"";?> type="radio" name="opt_in_out_africa" value="2">
                    &nbsp;Outside Africa
                </p>
                <p class="travel_history <?php echo $data["trvl_exp"]!="Yes"?"hidden":"" ?> required">

                    <label for="travel_where">If yes, where:</label>
                    <textarea name="travel_where" cols="21" rows="3"
                              id="travel_where"><?php echo @$data['trvl_where']; ?></textarea>
                </p>
                <p class="required">
                    <label for="grad_date">Expected graduation date:</label>
                    <input type="text" name="grad_date" id="grad_date" value="<?php echo @$data['grd_date']; ?>"
                           class="input-type-text"/> mm-dd-yyyy
                </p>
                <p class="required">
                    <label for="name_contact_us">Name of relatives in the United States:</label>
                    <input type="text" name="name_contact_us" id="name_contact_us"
                           value="<?php echo @$data['nm_cont_us']; ?>" class="input-type-text"/>
                </p>
                <p  class="required">
                    <label for="add_contact_us">Address of relatives in the United States:</label>
                    <input type="text" name="add_contact_us" id="add_contact_us"
                           value="<?php echo @$data['add_cont_us']; ?>" class="input-type-text"/>
                </p>
                <p class="required">
                    <label for="name_sponsor">Name of Parent/Sponsor:</label>
                    <input type="text" name="name_sponsor" id="name_sponsor" value="<?php echo @$data['nam_sp']; ?>"
                           class="input-type-text"/>
                </p>
                <p class="required">
                    <label for="address_sponsor">Address of Sponsor :</label>
                    <input type="text" name="address_sponsor" id="address_sponsor"
                           value="<?php echo @$data['add_sp']; ?>" class="input-type-text"/>
                </p>
                <p class="required">
                    <label for="sp_ph_no">Phone Number of Sponsor :</label>
                    <input type="text" name="sp_ph_no" id="sp_ph_no" value="<?php echo @$data['phone_sp']; ?>"
                           class="input-type-text"/>
                </p>
                <p class="required">
                    <label for="sp_email"> Email :</label>
                    <input type="text" name="sp_email" id="sp_email" value="<?php echo @$data['email_sp']; ?>"
                           class="input-type-text"/>
                </p>
                <p class="required">
                    <label for="profession">Sponsor Profession :</label>
                    <input type="text" name="profession" id="profession" value="<?php echo @$data['prof_sp']; ?>"
                           class="input-type-text"/>
                </p>
                <p class="required">
                    <label for="par_sum_progm"> Why do you want to participate in the Summer Work and Travel USA
                        Program?</label>
                    <textarea name="par_sum_progm" cols="20" rows="3"
                              id="par_sum_progm"><?php echo @$data['why_part']; ?></textarea>
                </p>
                <p class="required">
                    <label for="hear_abt_us_from"> How did you hear about us?</label>

                    <select name="hear_abt_us_from" id="hear_abt_us_from" class="">
                        <option value="">Select</option>
                        <option value="Friends" <?php echo ($data["hear_us_from"]=="Friends")?"selected":"";?> >Friends</option>
                        <option value="Family" <?php echo ($data["hear_us_from"]=="Family")?"selected":"";?> >Family</option>
                        <option value="Institution" <?php echo ($data["hear_us_from"]=="Institution")?"selected":"";?> >Institution</option>
                        <option value="Others" <?php echo ($data["hear_us_from"]=="Others")?"selected":"";?> >Others</option>
                    </select>

                </p>

                <p class="hear_about_us required <?php echo $data["hear_us_from"]==""?"hidden":"";  ?>">
                    <label for="hear_abt_us"> Please provide details</label>


                    <textarea name="hear_abt_us" cols="20" rows="3"
                              id="hear_abt_us"><?php echo @$data['hear_us']; ?></textarea>
                </p>
                <input type="hidden" name="register_posted" value="yes">
                <ul class="gallery with-padding lite-grey-gradient no-margin">
                    <li><span>
                  <input id="radioCertify" name="certify" type="radio" value="1"/>
                  I certify that all the information as provided by me on this registration form is factually correct and up to date. I understand that Besor Associates utilizes email to communicate with me before and during my Work & Travel Program and agree to maintain an active email account and advise Besor Associates of any changes in my email address. I understand that any false or omitted information may lead to rejection of my Work &Travel program application and undertake to provide updated information to Besor Associates.
                 </span></li>
                </ul>
            </fieldset>
            <fieldset class="grey-bg no-margin">

                <button disabled="disabled" id="register" name="register" onclick="return validateFields()">Complete
                    Profile
                </button>

                <button class="red" onclick="window.location='cancel.php'; return false;">Cancel</button>
            </fieldset>
        </form>
    </div>
</section>
<div style="display:none; visibility:hidden">
    <div class="confirm">
        <p>Are you satisfied with the information supplied on your registration form and confirmed that all details are
            correct?</p
        >
        <p>
            You will not be able to change any detail after this stage. </p>
    </div>
</div>

<?php include("includes/footer.php"); ?>


<script>

    var satisfied = false;

    $(function () {
        $("#holiday_start").datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: "mm-dd-yy",
            yearRange: "1985:2050"
        });
        $("#holiday_ends").datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: "mm-dd-yy",
            yearRange: "1985:2050"
        });

        $("#grad_date").datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: "mm-dd-yy",
            yearRange: "1985:2050"
        });

        $("#radioCertify").change(function () {
            $("#register").removeAttr("disabled");
        });

        $(".opt-travel-exp").change(function () {

            $(".travel_history").addClass("hidden");

            if ($(this).val() == "1") {

                $(".travel_history").removeClass("hidden");
            }

        });

        $("#hear_abt_us_from").change(function () {
            if ($(this).val() == "") {
                $(".hear_about_us").addClass("hidden");
            } else {
                $(".hear_about_us").removeClass("hidden");

            }
        });


    });
</script>

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
    function pdf() {
        document.registerform.method = "post";
        document.registerform.action = "pdf_crt.php";
        document.registerform.submit();
    }
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

        if (trim(document.registerform.dob_month.value) == "") {
            alert("Please Select the month");
            document.registerform.dob_month.focus();
            return false;
        }
        if (trim(document.registerform.dob_day.value) == "") {
            alert("Please Select the day");
            document.registerform.dob_day.focus();
            return false;
        }

        if (trim(document.registerform.dob_year.value) == "") {
            alert("Please Select the year");
            document.registerform.dob_year.focus();
            return false;
        }
        if (trim(document.registerform.age.value) == "") {
            alert("Please enter your age");
            document.registerform.age.focus();
            return false;
        }

        if (trim(document.registerform.gender.value) == "") {
            alert("Please select the gender.");
            document.registerform.gender.focus();
            return false;
        }

        if (trim(document.registerform.birth_country.value) == "") {
            alert("Please select the birth country.");
            document.registerform.birth_country.focus();
            return false;
        }

        if (trim(document.registerform.city_of_birth.value) == "") {
            alert("Please enter city of birth.");
            document.registerform.city_of_birth.focus();
            return false;
        }

        if (trim(document.registerform.no_siblings.value) == "") {
            alert("Please enter number of siblings.");
            document.registerform.no_siblings.focus();
            return false;
        }

        if (trim(document.registerform.contact_address.value) == "") {
            alert("Please enter your contact address.");
            document.registerform.contact_address.focus();
            return false;
        }
        if (trim(document.registerform.mobile_no.value) == "") {
            alert("Please enter your mobile number.");
            document.registerform.mobile_no.focus();
            return false;
        }

        if (trim(document.registerform.phone_no.value) == "") {
            alert("Please enter your phone number.");
            document.registerform.phone_no.focus();
            return false;
        }
        if (trim(document.registerform.email.value) == "") {
            alert("Please enter your email .");
            document.registerform.email.focus();
            return false;
        }


        if (document.registerform.email.value.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1) {
            alert("Your email is not valid");
            document.registerform.email.focus();
            return false;
        }

        if (trim(document.registerform.inst.value) == "") {
            alert("Please enter a institution.");
            document.registerform.inst.focus();
            return false;
        }

        if (trim(document.registerform.add_institution.value) == "") {
            alert("Please enter your the address of institution.");
            document.registerform.add_institution.focus();
            return false;
        }

        if (trim(document.registerform.course_study.value) == "") {
            alert("Please enter a course of study.");
            document.registerform.course_study.focus();
            return false;
        }
        if (trim(document.registerform.level_study.value) == "") {
            alert("Please enter a level of study.");
            document.registerform.level_study.focus();
            return false;
        }


        if (trim(document.registerform.holiday_start.value) == "") {
            alert("Please enter a summer holiday start.");
            document.registerform.holiday_start.focus();
            return false;
        }
        if (trim(document.registerform.holiday_ends.value) == "") {
            alert("Please enter a summer holiday end.");
            document.registerform.holiday_ends.focus();
            return false;
        }

        var opt_traval_history = $(".opt-travel-exp:checked").val();

        if (opt_traval_history == undefined) {
            alert("Please specify your previous travel exerience.");
            return false;
        }


        if (opt_traval_history == "1") {
            var in_out_africa = $(".opt_in_out_africa:checked").val();
            if (in_out_africa == undefined) {
                alert("Please select inside or outside Africa.");
                return false;
            }

            if (trim(document.registerform.travel_where.value) == "") {
                alert("Please enter where you travelled before.");
                document.registerform.travel_where.focus();
                return false;
            }
        }

        if (trim(document.registerform.name_contact_us.value) == "") {
            alert("Please provide name of your relatives in United States.");
            document.registerform.name_contact_us.focus();
            return false;
        }

        if (trim(document.registerform.add_contact_us.value) == "") {
            alert("Please provide address of your relatives in United States.");
            document.registerform.add_contact_us.focus();
            return false;
        }

        if (trim(document.registerform.sp_email.value) == "") {
            alert("Please provide email of sponsor.");
            document.registerform.sp_email.focus();
            return false;
        }
        if (trim(document.registerform.profession.value) == "") {
            alert("Please enter profession sponsor.");
            document.registerform.profession.focus();
            return false;
        }


        if (trim(document.registerform.grad_date.value) == "") {
            alert("Please enter your graduation date.");
            document.registerform.grad_date.focus();
            return false;
        }

        if (trim(document.registerform.name_sponsor.value) == "") {
            alert("Please enter a sponsor name.");
            document.registerform.name_sponsor.focus();
            return false;
        }

        if (trim(document.registerform.address_sponsor.value) == "") {
            alert("Please enter a sponsor address.");
            document.registerform.address_sponsor.focus();
            return false;
        }
        if (trim(document.registerform.sp_ph_no.value) == "") {
            alert("Please enter a sponsor phone number.");
            document.registerform.sp_ph_no.focus();
            return false;
        }

        if (trim(document.registerform.par_sum_progm.value) == "") {
            alert("Please enter the Why do you want to participate in the Program ?");
            document.registerform.par_sum_progm.focus();
            return false;
        }

        if ($("#hear_abt_us_from").val() == "") {
            alert("Please select how did you hear about us ?");
            document.registerform.hear_abt_us_from.focus();
            return false;
        }


        if (trim(document.registerform.hear_abt_us.value) == "") {
            alert("Please enter details on how did you hear about us");
            document.registerform.hear_abt_us.focus();
            return false;
        }


        if (document.registerform.certify.checked == false) {
            alert('Please choose a agree button.');
            return false;
        }


        $(".confirm").dialog({
            title: 'Confirm Registration',
            resizable: false,
            modal: true,
            buttons: {
                "No": function () {
                    $(this).dialog("close");
                    return false;
                },
                "Yes": function () {

                    $(this).dialog("close");
                    $("#registerform").submit();

                    //return false;
                }
            }
        });
        //alert(satisfied);

        return false;

    }


    function trim(str) {
        return str.replace(/^\s+|\s+$/g, '');
    }


    function autoSave() {

        $.ajax({
            type: 'post',
            url: 'autosave.php',
            data: $("#registerform").serialize()
        })

        timeout = setTimeout(autoSave, 15000);

    }


    autoSave();

</script>