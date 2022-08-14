<?php
error_reporting(0);
	session_start();ob_start();
	include("config.php");
if(isset($_POST['print']))
{

	//print_r($_SESSION);
$header =" SUMMER WORK PROGRAMS REGISTRATION";
$fullname =$_POST['fname'].'   '.$_POST['lname'];
$fullname =$_POST['fname'].'   '.$_POST['lname'];
$dob =$_POST['dob_month'].'   '.$_POST['dob_day'] .   $_POST['dob_year'];
$email =$_POST['email'];
$age =$_POST['age'];
$gender =$_POST['gender'];
$birth_country =$_POST['birth_country'];
$no_siblings =$_POST['no_siblings'];
$contact_address =$_POST['contact_address'];
$phone_no =$_POST['phone_no'];
$mobile_no =$_POST['mobile_no'];
$passport_number =$_POST['passport_number'];
$institution =$_POST['inst'];

$add_institution =$_POST['add_institution'];
$course_study =$_POST['course_study'];
$level_study =$_POST['level_study'];
$holiday_start =$_POST['holiday_start'];
$holiday_ends =$_POST['holiday_ends'];
$travel_where =$_POST['travel_where'];
$grad_date =$_POST['grad_date'];
$name_contact_us =$_POST['name_contact_us'];
$add_contact_us =$_POST['add_contact_us'];
$name_sponsor =$_POST['name_sponsor'];
$address_sponsor =$_POST['address_sponsor'];
$sp_ph_no =$_POST['sp_ph_no'];
$sp_email =$_POST['sp_email'];
$profession =$_POST['profession'];
$par_sum_progm =$_POST['par_sum_progm'];
$hear_abt_us =$_POST['hear_abt_us'];



include ('class.ezpdf.php');
$pdf =& new Cezpdf();
//$pdf->addJpegFromFile('jawbone.jpg',199,$pdf->y-200,200,0);
$pdf->selectFont('./fonts/Helvetica.afm');
$pdf->ezText($header . "",15,array('justification'=>'left'));
$pdf->ezText("\nName:" . $fullname,13,array('justification'=>'left'));
$pdf->ezText("\nDate Of Birth:" . $dob,13,array('justification'=>'left'));
$pdf->ezText("\nEmail:" . $email,13,array('justification'=>'left'));
$pdf->ezText("\nAge:" . $age,13,array('justification'=>'left'));
$pdf->ezText("\nGender:" . $gender,13,array('justification'=>'left'));
$pdf->ezText("\nPlace Of Birth:" . $birth_country,13,array('justification'=>'left'));
$pdf->ezText("\nNo siblings:" . $no_siblings,13,array('justification'=>'left'));
$pdf->ezText("\nContact Address:" . $contact_address,13,array('justification'=>'left'));
$pdf->ezText("\nPhone No:" . $phone_no,13,array('justification'=>'left'));
$pdf->ezText("\nMobile No:" . $mobile_no,13,array('justification'=>'left'));
$pdf->ezText("\nPassport Number:" . $passport_number,13,array('justification'=>'left'));

/*$user_details='Institution Details:';
$pdf->ezText($user_details . "",15,array('justification'=>'left'));
$pdf->ezText("\nName of Institution:" . $institution,13,array('justification'=>'left'));
$pdf->ezText("\nAdd Of Institution:" . $add_institution,13,array('justification'=>'left'));
$pdf->ezText("\nCourse of Study:" . $course_study,13,array('justification'=>'left'));
$pdf->ezText("\nLevel of Study:" . $level_study,13,array('justification'=>'left'));

$user_details='Personal Details :';
$pdf->ezText($user_details . "",20,array('justification'=>'left'));
$pdf->ezText("\nSummer holiday Start:" . $holiday_start,12,array('justification'=>'left'));
$pdf->ezText("\nSummer holiday End:" . $holiday_ends,13,array('justification'=>'left'));
$pdf->ezText("\nPrevious travel experience:" . $travel_where,13,array('justification'=>'left'));
$pdf->ezText("\nExpected graduation date:" . $grad_date,13,array('justification'=>'left'));
$pdf->ezText("\nName of contacts in the United States (if any):" . $name_contact_us,13,array('justification'=>'left'));

$pdf->ezText("\nAddress of contacts in the United States:" . $add_contact_us,13,array('justification'=>'left'));
$pdf->ezText("\nName of Parent/Sponsor:" . $name_sponsor,13,array('justification'=>'left'));
$pdf->ezText("\nAddress of Sponsor:" . $address_sponsor,13,array('justification'=>'left'));
$pdf->ezText("\nPhone Number:" . $sp_ph_no,13,array('justification'=>'left'));

$pdf->ezText("\nSponsor Email:" . $sp_email,13,array('justification'=>'left'));
$pdf->ezText("\nProfession:" . $profession,13,array('justification'=>'left'));
$pdf->ezText("\nWhy do you want to participate in the summer work and travel program?" . $par_sum_progm,13,array('justification'=>'left'));
$pdf->ezText("\nHow did you hear about us?" . $hear_abt_us,13,array('justification'=>'left'));*/
$parent_signature="Parent Signature";
$parent_signature_dot="...........................";


$pdf->ezText("\n\n\n\n\n\n.........................                                                                   ".$parent_signature_dot,13,array('justification'=>'left'));
$pdf->ezText("\nStudent Signature                                                                  ".$parent_signature,13,array('justification'=>'left'));





$pdf->output();         
$pdf->ezStream();

}
	include('includes/includes.php');



	$users_id =$_SESSION['userid'];
	$res_countries=$_SESSION['resd_country'];
	$email=$_POST['email'];$_SESSION['email']=$_POST['email'];
	$toEmail=$_SESSION['email'];
	 $password	=	$_SESSION['password'];
	 $fname  =	$_SESSION['firstname'];$firstname =$_POST['fname'];$firstname =$_POST['fname'];$_SESSION['fname']=$_POST['fname'];
	 $lastname  =	$_SESSION['lastname'];$firstname =$_POST['lname'];$firstname =$_POST['lname'];$_SESSION['lname']=$_POST['lname'];
	 $midname= $_POST['midname'];
	 $dob_month	=	$_POST['dob_month'];$_SESSION['dob_month']=$_POST['dob_month'];
	 $dob_day	=	$_POST['dob_day'];$_SESSION['dob_day']=$_POST['dob_day'];
	 $dob_year	=	$_POST['dob_year'];$_SESSION['dob_year']=$_POST['dob_year'];
	 $age	=	$_POST['age'];$_SESSION['age']=$_POST['age'];
	 $gender=	$_POST['gender'];$_SESSION['gender']=$_POST['gender'];
	 $birth_country=$_POST['birth_country'];$_SESSION['birth_country']=$_POST['birth_country'];
	 $no_siblings=	$_POST['no_siblings'];$_SESSION['no_siblings']=$_POST['no_siblings'];
	 $contact_address=	$_POST['contact_address'];$_SESSION['contact_address']=$_POST['contact_address'];
	 $mobile_no=	$_POST['mobile_no'];$_SESSION['mobile_no']=$_POST['mobile_no'];
	 $phone_no=	$_POST['phone_no'];$_SESSION['phone_no']=$_POST['phone_no'];
	 $email_1=	$_POST['email'];$_SESSION['email_1']=$_POST['email'];
	 $passport_number=$_POST['passport_number'];$_SESSION['passport_number']=$_POST['passport_number'];
	 $institution=	$_POST['inst'];$_SESSION['inst']=$_POST['inst'];
	 $add_institution=	$_POST['add_institution'];$_SESSION['add_institution']=$_POST['add_institution'];
	 $course_study= $_POST['course_study'];$_SESSION['course_study']=$_POST['course_study'];
	 $level_study=	$_POST['level_study'];$_SESSION['level_study']=$_POST['level_study'];
	 $summer_holiday=$_POST['summer_holiday'];$_SESSION['summer_holiday']=$_POST['summer_holiday'];
	 $holiday_start=$_POST['holiday_start'];$_SESSION['holiday_start']=$_POST['holiday_start'];
	 $holiday_ends=	$_POST['holiday_ends'];$_SESSION['holiday_ends']=$_POST['holiday_ends'];
	 $travel_exp=	$_POST['travel_exp'];$_SESSION['level_study']=$_POST['level_study'];
	 $travel_where=	$_POST['travel_where'];$_SESSION['travel_where']=$_POST['travel_where'];
	 $grad_date=	$_POST['grad_date'];$_SESSION['grad_date']=$_POST['grad_date'];
	 $name_contact_us=	$_POST['name_contact_us'];$_SESSION['name_contact_us']=$_POST['name_contact_us'];
	 $add_contact_us=	$_POST['add_contact_us'];$_SESSION['add_contact_us']=$_POST['add_contact_us'];
	 $name_sponsor=	$_POST['name_sponsor'];$_SESSION['name_sponsor']=$_POST['name_sponsor'];
	 $address_sponsor=	$_POST['address_sponsor'];$_SESSION['address_sponsor']=$_POST['address_sponsor'];
	 $sp_ph_no=	$_POST['sp_ph_no'];$_SESSION['sp_ph_no']=$_POST['sp_ph_no'];
	 $sp_email=	$_POST['sp_email'];$_SESSION['sp_email']=$_POST['sp_email'];
	 $profession=$_POST['profession'];$_SESSION['profession']=$_POST['profession'];
	 $par_sum_progm=$_POST['par_sum_progm'];$_SESSION['par_sum_progm']=$_POST['par_sum_progm'];
	 $hear_abt_us=$_POST['hear_abt_us'];$_SESSION['hear_abt_us']=$_POST['hear_abt_us'];
	 $certify=	$_POST['certify'];$_SESSION['certify']=$_POST['certify'];
	 $status='Pending';
	 
	 
	 $date_joined = date("Y-m-d");
	 $referenceid = strtoupper(substr(md5 (uniqid (rand())),0,8));
	 
	$member_sql	=	"SELECT * FROM tbl_member WHERE email ='$email'";
	$member_data=sql::Select_single($member_sql);

if(isset($_POST['register']))
{
	//if($_SESSION['security_code']!=$_POST['code']){
	//$error['code']="Invalid Code";
	//include("includes/register.php");
	
	//}else{
	
	//$_SESSION['email'] 		= refine_data($_POST['email']);
	//$_SESSION['username'] 	= refine_data($_POST['username']);
	//Check email Address availiability
	
	//$queryselect=sql::Select_single("SELECT * FROM forum_users WHERE email='$email'");

	if(sql::Select_single("SELECT * FROM tbl_member WHERE email_one ='$email_1'")){
		$eMsgg="Your E-Mail Address already exists in our records - please log in with the e-mail address or create an account with a different email address";

	}else{


 		  $insert_query="
				INSERT INTO tbl_member(res_countries,firstname,lastname,midname, email,password,dob_month, dob_day,dob_year,age, gender,birth_country,siblings,contact_add,mobile_no,phone_no, email_one,passport,name_inst,add_inst,course_std,level_std,valid_hold,holiday_start,holiday_end, trvl_exp,trvl_where,grd_date,nm_cont_us,add_cont_us,nam_sp,add_sp,phone_sp,email_sp, prof_sp,why_part,hear_us,referenceid,date_joined,status
									  )
									VALUES('$res_countries',
											'$fname','$lastname','$midname',
											'$email','$password','$dob_month',
											'$dob_day','$dob_year','$age',
											'$gender','$birth_country','$no_siblings',
											'$contact_address','$mobile_no','$phone_no',
											'$email_1','$passport_number','$institution',
											'$add_institution','$course_study','$level_study',
											'$summer_holiday','$holiday_start','$holiday_ends',
											'$travel_exp','$travel_where','$grad_date',
											'$name_contact_us','$add_contact_us','$name_sponsor',
											'$address_sponsor','$sp_ph_no','$sp_email',
											'$profession','$par_sum_progm','$hear_abt_us','$referenceid',
											'$date_joined',
											 '$status'
											)";
	if(sql::Query_Insert($insert_query)){
		
	    //exit;
		//$_SESSION['email'] 	= "";
		//$_SESSION['password'] 	= "";
		$adminuser = "select * from tbl_admin where user_id='1'";
		$data = sql::Select_single($adminuser);
		$title = $data['title'];
		$fromemail = $data['fromemail'];
		$user_id = mysql_insert_id();
		$id = mysql_insert_id();
		$id = base64_encode($id);
		
		$subject="Welcome to Summer Work Programs";
		$to=$toEmail;
		$msg="<br>Dear $fname  $lastname,<br><br>";
		$msg .= "--------------------------\n" ;
		$msg .= "   YOUR  LOGIN DETAILS    \n" ;
		$msg .= "--------------------------\n" ;
		$msg .= "<br><br>".
		"Welcome to www.summerworkprogram.com<br> <br>  
		Username and password to access the site is:<br/><br/>
		<strong>Username:</strong> $email<br>	
		<strong>Password:</strong> $password  
		
		 <br/><br/>
		 __________ <br />
		  Thank you ! <br>
		 Summer Work Programs <br>
		 Badabeat Associates<br>
		 Lagos State, Nigeria 100001<br>
		 info@summerworkprograms.com<br>
		 www.summerworkprograms.com.\n" ;
	
		/* To send HTML mail, you can set the Content-type header. */
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		/* additional headers */
		$headers .= "From:".$fromemail."\r\n";
		//$headers .= "$fromemail\r\n";
		/* and now mail it */
		//mail($to, $subject, $msg, $headers);
        $subjectAd= "A NEW REGISTRATION HAS BEEN DONE";
		$toAdmin="admin@summerworkprograms.com";
		
		$msgAd="<br>Dear Administrator,<br><br>";
		$msgAd .= "--------------------------\n" ;
		$msgAd .= "   A NEW REGISTRATION HAS BEEN DONE    \n\n" ;
		$msgAd .= "--------------------------\n" ;
		$msgAd .= "<br><br>".
		" 
		User Details:<br/>
		<strong>Username:</strong> $email<br>	
		<strong>Full Name:</strong> $fname &nbsp; $lastname  
		
		 <br/><br/>
		 __________ <br />
		 Thank you ! <br>
		 Summer Work Programs <br>
		 Badabeat Associates<br>
		 Lagos State, Nigeria 100001<br>
		 info@summerworkprograms.com<br>
		 www.summerworkprograms.com.\n" ;
	
		if(mail($to, $subject, $msg, $headers)){
			echo "<script>alert('Successfully Registered')</script>";
			$_SESSION['userid']  = $user_id;
			$_SESSION['fullname'] = $firstname." ".$lastname; 
			$_SESSION['emailid']  = $email;
			$_SESSION['login_time'] = date("Y-m-d H:i:s",time());
			mail($toAdmin, $subjectAd, $msgAd, $headers);
			//header("location:confirmation.php");
	        //xit;
			return_to_page("confirmation.php");
					
		}else{
		
		$msgg="Mail Does not works";
		/*echo "<script>alert('Mail Does not works')</script>";*/
		//return_to_page("index.php?goto=register");
		}
		
			
	}else{
		$message='An error occured . Please try again.';
		//$return_url=$_SERVER['HTTP_REFERER'];	
	}
	//message($message);
	//return_to_page($return_url);
	}
	
//}
}
/*if($_POST['register_posted']=='yes' && $_REQUEST['action']=='edit')
{
    
	 $update	=	"UPDATE tbl_member SET 
				firstname='$firstname',
				lastname='$lastname',
				gender='$gender',
				address='$address',
				address1='$address1',
				city='$city',
				postcode='$postcode',
				state='$state',
				email='$email',
				dob_month='$dobmonth',
				dob_day='$dobday',
				dob_year='$dobyear',
				countries_id='$country',
				password='$password',
				date_joined='$date_joined',
				last_login='$last_login'
				WHERE users_id='$users_id' ";
					
	if(sql::update_query($update)){
		$message='Your account has updated successfully.';
		message($message); 
		return_to_page("MySEVISFee.php");
	}else{
		$message='An error occured . Please try again.';
		message($message);
		$return_url=$_SERVER['HTTP_REFERER'];	
	}
}
*/


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Summer Program</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-latest.js"></script>

<STYLE>
body, input{
	font-family: Calibri, Arial;
}
input {
	font-size: 12px;
}
.focus {
	border: 2px solid #4D616D;
	background-color: #BED3FE;
}
</STYLE>

<script language="JavaScript" type="text/javascript">
function pdf()
{
	document.registerform.method="post";
	document.registerform.action="pdf_crt.php";
	document.registerform.submit();
}
function validateFields()
	{
		
		
    if (trim(document.registerform.firstname.value)=="")
			{
			alert("First Name is required");
			document.registerform.firstname.focus();
			return false;	
			}		
	if (trim(document.registerform.lastname.value) == "")
			{
			alert("Last Name is required");
			document.registerform.lastname.focus();
			return false;	
			}		

    if (trim(document.registerform.dob_month.value)=="")
			{
			alert("Please Select the month");
			document.registerform.dob_month.focus();
			return false;	
			}		
	if (trim(document.registerform.dob_day.value) == "")
			{
			alert("Please Select the day");
			document.registerform.dob_day.focus();
			return false;	
			}		

    if (trim(document.registerform.dob_year.value)=="")
			{
			alert("Please Select the year");
			document.registerform.dob_year.focus();
			return false;	
			}
    if (trim(document.registerform.age.value)=="")
			{
			alert("Please enter your age");
			document.registerform.age.focus();
			return false;	
			}

	if (trim(document.registerform.gender.value) == "")
			{
				alert("Please select the gender.");
				document.registerform.gender.focus();
				return false;
			}
			
		if (trim(document.registerform.birth_country.value) == "")
			{
				alert("Please select the birth country.");
				document.registerform.birth_country.focus();
				return false;
			}		
	    if (trim(document.registerform.contact_address.value)=="")
			{
			alert("Please enter your contact address.");
			document.registerform.contact_address.focus();
			return false;	
			}
		 if (trim(document.registerform.mobile_no.value)=="")
			{
			alert("Please enter your mobile number.");
			document.registerform.mobile_no.focus();
			return false;	
			}
			
		 if (trim(document.registerform.phone_no.value)=="")
			{
			alert("Please enter your phone number.");
			document.registerform.phone_no.focus();
			return false;	
			}
	if (trim(document.registerform.email.value)== "")
		{
			alert("Please enter your email .");
			document.registerform.email.focus();
			return false;	
		}

		
	if(document.registerform.email.value.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1)
		{
		alert("Your email is not valid");
		document.registerform.email.focus();
		return false;
		}
		
	if (trim(document.registerform.inst.value)== "")
		{
			alert("Please enter a institution.");
			document.registerform.inst.focus();
			return false;	
		}
	
	if (trim(document.registerform.add_institution.value)== "")
		{
			alert("Please enter your the address of institution.");
			document.registerform.add_institution.focus();
			return false;	
		}

    if (trim(document.registerform.course_study.value)== "")
		{
			alert("Please enter a course of study.");
			document.registerform.course_study.focus();
			return false;	
		}
	 if (trim(document.registerform.level_study.value)== "")
		{
			alert("Please enter a level of study.");
			document.registerform.level_study.focus();
			return false;	
		}	
//	if ( ( document.registerform.summer_holiday[1].checked == false )
//    && ( document.registerform.summer_holiday[0].checked == false ) )
//    {
//        alert ( "Please choose your Valide Summer Holiday: Yes or No" );
//        valid = false;
//    }
	
	 if (trim(document.registerform.holiday_start.value)== "")
		{
			alert("Please enter a summer holiday start.");
			document.registerform.holiday_start.focus();
			return false;	
		}
	 if (trim(document.registerform.holiday_ends.value)== "")
		{
			alert("Please enter a summer holiday end.");
			document.registerform.holiday_ends.focus();
			return false;	
		}
	//if ( ( document.registerform.travel_exp[1].checked == false )
//    && ( document.registerform.travel_exp[0].checked == false ) )
//    {
//        alert ( "Please choose your Previus Work Experience: Yes or No" );
//        valid = false;
//    }
//	
	if (trim(document.registerform.grad_date.value)== "")
		{
			alert("Please enter your graduation date.");
			document.registerform.grad_date.focus();
			return false;	
		}	
	
	if (trim(document.registerform.name_sponsor.value)== "")
		{
			alert("Please enter a sponsor name.");
			document.registerform.name_sponsor.focus();
			return false;	
		}	
	
		if (trim(document.registerform.address_sponsor.value)== "")
		{
			alert("Please enter a sponsor address.");
			document.registerform.address_sponsor.focus();
			return false;	
		}
	if (trim(document.registerform.sp_ph_no.value)== "")
		{
			alert("Please enter a sponsor phone number.");
			document.registerform.sp_ph_no.focus();
			return false;	
		}
	
	if (trim(document.registerform.par_sum_progm.value)== "")
		{
			alert("Please enter the Why do you want to participate in the Program ?");
			document.registerform.par_sum_progm.focus();
			return false;	
		}		
	if (trim(document.registerform.hear_abt_us.value)== "")
		{
			alert("Please enter the How did you hear about us ?");
			document.registerform.hear_abt_us.focus();
			return false;	
		}
		
		if ( ( document.registerform.certify.checked == false ))
    {
        alert ( "Please choose a agree button." );
        valid = false;
    }
	
		
	  return true;

	}
	
  function trim(str)
  {
  	return str.replace(/^\s+|\s+$/g,'');
  }
  </script>
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
      
    </table></td>
  </tr>
  <tr>
    <td> <?php include("includes/header.php");?></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td id=""><!--<img src="images/194.jpg"  width="295" height="213"/>--></td>
            <td><div class="weltxt">
              <p> <h1 class="information">User Registration</h1> 
                 <form name="registerform" id="registerform" method="post" action="" enctype="multipart/form-data">

                <fieldset>
                                 <!--..................................................... -->
								   <div class="form_name" >
                    <h1 class="f_information">PERSONAL DETAILS</h1>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td colspan="4" align="left" class="text_n_r"><?php echo $eMsgg;?></td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" align="right">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" align="right"><strong>First Name (as it appears on passport):</strong></td>
                                      <td><input type="text" name="fname" id="firstname" value="<?php echo $_SESSION['firstname'];?>" class="text_f" />&nbsp;*</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      </tr>
                                       <tr>
                                         <td class="text_n_r" align="right">&nbsp;</td>
                                         <td>&nbsp;</td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right"><strong>Last Name (as it appears on passport)::</strong></td>
                                         <td><input type="text" name="lname" id="lastname" value="<?php echo $_SESSION['lastname'];?>" class="text_f" />&nbsp;*
                                         </td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right">&nbsp;</td>
                                         <td>&nbsp;</td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right"><strong>Middle Name :</strong></td>
                                         <td><input type="text" name="midname" id="midname" value="<?php echo $_POST['midname'];?>" class="text_f" />
                                         </td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td height="17" align="right" class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right"><strong>Date of Birth:</strong></td>
                                         <td>&nbsp;&nbsp;&nbsp;<select name="dob_month" id="dob_month" class="" >
                           <option value="">Month</option>
                           <option value="January" <?if($dob_month=='January'):?>selected="selected"<?endif;?>>January</option>
                          <option value="February" <?if($dob_month=='February'):?>selected="selected"<?endif;?>>February</option>
                          <option value="March" <?if($dob_month=='March'):?>selected="selected"<?endif;?>>March</option>
                          <option value="April" <?if($dob_month=='April'):?>selected="selected"<?endif;?>>April</option>
                          <option value="May" <?if($dob_month=='May'):?>selected="selected"<?endif;?>>May</option>
                          <option value="June" <?if($dob_month=='June'):?>selected="selected"<?endif;?>>June</option>
                          <option value="July" <?if($dob_month=='July'):?>selected="selected"<?endif;?>>July</option>
                          <option value="August" <?if($dob_month=='August'):?>selected="selected"<?endif;?>>August</option>
                          <option value="September" <?if($dob_month=='September'):?>selected="selected"<?endif;?>>September</option>
                          <option value="October" <?if($dob_month=='October'):?>selected="selected"<?endif;?>>October</option>
                          <option value="November" <?if($dob_month=='November'):?>selected="selected"<?endif;?>>November</option>
                          <option value="December" <?if($dob_month=='December'):?>selected="selected"<?endif;?>>December</option>
                       </select>
                      <select name="dob_day" id="dob_day"  >
                                 <option value="">Day</option>
                                   <?PHP
                                    for($i=1;$i<=31;$i++){
                                            $selected = ($dob_day==$i)?"selected=\"selected\"":"";
                                            echo '<option value="'.$i.'" "'.$selected.'">'.$i.'</option>';
                                    }
                        ?></select>
                         <select name="dob_year" id="dob_year"  >
                             <option value="">- Years - </option>
                             <?PHP
                                for($year=date('Y')-17;$year>=1985;$year--){
                                            $selected = ($dob_year==$year)?"selected=\"selected\"":"";
                                            echo '<option value="'.$year.'" "'.$selected.'">'.$year.'</option>';
                                }
                            ?>
                         </select>&nbsp;*</td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right">&nbsp;</td>
                                         <td>&nbsp;</td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right"><strong>Age:</strong></td>
                                         <td><input type="text" name="age" id="age" value="<?php echo $_POST['age'];?>" class="text_f"  size="2"/>&nbsp;*</td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right">&nbsp;</td>
                                         <td>&nbsp;</td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                    <tr>
                                      <td width="30%" class="text_n_r" align="right"><strong>Gender</strong></td>
                                      <td width="32%">&nbsp;&nbsp;&nbsp;<select name="gender"  class="" >
                                         <option value=""> --- Select one --- </option>
                                        <option value="male" <?php if($gender=='male'):?>selected="selected"<?php endif;?>>Male</option>
                                         <option value="female" <?php if($gender=='female'):?>selected="selected"<?php endif;?>
                                         >Female</option>
                                       </select>&nbsp;*</td>
                                      <td width="23%" class="text_n_r"></td>
                                      <td width="15%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                     <td width="30%" class="text_n_r" align="right"><strong>Place of Birth:</strong></td>
                                      <td width="32%">&nbsp;&nbsp;&nbsp;<?PHP createcountrycombo("$birth_country","birth_country","")?>&nbsp;*</td>
                                      <td width="23%" class="text_n_r">&nbsp;</td>
                                      <td width="15%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="30%" class="text_n_r" align="right"><strong>Number of Siblings :</strong></td>
                                      <td width="32%"><input type="text" name="no_siblings" id="no_siblings" value="<?php echo $_POST['no_siblings'];?>" class="text_f" /></td>
                                      <td width="23%" class="text_n_r">&nbsp;</td>
                                      <td width="15%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="30%" class="text_n_r" align="right"><strong>Contact Address:</strong></td>
                                      <td width="32%" ><input type="text" name="contact_address" id="contact_address" value="<?php echo $_POST['contact_address'];?>" class="text_f" />&nbsp;*</td>
                                      <td width="23%" class="text_n_r">&nbsp;</td>
                                      <td width="15%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty>&nbsp;</td>
                                      <td >&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                   <td width="30%" class="text_n_r" align="right"><strong>Mobile No: </strong></td>
                                      <td width="32%"><input type="text" name="mobile_no" id="mobile_no" value="<?php echo $_POST['mobile_no'];?>" class="text_f" />
                                      *</td>
                                      <td width="23%" class="text_n_r">&nbsp;</td>
                                      <td width="15%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="30%" class="text_n_r" align="right"><strong>Phone Number </strong></td>
                                      <td width="32%"><input type="text" name="phone_no" id="phone_no" value="<?php echo $_POST['phone_no'];?>" class="text_f" />
                                      *</td>
                                      <td width="23%" class="text_n_r">&nbsp;</td>
                                      <td width="15%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                     <td width="30%" class="text_n_r" align="right"><strong>
                                      Email</strong></td>
                                      <td><input type="text" name="email" id="email" value="<?php echo $_SESSION['email'];?>" class="text_f" />&nbsp;*</td>
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
                                    <td width="30%" class="text_n_r" align="right"><strong>
                                      Passport Number:</strong></td>
                                      <td width="32%"><input type="text" name="passport_number" id="school_code" value="<?php echo $_POST['passport_number'];?>" class="text_f" />
                                      &nbsp;</td>
                                      <td width="23%" class="text_n_r">&nbsp;</td>
                                      <td width="15%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" align="right">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    </table>
                          <h1 class="f_information">INSTITUTION DETAILS</h1>
                       <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="30%" class="text_n_r" align="right"><strong>Name of Institution:</strong></td>
                                      <td width="24%"><input type="text" name="inst" id="inst" value="<?php echo $_SESSION['institution'];?>" class="text_f" />&nbsp;*</td>
                                      <td width="9%" class="text_n_r"> </td>
                                      <td width="37%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                     <td width="30%" class="text_n_r" align="right"><strong>Address of Institution:</strong></td>
                                      <td width="24%"> <input type="text" name="add_institution" id="add_institution" value="<?php echo $_POST['add_institution']; ?>" class="text_f" />&nbsp;*</td>
                                      <td width="9%" class="text_n_r">&nbsp;</td>
                                      <td width="37%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="30%" class="text_n_r" align="right"><strong>Course of Study: </strong></td>
                                      <td width="24%"><input type="text" name="course_study" id="course_study" value="<?php echo $_POST['course_study'];?>" class="text_f" />&nbsp;*</td>
                                      <td width="9%" class="text_n_r">&nbsp;</td>
                                      <td width="37%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="30%" class="text_n_r" align="right"><strong>Level of Study: </strong></td>
                                      <td width="24%" > <input type="text" name="level_study" id="level_study" value="<?php echo $_POST['level_study']; ?>" class="text_f" />&nbsp;*</td>
                                      <td width="9%" class="text_n_r">&nbsp;</td>
                                      <td width="37%">&nbsp;</td>
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
                        </table><script src="popcalendar.js"></script>
                        </div><h1 class="f_information">PROGRAM DETAILS</h1>
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td class="text_n_r" align="right">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      </tr>
                                       <tr>
                                         <td class="text_n_r" align="right"><strong>Valid summer holiday</strong></td>
                                         <td colspan="2"> <input type="radio" name="summer_holiday" value="1" />
                                      &nbsp;Yes&nbsp;
                                      <input type="radio" name="summer_holiday" value="0">
                                      &nbsp;No&nbsp; </td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right">&nbsp;</td>
                                         <td colspan="2">&nbsp;</td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right"><strong>Summer Holiday Starts:</strong></td>
                                         <td><input type="text" name="holiday_start" id="holiday_start" value="<?php echo $_POST['holiday_start'];?>" class="text_f"   onclick="popUpCalendar(this,document.registerform.holiday_start,'mm-dd-yyyy');return false;"/></td>
                                         <td><!--<a href="#" onclick="popUpCalendar(this,document.registerform.holiday_start,'dd-mm-yyyy');return false;"><img src="images/calendar.gif" border=0></a>-->
                                         *   mm-dd-yyyy</td>
                                         <td class="text_n_r"></td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right">&nbsp;</td>
                                         <td colspan="2">&nbsp;</td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right"><strong> Summer Holiday Ends</strong></td>
                                         <td><input type="text" name="holiday_ends" id="holiday_ends" value="<?php echo $_POST['holiday_ends'];?>" class="text_f" onclick="popUpCalendar(this,document.registerform.holiday_ends,'mm-dd-yyyy');return false;"/></a>
                                         </td>
                                         <td><!--<a href="#" onclick="popUpCalendar(this,document.registerform.holiday_ends,'dd-mm-yyyy');return false;"><img src="images/calendar.gif" border="0"></a>-->
                                         *   mm-dd-yyyy</td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right">&nbsp;</td>
                                         <td colspan="2">&nbsp;</td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right"><strong>Previous travel experience:</strong></td>
                                         <td colspan="2"><input type="radio" name="travel_exp" value="1" />
                                      &nbsp;Yes&nbsp;
                                      <input type="radio" name="travel_exp" value="0">
                                      &nbsp;No&nbsp;</td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right">&nbsp;</td>
                                         <td colspan="2">&nbsp;</td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right"><strong>if yes, where:</strong></td>
                                         <td colspan="2">&nbsp;&nbsp;<textarea name="travel_where" cols="21" rows="3" id="travel_where"><?php echo $_POST['travel_where'];?></textarea></td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                       <tr>
                                         <td class="text_n_r" align="right">&nbsp;</td>
                                         <td colspan="2">&nbsp;</td>
                                         <td class="text_n_r">&nbsp;</td>
                                         <td>&nbsp;</td>
                                       </tr>
                                    <tr>
                                      <td width="30%" class="text_n_r" align="right"><strong>Expected graduation date</strong></td>
                                      <td width="12%"><input type="text" name="grad_date" id="grad_date" value="<?php echo $_POST['grad_date'];?>" class="text_f"  onclick="popUpCalendar(this,document.registerform.grad_date,'mm-dd-yyyy');return false;"/>&nbsp;*  mm-dd-yyyy</td>
                                      <td width="12%" valign="top"><!--<a href="#" onclick="popUpCalendar(this,document.registerform.grad_date,'dd-mm-yyyy');return false;"><img src="images/calendar.gif" border=0></a>--></td>
                                      <td width="9%" class="text_n_r">&nbsp;</td>
                                      <td width="37%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                     <td width="30%" class="text_n_r" align="right"><strong>Name of contacts in the United States (if any)</strong></td>
                                      <td width="24%" colspan="2"><input type="text" name="name_contact_us" id="name_contact_us" value="<?php echo $_POST['name_contact_us'];?>" class="text_f" /></td>
                                      <td width="9%" class="text_n_r">&nbsp;</td>
                                      <td width="37%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="30%" class="text_n_r" align="right"><strong>Address of contacts in the United States: </strong></td>
                                      <td width="24%" colspan="2"><input type="text" name="add_contact_us" id="add_contact_us" value="<?php echo $_POST['add_contact_us'];?>" class="text_f" /></td>
                                      <td width="9%" class="text_n_r">&nbsp;</td>
                                      <td width="37%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="30%" class="text_n_r" align="right"><strong>Name of Parent/Sponsor </strong></td>
                                      <td width="24%" colspan="2" ><input type="text" name="name_sponsor" id="name_sponsor" value="<?php echo $_POST['name_sponsor'];?>" class="text_f" />&nbsp;*</td>
                                      <td width="9%" class="text_n_r">&nbsp;</td>
                                      <td width="37%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" sty>&nbsp;</td>
                                      <td colspan="2" >&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                   <td width="30%" class="text_n_r" align="right"><strong>Address of Sponsor </strong></td>
                                      <td width="24%" colspan="2"><input type="text" name="address_sponsor" id="address_sponsor" value="<?php echo $_POST['address_sponsor'];?>" class="text_f" />&nbsp;*</td>
                                      <td width="9%" class="text_n_r">&nbsp;</td>
                                      <td width="37%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="30%" class="text_n_r" align="right"><strong>Phone Numbe ofr Sponsor</strong></td>
                                      <td width="24%" colspan="2"><input type="text" name="sp_ph_no" id="sp_ph_no" value="<?php echo $_POST['sp_ph_no'];?>" class="text_f" />
                                      *</td>
                                      <td width="9%" class="text_n_r">&nbsp;</td>
                                      <td width="37%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                     <td width="30%" class="text_n_r" align="right"><strong>
                                      Email</strong></td>
                                      <td colspan="2"><input type="text" name="sp_email" id="sp_email" value="<?php echo $_POST['sp_email'];?>" class="text_f" /></td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="30%" class="text_n_r" align="right"><strong>
                                      Profession</strong></td>
                                      <td width="24%" colspan="2"><input type="text" name="profession" id="profession" value="<?php echo $_POST['profession'];?>" class="text_f" /></td>
                                      <td width="9%" class="text_n_r">&nbsp;</td>
                                      <td width="37%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" align="right">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" align="right"><strong>Why do you want to participate in the summer work and travel program?&nbsp;&nbsp;</strong></td>
                                      <td colspan="2">&nbsp;&nbsp;&nbsp;<textarea name="par_sum_progm" cols="20" rows="3" id="par_sum_progm"><?php echo $_POST['par_sum_progm'];?></textarea>&nbsp;*</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" align="right">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="text_n_r" align="right"><strong>How did you hear about us?</strong></td>
                                      <td colspan="2">&nbsp;&nbsp;
                                        <textarea name="hear_abt_us" cols="20" rows="3" id="hear_abt_us"><?php echo $_POST['hear_abt_us'];?></textarea>&nbsp;*</td>
                                      <td class="text_n_r">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="3" class="text_n_r">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                        </table>
                         
         
                                    <div class="form_name" style="margin-bottom:50px;">
<span class="text_n1"></span><span class="text_n_r" style="margin-left:5px;"> <input type="radio" name="certify" value="1" /> 
&Travel Program and agree to maintain an active email account and advise Badabeat Associates of any changes in my email address. I understand that any false or omitted information may lead to rejection of my Work &Travel program application and undertake to provide updated information to Badabeat Associates.<br /><br /></span><span class="text_n_r" style="margin-left:0px;">Click the PRINT button below to print the completed registration form into PDF before you submit online. The PDF copy must be printed and signed by the student and the parent. Note that the printed document is for legal purposes and should be submitted to Badabeat Associates with other required documents.</span></div>
                                  <div class="form_name" style="margin-top:10px;">
                              </div>
								  <div class="form_name"  style="margin-bottom:10px;">
                                 
                               <table width="31%" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
         
            <td width="35%"><input type="submit"  value=""  class="submitbutton" name="register"onclick="return validateFields()" /></td>
              <td><input type="submit"  value=""  class="printbutton" name="print" />
              </td>
            
             <td width="59%"><a href="index.php"><img src="images/cancel.jpg" border="0"/></a></td>
             
          
           <td width="6%" class=""><!--<div class="search_textbox"><input type="text"/></div>--></td>
          </tr>
        </table>
                                              
                                  </div>
                                  
<!--....................................................... -->
                                  <!--..................................................... -->

    <div class="form_name" style="margin-top:90px; margin-left:10px;">
                                    <p class="text_n"></p>
                                    <div class="form_field">
                               
                                 <input type="hidden" name="register_posted" value="yes"></div>
                        </div>
   </fieldset>
   </form>
   <br />

<!--
 <div  class="enter" style="margin-left:150px;"><a href="terms.php" class="enter_txt1">AGREE</a></div><div class="enter" style="margin-right:200px;"><a href="terms.php" class="enter_txt1">DISAGREE</a></div>--></p>
            </div></td>
          </tr>
        </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td><?php include("includes/footer.php");?></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
<SCRIPT>
$('input[type="text"]').focus(function() {
	$(this).addClass("focus");
});
$('input[type="text"]').blur(function() {
	$(this).removeClass("focus");
});

$('input[type="password"]').focus(function() {
	$(this).addClass("focus");
});
$('input[type="password"]').blur(function() {
	$(this).removeClass("focus");
});

</SCRIPT>
</html>


