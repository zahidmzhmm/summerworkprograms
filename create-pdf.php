<?php
session_start();
ob_start();
include("config.php");
include('includes/includes.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Student Summer Program</title>
    <link href="css/style1.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-latest.js"></script>
</head>
<body bgcolor="#FFFFFF">
<fieldset>
    <table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr><br/>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4"><h1 class="information">User Registration</h1></td>
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
            <td width="42%" class="text_n_r"><strong>First Name (as it appears on passport):</strong></td>
            <td width="21%"><?php echo $_SESSION['firstname']; ?> </td>
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
            <td width="42%" class="text_n_r"><strong>Last Name (as it appears on passport):</strong></td>
            <td width="21%"><?php echo $_SESSION['lastname']; ?></td>
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
            <td width="42%" class="text_n_r"><strong>Name of Institution: </strong></td>
            <td width="21%"><?php echo $_SESSION['institution']; ?></td>
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
            <td width="42%" class="text_n_r" sty><strong>Email Address </strong></td>
            <td width="21%"><?php echo $_SESSION['email']; ?></td>
            <td width="7%" class="text_n_r">&nbsp;</td>
            <td width="30%">&nbsp;</td>
        </tr>
        <tr>
            <td class="text_n_r" sty>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="text_n_r">&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td width="42%" class="text_n_r"><strong>Confirm Email Address:</strong></td>
            <td width="21%"><?php echo $_SESSION['cemail']; ?></td>
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
            <td width="42%" class="text_n_r"><strong></strong></td>
            <td width="21%"></td>
            <td width="7%" class="text_n_r">&nbsp;</td>
            <td width="30%">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="text_n_r">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
        </tr>
    </table>
</fieldset>
<?php

//print_r($_SESSION);
echo $header = $_POST['firstname'];
echo $body = $_POST['lastname'];
exit;
include('class.ezpdf.php');
$pdf = new Cezpdf();
$pdf->addJpegFromFile('jawbone.jpg', 199, $pdf->y - 200, 200, 0);
$pdf->selectFont('./fonts/Helvetica.afm');
$pdf->ezText($header . "\n\n", 25, array('justification' => 'centre'));

$pdf->ezText("\n\n\n\n\n\n\n" . $body, 16, array('justification' => 'centre'));
$pdf->output();
$pdf->ezStream();
?>
