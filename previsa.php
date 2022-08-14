<?php
$hide_slider = true;
include "includes/header.php"
?>

<!-- FORM: HEAD SECTION -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        const FORM_TIME_START = Math.floor((new Date).getTime() / 1000);
        let formElement = document.getElementById("tfa_0");
        let appendJsTimerElement = function () {
            let formTimeDiff = Math.floor((new Date).getTime() / 1000) - FORM_TIME_START;
            let cumulatedTimeElement = document.getElementById("tfa_dbCumulatedTime");
            if (null !== cumulatedTimeElement) {
                let cumulatedTime = parseInt(cumulatedTimeElement.value);
                if (null !== cumulatedTime && cumulatedTime > 0) {
                    formTimeDiff += cumulatedTime;
                }
            }
            let jsTimeInput = document.createElement("input");
            jsTimeInput.setAttribute("type", "hidden");
            jsTimeInput.setAttribute("value", formTimeDiff.toString());
            jsTimeInput.setAttribute("name", "tfa_dbElapsedJsTime");
            jsTimeInput.setAttribute("id", "tfa_dbElapsedJsTime");
            jsTimeInput.setAttribute("autocomplete", "off");
            if (null !== formElement) {
                formElement.appendChild(jsTimeInput);
            }
        };
        if (null !== formElement) {
            if (formElement.addEventListener) {
                formElement.addEventListener('submit', appendJsTimerElement, false);
            } else if (formElement.attachEvent) {
                formElement.attachEvent('onsubmit', appendJsTimerElement);
            }
        }
    });
</script>

<link href="https://www.tfaforms.com/form-builder/4.3.0/css/wforms-layout.css?v=4618-1" rel="stylesheet"
      type="text/css"/>
<!--[if IE 8]>
<link href="https://www.tfaforms.com/form-builder/4.3.0/css/wforms-layout-ie8.css" rel="stylesheet" type="text/css"/>
<![endif]-->
<!--[if IE 7]>
<link href="https://www.tfaforms.com/form-builder/4.3.0/css/wforms-layout-ie7.css" rel="stylesheet" type="text/css"/>
<![endif]-->
<!--[if IE 6]>
<link href="https://www.tfaforms.com/form-builder/4.3.0/css/wforms-layout-ie6.css" rel="stylesheet" type="text/css"/>
<![endif]-->

<link href="https://www.tfaforms.com/wForms/3.4/css/antique-blue/wforms.css" rel="stylesheet" type="text/css"/>
<link href="https://www.tfaforms.com/form-builder/4.3.0/css/wforms-jsonly.css?v=4618-1" rel="alternate stylesheet"
      title="This stylesheet activated by javascript" type="text/css"/>
<script type="text/javascript" src="https://www.tfaforms.com/wForms/3.10/js/wforms.js?v=4618-1"></script>
<script type="text/javascript">
    wFORMS.behaviors.prefill.skip = false;
</script>
<script type="text/javascript" src="https://www.tfaforms.com/wForms/3.10/js/localization-en_US.js?v=4618-1"></script>

<!-- FORM: BODY SECTION -->
<div class="wFormContainer">

    <style type="text/css">
        #tfa_Name,
        *[id^="tfa_Name["] {
            width: 40 !important;
        }

        #tfa_Name-D,
        *[id^="tfa_Name["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_Surname,
        *[id^="tfa_Surname["] {
            width: 40 !important;
        }

        #tfa_Surname-D,
        *[id^="tfa_Surname["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_Email,
        *[id^="tfa_Email["] {
            width: 40 !important;
        }

        #tfa_Email-D,
        *[id^="tfa_Email["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_PresentAddress,
        *[id^="tfa_PresentAddress["] {
            width: 40 !important;
        }

        #tfa_PresentAddress-D,
        *[id^="tfa_PresentAddress["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_SummerWorkRegist,
        *[id^="tfa_SummerWorkRegist["] {
            width: 40 !important;
        }

        #tfa_SummerWorkRegist-D,
        *[id^="tfa_SummerWorkRegist["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_2,
        *[id^="tfa_2["] {
            width: 290px !important;
        }

        #tfa_2-D,
        *[id^="tfa_2["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_2-L,
        label[id^="tfa_2["] {
            width: 320px !important;
        }

        #tfa_3,
        *[id^="tfa_3["] {
            width: 290px !important;
        }

        #tfa_3-D,
        *[id^="tfa_3["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_3-L,
        label[id^="tfa_3["] {
            width: 320px !important;
        }

        #tfa_Whatisyourpresen,
        *[id^="tfa_Whatisyourpresen["] {
            width: 40 !important;
        }

        #tfa_Whatisyourpresen-D,
        *[id^="tfa_Whatisyourpresen["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_Whatisyourpresen-L,
        label[id^="tfa_Whatisyourpresen["] {
            width: 300px !important;
        }
    </style>
    <div class="">
        <div class="wForm" id="tfa_0-WRPR" dir="ltr">
            <div class="codesection" id="code-tfa_0"></div>
            <h3 class="wFormTitle" id="tfa_0-T">US Visa Application // EXISTING INDIVIDUALS</h3>
            <form method="post" action="https://www.tfaforms.com/responses/processor" class="hintsTooltip labelsAbove"
                  id="tfa_0">
                <fieldset id="tfa_Yourpersonaldeta" class="section required">
                    <legend id="tfa_Yourpersonaldeta-L">Personal Details</legend>
                    <div class="oneField field-container-D     " id="tfa_Name-D">
                        <label id="tfa_Name-L" for="tfa_Name" class="label preField reqMark">First Name </label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_Name" name="tfa_Name" value=""
                                                         placeholder="" title="First Name " class="required"></div>
                    </div>
                    <div class="oneField field-container-D     " id="tfa_Surname-D">
                        <label id="tfa_Surname-L" for="tfa_Surname" class="label preField reqMark">Surname </label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_Surname" name="tfa_Surname" value=""
                                                         placeholder="" title="Surname " class="required"></div>
                    </div>
                    <div class="oneField field-container-D     " id="tfa_Email-D">
                        <label id="tfa_Email-L" for="tfa_Email" class="label preField reqMark">Email address</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_Email" name="tfa_Email" value=""
                                                         placeholder="" title="Email address"
                                                         class="validate-email required"></div>
                    </div>
                    <div class="oneField field-container-D     " id="tfa_PresentAddress-D">
                        <label id="tfa_PresentAddress-L" for="tfa_PresentAddress" class="label preField reqMark">Name of
                            Institution</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_PresentAddress" name="tfa_PresentAddress"
                                                         value="" placeholder="" title="Name of Institution"
                                                         class="required"></div>
                    </div>
                    <div class="oneField field-container-D     " id="tfa_SummerWorkRegist-D">
                        <label id="tfa_SummerWorkRegist-L" for="tfa_SummerWorkRegist" class="label preField reqMark">Summer
                            Work Registration Number</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_SummerWorkRegist"
                                                         name="tfa_SummerWorkRegist" value="" placeholder=""
                                                         title="Summer Work Registration Number"
                                                         class="validate-alphanum required"></div>
                    </div>
                    <div class="oneField field-container-D     " id="tfa_2-D">
                        <label id="tfa_2-L" for="tfa_2" class="label preField reqMark">Email Address used for
                            USTravelDocs Account</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_2" name="tfa_2" value="" placeholder=""
                                                         title="Email Address used for USTravelDocs Account"
                                                         class="required"></div>
                    </div>
                    <div class="oneField field-container-D     " id="tfa_3-D">
                        <label id="tfa_3-L" for="tfa_3" class="label preField reqMark">DS 160 Reference # of the last
                            visa application</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_3" name="tfa_3" value="" placeholder=""
                                                         title="DS 160 Reference # of the last visa application"
                                                         class="required"></div>
                    </div>
                    <div class="oneField field-container-D     " id="tfa_Whatisyourpresen-D">
                        <label id="tfa_Whatisyourpresen-L" for="tfa_Whatisyourpresen" class="label preField reqMark">Visa
                            Category?</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_Whatisyourpresen"
                                                         name="tfa_Whatisyourpresen" value="" placeholder=""
                                                         title="Visa Category?" class="required"></div>
                    </div>
                </fieldset>
                <div class="htmlSection" id="tfa_1">
                    <div class="htmlContent" id="tfa_1-HTML"><p><em>Please <b>ensure that you </b>supply the correct
                                email address used to create your </em><u><b><a
                                            href="https://cgifederal.secure.force.com/" target="_blank">USTravelDocs</a></b></u><em>
                                account<b> </b><u>and that you can access the emails sent to the address</u><b>
                                    (Individual Applicants ONLY)</b>. </em><br><em><em>We will request a password reset
                                    and implore that you forward the temporary login details to us as soon as
                                    received.</em></em></p>
                        <p><em>If you have applied as part of a family or dependent to a main applicant, kindly follow
                                the instructions provided on how to separate your account.&nbsp; Thank you. <br></em>
                        </p></div>
                </div>
                <div>
                    <fieldset class="captcha">
                        <legend>Captcha</legend>
                        <p class="instructions">Please enter the characters you see in this picture:</p>
                        <div class="oneField">
                            <img src="https://www.tfaforms.com/forms/captcha" width="200" height="60"
                                 alt="Visual CAPTCHA"><br><label class="preField"
                                                                 for="tfa_captcha_text">Characters</label> <input
                                    type="text" name="tfa_captcha_text" id="tfa_captcha_text"><br>
                        </div>
                        <div class="captchaHelp">This helps prevent automated form submissions. If you are not sure what
                            the characters are, make your best guess. You will have another try in the next screen.<br>Can't
                            see the image? <a href="https://www.tfaforms.com/forms/captcha/1">Click here for an audible
                                version in English.</a>
                        </div>
                    </fieldset>
                </div>
                <div class="actions" id="tfa_0-A"><input type="submit" class="primaryAction" value="Submit"></div>
                <div style="clear:both"></div>
                <input type="hidden" value="4665877" name="tfa_dbFormId" id="tfa_dbFormId"><input type="hidden" value=""
                                                                                                  name="tfa_dbResponseId"
                                                                                                  id="tfa_dbResponseId"><input
                        type="hidden" value="784ebd822f8254ac1be0116f340eee66" name="tfa_dbControl"
                        id="tfa_dbControl"><input type="hidden" value="3" name="tfa_dbVersionId"
                                                  id="tfa_dbVersionId"><input type="hidden" value=""
                                                                              name="tfa_switchedoff"
                                                                              id="tfa_switchedoff">
            </form>
        </div>
    </div>

</div>
				