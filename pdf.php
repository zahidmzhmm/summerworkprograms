<?php

include('third_party/tcpdf/config/lang/eng.php');
include('third_party/tcpdf/tcpdf.php');

function GetCompletedForm($id, $output)
{


    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Summerwork Programs');
    $pdf->SetTitle('Summerwork Programs');


    //set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    //set auto page breaks
    $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

    //set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    //set some language-dependent strings
    //$pdf->setLanguageArray($l);


    // set font
    $pdf->SetFont('dejavusans', '', 8);

    // add a page
    $pdf->AddPage();


    $data = Member::find($id);

    $html = GetHTML($data);

    //echo $html;
    //exit;


    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // reset pointer to the last page
    $pdf->lastPage();

    //print_r($_GET);
    $display_name = $data->fname . "_" . $data->lname;

    if ($output == "S") {
        return $pdf->Output("{$display_name}.pdf", $output);
    }

    $pdf->Output("{$display_name}.pdf", $output);


}

function GetHTML($data)
{


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
        "parent_is_sponsor" => "Parent is Sponsor",

    ];
    if ($data->addr_same_as_parent) {
        unset($parent_address_n_sponsor["contact_address_parent"]);
    }

    if (!$data->parent_is_sponsor) {
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
                "dob" => "Date of Birt",
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
                    "hear_about_program" => "How did you hear about us?",
                    "hear_from_other" => ""
                ]
            ]
    ];

    $boolean_fields = [
        "addr_same_as_parent",
        "parent_is_sponsor",
        "have_valid_summer_holiday",
        "have_travel_history",
        "have_applied_before",
        "have_experience"
    ];

    $date_fields = ["dob", "holiday_start_date", "holiday_end_date", "expect_grad_date"];
    $boolan_value = ["No", "Yes"];


    $pp_photo_path = "user_uploads/$data->users_id/pp_photo.jpg";

    $return_str = '<img src="img/logo.jpg" width="315" height="120" border="0" />';

    $return_str .= "<h1>SUMMER WORK PROGRAMS REGISTRATION</h1>";

    $return_str .= "<table>";

    $imagePath = "";
    if (file_exists($pp_photo_path)) {

        $imagePath = '<img width="35" height="45" border="0" src="' . $pp_photo_path . '">';
    }

    $ref_id = $data->referenceid;
    $return_str .= "<tr><td>ReferenceId: $ref_id</td><td>$imagePath</td></tr>";


    //personal details
    $return_str .= "<tr><td colspan=\"2\">PERSONAL DETAILS</td></tr>";
    $return_str .= "<tr><td colspan=\"2\">&nbsp;</td></tr>";
    $return_str .= "<tr><td><table>";


    foreach ($fields_to_display["personal_details"][0] as $field => $display_name):
        $value = "";
        if (in_array($field, $boolean_fields)) {
            $value = $boolan_value[$data->$field ? 1 : 0];
        } else if (in_array($field, $date_fields)) {
            if ($data->$field != "") {
                $value = $data->$field->format("Y-m-d");
            }
        } else {
            $value = $data->$field;
        }
        $return_str .= $value ? "<tr>
						<td width=\"80\" >$display_name </td>
						<td width=\"10\" align=\"center\">:</td>
						<td width=\"150\">$value</td>
					</tr>" : "";

    endforeach;
    $return_str .= "</table></td><td><table>";

    foreach ($fields_to_display["personal_details"][1] as $field => $display_name):
        $value = "";
        if (in_array($field, $boolean_fields)) {
            $value = $boolan_value[$data->$field ? 1 : 0];
        } else if (in_array($field, $date_fields)) {
            if ($data->$field != "") {
                $value = $data->$field->format("Y-m-d");
            }
        } else {
            $value = $data->$field;
        }
        $return_str .= $value ? "<tr>
						<td width=\"100\">$display_name </td>
						<td width=\"10\" align=\"center\">:</td>
						<td width=\"150\">$value</td>
					</tr>" : "";

    endforeach;


    $return_str .= "</table></td></tr>";
    $return_str .= "<tr><td colspan=\"2\">&nbsp;</td></tr>";
    $return_str .= "<tr><td colspan=\"2\">&nbsp;</td></tr>";
    //end perosnal detals


    //education details
    $return_str .= "<tr><td colspan=\"2\">EDUCATION</td></tr>";
    $return_str .= "<tr><td colspan=\"2\">&nbsp;</td></tr>";
    $return_str .= "<tr><td><table>";


    foreach ($fields_to_display["education"][0] as $field => $display_name):
        $value = "";
        if (in_array($field, $boolean_fields)) {
            $value = $boolan_value[$data->$field ? 1 : 0];
        } else if (in_array($field, $date_fields)) {
            if ($data->$field != "") {
                $value = $data->$field->format("Y-m-d");
            }
        } else {
            $value = $data->$field;
        }
        $return_str .= $value ? "<tr>
						<td width=\"80\" >$display_name </td>
						<td width=\"10\" align=\"center\">:</td>
						<td width=\"150\">$value</td>
					</tr>" : "";

    endforeach;
    $return_str .= "</table></td><td><table>";

    foreach ($fields_to_display["education"][1] as $field => $display_name):
        $value = "";
        if (in_array($field, $boolean_fields)) {
            $value = $boolan_value[$data->$field ? 1 : 0];
        } else if (in_array($field, $date_fields)) {
            if ($data->$field != "") {
                $value = $data->$field->format("Y-m-d");
            }
        } else {
            $value = $data->$field;
        }
        $return_str .= $value ? "<tr>
						<td width=\"100\">$display_name </td>
						<td width=\"10\" align=\"center\">:</td>
						<td width=\"150\">$value</td>
					</tr>" : "";

    endforeach;


    $return_str .= "</table></td></tr>";
    $return_str .= "<tr><td colspan=\"2\">&nbsp;</td></tr>";

    //end education detals


    $return_str .= "<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td><strong>Applicant Signature </strong></td><td>Date</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>........................................</td><td>........................................</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td><strong>Parent Signature </strong></td><td>Date</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>........................................</td><td>........................................</td></tr>";


    $return_str .= "</table>";

    return $return_str;

}


function GetHTML1($data)
{


    $return_str = '<img src="img/logo.jpg" width="315" height="120" border="0" />';

    $return_str .= "<h1>SUMMER WORK PROGRAMS REGISTRATION</h1><table>			
	
	<tr><td><strong>Name </strong></td><td width=\"10\">:</td><td> " . $data->fname . " " . $data->lname . "</td></tr>
	<tr><td><strong>Date of Birth </strong></td><td>:</td><td> " . $data->dob->format("m-d-Y") . "</td></tr>
	<tr><td><strong>Email </strong></td><td>:</td><td> " . $data->email . "</td></tr>
	<tr><td><strong>Age </strong></td><td>:</td><td> " . $data->age . "</td></tr>
	<tr><td><strong>Gender </strong></td><td>:</td><td> " . $data->gender . "</td></tr>
	<tr><td><strong>Place of Birth </strong></td><td>:</td><td> " . $data->birth_country . "</td></tr>
	<tr><td><strong>No. of Siblings </strong></td><td>:</td><td> " . $data->no_siblings . "</td></tr>
	<tr><td><strong>Contact Address </strong></td><td>:</td><td> " . $data->contact_address . "</td></tr>
	<tr><td><strong>Phone no </strong></td><td>:</td><td> " . $data->phone_no . "</td></tr>
	<tr><td><strong>Mobile no </strong></td><td>:</td><td> " . $data->mobile_no . "</td></tr>
	<tr><td><strong>Passport no </strong></td><td>:</td><td> " . $data->passport_number . "</td></tr>
	<tr><td><strong>Name of institution </strong></td><td>:</td><td> " . $data->name_institution . "</td></tr>
	<tr><td><strong>Address of institution </strong></td><td>:</td><td> " . $data->add_institution . "</td></tr>	
	<tr><td><strong>Course of study </strong></td><td>:</td><td> " . $data->course_study . "</td></tr>
	<tr><td><strong>Level of study </strong></td><td>:</td><td> " . $data->level_study . "</td></tr>
	<tr><td><strong>Summer holiday start </strong></td><td>:</td><td> " . $data->holiday_start_date->format("m-d-Y") . "</td></tr>
	<tr><td><strong>Summer holiday end </strong></td><td>:</td><td> " . $data->holiday_end_date->format("m-d-Y") . "</td></tr>
	<tr><td><strong>Previous travel experience </strong></td><td>:</td><td> " . $data->have_travel_history . "</td></tr>
	<tr><td><strong>Expected graduation date </strong></td><td>:</td><td> " . $data->expect_grad_date->format("m-d-Y") . "</td></tr>
	<tr><td><strong>Name of contacts in <br />The United States </strong></td><td>:</td><td> " . $data->usa_contact_name . "</td></tr>
	<tr><td>Address of contacts in <strong>The United States</strong></td><td>:</td><td> " . $data->usa_contact_address . "</td></tr>
	<tr><td><strong>Name of Parent/Sponsor </strong></td><td>:</td><td> " . $data->sponsor_name . "</td></tr>
	<tr><td><strong>Address of sponsor </strong></td><td>:</td><td> " . $data->sponsor_address . "</td></tr>
	<tr><td><strong>Phone No. of sponsor </strong></td><td>:</td><td> " . $data->sponsor_phone . "</td></tr>
	<tr><td>&nbsp;</td><td></td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td></td><td>&nbsp;</td></tr>
	<tr><td><strong>Applicant Signature </strong></td><td></td><td>Date</td></tr>
	<tr><td>&nbsp;</td><td></td><td>&nbsp;</td></tr>
	<tr><td>........................................</td><td></td><td>........................................</td></tr>
	<tr><td>&nbsp;</td><td></td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td></td><td>&nbsp;</td></tr>
	<tr><td><strong>Parent Signature </strong></td><td></td><td>Date</td></tr>
	<tr><td>&nbsp;</td><td></td><td>&nbsp;</td></tr>
	<tr><td>........................................</td><td></td><td>........................................</td></tr>
	</table>";

    return $return_str;
}


?>