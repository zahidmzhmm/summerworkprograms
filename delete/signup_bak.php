<?php
error_reporting(1);

session_start();ob_start();
include("config.php");
include('includes/includes.php');

if(@$_SESSION["captcha_result"]=="-1" ){
	$country=$_SESSION["res_country"];
	$dd=$_SESSION["dob_day"];
	$mm=$_SESSION["dob_month"];
	$yy=$_SESSION["dob_year"];
}
?>

<?php
    include("includes/header.php");?></td>

<style>

    #recaptcha_response_field{
        height: 25px!important;
    }
    
    #recaptcha_privacy{
        margin-top:-11px;
    }
</style>
<!-- <script src='https://www.google.com/recaptcha/api.js'></script>-->

<section class="grid">
    <div class="block-border">
        <h1>SELECT YOUR COUNTRY OF RESIDENCE </h1>
        <form name="registerform" id="registerform" method="post" action="user-register.php" class="block-content form"  >
            <input type="hidden" name="register_posted" value="yes">

            <fieldset class="required">

                <p>
                    <label for="country">Country:</label>
                    <select name="country" id="country" class="form-control" style="width:250px" >
                        <option value="">Select Country</option>
                        <option value="Botswana" <?php if($country=='Botswana'):?>selected="selected"<?php endif;?>>Botswana</option>
                        <option value="Nigeria" <?php if($country=='Nigeria'):?>selected="selected"<?php endif; ?>>Nigeria</option>
                        <option value="Tanzania" <?php if($country=='Tanzania'):?>selected="selected"<?php endif; ?>>Tanzania</option>
                        <option value="Togo " <?php if($country=='Togo '):?>selected="selected"<?php endif; ?>>Togo </option>
                        <option value="South Africa" <?php if($country=='South Africa'):?>selected="selected"<?php endif; ?>>South Africa</option>
                    </select>

                </p>

                <p>
                    <label for="dob_month">PLEASE ENTER YOUR DATE OF BIRTH:</label>
                    <select name="dob_month" id="dob_month" class="" >
                        <option value="">Month</option>
                        <option value="1" <?php if($mm=='1'):?>selected="selected"<?php endif; ?>>January</option>
                        <option value="2" <?php if($mm=='2'):?>selected="selected"<?php endif; ?>>February</option>
                        <option value="3" <?php if($mm=='3'):?>selected="selected"<?php endif; ?>>March</option>
                        <option value="4" <?php if($mm=='4'):?>selected="selected"<?php endif; ?>>April</option>
                        <option value="5" <?php if($mm=='5'):?>selected="selected"<?php endif; ?>>May</option>
                        <option value="6" <?php if($mm=='6'):?>selected="selected"<?php endif; ?>>June</option>
                        <option value="7" <?php if($mm=='7'):?>selected="selected"<?php endif; ?>>July</option>
                        <option value="8" <?php if($mm=='8'):?>selected="selected"<?php endif; ?>>August</option>
                        <option value="9" <?php if($mm=='9'):?>selected="selected"<?php endif; ?>>September</option>
                        <option value="10" <?php if($mm=='10'):?>selected="selected"<?php endif; ?>>October</option>
                        <option value="11" <?php if($mm=='11'):?>selected="selected"<?php endif; ?>>November</option>
                        <option value="12" <?php if($mm=='12'):?>selected="selected"<?php endif; ?>>December</option>
                    </select>
                    <select name="dob_day" id="dob_day"  >
                        <option value="">Day</option>
						<?php
						for($i=1;$i<=31;$i++){
							$selected = ($dd==$i)?"selected=\"selected\"":"";
							echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
						}
						?></select>
                    <select name="dob_year" id="dob_year"  >
                        <option value="">- Years - </option>
						<?php
						for($year=date('Y')-17;$year>=1993;$year--){
							$selected = ($yy==$year)?"selected=\"selected\"":"";
							echo '<option value="'.$year.'" '.$selected.'>'.$year.'</option>';
						}
						?>
                    </select>

                </p>

                <p class="captcha">
                    <label for="dob_month">PLEASE ENTER CAPTCHA:</label>
					<?php
					require_once('recaptchalib.php');



					$publickey = RECAPTCHA_PUBLIC_KEY; // you got this from the signup page
					//echo recaptcha_get_html($publickey);
					echo recaptcha_get_html($publickey,'',true);
					?></p>

            </fieldset>
			<?php if ($dMsg){ ?>
                <fieldset>
                    <legend>Fieldset</legend>

                    <ul class="message error no-margin">
                        <li><?php echo $dMsg; ?></li>
                    </ul>





                </fieldset>
			<?php } ?>
            <fieldset class="grey-bg no-margin">

                <p class="input-with-button">

                    <button type="submit" onclick="return validateFields()">Enter</button>
                </p>
            </fieldset>



            <!--<div class="g-recaptcha" data-sitekey="6LfzbQoTAAAAABcXnFYd2JwWfpVeylB9kXE8bHnD"></div>	-->
        </form></div>
</section>


<?php include "includes/footer.php";?>


<script language="JavaScript" type="text/javascript">

    function validateFields()
    {

        if (trim(document.registerform.country.value)=="")
        {
            alert("Please Select the country");
            document.registerform.country.focus();
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


        if (trim(document.registerform.recaptcha_response_field.value)=="")
        {
            alert("Please enter captcha value");
            document.registerform.recaptcha_response_field.focus();
            return false;
        }

        return true;

    }

    function trim(str)
    {
        return str.replace(/^\s+|\s+$/g,'');
    }

</script>