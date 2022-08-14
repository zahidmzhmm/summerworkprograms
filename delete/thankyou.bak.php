<?php
session_start();

include('adminpanel/config/class.config.php');
include('adminpanel/classes/class.sql.php');
include "mail/class.phpmailer.php";
include "config.php";
include "pdf.php";




if ($_POST) {

    var_dump($_POST);

    exit;


    $users_id = $_SESSION["user_id"];

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $midname = $_POST["midname"];
    $dob_month = $_POST["dob_month"];
    $dob_day = $_POST["dob_day"];
    $dob_year = $_POST["dob_year"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $birth_country = $_POST["birth_country"];
    $city_of_birth = $_POST["city_of_birth"];
    $no_siblings = $_POST["no_siblings"];
    $contact_address = $_POST["contact_address"];
    $mobile_no = $_POST["mobile_no"];
    $phone_no = $_POST["phone_no"];
    $email = $_POST["email"];
    $passport_number = $_POST["passport_number"];
    $inst = $_POST["inst"];
    $add_institution = $_POST["add_institution"];
    $course_study = $_POST["course_study"];
    $level_study = $_POST["level_study"];
    $valid_hold = @$_POST["summer_holiday"] == "1" ? "Yes" : "No";
    $holiday_start = $_POST["holiday_start"];
    $holiday_ends = $_POST["holiday_ends"];
    $trvl_exp = @$_POST["travel_exp"] == "1" ? "Yes" : "No";
    $trvl_inout_africa = $trvl_exp == "Yes" ? @$_POST["trvl_inout_africa"] : "";
    $travel_where = $trvl_exp == "Yes" ? $_POST["travel_where"] : "";
    $grad_date = $_POST["grad_date"];
    $name_contact_us = $_POST["name_contact_us"];
    $add_contact_us = $_POST["add_contact_us"];
    $name_sponsor = $_POST["name_sponsor"];
    $address_sponsor = $_POST["address_sponsor"];
    $sp_ph_no = $_POST["sp_ph_no"];
    $sp_email = $_POST["sp_email"];
    $profession = $_POST["profession"];
    $par_sum_progm = $_POST["par_sum_progm"];
    $hear_us_from = $_POST["hear_abt_us_from"];
    $hear_abt_us = $_POST["hear_abt_us"];
    $referenceid = strtoupper(substr(md5(uniqid(rand())), 0, 8));

    $query = "UPDATE `tbl_member`
SET 
  
  `firstname` = '$fname',
  `lastname` = '$lname',
  `midname` = '$midname',
  `email` = '$email', 
  `dob_month` = '$dob_month',
  `dob_day` = '$dob_day',
  `dob_year` = '$dob_year',
  `age` = '$age',
  `gender` = '$gender',
  `birth_country` = '$birth_country',
  `city_of_birth`='$city_of_birth',
  `siblings` = '$no_siblings',
  `contact_add` = '$contact_address',
  `mobile_no` = '$mobile_no',
  `phone_no` = '$phone_no', 
  `passport` = '$passport_number',
  `name_inst` = '$inst',
  `add_inst` = '$add_institution',
  `course_std` = '$course_study',
  `level_std` = '$level_study',  
  `holiday_start` = '$holiday_start',
  `holiday_end` = '$holiday_ends',
  `trvl_exp`='$trvl_exp',
  `trvl_inout_africa`='$trvl_inout_africa',
  `trvl_where` = '$travel_where',
  `grd_date` = '$grad_date',
  `nm_cont_us` = '$name_contact_us',
  `add_cont_us` = '$add_contact_us',
  `nam_sp` = '$name_sponsor',
  `add_sp` = '$address_sponsor',
  `phone_sp` = '$sp_ph_no',
  `email_sp` = '$sp_email',
  `prof_sp` = '$profession',
  `why_part` = '$par_sum_progm',
   `hear_us_from` = '$hear_us_from',
  `hear_us` = '$hear_abt_us',
  `referenceid`='$referenceid',
    `profile_complete`=1 
WHERE `users_id` = $users_id";


    sql::update_query($query);


    //send activation code email to user
    $mail1 = new PHPMailer();
    //$mail1->SMTPAuth   = false;
    //$mail1->SMTPDebug  =1;
    $mail1->IsHTML(true);
    $mail1->IsMail();

    //$mail1->Host       = HOST_NAME;
    //$mail1->Port       = SMTP_PORT;
    //$mail1->Username   = NO_REPLY_EMAIL;
    //$mail1->Password   = AUTH_KEY;
    $mail1->SetFrom(NO_REPLY_EMAIL, "Summer Work Programs");
    $mail1->Subject = "Summer Work Programs Registration";

    $msg = "<p>Dear " . ucwords($_POST['fname']) ." ".ucwords($_POST['midname']). " " . ucwords($_POST['lname']) . ",</p>
			<p >Thank you for registering to participate in the Summer Work & Travel Program.
Your unique registration number is " . ucwords($referenceid) . " and your application is pending activation while the registration will be carefully reviewed within the next 24 hours.</p>

<p>If successful, you will receive a confirmation email from the Program Administrator containing details of your status and notice of a scheduled appointment for the application processing.</p>
<p>You will be required to upload a clear scanned copy of your student ID Card, Admission Letter and passport sized photograph within 24 hours of this registration to enable us complete the review of your registration. If these documents are not uploaded within the stipulated period, your registration may be cancelled and further access to the portal restricted.</p>
<p>Also, your Administrative Fee payment must be made no later than 48 hours before your scheduled appointment in order to confirm your participation and appointment slot. If we do not receive your payment confirmation before your appointment date, your slot will be forfeited and appointment cancelled.</p>
<p>Please, note that you are required to bring the printed copy of the attached registration form, duly signed by you and your parent to our office at the appointed date to process your application package with the following documents:</p>
<p>- Administrative Fee payment teller<br />
- 4 passport sized photographs<br />
- Signed parental consent letter<br />
- Photocopy of International Passport<br />
- CV/Resume
</p>
<p>Thank you as we look forward to processing your application.<br />
 Regards, <br/>
Summer Work Programs Team</p>";

    $msg = eregi_replace("[\]", '', $msg);

    $mail1->MsgHTML($msg);

    $address = $_POST["email"];
    $pdf_file_name = strtolower($_POST["fname"] . "_" . $_POST["lname"]);
    $mail1->AddStringAttachment(GetCompletedForm($_SESSION["user_id"], "S"), "{$pdf_file_name}.pdf");
    $mail1->AddAddress($address, @$_POST["firstname"] . " " . @$_POST["lastname"]);

    $mail1->Send();


} else {
    $location = ($_SESSION["user_id"]) ? "profile.php" : "index.php";
    header("location:$location");
    exit;

}

?>
<?php include("includes/header.php"); ?>
<section class="grid">
    <div class="block-border">
        <h1 class="information">Thank you !</h1>
        <div class="form block-content">
            <p> Dear <?php echo ucwords("$fname $lname"); ?>, </p>
            <p>Thank you for registering to participate in the Summer Work & Travel Program.</p>
            <p> Your unique registration number is "<?php echo $referenceid; ?>" and your application is pending
                activation while the registration will be carefully reviewed within the next 24 hours. </p>
            <p> If successful, you will receive a confirmation email from the Program Administrator containing details
                of your status and notice of a scheduled appointment for the application processing.</p>
            <p>You will be required to upload a clear scanned copy of your student ID Card, Admission Letter and
                passport sized photograph within 24 hours of this registration to enable us complete the review of your
                registration. If these documents are not uploaded within the stipulated period, your registration may be
                cancelled and further access to the portal restricted.</p>
            <p> Please, note that you will be expected to bring the printed copy of your submitted registration form,
                duly signed by you and your parent to our office within the stipulated period to process your
                application package with the following documents: </p>
            <p> - Administrative Fee payment teller <br/>
                - 4 passport sized photographs <br/>
                - Signed parental consent letter <br/>
                - Photocopy of International Passport <br/>
                - CV/Resume </p>
            <p> A copy of this information and the completed copy of your submitted registration form has also been sent
                to your email.</p>

            <fieldset class="grey-bg no-margin">


                <button onclick="window.location='profile.php'; return false;">Close</button>
            </fieldset>
        </div>


    </div>


</section>
<?php include("includes/footer.php"); ?>
