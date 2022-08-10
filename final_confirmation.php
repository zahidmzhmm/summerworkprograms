<?php
    session_start();ob_start();
	include("config.php");
	include('includes/includes.php');
	$email=$_SESSION['email'];
	$member_sql	=	"SELECT * FROM tbl_member WHERE email ='$email'";
 	$member_data=sql::Select_single($member_sql);
	$fromemail='dontreply@summerworkprograms.com';
	
	

	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Summer Work Programs</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="980px" border="0" cellspacing="0" cellpadding="0" id="area" align="center">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td id="header"><div class="phonetxt">(555) 555-1023</div></td>
          </tr>
        </table>--></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tr>
            <td><div id="banner"><img  src="images/header.jpg" width="980" height="297" /></div>
             </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php include("includes/headerNew.php");?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td id="">&nbsp;</td>
            <td><div class="weltxt">
              <p><strong>Thank you !</strong><br />
                <br />
              Dear <?php echo ucwords($member_data['firstname']);?>,<br /><br />
Thank you for registering to participate in the Summer Work & Travel Program.<br /><br />
Your unique registration number is <?php echo ucwords($member_data['referenceid']);?> and your application is pending activation while the registration will be carefully reviewed within the next 24 hours. <br /><br />
If successful, you will receive a confirmation email from the Program Administrator containing details of your status and a scheduled appointment for the application processing.<br /><br />
Please, note that you will be expected to bring the printed copy of your submitted registration form, duly signed by you and your parent to our office within the stipulated period to process your application package with the following documents:<br /><br />
- Administrative Fee payment teller<br />
- 4 passport sized photographs<br />
- Signed parental consent letter<br />
- Photocopy of International Passport<br />
- CV/Resume<br /><br />
A copy of this information has also been sent to your email.<br /><br />
</p>
            </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td><?php include("includes/footerNew.php");?>         </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
