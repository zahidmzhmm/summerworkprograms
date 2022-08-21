<?php
include "app/main.php";

function GetCompletedForm($id, $output, $data)
{

    // print $data['q1'];
    // print_r($data);
    // return;
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

    $html = GetHTML($data);

    //echo $html;
    //exit;


    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // reset pointer to the last page
    $pdf->lastPage();

    //print_r($_GET);
    // $display_name = $data->fname . "_" . $data->lname;
    $display_name = "abc_xyz";

    if ($output == "S") {
        return $pdf->Output("{$display_name}.pdf", $output);
    }

    $pdf->Output("{$display_name}.pdf", $output);


}

function GetHTML($data)
{

    $return_str = "<h3>Explain why you want to participate in the Work & Travel USA program.</h3><br>" . $data['q1'] . "<br><br><br>";

    $return_str .= "<h3>How do you think your life in the U.S.A. will be similar or different to your life at home?</h3><br>" . $data['q2'] . "<br><br><br>";


    $return_str .= "<h3>Mention U.S. cultural activities do you want to participate in during your program.</h3>";
    $return_str .= "- Explain what you want to learn about the U.S. culture <br>";
    $return_str .= "- How you will share your culture <br>";
    $return_str .= "- Events or activities you plan to attend and places you want to see or travel to. <br><br>";
    $return_str .= $data['q3'];
    $return_str .= "<br><br><br>";

    $return_str .= "<h3>What do you hope to achieve by spending your summer living and working in the U.S.?</h3><br>" . $data['q4'] . "<br><br><br>";

    $return_str .= "<h3>Do you have plans to travel within the US during or the program? If yes, list destinations and purpose.</h3><br>" . $data['q5'] . "<br><br><br>";

    $return_str .= "<h3>What cultural activities do you want to experience in the U.S., and why?</h3><br>" . $data['q6'] . "<br><br><br>";

    $return_str .= "<h3>What do you plan to do upon your return from the U.S.?</h3><br>" . $data['q7'] . "<br><br><br>";

    $return_str .= "<h3>What would you like to do after the completion of your Summer Work Program participation in the US?</h3>";
    $return_str .= "- Extend your stay in the US <br>";
    $return_str .= $data['q81'];
    $return_str .= "- Change your return date <br>";
    $return_str .= $data['q82'];
    $return_str .= "- Stay back in the US <br>";
    $return_str .= $data['q83'];
    $return_str .= "<br><br><br>";

    $return_str .= "<h3>If YES to any or all of the questions above, why will you desire to take such action?</h3><br>" . $data['q9'] . "<br><br><br>";

    $return_str .= "<h3>Where will you stay and with whom?</h3><br>" . $data['q10'] . "<br><br><br>";

    $return_str .= "<h3>SIGNATURE ** Input your First and Last Names ONLY</h3><br>" . $data['q11'] . "<br><br><br>";

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