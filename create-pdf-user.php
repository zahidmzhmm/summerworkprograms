<?php
	session_start();ob_start();
	include("config.php");
	include('includes/includes.php');
	?>
	
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Summer Program</title>
<link href="css/style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-latest.js"></script>
</head>
<body bgcolor="#FFFFFF">
<fieldset>
<table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
                                    <tr><br />
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="4"><h1 class="information">User Registration</h1> </td>
                                    </tr>
                                    <tr>
                                      <td colspan="4"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="4">&nbsp;</td>
                                    </tr>
                                       <tr>
                                         <td colspan="2">                                       
                                         <td colspan="2">&nbsp;</td>
                                       </tr>
                                    <tr>
                                      <td width="43%" class="text_n_r"><strong>First Name (as it appears on passport):</strong></td>
                                      <td width="20%"><?php echo $_SESSION['firstname'];?> </td>
                                      <td width="7%" class="text_n_r"></td>
                                      <td width="30%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r"></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                     <td width="43%" class="text_n_r"><strong>Last Name (as it appears on passport):</strong></td>
                                      <td width="20%"><?php echo $_SESSION['lastname'];?></td>
                                      <td width="7%" class="text_n_r">&nbsp;</td>
                                      <td width="30%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r"><strong>Date Of Birth:</strong></td>
                                      <td><?php echo $_SESSION['dob_month'];echo "&nbsp;";echo $_SESSION['dob_day'];echo "&nbsp;";echo $_SESSION['dob_year'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="43%" class="text_n_r"><strong>Name of Institution: </strong></td>
                                      <td width="20%"><?php echo $_SESSION['institution'];?></td>
                                      <td width="7%" class="text_n_r">&nbsp;</td>
                                      <td width="30%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="43%" class="text_n_r" sty><strong>Email Address </strong></td>
                                      <td width="20%" ><?php echo $_SESSION['email'];?></td>
                                      <td width="7%" class="text_n_r">&nbsp;</td>
                                      <td width="30%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty>&nbsp;</td>
                                      <td >&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                   <td width="43%" class="text_n_r"><strong>Confirm Email Address:</strong></td>
                                      <td width="20%"><?php echo $_SESSION['cemail'];?></td>
                                      <td width="7%" class="text_n_r">&nbsp;</td>
                                      <td width="30%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r"><strong>Age:</strong></td>
                                      <td><?php echo $_SESSION['age'];?></td>
                                      <td class="text_n_r"></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="43%" class="text_n_r"><strong>Gender:</strong></td>
                                      <td width="20%"><?php echo $_SESSION['gender'];?></td>
                                      <td width="7%" class="text_n_r">&nbsp;</td>
                                      <td width="30%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r"><strrong>Place Of Birth:</strong></td>
                                      <td><?php echo $_SESSION['gender'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r"><strong>No Siblings</strong></td>
                                      <td><?php echo $_SESSION['no_siblings'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">Contact Address:</td>
                                      <td><?php echo $_SESSION['contact_address'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r"><strong>Mobile No:</strong></td>
                                      <td><?php echo $_SESSION['mobile_no'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" class="text_n_r">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                     <tr>
                                      <td class="text_n_r"><strong>Phone No:</strong></td>
                                      <td><?php echo $_SESSION['phone_no'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td colspan="2">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                       <tr>
                                      <td class="text_n_r"><strong>Passport Number:</strong></td>
                                      <td><?php echo $_SESSION['passport_number'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                       <tr>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
  </table>
<table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
                                    <tr>
                                      <td class="text_n_r" align=""><span class="f_information"><strong>INSTITUTION DETAILS</strong></span></td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r"></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" align="">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r"></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="43%" class="text_n_r" align=""><strong>Name of Institution:</strong></td>
                                      <td width="24%"><?php echo $_SESSION['institution'];?></td>
                                      <td width="6%" class="text_n_r"> </td>
                                      <td width="27%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                     <td width="43%" class="text_n_r" align=""><strong>Address of Institution:</strong></td>
                                      <td width="24%"> <?php echo $_SESSION['add_institution'];?>&nbsp;</td>
                                      <td width="6%" class="text_n_r">&nbsp;</td>
                                      <td width="27%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="43%" class="text_n_r" align=""><strong>Course of Study: </strong></td>
                                      <td width="24%"><?php echo $_SESSION['course_study'];?>&nbsp;</td>
                                      <td width="6%" class="text_n_r">&nbsp;</td>
                                      <td width="27%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="43%" class="text_n_r" align=""><strong>Level of Study: </strong></td>
                                      <td width="24%" > <?php echo $_SESSION['level_study'];?>&nbsp;</td>
                                      <td width="6%" class="text_n_r">&nbsp;</td>
                                      <td width="27%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty>&nbsp;</td>
                                      <td >&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td colspan="2">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                        </table>
                        <table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
                                    <tr>
                                      <td class="text_n_r" align=""><span class="f_information"><strong>PERSONAL DETAILS</strong></span></td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r"></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" align="">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r"></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="43%" class="text_n_r" align=""><strong>Valid summer holiday:</strong></td>
                                      <td width="42%">&nbsp;</td>
                                      <td width="0%" class="text_n_r"> </td>
                                      <td width="15%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                     <td width="43%" class="text_n_r" align=""><strong>Summer Holiday Starts:</strong></td>
                                      <td width="42%"><?php echo $_SESSION['holiday_start'];?>&nbsp;</td>
                                      <td width="0%" class="text_n_r">&nbsp;</td>
                                      <td width="15%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="43%" class="text_n_r" align=""><strong>Summer Holiday Ends: </strong></td>
                                      <td width="42%"><?php echo $_SESSION['holiday_ends'];?>&nbsp;</td>
                                      <td width="0%" class="text_n_r">&nbsp;</td>
                                      <td width="15%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="43%" class="text_n_r" align=""><strong>Previous travel experience: </strong></td>
                                      <td width="42%" >&nbsp;</td>
                                      <td width="0%" class="text_n_r">&nbsp;</td>
                                      <td width="15%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty>&nbsp;</td>
                                      <td >&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty><strong>if yes, where:</strong></td>
                                      <td ><?php echo $_SESSION['travel_where'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty>&nbsp;</td>
                                      <td >&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty><strong>Expected graduation date</strong></td>
                                      <td ><?php echo $_SESSION['grad_date'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty>&nbsp;</td>
                                      <td >&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty><strong>Name of contacts in the United States (if any)</strong></td>
                                      <td ><?php echo $_SESSION['name_contact_us'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty>&nbsp;</td>
                                      <td >&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty><strong>Address of contacts in the United States:</strong></td>
                                      <td ><?php echo $_SESSION['add_contact_us'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty>&nbsp;</td>
                                      <td >&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty><strong>Name of Parent/Sponsor</strong></td>
                                      <td ><?php echo $_SESSION['name_sponsor'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty>&nbsp;</td>
                                      <td >&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty><strong>Address of Sponsor </strong></td>
                                      <td ><?php echo $_SESSION['address_sponsor'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty>&nbsp;</td>
                                      <td >&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty><strong>Phone Number </strong></td>
                                      <td ><?php echo $_SESSION['sp_ph_no'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty>&nbsp;</td>
                                      <td >&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty><strong>Email</strong></td>
                                      <td ><?php echo $_SESSION['sp_email'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty>&nbsp;</td>
                                      <td >&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty><strong>Profession</strong></td>
                                      <td ><?php echo $_SESSION['profession'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty>&nbsp;</td>
                                      <td >&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty><strong>Why do you want to participate in the summer work and travel program?&nbsp;</strong></td>
                                      <td ><?php echo $_SESSION['par_sum_progm'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty>&nbsp;</td>
                                      <td >&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty><strong>How did you hear about us?</strong></td>
                                      <td ><?php echo $_SESSION['hear_abt_us'];?></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td colspan="2">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                        </table>
                        <table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
                                    <tr>
                                      <td width="6422565%" colspan="3" class="text_n_r">&nbsp;</td>
                                      <td width="14%" colspan="2">&nbsp;</td>
                                    </tr>
  </table>
</fieldset>
<?php	
	
//print_r($_SESSION);
 $header =$_POST['firstname'];
$body =$_POST['lastname'];exit;
include ('class.ezpdf.php');
$pdf =& new Cezpdf();
$pdf->addJpegFromFile('jawbone.jpg',199,$pdf->y-200,200,0);
$pdf->selectFont('./fonts/Helvetica.afm');
$pdf->ezText($header . "\n\n",25,array('justification'=>'centre'));

$pdf->ezText("\n\n\n\n\n\n\n" . $body,16,array('justification'=>'centre'));
$pdf->output();
$pdf->ezStream();
?>
