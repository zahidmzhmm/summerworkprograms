<?php

include "app/main.php";

function createcountrycombo($CSelectedValue, $CComboName, $JS, $cssClass = "")
{
    $stCountry = "Afganistan:Albani:Algier:Andorra:Angola:Anguilla:Antigua:Antilles:Arabia:Argentina:Armenia:Aruba:Ascension:Australia:Austria:Bahrain:Bangladesh:Barbados:Belarus:Belgium:Belize:Benin:Bermuda:Bhutan:Bolivia:Botsuana:Brasil:Brunei:Bulgaria:Burkina Faso:Burundi:CANADA:Canal Islands:Caymay Islands:Chile:China:Columbia:Cook Islands:Costa Rica:Cote d lvoire:Cuba:Cyprus:Czech Republic:Denmark:Dominica:Dschibuti:Ecuador:Egypt:EL Salvador:Equadorguinea:Eritrea:Estland:Ethiopia:Falkland Islands:Fiji Islands:Finland:France:French Guayana:French Polynesia:Faroer:Gubun:Gambin:Georgien:Germany:Ghana:Gibraltar:Great Britain:Greece:Greenland:Grenanda:Guadeloupa:Guam:Guatemala:Guinea:Guinea-Bissau:Guyana:Haiti:Hondura:Hongkong:Hungary:Iceland:India:Indonesia:Irak:Iran:Ireland:Israel:Italy:Jamica:Japan:Jordan:Jugoslavia:Kambodscha:Kamerun:Kap Verda:Kasachstan:Katar:Kenia:Kirgisistan:Kiribati:Kongo:Korea:Kroatia:Kuwait:Laos:Latvia:Lebanon:Lesotho:Liechtenstein:Lethuania:Luxembourg:Lyberia:Lybia:Macau:Madagaskar:Malawi:Malaysia:Maldieves:Mali:Malta:Man Island:Mariana:Marshall Islands:Martinique:Mauretania:Mauritius:Mayotte:Maxedonia:Mexico:Mikronesia:Maldau Republic:Monaco:Mongolia:Montserral:Morocco:Mosambique:Myanmar:Namibia:Nauru:Nepal:Netherlands:New Zealand:Newkaledonia:Nicaragua:Niger:Nigeria:North Ireland:Norway:Oman:Palau:Panama:Papua:Paraguay:Peru:Peru:Poland:Portugal:Puerto Rico:Reunion:Ruanda:Rumania:Russia:Salomones:Sambia:Samoa:Samoa(US):San Marino:Sao Tome:Saudi Arabia:Senegal:Seychelles:Seychelles:Zimbabwe:Singapore:Slovakia:Slovenia:Somalia:South Africa:Spain:Sri Lanka:St.Helena:St.Kitts:St.Lucia:St.Pierre:St.Vincent:Sudan:Suriname:Swaziland:Sweden:Switzerland:Syria:Tazikistan:Taiwan:Tansania:Thailand:Togo:Tongo:Trinibad:Tschad:Tunesia:Turkey:Turkmenistan:Uganda:Ukraina:USA:Uruguay:Usbekistan:Vanuatu:Vatican City:Venezuela:Vietnam:Virgin Island(GB):Yemen:Zaire:Bahamas:Pakistan";

    $stCountry = explode(":", $stCountry);
    echo "<Select Name=$CComboName id=$CComboName class=\"$cssClass\">";
    echo "<option value=''>$JS Select</option>";
    for ($i = 0; $i < sizeof($stCountry); $i++) {
        if ($CSelectedValue == $stCountry[$i]) {
            echo "<option value=\"$stCountry[$i]\" Selected>$stCountry[$i]</option>";
        } else {
            echo "<option value=\"$stCountry[$i]\">$stCountry[$i]</option>";
        }
    } // end of For loop
    echo "</Select>";
}

$medoo = new \Medoo\Medoo($database);
$data = false;
if ($_POST) {

    $act_codehash = $_POST["act_code"];
//    $act_codehash = md5($_POST["act_code"]);
    $member = \app\Sql::Select_single("select * from tbl_member where actcode='$act_codehash'");

    if ($member && !empty($member)) {
        $member = (object)$member;
        $password = $member->referenceid;
        $referenceid = strtoupper(substr(md5(uniqid(rand())), 0, 8));
        $update_data = \app\Sql::update("update tbl_member set `acstatus`='ACTIVE', `actcode`='' where `referenceid`='$password'");
        if (!$update_data) {
            @$_SESSION["err_msg"] = "INVALID_CODE";
            session_destroy();
            header("location:activate.php");
            exit;
        }
        $_SESSION["user_id"] = $member->users_id;
        $data = $member;

        //send welcome email to users
        $mail1 = new \app\Mailer();
        $mail1->mail->Subject = "Welcome to Summer Work Programs";

        $msg = "<p>Dear  $data->fname  $data->lname,</p>
			 <br><p>Your account is now activated.</p></br>

			  <p> --------------------------\n
			   YOUR  LOGIN DETAILS    \n
			   --------------------------\n</p>
			<p>  Welcome to Summer Work Programs.</p>
		<p>Username and password to access the site is:<br/><br/>
		<strong>Username:</strong> $data->email <br>
		<strong>Password:</strong> $password <br>

		 </p>
		 <p>__________ <br />
		  Thank you ! <br>
		 Summer Work Programs <br>
		 Besor Associates<br>
		 Lagos State, Nigeria 100001<br>
		 info@summerworkprograms.com<br>
		 www.summerworkprograms.com.</p>";

        //$msg = preg_replace( "\\", '', $msg );
        $mail1->mail->MsgHTML($msg);

        $mail1->mail->AddAddress($data->email, $data->fname . " " . $data->lname);

        @$mail1->mail->Send();
    }

}
if (!isset($_SESSION["user_id"])) {
    header("location:index.php");
}

$user_id = $_SESSION["user_id"];
$data = (object)\app\Sql::Select_single("select * from tbl_member where users_id='$user_id'");

if ($data->have_valid_summer_holiday == 0 || $data->have_carry_over_classes == 1) {
    echo "<script>location.replace('message.php');</script>";
    exit;
}

if (!$data->current_step) {
    $data->current_step = 1;
}
$form_wizard = 1;
?>
<?php $viewport = true; ?>
<?php include("includes/header.php"); ?>

<style type="text/css">
    #previewBig2 img {
        max-height: 200px;
        min-height: 100px;
    }

    .previewBig {
        height: auto !important;
    }

    .passport_photograph {
        padding-top: 20px;
    }

    .header-transparent, .page-title {
        margin-top: -120px;
    }

    .datepicker thead {
        color: white;
    }

    .table thead tr th {
        background-color: #E0E0E0 !important;
    }
</style>

<section class="grid form">
    <div class="block-border">
        <h1 class="information">User Registration</h1>
        <form name="registerform" id="registerform" method="post" action="thankyou.php" enctype="multipart/form-data"
              class="form-horizontal">
            <input type="hidden" id="save_and_exit" name="save_and_exit" value="0">
            <input type="hidden" id="regform_complete" name="regform_complete" value="0">
            <input type="hidden" id="current_step" name="current_step" value="0">
            <input type="hidden" id="id" name="users_id" value="<?php echo $data->users_id; ?>">
            <div id="wizard" class="swMain">
                <ul>
                    <li><a href="#step-1">
                            <label class="stepNumber">1</label>
                            <span class="stepDesc">
                   Step 1<br/>
                   <small>Personal Details</small>
                </span>
                        </a></li>
                    <li><a href="#step-2">
                            <label class="stepNumber">2</label>
                            <span class="stepDesc">
                   Step 2<br/>
                   <small>Education</small>
                </span>
                        </a></li>
                    <li><a href="#step-3">
                            <label class="stepNumber">3</label>
                            <span class="stepDesc">
                   Step 3<br/>
                   <small>Travel History</small>
                </span>
                        </a></li>
                    <li><a href="#step-4">
                            <label class="stepNumber">4</label>
                            <span class="stepDesc">
                   Step 4<br/>
                   <small>Program Experience</small>
                </span>
                        </a></li>


                    <li><a href="#step-5">
                            <label class="stepNumber">5</label>
                            <span class="stepDesc">
                   Step 5<br/>
                   <small>Contact in the USA</small>
                </span>
                        </a></li>

                    <li><a href="#step-6">
                            <label class="stepNumber">6</label>
                            <span class="stepDesc">
                   Step 6<br/>
                   <small>Agreement</small>
                </span>
                        </a></li>

                </ul>

                <div id="step-1">
                    <h2 class="StepTitle">Step 1: Personal Details</h2>
                    <div class="form-horizontal">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname " class="control-label col-md-4 required">First Name :</label>
                                <div class="col-md-8">
                                    <input type="text" name="fname" id="firstname"
                                           value="<?php echo $data->fname; ?>"
                                           class="form-control"/>

                                    <span class="help-block" style="display: inline">(as it appears on passport)</span>
                                </div>


                            </div>
                            <div class="form-group">
                                <label for="midname" class="control-label col-md-4">Middle name:</label>
                                <div class="col-md-8">
                                    <input type="text" name="midname" id="midname"
                                           value="<?php echo $data->midname; ?>"
                                           class="form-control"/>

                                    <span class="help-block">(as it appears on passport)</span>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="lname" class="required control-label col-md-4">Last Name :</label>
                                <div class="col-md-8"><input type="text" name="lname" id="lastname"
                                                             value="<?php echo $data->lname; ?>"
                                                             class="form-control"/>

                                    <span class="help-block">(as it appears on passport)</span>
                                </div>

                            </div>
                            <div class="form-group">

                                <?php

                                $date_of_birth = strtotime($data->dob);

                                ?>
                                <label for="dob_month" class="required control-label col-md-4 ">Date of Birth: </label>

                                <div class="col-md-3" style="padding-right:0"><select name="dob_month" id="dob_month"
                                                                                      class="form-control">
                                        <option value="">Month</option>
                                        <option value="1"
                                                <?php if (date("m", $date_of_birth) == '1'): ?>selected="selected"<?php endif; ?>>
                                            January
                                        </option>
                                        <option value="2"
                                                <?php if (date("m", $date_of_birth) == '2'): ?>selected="selected"<?php endif; ?>>
                                            February
                                        </option>
                                        <option value="3"
                                                <?php if (date("m", $date_of_birth) == '3'): ?>selected="selected"<?php endif; ?>>
                                            March
                                        </option>
                                        <option value="4"
                                                <?php if (date("m", $date_of_birth) == '4'): ?>selected="selected"<?php endif; ?>>
                                            April
                                        </option>
                                        <option value="5"
                                                <?php if (date("m", $date_of_birth) == '5'): ?>selected="selected"<?php endif; ?>>
                                            May
                                        </option>
                                        <option value="6"
                                                <?php if (date("m", $date_of_birth) == '6'): ?>selected="selected"<?php endif; ?>>
                                            June
                                        </option>
                                        <option value="7"
                                                <?php if (date("m", $date_of_birth) == '7'): ?>selected="selected"<?php endif; ?>>
                                            July
                                        </option>
                                        <option value="8"
                                                <?php if (date("m", $date_of_birth) == '8'): ?>selected="selected"<?php endif; ?>>
                                            August
                                        </option>
                                        <option value="9"
                                                <?php if (date("m", $date_of_birth) == '9'): ?>selected="selected"<?php endif; ?>>
                                            September
                                        </option>
                                        <option value="10"
                                                <?php if (date("m", $date_of_birth) == '10'): ?>selected="selected"<?php endif; ?>>
                                            October
                                        </option>
                                        <option value="11"
                                                <?php if (date("m", $date_of_birth) == '11'): ?>selected="selected"<?php endif; ?>>
                                            November
                                        </option>
                                        <option value="12"
                                                <?php if (date("m", $date_of_birth) == '12'): ?>selected="selected"<?php endif; ?>>
                                            December
                                        </option>
                                    </select></div>
                                <div class="col-md-2" style="padding-right:0"><select name="dob_day" id="dob_day"
                                                                                      class="form-control">

                                        <option value="">Day</option>
                                        <?PHP


                                        for ($i = 1; $i <= 31; $i++) {
                                            $selected = ($i == date("d", $date_of_birth)) ? "selected=\"selected\"" : "";
                                            echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
                                        }
                                        ?>
                                    </select></div>
                                <div class="col-md-2" style="padding-right:0"><select name="dob_year" id="dob_year"
                                                                                      class="form-control">
                                        <option value=""> Year</option>
                                        <?PHP
                                        for ($year = date('Y') - 17; $year >= 1993; $year--) {
                                            $selected = ($year == date("Y", $date_of_birth)) ? "selected=\"selected\"" : "";
                                            echo '<option value="' . $year . '" ' . $selected . '>' . $year . '</option>';
                                        }
                                        ?>
                                    </select>

                                </div>

                            </div>
                            <div class="form-group">
                                <label for="age" class="required control-label col-md-4">Age:</label>
                                <div class="col-md-8"><input type="text" name="age" id="age"
                                                             value="<?php echo $data->age; ?>"
                                                             class="form-control"
                                                             size="2"/>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="required col-md-4 control-label">Gender:</label>
                                <div class="col-md-8">
                                    <select name="gender" class="form-control input-small">
                                        <option value=""> Select Gender</option>
                                        <option value="male"
                                                <?php if ($data->gender == 'male'): ?>selected="selected"<?php endif; ?>>
                                            Male
                                        </option>
                                        <option value="female"
                                                <?php if ($data->gender == 'female'): ?>selected="selected"<?php endif; ?>
                                        >Female
                                        </option>
                                    </select>

                                </div>
                            </div>
                            <div class=" form-group">
                                <label for="birth_country" class="required control-label col-md-4">Place of
                                    Birth:</label>
                                <div class="col-md-8">
                                    <?php createcountrycombo($data->birth_country, "birth_country", "", "form-control input-small") ?>
                                </div>
                            </div>
                            <div class=" form-group">
                                <label for="city_of_birth" class="required col-md-4 control-label">City of
                                    Birth:</label>
                                <div class="col-md-8">
                                    <input type="text" name="city_of_birth" id="city_of_birth"
                                           value="<?php echo $data->city_of_birth; ?>" class="form-control"/>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no_siblings" class="required control-label col-md-4">Number of
                                    Siblings:</label>
                                <div class="col-md-8">
                                    <input type="text" name="no_siblings" id="no_siblings"
                                           value="<?php echo $data->no_siblings; ?>" class="form-control"/>
                                </div>
                            </div>
                            <!-- Zahid Mzhmm -->
                            <div class="form-group">
                                <label for="bvn" class="required control-label col-md-4">BVN:</label>
                                <div class="col-md-8">
                                    <input type="text" name="bvn" id="bvn"
                                           value="<?php echo $data->bvn; ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nid_number" class="required control-label col-md-4">National ID
                                    Number:</label>
                                <div class="col-md-8">
                                    <input type="text" name="nid_number" id="nid_number"
                                           value="<?php echo $data->nid_number; ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class=" form-group">
                                <label for="contact_address" class="required control-label col-md-4">Contact
                                    Address:</label>
                                <div class="col-md-8">
                                    <input type="text" name="contact_address" id="contact_address"
                                           value="<?php echo $data->contact_address; ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class=" form-group">
                                <label for="mobile_no" class="required control-label col-md-4">Mobile No:</label>
                                <div class="col-md-8">
                                    <input type="text" name="mobile_no" id="mobile_no"
                                           value="<?php echo $data->mobile_no; ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone_no" class="required control-label col-md-4">Phone Number:</label>
                                <div class="col-md-8">
                                    <input type="text" name="phone_no" id="phone_no"
                                           value="<?php echo $data->phone_no; ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class=" form-group">
                                <label for="email" class="required control-label col-md-4">Email:</label>
                                <div class="col-md-8">
                                    <input type="email" name="email" id="email" readonly
                                           value="<?php echo $data->email; ?>" class="form-control"/>
                                </div>
                            </div>
                            <!-- Zahid Mzhmm -->
                            <div class="form-group">
                                <label for="skype_id" class="required control-label col-md-4">Skype ID:</label>
                                <div class="col-md-8">
                                    <input type="text" name="skype_id" id="skype_id"
                                           value="<?php echo $data->skype_id; ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="social_media_handles" class="required control-label col-md-4">Social Media
                                    Handles:</label>
                                <div class="col-md-8">
                                    <select name="social_media_handles"
                                            class="form-control mb-2"
                                            id="social_media_handles" style="width: 15rem;">
                                        <option value="Facebook">Facebook</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="Snapchat">Snapchat</option>
                                        <option value="Telegram">Telegram</option>
                                        <option value="Twitter">Twitter</option>
                                        <option value="Signal">Signal</option>
                                    </select>
                                    <input type="text" name="social_media_handles_val" id="social_media_handles_val"
                                           value="<?php echo $data->social_media_handles_val; ?>" class="form-control"
                                           placeholder="Facebook Profile Link"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="linkedin_profile" class="required control-label col-md-4">LinkedIn
                                    Profile:</label>
                                <div class="col-md-8">
                                    <input type="text" name="linkedin_profile" id="linkedin_profile"
                                           value="<?php echo $data->linkedin_profile; ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="whatsapp_number" class="required control-label col-md-4">WhatsApp
                                    Number:</label>
                                <div class="col-md-8">
                                    <input type="text" name="whatsapp_number" id="whatsapp_number"
                                           value="<?php echo $data->whatsapp_number; ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class=" form-group">
                                <label for="passport_number" class="required control-label col-md-4">Passport
                                    Number:</label>
                                <div class="col-md-8">
                                    <input type="text" name="passport_number" id="school_code"
                                           value="<?php echo $data->passport_number; ?>" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="passport_photograph"
                                       class="control-label col-md-12 <?= !file_exists("user_uploads/$user_id/pp_photo.jpg") ? "required" : "" ?>">Passport
                                    Photograph:Photo files should be passport-sized and not more than 300
                                    pixels.</label>
                                <div class="col-md-12">
                                    <div class="col-md-3">&nbsp;</div>
                                    <div class="col-md-8">
                                        <input class="" id="sample_input" type="hidden" name="test[image]" required>
                                        <input class="col-6" id="image_type" type="hidden" name="image_type" required>
                                        <!-- <img src="" height="100px" id="profilePic" class="profile-img profilePic" style="background-color: grey;"> -->
                                        <div id="imgPreview"></div>
                                        <div class="previews col-6" id="previews">
                                            <!-- <div id="previewSmall2" class="previewSmall"></div> -->
                                            <div id="previewBig2" class="previewBig">

                                                <?php
                                                if (file_exists("user_uploads/$user_id/pp_photo.jpg")) {
                                                    $img = "user_uploads/$user_id/pp_photo.jpg";
                                                    //	$img	=	"user_uploads/$user_id/pp_photo.jpg";
                                                    echo '<img id="old_preview"  src="' . $img . '">';
                                                } else {
                                                    echo '<img id="old_preview"  src="assets/images/Imageind.jpg">';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <input type="file" class="passport_photograph" id="passport_photograph"
                                               accept=".jpeg,.jpg,.png">
                                        <div id="profilePicMsg" style="display:none;color: red;">Profile Photo Is
                                            Required.
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="father_name " class="control-label col-md-4 required">Name of Father
                                    :</label>
                                <div class="col-md-8">
                                    <input type="text" name="father_name" id="father_name"
                                           value="<?php echo $data->father_name; ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="father_phone" class="control-label col-md-4 required">Phone number of
                                    father:</label>
                                <div class="col-md-8">
                                    <input type="text" name="father_phone" id="father_phone"
                                           value="<?php echo $data->father_phone; ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="father_email" class="control-label col-md-4 required">Email address of
                                    father
                                    :</label>
                                <div class="col-md-8"><input type="email" name="father_email" id="father_email"
                                                             value="<?php echo $data->father_email; ?>"
                                                             class="form-control"/>
                                </div>
                            </div>
                            <!-- Zahid Mzhmm -->
                            <div class="form-group">
                                <label for="home_address_father" class="control-label col-md-4 required">Home Address of
                                    Father</label>
                                <div class="col-md-8"><input type="text" name="home_address_father"
                                                             id="home_address_father"
                                                             value="<?php echo $data->home_address_father; ?>"
                                                             class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="work_address_father" class="control-label col-md-4 required">Work Address of
                                    Father:</label>
                                <div class="col-md-8"><input type="text" name="work_address_father"
                                                             id="work_address_father"
                                                             value="<?php echo $data->work_address_father; ?>"
                                                             class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nid_father" class="control-label col-md-4 required">National ID Number of
                                    Father:</label>
                                <div class="col-md-8"><input type="text" name="nid_father" id="nid_father"
                                                             value="<?php echo $data->nid_father; ?>"
                                                             class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="father_profession"
                                       class="control-label col-md-4 required">Profession: </label>
                                <div class="col-md-8"><input type="text" name="father_profession" id="father_profession"
                                                             value="<?php echo $data->father_profession; ?>"
                                                             class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mother_name " class="control-label col-md-4 required">Name of Mother
                                    :</label>
                                <div class="col-md-8">
                                    <input type="text" name="mother_name" id="mother_name"
                                           value="<?php echo $data->mother_name; ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mother_phone" class="control-label col-md-4 required">Phone number of
                                    Mother:</label>
                                <div class="col-md-8">
                                    <input type="text" name="mother_phone" id="mother_phone"
                                           value="<?php echo $data->mother_phone; ?>"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mother_email" class="control-label col-md-4 required">Email address of
                                    Mother
                                    :</label>
                                <div class="col-md-8"><input type="email" name="mother_email" id="mother_email"
                                                             value="<?php echo $data->mother_email; ?>"
                                                             class="form-control"/>
                                </div>
                            </div>
                            <!-- Zahid Mzhmm -->
                            <div class="form-group">
                                <label for="home_address_mother" class="control-label col-md-4 required">Home Address of
                                    Mother:</label>
                                <div class="col-md-8"><input type="text" name="home_address_mother"
                                                             id="home_address_mother"
                                                             value="<?php echo $data->home_address_mother; ?>"
                                                             class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="work_address_mother" class="control-label col-md-4 required">Work Address of
                                    Mother:</label>
                                <div class="col-md-8"><input type="text" name="work_address_mother"
                                                             id="work_address_mother"
                                                             value="<?php echo $data->work_address_mother; ?>"
                                                             class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nid_mother" class="control-label col-md-4 required">National ID Number of
                                    Mother:</label>
                                <div class="col-md-8"><input type="text" name="nid_mother" id="nid_mother"
                                                             value="<?php echo $data->nid_mother; ?>"
                                                             class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mother_profession"
                                       class="control-label col-md-4 required">Profession: </label>
                                <div class="col-md-8"><input type="text" name="mother_profession" id="mother_profession"
                                                             value="<?php echo $data->mother_profession; ?>"
                                                             class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="required control-label col-md-8 " style="text-align: left">Is your
                                    contact
                                    address the same with your parents?</label>
                                <div class="col-md-4">
                                    <input type="radio" name="addr_same_as_parent"
                                           value="1" <?= $data->addr_same_as_parent == 1 ? "checked" : "" ?> >Yes
                                    <input type="radio" name="addr_same_as_parent"
                                           value="0" <?= $data->addr_same_as_parent == 0 ? "checked" : "" ?>> No
                                </div>
                            </div>

                            <div class=" form-group <?= !@$data->addr_same_as_parent ? "" : "hidden" ?>">
                                <label for="contact_address" class="required control-label col-md-4">Contact address of
                                    Parents:</label>
                                <div class="col-md-8">
                                    <input type="text" name="contact_address_parent" id="contact_address_parent"
                                           value="<?php echo $data->contact_address_parent; ?>" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-8" style="text-align: left">Is either or both
                                    of your parents also your sponsor?</label>
                                <div class="col-md-4">
                                    <input type="radio" name="parent_is_sponsor"
                                           value="1" <?= $data->parent_is_sponsor == 1 ? "checked" : "" ?>> Yes
                                    <input type="radio" name="parent_is_sponsor"
                                           value="0" <?= $data->parent_is_sponsor == 0 ? "checked" : "" ?>> No
                                </div>
                            </div>

                            <div id="sponsor_details" class="<?= !@$data->parent_is_sponsor ? "" : "hidden" ?>">

                                <div class="form-group">
                                    <label for="sponsor_name "
                                           class="control-label col-md-4  <?= !@$data->parent_is_sponsor ? "required" : "" ?>">Name
                                        of Sponsor
                                        :</label>
                                    <div class="col-md-8">
                                        <input type="text" name="sponsor_name" id="sponsor_name "
                                               value="<?php echo $data->sponsor_name; ?>"
                                               class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sponsor_address"
                                           class="control-label col-md-4 <?= !@$data->parent_is_sponsor ? "required" : "" ?>">Address
                                        of
                                        Sponsor:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="sponsor_address" id="sponsor_address"
                                               value="<?php echo $data->sponsor_address; ?>"
                                               class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sponsor_phone"
                                           class="control-label col-md-4 <?= !@$data->parent_is_sponsor ? "required" : "" ?>">Phone
                                        number of
                                        Sponosr:</label>
                                    <div class="col-md-8">
                                        <input type="number" name="sponsor_phone" id="sponsor_phone"
                                               value="<?php echo $data->sponsor_phone; ?>"
                                               class="form-control "/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sponsor_email"
                                           class="control-label col-md-4 <?= !@$data->parent_is_sponsor ? "required" : "" ?>">Email
                                        address of
                                        Sponosr
                                        :</label>
                                    <div class="col-md-8"><input type="email" name="sponsor_email" id="sponsor_email"
                                                                 value="<?php echo $data->sponsor_email; ?>"
                                                                 class="form-control "/>
                                    </div>
                                </div>
                                <!--Zahid Mzhmm-->
                                <div class="form-group">
                                    <label for="home_address_sponsor"
                                           class="control-label col-md-4 <?= !@$data->home_address_sponsor ? "required" : "" ?>">Home
                                        Address of Sponsor:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="home_address_sponsor" id="home_address_sponsor"
                                               value="<?php echo $data->home_address_sponsor; ?>"
                                               class="form-control "/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="work_address_sponsor"
                                           class="control-label col-md-4 <?= !@$data->work_address_sponsor ? "required" : "" ?>">Work
                                        Address of Sponsor:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="work_address_sponsor" id="work_address_sponsor"
                                               value="<?php echo $data->work_address_sponsor; ?>"
                                               class="form-control "/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nid_sponsor"
                                           class="control-label col-md-4 <?= !@$data->nid_sponsor ? "required" : "" ?>">National
                                        ID Number of Sponsor:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="nid_sponsor" id="nid_sponsor"
                                               value="<?php echo $data->nid_sponsor; ?>" class="form-control "/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="num_dependents_sponsor"
                                           class="control-label col-md-4 <?= !@$data->num_dependents_sponsor ? "required" : "" ?>">Number
                                        of Dependents on Sponsor:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="num_dependents_sponsor" id="num_dependents_sponsor"
                                               value="<?php echo $data->num_dependents_sponsor; ?>"
                                               class="form-control "/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sponsor_relation"
                                           class="control-label col-md-4 <?= !@$data->parent_is_sponsor ? "required" : "" ?>">Relationship
                                        with
                                        Sponsor: </label>
                                    <div class="col-md-8"><input type="text" name="sponsor_relation"
                                                                 id="sponsor_relation"
                                                                 value="<?php echo $data->sponsor_relation; ?>"
                                                                 class="form-control "/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sponsor_profession"
                                           class="control-label col-md-4 <?= !@$data->parent_is_sponsor ? "required" : "" ?>">Profession: </label>
                                    <div class="col-md-8"><input type="text" name="sponsor_profession"
                                                                 id="sponsor_profession"
                                                                 value="<?php echo $data->sponsor_profession; ?>"
                                                                 class="form-control "/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="step-2">
                    <h2 class="StepTitle">Step 2 Content</h2>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name_institution" class="control-label col-md-4 required">Name of
                                Institution:</label>
                            <div class="col-md-8">
                                <input type="text" name="name_institution" id="name_institution"
                                       value="<?php echo $data->name_institution; ?>"
                                       class="form-control"/>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="add_institution" class="control-label col-md-4 required">Address of
                                Institution:</label>
                            <div class="col-md-8"><input type="text" name="add_institution" id="add_institution"
                                                         value="<?php echo $data->add_institution; ?>"
                                                         class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="course_study" class="control-label col-md-4 required">Course of Study:</label>
                            <div class="col-md-8"><input type="text" name="course_study" id="course_study"
                                                         value="<?php echo $data->course_study; ?>"
                                                         class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level_study" class="control-label col-md-4 required">Level of Study:</label>
                            <div class="col-md-8"><input type="text" name="level_study" id="level_study"
                                                         value="<?php echo $data->level_study; ?>"
                                                         class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="matriculation_number" class="control-label col-md-4 required">Matriculation
                                Number:</label>
                            <div class="col-md-8"><input type="text" name="matriculation_number"
                                                         id="matriculation_number"
                                                         value="<?php echo $data->matriculation_number; ?>"
                                                         class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="university_registrar" class="control-label col-md-4 required">Name of University
                                Registrar:</label>
                            <div class="col-md-8"><input type="text" name="university_registrar"
                                                         id="university_registrar"
                                                         value="<?php echo $data->university_registrar; ?>"
                                                         class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registrar_phone" class="control-label col-md-4 required">Phone Number of
                                Registrar:</label>
                            <div class="col-md-8"><input type="number" name="registrar_phone" id="registrar_phone"
                                                         value="<?php echo $data->registrar_phone; ?>"
                                                         class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registrar_email" class="control-label col-md-4 required">Email address of
                                Registrar:</label>
                            <div class="col-md-8"><input type="email" name="registrar_email" id="registrar_email"
                                                         value="<?php echo $data->registrar_email; ?>"
                                                         class="form-control"/>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="" class="required control-label col-md-5" style="text-align: left">Do you have
                                valid
                                Summer Holiday?</label>
                            <div class="col-md-7">
                                <input type="radio" name="have_valid_summer_holiday"
                                       value="1" <?= $data->have_valid_summer_holiday == 1 ? "checked" : "" ?>> Yes
                                <input type="radio" name="have_valid_summer_holiday"
                                       value="0" <?= $data->have_valid_summer_holiday == 0 ? "checked" : "" ?>> No
                            </div>
                        </div>

                        <div id="summer_holiday_dates"
                             class="<?= $data->have_valid_summer_holiday == "1" ? "" : "hidden" ?>">
                            <div class="form-group">
                                <label for="holiday_start_date"
                                       class="control-label col-md-5 <?= $data->have_valid_summer_holiday == "1" ? "required" : "" ?>">Summer
                                    Holiday
                                    Starts:</label>
                                <div class="col-md-7">
                                    <!--                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />-->

                                    <input type="text" name="holiday_start_date" id="holiday_start_date"
                                           value="<?= @$data->holiday_start_date ? $data->holiday_start_date : ""; ?>"
                                           class="form-control date-picker"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="holiday_end_date"
                                       class="control-label col-md-5 <?= $data->have_valid_summer_holiday == "1" ? "required" : "" ?>">Summer
                                    Holiday
                                    Ends:</label>
                                <div class="col-md-7"><input type="text" name="holiday_end_date" id="holiday_end_date"
                                                             value="<?= @$data->holiday_end_date ? $data->holiday_end_date : ""; ?>"
                                                             class="form-control date-picker"/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="expect_grad_date"
                                       class="control-label col-md-5 <?= $data->have_valid_summer_holiday == "1" ? "required" : "" ?>">Expected
                                    Graduation
                                    Date:</label>
                                <div class="col-md-7"><input type="text" name="expect_grad_date" id="expect_grad_date"
                                                             value="<?= @$data->expect_grad_date ? $data->expect_grad_date : ""; ?>"
                                                             class="form-control date-picker"/>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="hear_about_program" class="control-label col-md-5 required">How did you hear
                                about this program?</label>
                            <div class="col-md-7">
                                <select name="hear_about_program" id="hear_about_program"
                                        class="form-control">
                                    <option value="">--Select--</option>


                                    <option value="friends"
                                            <?php if ($data->hear_about_program == 'friends'): ?>selected="selected"<?php endif; ?>>
                                        Friends
                                    </option>
                                    <option value="institution"
                                            <?php if ($data->hear_about_program == 'institution'): ?>selected="selected"<?php endif; ?>>
                                        Institution
                                    </option>
                                    <option value="others"
                                            <?php if ($data->hear_about_program == 'others'): ?>selected="selected"<?php endif; ?>>
                                        Others
                                    </option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group <?= $data->hear_about_program != "" ? "" : "hidden" ?>">
                            <label class="control-label col-md-5" hidden></label>
                            <div class="col-md-7 col-md-offset-5"><input type="text" name="hear_from_other"
                                                                         id="hear_from_other"
                                                                         value="<?php echo $data->hear_from_other; ?>"
                                                                         class="form-control"/>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="" class="required control-label col-md-5" style="text-align: left">Do you have
                                to take summer classes or carry-over courses in the summer?</label>
                            <div class="col-md-4">
                                <input type="radio" name="have_carry_over_classes"
                                       value="1" <?= $data->have_carry_over_classes == 1 ? "checked" : "" ?>> Yes
                                <input type="radio" name="have_carry_over_classes"
                                       value="0" <?= $data->have_carry_over_classes == 0 ? "checked" : "" ?>> No
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-11 col-md-offset-1">We strongly advise recommendation by previous program
                                participant. However, if you do not have a program recommender, your registration will
                                still be considered on its own merits.
                            </div>
                        </div>
                    </div>
                </div>
                <div id="step-3">
                    <h2 class="StepTitle">Step 3: Travel History</h2>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="control-label col-md-3" style="text-align: left">Do you have previous
                                travel experience? </label>
                            <div class="col-md-4">
                                <input type="radio" name="have_travel_history"
                                       value="1" <?= $data->have_travel_history == 1 ? "checked" : "" ?>> Yes
                                <input type="radio" name="have_travel_history"
                                       value="0" <?= $data->have_travel_history == 0 ? "checked" : "" ?>> No
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 travel_history_input <?= $data->have_travel_history == "1" ? "" : "hidden" ?>">

                        <table id="table_travel_history" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name of Country</th>
                                <th>Purpose</th>
                                <th>Duration of Stay</th>
                                <th>Year</th>
                                <th>Add New</th>
                            </tr>
                            <tr>
                                <!-- Zahid Mzhmm CY -->
                                <td>
                                    <div class="form-group">
                                        <label class="hidden"></label>
                                        <div class="col-md-12">
                                            <select name="travel_country[]" id=""
                                                    class="form-control travel_country_req" style="width: 15rem;">
                                                <?php \app\Web::createcountrycombo(); ?>
                                            </select>
                                            <!--<input type="text" class="form-control travel_country_req"
                                                   name="travel_country[]">-->
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="hidden"></label>
                                        <div class="col-md-12"><input type="text"
                                                                      class="form-control travel_purpose_req"
                                                                      name="travel_purpose[]">
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="hidden"></label>
                                        <div class="col-md-12"><input type="text"
                                                                      class="form-control travel_stay_duration_req"
                                                                      name="travel_stay_duration[]"></div>

                                    </div>
                                </td>
                                <!-- Zahid Mzhmm CY -->
                                <td>
                                    <div class="form-group">
                                        <label class="hidden"></label>
                                        <div class="col-md-12">
                                            <select name="travel_year[]" id="" class="form-control travel_year_req"
                                                    style="width: 10rem">
                                                <?php \app\Web::yearloop(); ?>
                                            </select>
                                            <!--<input type="text" class="form-control travel_year_req"
                                                   name="travel_year[]">-->
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="hidden"></label>
                                        <div class="col-md-12"><input type="button" class="form-control" value="Add"
                                                                      id="btn_add_travel_history"></div>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" align="center"><strong>Please, click on Add button to create a new
                                        entry. Thank you</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Zahid Mzhmm CY -->
                            <?php if ($data->have_travel_history) {

                                $travel_history = $medoo->select('tbl_travel_history', "*", array("user_id" => $user_id));

                                foreach ($travel_history as $item => $t_history) {
                                    $t_history = (object)$t_history
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="hidden"></label>
                                                <div class="col-md-12">
                                                    <select name="travel_country[]" id=""
                                                            class="form-control" style="width: 15rem;">
                                                        <?php \app\Web::createcountrycombo($t_history->country); ?>
                                                    </select>
                                                    <!--<input class="form-control" name="travel_country[]" type="text"
                                                           value="<?/*= $t_history->country */
                                                    ?>">-->
                                                </div>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="hidden"></label>
                                                <div class="col-md-12"><input class="form-control"
                                                                              name="travel_purpose[]" type="text"
                                                                              value="<?= $t_history->purpose ?>">
                                                </div>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="hidden"></label>
                                                <div class="col-md-12"><input class="form-control"
                                                                              name="travel_stay_duration[]" type="text"
                                                                              value="<?= $t_history->stay_duration ?>">
                                                </div>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="hidden"></label>
                                                <div class="col-md-12">
                                                    <select name="travel_year[]" id="" class="form-control"
                                                            style="width: 10rem">
                                                        <?php \app\Web::yearloop($t_history->year); ?>
                                                    </select>
                                                    <!--<input class="form-control" name="travel_year[]" type="text"
                                                           value="<?/*= $t_history->year */
                                                    ?>">-->
                                                </div>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="hidden"></label>
                                                <div class="col-md-12"><input
                                                            class="form-control btn_remove_travel_history"
                                                            value="Remove" type="button"></div>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }; ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="have_applied_before" class="control-label col-md-3" style="text-align: left">Have
                                you applied for US visa previously? </label>
                            <div class="col-md-4">
                                <input type="radio" name="have_applied_before"
                                       value="1" <?= $data->have_applied_before == 1 ? "checked" : "" ?>> Yes
                                <input type="radio" name="have_applied_before"
                                       value="0" <?= $data->have_applied_before == 0 ? "checked" : "" ?>> No
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 prev_apply_input <?= $data->have_applied_before == "1" ? "" : "hidden" ?>">

                        <table id="visa_apply_history" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Purpose</th>
                                <th>Year</th>
                                <th>Visa Decision</th>
                                <th>Place of Visa Application</th>
                                <th>Add New</th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="hidden"></label>
                                        <div class="col-md-12"><input type="text" class="form-control"
                                                                      name="visa_purpose[]">
                                        </div>

                                    </div>
                                </td>
                                <!-- Zahid Mzhmm CY -->
                                <td>
                                    <div class="form-group">
                                        <label class="hidden"></label>
                                        <div class="col-md-12">
                                            <select name="visa_year[]" id="" class="form-control"
                                                    style="width: 10rem">
                                                <?php \app\Web::yearloop(); ?>
                                            </select>
                                            <!--<input type="text" class="form-control" name="visa_year[]">-->
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="hidden"></label>
                                        <div class="col-md-12"><input type="text" class="form-control"
                                                                      name="visa_decision[]"></div>

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="hidden"></label>
                                        <div class="col-md-12"><input type="text" class="form-control"
                                                                      name="visa_application[]"></div>

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="hidden"></label>
                                        <div class="col-md-12"><input type="button" class="form-control" value="Add"
                                                                      id="btn_add_visa_history"></div>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" align="center"><strong>Please, click on Add button to create a new
                                        entry. Thank you</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Zahid Mzhmm CY -->
                            <?php if ($data->have_applied_before) {
                                $visa_history = $medoo->select('tbl_visa_history', "*", array("user_id" => $user_id));

                                foreach ($visa_history as $item => $v_history) {
                                    $v_history = (object)$v_history;
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="hidden"></label>
                                                <div class="col-md-12"><input class="form-control" name="visa_purpose[]"
                                                                              type="text"
                                                                              value="<?= $v_history->purpose ?>">
                                                </div>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="hidden"></label>
                                                <div class="col-md-12">
                                                    <select name="visa_year[]" id="" class="form-control"
                                                            style="width: 10rem">
                                                        <?php \app\Web::yearloop($v_history->year); ?>
                                                    </select>
                                                </div>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="hidden"></label>
                                                <div class="col-md-12"><input class="form-control"
                                                                              name="visa_decision[]" type="text"
                                                                              value="<?= $v_history->visa_decision ?>">
                                                </div>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="hidden"></label>
                                                <div class="col-md-12"><input class="form-control"
                                                                              name="visa_application[]" type="text"
                                                                              value="<?= $v_history->visa_application ?>">
                                                </div>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="hidden"></label>
                                                <div class="col-md-12"><input
                                                            class="form-control btn_remove_visa_history" value="Remove"
                                                            type="button"></div>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } ?>
                            </tbody>
                        </table>

                    </div>
                </div>


                <div id="step-4">
                    <h2 class="StepTitle">Step 4: Program Experience</h2>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="" class="control-label col-md-8" style="text-align: left">Have you made an
                                application to the Summer Work program previously?</label>
                            <div class="col-md-4">
                                <input type="radio" name="have_experience"
                                       value="1" <?= $data->have_experience == 1 ? "checked" : "" ?>> Yes
                                <input type="radio" name="have_experience"
                                       value="0" <?= $data->have_experience == 0 ? "checked" : "" ?>> No
                            </div>
                        </div>
                        <div id="have_experience_input" class="<?= $data->have_experience == "1" ? "" : "hidden" ?>">

                            <div class="form-group">
                                <label for="name_of_institution" class="control-label col-md-5 ">Name of Institution at
                                    the time of application:</label>
                                <div class="col-md-7">
                                    <input type="text" name="name_of_institution" id="name_of_institution"
                                           value="<?php echo $data->name_of_institution; ?>"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="level_of_study" class=" control-label col-md-5">Level of Study at the time
                                    of application:</label>
                                <div class="col-md-7">
                                    <input type="text" name="level_of_study" id="level_of_study"
                                           value="<?php echo $data->level_of_study; ?>"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="local_representative" class=" control-label col-md-5">Name of Local
                                    Representative:</label>
                                <div class="col-md-7"><input type="text" name="local_representative"
                                                             id="local_representative"
                                                             value="<?php echo $data->local_representative; ?>"
                                                             class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="program_sponsor_name" class=" control-label col-md-5">Job Offer: </label>
                                <div class="col-md-7">
                                    <select name="job_offer" class="form-control input-small">
                                        <option value=""> Select Job Offer</option>
                                        <option value="yes"
                                                <?php if ($data->job_offer == 'yes'): ?>selected="selected"<?php endif; ?>>
                                            Yes
                                        </option>
                                        <option value="no"
                                                <?php if ($data->job_offer == 'no'): ?>selected="selected"<?php endif; ?>>
                                            No
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="program_sponsor_name" class=" control-label col-md-5">Visa
                                    Interview: </label>
                                <div class="col-md-7">
                                    <select name="visa_interview" class="form-control input-small">
                                        <option value=""> Select Visa Interview</option>
                                        <option value="yes"
                                                <?php if ($data->visa_interview == 'yes'): ?>selected="selected"<?php endif; ?>>
                                            Yes
                                        </option>
                                        <option value="no"
                                                <?php if ($data->visa_interview == 'no'): ?>selected="selected"<?php endif; ?>>
                                            No
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="besor_previous_application" class=" control-label col-md-5">Did you make
                                    your previous application with Besor Associates?</label>
                                <div class="col-md-7">
                                    <select name="besor_previous_application" class="form-control input-small">
                                        <option value=""> Select</option>
                                        <option value="1" <?php if ($data->besor_previous_application == 1) {
                                            echo 'selected=selected';
                                        } ?>>Yes
                                        </option>
                                        <option value="0" <?php if ($data->besor_previous_application == 0) {
                                            echo 'selected=selected';
                                        } ?>>No
                                        </option>
                                    </select>
                                </div>
                            </div>


                            <div id="reason_not_using_same_service_div" class="form-group"
                                 style="display:<?php if ($data->besor_previous_application == '1') {
                                     echo 'none';
                                 } ?>">
                                <label for="reason_not_using_same_service" class=" control-label col-md-5">Reason for
                                    not using the same service: </label>
                                <div class="col-md-7"><input type="text" name="reason_not_using_same_service"
                                                             id="reason_not_using_same_service"
                                                             value="<?php echo $data->reason_not_using_same_service; ?>"
                                                             class="form-control"/>
                                </div>
                            </div>
                            <!-- Zahid Mzhmm -->
                            <div id="members_participated" class="form-group"
                                 style="display:<?php if ($data->besor_previous_application == '1') {
                                     echo 'none';
                                 } ?>">
                                <label for="members_participated" class=" control-label col-md-5">
                                    Do you have friends or family members who participated in the Summer Work Program
                                    previously?
                                </label>
                                <div class="col-md-7">
                                    <input type="radio" onclick="members_paricipated(1)" checked
                                           name="members_participated" value="yes"> Yes
                                    <input type="radio" onclick="members_paricipated(2)" name="members_participated"
                                           value="no"> No
                                </div>
                            </div>
                            <!-- If Yes -->
                            <div id="members_participated_yes">
                                <div class="form-group">
                                    <label for="members_participated_student" class="control-label col-md-5">
                                        Name of Student:
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="members_participated_student"
                                               id="members_participated_student"
                                               value="<?php echo $data->members_participated_student; ?>"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="members_participated_relationship" class=" control-label col-md-5">
                                        Relationship to you:
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="members_participated_relationship"
                                               id="members_participated_relationship"
                                               value="<?php echo $data->members_participated_relationship; ?>"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="members_participated_institution" class=" control-label col-md-5">
                                        Name of Institution at the time participation:
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="members_participated_institution"
                                               id="members_participated_institution"
                                               value="<?php echo $data->members_participated_institution; ?>"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="members_participated_yes" class=" control-label col-md-5">
                                        Year of Participation:
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="members_participated_yes" id="members_participated_yes"
                                               value="<?php echo $data->members_participated_yes; ?>"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="members_participated_p_sponsor" class=" control-label col-md-5">
                                        Name of Program Sponsor:
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="members_participated_p_sponsor"
                                               id="members_participated_p_sponsor"
                                               value="<?php echo $data->members_participated_p_sponsor; ?>"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="members_participated_local_representative"
                                           class=" control-label col-md-5">
                                        Name of Local Representative:
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="members_participated_local_representative"
                                               id="members_participated_local_representative"
                                               value="<?php echo $data->members_participated_local_representative; ?>"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="members_participated_employer" class=" control-label col-md-5">
                                        Name of Employer:
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="members_participated_employer"
                                               id="members_participated_employer"
                                               value="<?php echo $data->members_participated_employer; ?>"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="members_participated_em_location" class=" control-label col-md-5">
                                        Location (City, State) of Employer:
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="members_participated_em_location"
                                               id="members_participated_em_location"
                                               value="<?php echo $data->members_participated_em_location; ?>"
                                               class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>

                <div id="step-5">
                    <h2 class="StepTitle">Step 5: Contact in the USA</h2>
                    <div class="col-md-12"><strong>Contacts must either be family members, relatives or
                            friends.</strong></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="usa_contact_name " class="control-label col-md-4 required">Full name of
                                contact:</label>
                            <div class="col-md-8">
                                <input type="text" name="usa_contact_name" id="usa_contact_name"
                                       value="<?php echo $data->usa_contact_name; ?>"
                                       class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="usa_contact_address" class="control-label col-md-4 required">Address of
                                contact:</label>
                            <div class="col-md-8"><input type="text" name="usa_contact_address" id="usa_contact_address"
                                                         value="<?php echo $data->usa_contact_address; ?>"
                                                         class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="usa_contact_phone" class="control-label col-md-4 required">Phone number of
                                contact:</label>
                            <div class="col-md-8">
                                <input type="number" name="usa_contact_phone" id="usa_contact_phone"
                                       value="<?php echo $data->usa_contact_phone; ?>"
                                       class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="usa_contact_relation" class="control-label col-md-4 required">Relationship to
                                you: </label>
                            <div class="col-md-8"><input type="text" name="usa_contact_relation"
                                                         id="usa_contact_relation"
                                                         value="<?php echo $data->usa_contact_relation; ?>"
                                                         class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="usa_contact_status" class="control-label col-md-4 required">Resident Status in
                                the USA: </label>
                            <div class="col-md-8"><input type="text" name="usa_contact_status" id="usa_contact_status"
                                                         value="<?php echo $data->usa_contact_status; ?>"
                                                         class="form-control"/>
                            </div>
                        </div>
                        <!-- Zahid Mzhmm -->
                        <div class="form-group">
                            <label for="occupation_usa" class="control-label col-md-4 required">
                                Occupation in the USA:
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="occupation_usa" id="occupation_usa"
                                       value="<?php echo $data->occupation_usa; ?>"
                                       class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="duration_stay_usa" class="control-label col-md-4 required">
                                Duration of Stay in the USA:
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="duration_stay_usa" id="duration_stay_usa"
                                       value="<?php echo $data->duration_stay_usa; ?>"
                                       class="form-control"/>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="step-6">
                    <h2 class="StepTitle">Step 6: Agreement</h2>
                    <p> I hereby certify that all the information provided by me on this registration form is
                        factually correct and up-to-date. I understand that Besor Associates utilizes email to
                        communicate with me before, during and after my Work & Travel Program and agree to maintain
                        an active email account and advise Besor Associates of any changes in my email address. I
                        agree that in accordance with the US Department of State requirement for the program, I must
                        be a bonafide, current and non-graduated university student with institutional calendar that
                        fits the set dates for my country of legal domicile. I understand that any false or omitted
                        information may lead to rejection of my Work & Travel program application and undertake to
                        provide updated information to Besor Associates.</p>
                    <div class="col-md-12">

                        <input type="checkbox" value="1" id="chk_consent_agree" name="chk_consent_agree"> <label
                                for="chk_consent_agree"> Yes,
                            I agree.</label>

                    </div>
                </div>
            </div>


            <div style="clear: both"></div>

        </form>
    </div>
</section>
<div style="display:none; visibility:hidden">
    <div class="confirm">
        <p> Are you satisfied with the information supplied on your registration form and confirmed that all details are
            correct? </p>
        <p> You will not be able to change any detail after this stage. </p>
    </div>
</div>

<?php include("includes/footer.php"); ?>
<script type="text/javascript" src=""></script>
<link rel="stylesheet" href="css/icropper.css">
<!-- <script type="text/javascript" src="js/jquery-2.0.min.js"></script> -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/icropper.js"></script>

<style type="text/css">
    .demoWrapper {
        padding: 20px;
        /*border-top: 2px solid #eee;*/
        width: 480px;
        margin: auto;
    }

    .cropperContainer {
        float: left;
        border: 0px solid #eee;
        /*min-width: 440px;Used to improve layout during loading the image.
        min-height: 327px;*/
        min-height: auto;
        min-width: auto;
    }

    .previews {
        float: left;
        margin-left: 0px;
    }

    .previewSmall {
        margin: 40px;
        width: 200px;
        height: 100px;
    }

    .previewBig {
        margin: 40px;
        width: 200px;
        height: 100px;
    }

    .info {
        clear: both;
        padding: 5px;
        font-family: Arial;
        font-size: 12px;
        color: #777;
    }

    h1 {
        font-family: Arial;
        color: #777;
        text-align: center;
    }

    h2 {
        font-family: Arial;
        color: #777;
    }

    fieldset {
        margin-top: 156px !important;
    }
</style>
<script type="text/javascript">

    var stepIncr = 0;

    $(document).ready(function () {
        // Smart Wizard
        var wizardElement = $('#wizard').smartWizard({
            selected: <?=$data->current_step - 1;?>,
            onLeaveStep: leaveAStepCallback,
            onFinish: onFinishCallback,
            onContinueLater: onContinueLater,
            enableFinishButton:<?=$data->current_step == 6 ? "true" : "false"?>
        });

        <?php
        if($data->current_step > 1):
        echo "var activate_steps=$data->current_step;";
        ?>
        for (i = 0; i < activate_steps; i++) {
            wizardElement.smartWizard('enableStep', i);
        }
        <?php endif; ?>

        $('.date-picker').datepicker({
            orientation: "left",
            format: "yyyy-mm-dd",
            autoclose: true
        });

        //check file upload
        var _URL = window.URL || window.webkitURL;

        var topImage = 0;
        var leftImage = 0;
        var widthImage = 0;
        var heightImage = 0;

        $(function () {

            function readURLNew(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        initICropper(e.target.result);
                        $("#imageModel").modal('show');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function initICropper(imageSrc) {
                var infoNode2 = document.getElementById('info2');
                $('#cropperContainer2').html('');
                $('#previewSmall2').html('');
                //$('#previewBig2').html('');


                var ic2 = new ICropper(
                    'cropperContainer2'
                    , {
                        ratio: 0
                        , image: imageSrc
                        , onChange: function (info) {	//onChange must be set when constructing.
                            topImage = info.t;
                            leftImage = info.l;
                            widthImage = info.w;
                            heightImage = info.h;

                            infoNode2.innerHTML = 'Left: ' + info.l + 'px, Top: ' + info.t
                                + 'px, Width: ' + info.w + 'px, Height: ' + info.h + 'px';
                        }
                        , preview: [
                            'previewSmall2'
                        ]
                    });
                //use bindPreview to dynamically add preview nodes
                //ic2.bindPreview('previewBig2');
            }

            $("#passport_photograph").change(function () {
                readURLNew(this);
            });

            function cropImage(img) {
                var canvas = document.createElement('canvas');

                canvas.id = "CursorLayer";
                canvas.width = widthImage;
                canvas.height = heightImage;


                document.getElementById("imgPreview").appendChild(canvas);

                //document.body.appendChild(canvas);

                var ctx = canvas.getContext("2d");
                var image = new Image();
                //	image.src = $('#previewBig2 img').attr("src");
                image.src = $('#cropperContainer2').find('img:first').attr("src");

                ctx.drawImage(image, leftImage, topImage, widthImage, heightImage, 0, 0, widthImage, heightImage);

                var base64Data = canvas.toDataURL();

                var imageData = base64Data.split(",")[1];
                var imageType = base64Data.substring("data:image/".length, base64Data.indexOf(";base64"));

                $('#sample_input').val(imageData);
                $('#image_type').val(imageType);
                canvas.remove();
                return base64Data;
            }

            $('#apply').on("click", function () {
                if (widthImage > 300 || heightImage > 300) {
                    alert('Please ensure that your image is not larger than 300 by 300 pixels in dimension before upload');
                    return;
                }
                $('#imageModel').modal('hide');
                //$('#old_preview').remove();
                var base64Data = cropImage($('#previewBig2 img').attr("src"));
                //oldpreviews
                $('#old_preview').attr('src', base64Data);
                $("#previews").show();
            });


        });


        // $("#passport_photograph").change(function () {
        //     var file, img;
        //     var container = $(this).closest(".form-group");
        //     if ((file = this.files[0])) {
        //         img = new Image();
        //         img.onload = function () {
        //             //alert(this.width + " " + this.height);
        //             if (this.width < 600) {
        //                 //alert("ereeee");
        //                 $(".file-error-msg").removeClass("hidden");
        //                 container.addClass("has-error");
        //             } else {
        //                 $(".file-error-msg").addClass("hidden");
        //                 container.removeClass("has-error");
        //             }
        //         };
        //         img.src = _URL.createObjectURL(file);
        //     }
        // });

        //contact address same as prent??
        $("input[name='addr_same_as_parent']").change(function () {
            if ($(this).val() == 1) {
                $(this).closest(".form-group").next().addClass("hidden");
                $("#contact_address_parent").val($("#contact_address").val());

            } else {
                $(this).closest(".form-group").next().removeClass("hidden");
                $("#contact_address_parent").val("");
            }
        });

        //parent is sponsor??
        $("input[name='parent_is_sponsor']").change(function () {

            if ($(this).val() == 1) {
                $("#sponsor_details").find("label").removeClass("required");
                $("#sponsor_details").find(".has-error").removeClass("has-error");
                $("#sponsor_details").addClass("hidden");
                $("#sponsor_details").find("input").val("");
            } else {
                $("#sponsor_details").find("label").addClass("required");
                $("#sponsor_details").removeClass("hidden");
            }
        });

        //hear about us
        $("#hear_about_program").change(function () {
            //alert($(this).val());
            if ($(this).val() != "") {
                $(this).closest(".form-group").next().removeClass("hidden");
                $(this).closest(".form-group").next().find("label").addClass("required");
            } else {
                $(this).closest(".form-group").next().addClass("hidden").find("input").val("");
                $(this).closest(".form-group").next().find("label").removeClass("required");
            }
            //wizardElement.smartWizard('fixHeight')
        });

        //previous travel history
        $("input[name='have_travel_history']").change(function () {

            if ($(this).val() == "1") {
                $(".travel_history_input").removeClass("hidden");
                $(".travel_history_input").find("label").addClass("required");
                var travel_country_req = $('.travel_country_req').val();
                var travel_purpose_req = $('.travel_purpose_req').val();
                var travel_stay_duration_req = $('.travel_stay_duration_req').val();
                var travel_year_req = $('.travel_year_req').val();
                // if(travel_country_req == ""){
                //     alert('Please add Country');
                //     return false;
                // }
                // if(travel_purpose_req == ""){
                //     alert('Please add Purpose');
                //     return false;
                // }
                // if(travel_stay_duration_req == ""){
                //     alert('Please add Duration');
                //     return false;
                // }
                // if(travel_year_req == ""){
                //     alert('Please add Year');
                //     return false;
                // }
            } else {
                $(".travel_history_input").addClass("hidden").find("input[type='text']").val("");
                $(".travel_history_input").find("table tbody").html("");
                $(".travel_history_input").find("label").removeClass("required");
            }
            wizardElement.smartWizard('fixHeight')
        });

        //have applied before
        $("input[name='have_applied_before']").change(function () {

            if ($(this).val() == "1") {
                $(".prev_apply_input").removeClass("hidden");
                $(".prev_apply_input").find("label").addClass("required");
            } else {
                $(".prev_apply_input").addClass("hidden").find("input[type='text']").val("");
                $(".prev_apply_input").find("table tbody").html("");
                $(".prev_apply_input").find("label").removeClass("required");
            }
            wizardElement.smartWizard('fixHeight')
        });

        $("select[name='besor_previous_application']").change(function () {
            if ($(this).val() == "1") {
                $("#reason_not_using_same_service_div").hide();
                $("#reason_not_using_same_service_div").find("label").removeClass("required");
                $("#reason_not_using_same_service_div").find(".has-error").removeClass("has-error");
                $("#reason_not_using_same_service_div").addClass("hidden");
                $("#reason_not_using_same_service_div").find("input").val("");
            } else {
                $("#reason_not_using_same_service_div").show();
                $("#reason_not_using_same_service_div").find("label").addClass("required");
                $("#reason_not_using_same_service_div").removeClass("hidden");
            }
            wizardElement.smartWizard('fixHeight')
        });


        //program experience
        $("input[name='have_experience']").change(function () {

            if ($(this).val() == "1") {
                $("#have_experience_input").removeClass("hidden")
                    .find("label")
                    .addClass("required");
            } else {
                $("#have_experience_input").addClass("hidden").find("input[type='text']").val("");
                $("#have_experience_input")
                    .find("label")
                    .removeClass("required");
            }
            wizardElement.smartWizard('fixHeight');
        });

        //have_valid_summer_holiday
        //program experience
        $("input[name='have_valid_summer_holiday']").change(function () {

            if ($(this).val() == "1") {
                $("#summer_holiday_dates").removeClass("hidden")
                    .find("label")
                    .addClass("required");
                wizardElement.smartWizard('fixHeight');
            } else {
                $("#summer_holiday_dates").addClass("hidden").find("input[type='text']").val("");
                $("#summer_holiday_dates")
                    .find("label")
                    .removeClass("required");
                wizardElement.smartWizard('fixHeight');
            }
        });

        //add travel History
        $("#btn_add_travel_history").click(function () {

            //console.log("hello worl");
            $tr = $(this).closest("tr").clone();
            $tr.find("#btn_add_travel_history").removeAttr("id").attr("value", "Remove").addClass("btn_remove_travel_history");

            //console.log($tr);
            $("#table_travel_history").find("tbody").append($tr);

            //$tr.insertAfter($(this).closest("tr"));
            $(this).closest("tr").find("input[type='text']").val("");
            $(this).closest("tr").find(".required").removeClass("required");
            $(this).closest("tr").find(".has-error").removeClass("has-error");
            $(".btn_remove_travel_history").unbind('click');
            $(".btn_remove_travel_history").click(function () {
                $(this).closest("tr").remove();
            });
            wizardElement.smartWizard('fixHeight')
        });

        //previous visa history
        $("#btn_add_visa_history").click(function () {

            //console.log("hello worl");
            $tr = $(this).closest("tr").clone();
            $tr.find("#btn_add_visa_history").removeAttr("id").attr("value", "Remove").addClass("btn_remove_visa_history");

            //console.log($tr);
            $("#visa_apply_history").find("tbody").append($tr);

            //$tr.insertAfter($(this).closest("tr"));
            $(this).closest("tr").find("input[type='text']").val("");
            $(this).closest("tr").find(".required").removeClass("required");
            $(this).closest("tr").find(".has-error").removeClass("has-error");

            $(".btn_remove_visa_history").unbind('click');
            $(".btn_remove_visa_history").click(function () {
                $(this).closest("tr").remove();
            });
            wizardElement.smartWizard('fixHeight')
        });

        //remove travel History
        $(".btn_remove_travel_history").click(function () {
            $(this).closest("tr").remove();
        });

        //remove visa history
        $(".btn_remove_visa_history").click(function () {
            $(this).closest("tr").remove();
        });

    });


    function leaveAStepCallback(obj) {

        var step_num = obj.attr('rel');
        var success = validateStep(step_num);
        //have_carry_over_classes

        if ($("input[name='have_valid_summer_holiday']:checked").val() == 0 || $("input[name='have_carry_over_classes']:checked").val() == 1) {

            $('form').submit();
            return false;
        }
        if (success) SaveAndContinue(parseInt(step_num));

        return success;
    }

    function onFinishCallback() {

        // if ($("input[name='chk_consent_agree']").prop(":checked")) {
        if (document.getElementById('chk_consent_agree').checked) {
            $("#regform_complete").val(1);
            $('form').submit();
        } else {
            alert("Please accept the agreement to continue.");
        }

    }

    function SaveAndContinue(step) {
        var form = document.getElementById('registerform');
        var formData = new FormData(form);
        formData.append("save_and_continue", 1);
        formData.append("current_step", step);
//        formData.append("regform_complete", 0);
        $.ajax({
            url: $('#registerform').attr("action")
            , type: 'post'
            , processData: false
            , contentType: false
            , data: formData
            , complete: function (result) {
                console.log(result.responseText);
            }
        });
    }

    function onContinueLater() {

        var response = confirm("Are you sure you want to leave now?\r\n You must return to complete the registration within 24 hours to prevent cancellation and revocation of the access to future registrations.\r\n Thank you.");
        if (response == false)
            return false;
        var obj = $("#wizard ul.anchor li a.selected");
        $("#save_and_exit").val(1);
        $("#regform_complete").val(0);
        $("#current_step").val(obj.attr('rel'));
        $('form').submit();
    }

    function validateStep(step) {
        var form_groups = null;

        // validate step 1
        if (step == 1) var form_groups = $("#step-1 .required").closest(".form-group");
        if (step == 2) var form_groups = $("#step-2 .required").closest(".form-group");
        if (step == 3) var form_groups = $("#step-3 .required").closest(".form-group");
        if (step == 4) var form_groups = $("#step-4 .required").closest(".form-group");
        if (step == 5) var form_groups = $("#step-5 .required").closest(".form-group");
        if (step == 6) var form_groups = $("#step-6 .required").closest(".form-group");

        return IsValidStep(form_groups)
    }

    var IsValidStep = function (container) {
        var isValid = true;

        $.each($(container), function (idx, elem) {
            var input_elem = $(elem).find(":input");

            var elem_type = $(input_elem).prop('type');

            //console.log($(input_elem).attr("name"));
            var val = $(input_elem).val();

            if (!val && val.length <= 0) {
                isValid = false;
                //console.log($(input_elem).attr("name"));
                $(input_elem).closest('div.form-group').addClass('has-error');
            } else if (elem_type == "email") {

                //alert(input_elem.attr("name")+" = "+val+" is valid: "+ isValidEmailAddress(val));
                if (!isValidEmailAddress(val)) {
                    isValid = false;
                    //console.log($(input_elem).attr("name"));
                    $(input_elem).closest('div.form-group').addClass('has-error');
                }
            } else {

                $(input_elem).closest('div.form-group').removeClass('has-error');

            }
        });

        return isValid;
    }

    // Email Validation
    function isValidEmailAddress(val) {
        var pattern = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        return pattern.test(val);
    }

    function isNumeric(val) {
        var reg = /^\d+$/;
        return reg.test(val);
    }

    $("#social_media_handles").on("change", function () {
        var e = document.getElementById("social_media_handles");
        var selected = e.options[e.selectedIndex].value;
        var placeholderid = document.getElementById("social_media_handles_val");
        placeholderid.placeholder = selected + ' Profile Link';
    })

    function members_paricipated(val) {
        let memberdiv = $("#members_participated_yes");
        if (val == 1) {
            memberdiv.addClass("hidden");
            memberdiv.removeClass("hidden");
            memberdiv.find("label").addClass("required");
            memberdiv.removeClass("hidden");
        } else {
            memberdiv.find("label").removeClass("required");
            memberdiv.find(".has-error").removeClass("has-error");
            memberdiv.addClass("hidden");
            memberdiv.find("input").val("");
            memberdiv.removeClass("hidden");
            memberdiv.addClass("hidden")
        }
    }
</script>

<!-- The Modal -->
<div class="modal" id="imageModel">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Image Crop</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <!-- <div id="demo2" class="demoWrapper"> -->
                <!-- <h2>Free resizing (shift key to keep square)</h2> -->
                <div id="cropperContainer2" class="cropperContainer" style="height: 327px;width: 440px;"></div>
                <div class="previews">
                    <div id="previewSmall2" class="previewSmall"></div>
                    <!-- <div id="previewBig2" class="previewBig"></div> -->
                </div>
                <div id="info2" class="info"></div>
                <!-- </div> -->
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="apply btn btn-info" id="apply"> Apply</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
