<?php
session_start();

include "third_party/mail/class.phpmailer.php";
include "config.php";
include "pdf.php";

include "third_party/DataAccess.php";

$referenceid = "";
if ($_POST) {

    $save_and_continue = @$_POST['save_and_continue'];
    $regform_complete = @$_POST['regform_complete'];
    $save_and_exit = @$_POST['save_and_exit'];

    $have_valid_summer_holiday = @$_POST['have_valid_summer_holiday'] ? $_POST['have_valid_summer_holiday'] : '0';
    $have_carry_over_class = @$_POST['have_carry_over_classes'] ? $_POST['have_carry_over_classes'] : '0';

    $users_id = $_SESSION["user_id"];
    $fname = @$_POST['fname'];
    $lname = @$_POST['lname'];

    $cur_step = @$_POST['current_step'];

    $input_data = [
        'fname' => $fname,
        'midname' => @$_POST['midname'],
        'lname' => $lname,
        'dob' => sprintf("%s-%s-%s", @$_POST['dob_year'], @$_POST['dob_month'], @$_POST['dob_day']),
        'age' => @$_POST['age'],
        'gender' => @$_POST['gender'],
        'birth_country' => @$_POST['birth_country'],
        'city_of_birth' => @$_POST['city_of_birth'],
        'no_siblings' => @$_POST['no_siblings'],
        'contact_address' => @$_POST['contact_address'],
        'mobile_no' => @$_POST['mobile_no'],
        'phone_no' => @$_POST['phone_no'],
        'email' => @$_POST['email'],
        'passport_number' => @$_POST['passport_number'],
        'father_name' => @$_POST['father_name'],
        'father_phone' => @$_POST['father_phone'],
        'father_email' => @$_POST['father_email'],
        'father_profession' => @$_POST['father_profession'],
        'mother_name' => @$_POST['mother_name'],
        'mother_phone' => @$_POST['mother_phone'],
        'mother_email' => @$_POST['mother_email'],
        'mother_profession' => @$_POST['mother_profession'],
        'addr_same_as_parent' => @$_POST['addr_same_as_parent'],
        'contact_address_parent' => @$_POST['contact_address_parent'],
        'parent_is_sponsor' => @$_POST['parent_is_sponsor'],
        'sponsor_name' => @$_POST['sponsor_name'],
        'sponsor_address' => @$_POST['sponsor_address'],
        'sponsor_phone' => @$_POST['sponsor_phone'],
        'sponsor_email' => @$_POST['sponsor_email'],
        'sponsor_relation' => @$_POST['sponsor_relation'],
        'sponsor_profession' => @$_POST['sponsor_profession'],
        'name_institution' => @$_POST['name_institution'],
        'add_institution' => @$_POST['add_institution'],
        'course_study' => @$_POST['course_study'],
        'level_study' => @$_POST['level_study'],
        'matriculation_number' => @$_POST['matriculation_number'],
        'university_registrar' => @$_POST['university_registrar'],
        'registrar_phone' => @$_POST['registrar_phone'],
        'registrar_email' => @$_POST['registrar_email'],
        'have_valid_summer_holiday' => $have_valid_summer_holiday,
        'holiday_start_date' => @$_POST['holiday_start_date'],
        'holiday_end_date' => @$_POST['holiday_end_date'],
        'expect_grad_date' => @$_POST['expect_grad_date'],
        'hear_about_program' => @$_POST['hear_about_program'],
        'hear_from_other' => @$_POST['hear_from_other'],
        'have_carry_over_classes' => $have_carry_over_class,
        'have_travel_history' => @$_POST['have_travel_history'],
        'have_applied_before' => @$_POST['have_applied_before'],
        'besor_previous_application' => @$_POST['besor_previous_application'],
        'have_experience' => @$_POST['have_experience'],
        'name_of_institution' => @$_POST['name_of_institution'],
        'level_of_study' => @$_POST['level_of_study'],
        'local_representative' => @$_POST['local_representative'],
        'job_offer' => @$_POST['job_offer'],
        'visa_interview' => @$_POST['visa_interview'],
        'reason_not_using_same_service' => @$_POST['reason_not_using_same_service'],

        // 'employer_name'             => @$_POST['employer_name'],
        // 'employer_location'         => @$_POST['employer_location'],
        // 'job_position'              => @$_POST['job_position'],
        // 'program_sponsor_name'      => @$_POST['program_sponsor_name'],
        // 'local_representative'      => @$_POST['local_representative'],
        // 'program_start_date'        => @$_POST['program_start_date'],
        // 'program_end_date'          => @$_POST['program_end_date'],
        'usa_contact_name' => @$_POST['usa_contact_name'],
        'usa_contact_address' => @$_POST['usa_contact_address'],
        'usa_contact_phone' => @$_POST['usa_contact_phone'],
        'usa_contact_relation' => @$_POST['usa_contact_relation'],
        'usa_contact_status' => @$_POST['usa_contact_status'],
        'chk_consent_agree' => @$_POST['chk_consent_agree'],
        'current_step' => $cur_step
    ];

    if ($regform_complete) {
        $input_data["regform_complete"] = 1;
        $input_data["status"] = "PENDING";
    }

    if ($input_data["have_travel_history"] == 1) {
        //save travel_history_data
        $travel_country = $_POST["travel_country"];
        $travel_purpose = $_POST["travel_purpose"];
        $travel_stay_duration = $_POST["travel_stay_duration"];
        $travel_year = $_POST["travel_year"];

        TravelHistory::table()->delete(array('user_id' => $users_id));
        foreach ($travel_country as $idx => $t_country) {
// 			if ( $idx > 0 ) {
            $travel_history_data = [
                "user_id" => $users_id,
                "country" => $t_country,
                "purpose" => $travel_purpose[$idx],
                "stay_duration" => $travel_stay_duration[$idx],
                "year" => $travel_year[$idx]
            ];
            $travel_history = new TravelHistory($travel_history_data);
            $travel_history->save();
// 			}
        }
    }

    if ($input_data["have_applied_before"] == 1) {
        //save previous apply history
        $visa_purpose = $_POST["visa_purpose"];
        $visa_year = $_POST["visa_year"];
        $visa_decision = $_POST["visa_decision"];
        $visa_application = $_POST["visa_application"];

        VisaHistory::table()->delete(array('user_id' => $users_id));
        foreach ($visa_purpose as $idx => $v_purpose) {
// 			if ( $idx > 0 ) {
            $visa_history_data = [
                "user_id" => $users_id,
                "purpose" => $v_purpose,
                "year" => $visa_year[$idx],
                "visa_decision" => $visa_decision[$idx],
                "visa_application" => $visa_application[$idx]
            ];
            $visa_history = new VisaHistory($visa_history_data);
            $visa_history->save();
// 			}
        }
    }

    // if ( $_FILES && $_FILES["passport_photograph"]["size"] > 0 ) {
    // 	include "third_party/image_resize/ImageResize.php";
    // 	//create directory if not exists already
    // 	$upload_path = "user_uploads/{$users_id}";
    // 	if ( ! file_exists( $upload_path ) ) {
    // 		mkdir( $upload_path, 0777, true );
    // 	}
    // 	$new_filename     = "pp_photo.jpg";
    // 	$resize_file_name = "pp_photo_45x35mm.jpg";  ////128x99px
    // 	move_uploaded_file( $_FILES["passport_photograph"]["tmp_name"], "$upload_path/$new_filename" );
    // 	if ( file_exists( "$upload_path/$new_filename" ) ) {
    // 		$image              = new \Eventviva\ImageResizeAlt();
    // 		$image->ImageResize("$upload_path/$new_filename", 128,99);
    // 		$image->Save( "$upload_path/$resize_file_name" );
    // 	}
    // }

    $target_file = null;
    $upload_path = "user_uploads/{$users_id}";
    if (!file_exists($upload_path)) {
        mkdir($upload_path);
    }
    if (count($_POST['test']) > 0) {
        $data = $_POST["test"]["image"];
        if ($data != "") {
            $proImage = base64_decode($data);
            $file_name = 'pp_photo.jpg';
            $target_file = $upload_path . $file_name;
            if (file_exists("$upload_path/$file_name")) {
                unlink("$upload_path/$file_name");
            }
            file_put_contents("$upload_path/$file_name", $proImage);
            // move_uploaded_file($proImage, "$upload_path/$file_name");
        }

    }


    $member = Member::find($users_id);
    $referenceid = $member->referenceid;
    $member->update_attributes($input_data);
    $member->save();

    if ($save_and_continue) {
        //print_r( $input_data );
        //autosave
        exit;
    }

    if ($have_carry_over_class == 1 || $have_valid_summer_holiday == 0) {
        session_destroy();
        header("location: message.php");
    }

    if ($save_and_exit) {
        session_destroy();
        header("location: login.php");
    }

    if ($regform_complete):

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

        $msg = "<p>Dear " . ucwords($_POST['fname']) . " " . ucwords($_POST['midname']) . " " . ucwords($_POST['lname']) . ",</p>
			<p >Thank you for registering to participate in the Summer Work & Travel Program.</p>
<p >Your unique registration number is  " . ucwords($referenceid) . " and your application is pending activation while the registration will be carefully reviewed.</p>
<p>If your review is successful, you will receive an email notice to schedule an appointment for the application processing.</p>
<p> As soon as your appointment request is approved, you will receive another confirmation email from the Program Administrator containing details of your status and scheduled appointment.</p>
                <p>You are hereby required to upload a clear scanned copy of your student ID Card, Admission Letter, Biodata page of International passport and your Academic Record within 24 hours of this registration to enable us complete the review of your registration. If these documents are not uploaded within the stipulated period, your registration may be cancelled and further access to the portal restricted.</p>

                <p>Please, note that you are required to bring the printed copy of your submitted registration form, duly signed by you and your parent to our office when scheduled to process your application package with the following documents:</p>

                <p> - Administrative Fee payment teller (please make this payment within 48 hours of your appointment request and upload proof to confirm your appointment and slot) <br/>
                    - 4 passport sized photographs <br/>
                    - Signed parental consent letter <br/>
                    - Original valid International Passport (for scanning) <br/>
                    - Letter of Introduction from School </p>

<p>Thank you as we look forward to processing your application.<br />
 Regards, <br/>
Summer Work Programs Processing Team </p>";

        //$msg = preg_replace( "\\", '', $msg );

        $mail1->MsgHTML($msg);

        $address = $_POST["email"];
        $pdf_file_name = strtolower($_POST["fname"] . "_" . $_POST["lname"]);
        $mail1->AddStringAttachment(GetCompletedForm($_SESSION["user_id"], "S"), "{$pdf_file_name}.pdf");
        $mail1->AddAddress($address, @$_POST["fname"] . " " . @$_POST["lname"]);

        $mail1->Send();
    endif; //if recform_complete

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
            <p>Your unique registration number is <?= ucwords($referenceid) ?> and your application is pending
                activation while the registration will be carefully reviewed.</p>

            <p> If your review is successful, you will receive an email notice to schedule an appointment for the
                application processing and once your appointment request is approved, you will receive another
                confirmation email from the Program Administrator containing details of your status and scheduled
                appointment.</p>
            <p>You are hereby required to upload a clear scanned copy of your student ID Card, Admission Letter, Biodata
                page of International passport and your Academic Record within 24 hours of this registration to enable
                us complete the review of your registration.</p>
            <p> If these documents are not uploaded within the stipulated period, your registration may be cancelled and
                further access to the portal restricted. </p>
            <p>Please, note that you will be required to bring the printed copy of your submitted registration form,
                duly signed by you and your parent to our office when scheduled to process your application package with
                the following documents:</p>

            <p> - Administrative Fee payment teller (please make this payment within 48 hours of your appointment
                request and upload proof to confirm your appointment and slot) <br/>
                - 4 passport sized photographs <br/>
                - Signed parental consent letter <br/>
                - Original valid International Passport (for scanning) <br/>
                - Letter of Introduction from School </p>
            <p>A copy of this notice and the PDF form of your registration has been sent to you by email.</p>


            <fieldset class="grey-bg no-margin">
                <button onclick="window.location='profile.php'; return false;">Close</button>
            </fieldset>
        </div>
    </div>
</section>
<?php include("includes/footer.php"); ?>
