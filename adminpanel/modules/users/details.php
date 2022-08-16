<?php

if (isset($_GET['usersid'])) {
$id = $_GET['usersid'];

$user_data = (object)sql::Select_single("select * from tbl_member where users_id='$id'");

$travel_history = sql::Select_single("select * from tbl_travel_history where user_id='$id'");
$visa_history = sql::Select_single("select * from tbl_visa_history where user_id='$id'");


$parent_address_n_sponsor = [
    "father_name" => "Father Name",
    "father_phone" => "Father Phone",
    "father_email" => "Father Email",
    "father_profession" => "Father Profession",
    "mother_name" => "Mother Name",
    "mother_phone" => "Mother Phone",
    "mother_email" => "Mother Email",
    "mother_profession" => "Mother Profession",
    "addr_same_as_parent" => "Contact Same as Parent",
    "contact_address_parent" => "Parent Contact Address",
    "parent_is_sponsor" => "Parent is Sponsor"
];

if ($user_data->addr_same_as_parent) {
    unset($parent_address_n_sponsor["contact_address_parent"]);
}

if (!$user_data->parent_is_sponsor) {
    //$parent_address_n_sponsor
    $parent_address_n_sponsor = array_merge($parent_address_n_sponsor, array("sponsor_name" => "Sponsor Name",
        "sponsor_address" => "Sponsor Address",
        "sponsor_phone" => "Sponsor Phone",
        "sponsor_email" => "Sponsor Email",
        "sponsor_relation" => "Relation to Sponsor",
        "sponsor_profession" => "Sponsor profession"));
}

$fields_to_display = [

    "personal_details" => [
        [
            "fname" => "First Name",
            "midname" => "Middle Name",
            "lname" => "Last Name",
            "dob" => "Date of Birth",
            "age" => "Age",
            "gender" => "Gender",
            "res_countries" => "Country of Residence",
            "birth_country" => "Birth Country",
            "city_of_birth" => "City of Birth",
            "no_siblings" => "No# of Siblings",
            "contact_address" => "Contact Address",
            "mobile_no" => "Mobile No#",
            "phone_no" => "Phone No#",
            "email" => "Email",
            "passport_number" => "Passport No#"
        ],
        $parent_address_n_sponsor
    ],
    "education" =>
        [
            [
                "name_institution" => "Institution Name",
                "add_institution" => "Institution Address",
                "course_study" => "Course of Study",
                "level_study" => "Level of Study",
                "matriculation_number" => "Matriculation Number",
                "university_registrar" => "University Registrar",
                "registrar_phone" => "Registrar Phone",
                "registrar_email" => "Registrar Email"
            ],
            [
                "have_valid_summer_holiday" => "Have valid summer holiday",
                "holiday_start_date" => "Holiday start date",
                "holiday_end_date" => "Holiday end date",
                "expect_grad_date" => "Expected graduation date",
                "have_carry_over_classes" => "Do you have summer classes or have carry-over classes to take during the summer?",
                "hear_about_program" => "How did you hear about us?",
                "hear_from_other" => ""
            ]
        ],

    "have_travel_history" => "Have travel history",
    "have_applied_before" => "Have applied before",

    "program_experience" => [
        "have_experience" => "Have experience",
        "name_of_institution" => "Name of Institution at the time of application",
        "level_of_study" => "Level of Study at the time of application",
        "local_representative" => "Local representative",
        "job_offer" => "Job Offer",
        "visa_interview" => "Visa Interview",
        'besor_previous_application' => "Did you make your previous application with Besor Associates?",
        "reason_not_using_same_service" => "Reason for not using the same service",
    ],
    "contact_in_usa" => [
        "usa_contact_name" => "USA Contact Name",
        "usa_contact_address" => "USA Contact Address",
        "usa_contact_phone" => "USA Contact Phone",
        "usa_contact_relation" => "Relation to Contact",
        "usa_contact_status" => "Status of USA Contact",
        "status" => "Status"
    ]
];

$boolean_fields = [
    "addr_same_as_parent",
    "parent_is_sponsor",
    "have_valid_summer_holiday",
    "have_travel_history",
    "have_applied_before",
    "have_experience",
    "have_carry_over_classes",
    "besor_previous_application",
];
$boolan_value = ["No", "Yes"];
$date_fields = ["dob", "holiday_start_date", "holiday_end_date", "expect_grad_date", "program_start_date", "program_end_date"];


$pp_photo_path = "../user_uploads/$id/pp_photo.jpg";
?>

<table width="100%" cellpadding="5" cellspacing="1" class="table table-bordered table-light">

    <?php if (file_exists($pp_photo_path)): ?>
        <tr>
            <td></td>
            <td>
                <img width="128" src="<?= $pp_photo_path ?>">
            </td>
        </tr>
    <?php endif; ?>

    <tr>
        <td> Reference Id: <?= $user_data->acstatus == 'ACTIVE' ? $user_data->referenceid : "N/A"; ?></td>
        <td></td>
    </tr>
    <tr>
        <td>
            <table><?php
                foreach ($fields_to_display["personal_details"][0] as $field => $display_name):

                    $value = "";
                    if (in_array($field, $boolean_fields)) {
                        $value = $boolan_value[$user_data->$field ? 1 : 0];
                    } else if (in_array($field, $date_fields)) {
                        if ($user_data->$field != "") {
                            $value = $user_data->$field;
                        }
                    } else {
                        $value = $user_data->$field;
                    }
                    if ($value != ""):
                        ?>
                        <tr>
                            <td width="24%"><?= $display_name ?></td>
                            <td width="1%" align="center">:</td>
                            <td width="75%"><?= $value ?></td>
                        </tr>

                    <?php
                    endif;
                endforeach; ?></table>
        </td>
        <td>
            <table><?php
                foreach ($fields_to_display["personal_details"][1] as $field => $display_name):


                    $value = "";
                    if (in_array($field, $boolean_fields)) {
                        $value = $boolan_value[$user_data->$field ? 1 : 0];
                    } else if (in_array($field, $date_fields)) {
                        if ($user_data->$field != "") {
                            $value = $user_data->$field->format("Y-m-d");
                        }
                    } else {
                        $value = $user_data->$field;
                    }
                    if ($value != ""):
                        ?>
                        <tr>
                            <td width="24%"><?= $display_name ?></td>
                            <td width="1%" align="center">:</td>
                            <td width="75%"><?php
                                echo $value;
                                ?></td>
                        </tr>

                    <?php
                    endif;
                endforeach; ?></table>
        </td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
        <td>
            <table><?php
                foreach ($fields_to_display["education"][0] as $field => $display_name):


                    $value = "";
                    if (in_array($field, $boolean_fields)) {
                        $value = $boolan_value[$user_data->$field ? 1 : 0];
                    } else if (in_array($field, $date_fields)) {
                        if ($user_data->$field != "") {
                            $value = $user_data->$field->format("Y-m-d");
                        }
                    } else {
                        $value = $user_data->$field;
                    }
                    if ($value != ""):
                        ?>
                        <tr>
                            <td width="24%"><?= $display_name ?></td>
                            <td width="1%" align="center">:</td>
                            <td width="75%"><?php
                                echo $value;
                                ?></td>
                        </tr>

                    <?php
                    endif;
                endforeach; ?></table>
        </td>
        <td>
            <table><?php
                foreach ($fields_to_display["education"][1] as $field => $display_name):


                    $value = "";
                    if (in_array($field, $boolean_fields)) {
                        $value = $boolan_value[$user_data->$field ? 1 : 0];
                    } else if (in_array($field, $date_fields)) {
                        if ($user_data->$field != "") {
                            $value = $user_data->$field;
                        }
                    } else {
                        $value = $user_data->$field;
                    }

                    if ($value != ""):
                        ?>
                        <tr>
                            <td width="24%"><?= $display_name ?></td>
                            <td width="1%" align="center">:</td>
                            <td width="75%"><?php
                                echo $value;
                                ?></td>
                        </tr>

                    <?php
                    endif;
                endforeach; ?></table>
        </td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
        <td>
            <table>
                <tr>
                    <td width="24%"><?= $fields_to_display["have_travel_history"] ?></td>
                    <td width="1%" align="center">:</td>
                    <td width="75%"><?php echo $boolan_value[$user_data->have_travel_history ? 1 : 0]; ?></td>
                </tr>

            </table>
        </td>
        <td></td>
    </tr>

    <?php if ($user_data->have_travel_history): ?>


        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <th>Country</th>
                        <th>Purpose</th>
                        <th>Duration</th>
                        <th>Year</th>
                    </tr>
                    <?php foreach ($travel_history as $travel): ?>
                        <tr>
                            <td><?= $travel->country ?></td>
                            <td><?= $travel->purpose ?></td>
                            <td><?= $travel->stay_duration ?></td>
                            <td><?= $travel->year ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>


            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
    <?php endif; ?>


    <tr>
        <td>
            <table>
                <tr>
                    <td width="24%"><?= $fields_to_display["have_applied_before"] ?></td>
                    <td width="1%" align="center">:</td>
                    <td width="75%"><?php echo $boolan_value[$user_data->have_applied_before ? 1 : 0]; ?> </td>
                </tr>

            </table>
        </td>
        <td></td>
    </tr>

    <?php if ($user_data->have_applied_before): ?>

        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <th>Purpose</th>
                        <th>Year</th>
                        <th>Visa Decision</th>
                        <th>Place of Visa Applicaiton</th>
                    </tr>
                    <?php foreach ($visa_history as $visa): ?>
                        <tr>
                            <td><?= $visa->purpose ?></td>
                            <td><?= $visa->year ?></td>
                            <td><?= $visa->visa_decision ?></td>
                            <td><?= $visa->visa_application ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
    <?php endif; ?>

    <tr>
        <td>
            <table>
                <?php
                //	echo '<pre>';
                //	print_r($fields_to_display["program_experience"]);exit;
                foreach ($fields_to_display["program_experience"] as $field => $display_name):

                    $value = "";
                    if (in_array($field, $boolean_fields)) {
                        $value = $boolan_value[$user_data->$field ? 1 : 0];
                    } else if (in_array($field, $date_fields)) {

                        if ($user_data->$field != "") {
                            $value = $user_data->$field->format("Y-m-d");
                        }
                    } else {
                        $value = $user_data->$field;
                    }
                    if ($value != ""):
                        ?>
                        <tr>
                            <td width="24%"><?= $display_name ?></td>
                            <td width="1%" align="center">:</td>
                            <td width="75%"><?php

                                echo $value;
                                ?></td>
                        </tr>

                    <?php
                    endif;
                endforeach; ?></table>
        </td>
        <td>
            <table><?php
                foreach ($fields_to_display["contact_in_usa"] as $field => $display_name):

                    $value = "";
                    if (in_array($field, $boolean_fields)) {
                        $value = $boolan_value[$user_data->$field ? 1 : 0];
                    } else if (in_array($field, $date_fields)) {
                        if ($user_data->$field != "") {
                            $value = $user_data->$field->format("Y-m-d");
                        }
                    } else {
                        $value = $user_data->$field;
                    }

                    if ($value != ""):
                        ?>
                        <tr>
                            <td width="24%"><?= $display_name ?></td>
                            <td width="1%" align="center">:</td>
                            <td width="75%"><?php

                                echo $value;
                                ?></td>
                        </tr>

                    <?php
                    endif;
                endforeach; ?></table>
        </td>
    </tr>

    <?php } ?>

</table>
<table>
    <?php
    $user_id = $user_data->users_id;
    $file_path = "";
    if (file_exists("../user_uploads/{$user_id}/std_id.pdf")) {
        $file_path = "../user_uploads/{$user_id}/std_id.pdf";
    }
    if (file_exists("../user_uploads/{$user_id}/std_id.jpg")) {
        $file_path = "../user_uploads/{$user_id}/std_id.jpg";
    }

    //echo "<tr><td colspan='3'>Student ID: $file_path</td></tr>";
    if ($file_path != ""):

        ?>

        <tr>
            <td width="24%">Student Id:</td>
            <td width="1%" align="center">:</td>
            <td width="75%"><a target="_blank" href="<?= $file_path ?>">View</a></td>
        </tr>

    <?php endif; ?>

    <?php


    $file_path = "";

    if (file_exists("../user_uploads/{$user_id}/adm_ltr.pdf")) {
        $file_path = "../user_uploads/{$user_id}/adm_ltr.pdf";
    }
    if (file_exists("../user_uploads/{$user_id}/adm_ltr.jpg")) {
        $file_path = "../user_uploads/{$user_id}/adm_ltr.jpg";
    }
    //echo "<tr><td colspan='3'>Admission Letter: $file_path</td></tr>";
    if ($file_path != ""):

        ?>

        <tr>
            <td width="24%">Admission Letter:</td>
            <td width="1%" align="center">:</td>
            <td width="75%"><a target="_blank" href="<?= $file_path ?>">View</a></td>
        </tr>

    <?php endif; ?>



    <?php

    $file_path = "";

    if (file_exists("../user_uploads/{$user_id}/intl_passport.pdf")) {
        $file_path = "../user_uploads/{$user_id}/intl_passport.pdf";
    }
    if (file_exists("../user_uploads/{$user_id}/intl_passport.jpg")) {
        $file_path = "../user_uploads/{$user_id}/intl_passport.jpg";
    }

    //echo "<tr><td colspan='3'>Intl Passport: $file_path</td></tr>";
    if ($file_path != ""):
        ?>

        <tr>
            <td width="24%">Intl Passport:</td>
            <td width="1%" align="center">:</td>
            <td width="75%"><a target="_blank" href="<?= $file_path ?>">View</a></td>
        </tr>

    <?php endif; ?>

    <?php

    $file_path = "";

    if (file_exists("../user_uploads/{$user_id}/academic_record.pdf")) {
        $file_path = "../user_uploads/{$user_id}/academic_record.pdf";
    }
    if (file_exists("../user_uploads/{$user_id}/academic_record.jpg")) {
        $file_path = "../user_uploads/{$user_id}/academic_record.jpg";
    }

    //echo "<tr><td colspan='3'>Academic Record: $file_path</td></tr>";

    if ($file_path != ""):
        ?>

        <tr>
            <td width="24%">Academic Record:</td>
            <td width="1%" align="center">:</td>
            <td width="75%"><a target="_blank" href="<?= $file_path ?>">View</a></td>
        </tr>

    <?php endif; ?>

    <?php
    $id = $_GET["usersid"];
    $list = (object)sql::Select_single("select * from tbl_member where users_id='$id'");
    $list = unserialize($list->support_document_list);

    foreach ($list as $index => $item):

        $file_path = "";

        if (file_exists("../user_uploads/{$user_id}/{$item}.pdf")) {
            $file_path = "../user_uploads/{$user_id}/{$item}.pdf";
        }
        if (file_exists("../user_uploads/{$user_id}/{$item}.jpg")) {
            $file_path = "../user_uploads/{$user_id}/{$item}.jpg";
        }

        //echo "<tr><td colspan='3'>Academic Record: $file_path</td></tr>";

        if ($file_path != ""):
            ?>

            <tr>
                <td width="24%"><?= $item; ?>:</td>
                <td width="1%" align="center">:</td>
                <td width="75%"><a target="_blank" href="<?= $file_path ?>">View</a></td>
            </tr>

        <?php endif; endforeach;
    ?>
</table>
