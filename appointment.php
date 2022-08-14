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
        if (null === formElement) {
            formElement = document.getElementById("0");
        }
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

<link href="https://www.tfaforms.com/form-builder/4.3.0/css/wforms-layout.css?v=512-10" rel="stylesheet"
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
<link href="https://www.tfaforms.com/form-builder/4.3.0/css/wforms-jsonly.css?v=512-10" rel="alternate stylesheet"
      title="This stylesheet activated by javascript" type="text/css"/>
<script type="text/javascript" src="https://www.tfaforms.com/wForms/3.10/js/wforms.js?v=512-10"></script>
<script type="text/javascript">
    wFORMS.behaviors.prefill.skip = false;
</script>
<script type="text/javascript" src="https://www.tfaforms.com/wForms/3.10/js/localization-en_US.js?v=512-10"></script>

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

        #tfa_Contactnumber,
        *[id^="tfa_Contactnumber["] {
            width: 40 !important;
        }

        #tfa_Contactnumber-D,
        *[id^="tfa_Contactnumber["][class~="field-container-D"] {
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

        #tfa_CourseofStudy,
        *[id^="tfa_CourseofStudy["] {
            width: 40 !important;
        }

        #tfa_CourseofStudy-D,
        *[id^="tfa_CourseofStudy["][class~="field-container-D"] {
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

        #tfa_Whatisyourpresen,
        *[id^="tfa_Whatisyourpresen["] {
            width: 40 !important;
        }

        #tfa_Whatisyourpresen-D,
        *[id^="tfa_Whatisyourpresen["][class~="field-container-D"] {
            width: auto !important;
        }
    </style>
    <div class="">
        <div class="wForm" id="tfa_0-WRPR" dir="ltr">
            <div class="codesection" id="code-tfa_0"></div>
            <h3 class="wFormTitle" id="tfa_0-T">2019 SWT Appointment Request - Schedule G</h3>
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
                    <div class="oneField field-container-D     " id="tfa_Contactnumber-D">
                        <label id="tfa_Contactnumber-L" for="tfa_Contactnumber" class="label preField reqMark">Mobile
                            Phone number</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_Contactnumber" name="tfa_Contactnumber"
                                                         value="" placeholder="" title="Mobile Phone number"
                                                         class="required"></div>
                    </div>
                    <div class="oneField field-container-D     " id="tfa_PresentAddress-D">
                        <label id="tfa_PresentAddress-L" for="tfa_PresentAddress" class="label preField reqMark">Name of
                            Institution</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_PresentAddress" name="tfa_PresentAddress"
                                                         value="" placeholder="" title="Name of Institution"
                                                         class="required"></div>
                    </div>
                    <div class="oneField field-container-D     " id="tfa_CourseofStudy-D">
                        <label id="tfa_CourseofStudy-L" for="tfa_CourseofStudy" class="label preField reqMark">Course of
                            Study</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_CourseofStudy" name="tfa_CourseofStudy"
                                                         value="" placeholder="" title="Course of Study"
                                                         class="required"></div>
                    </div>
                    <div class="oneField field-container-D     " id="tfa_LevelofStudy-D">
                        <label id="tfa_LevelofStudy-L" for="tfa_LevelofStudy" class="label preField reqMark">Level of
                            Study</label><br>
                        <div class="inputWrapper"><select id="tfa_LevelofStudy" name="tfa_LevelofStudy"
                                                          title="Level of Study" class="required">
                                <option value="">Please select...</option>
                                <option value="tfa_100Level" id="tfa_100Level" class="">100 Level</option>
                                <option value="tfa_200Level" id="tfa_200Level" class="">200 Level</option>
                                <option value="tfa_300Level" id="tfa_300Level" class="">300 Level</option>
                                <option value="tfa_400Level" id="tfa_400Level" class="">400 Level</option>
                                <option value="tfa_FinalYear" id="tfa_FinalYear" class="">Final Year</option>
                            </select></div>
                    </div>
                    <div class="oneField field-container-D    hintsTooltip " id="tfa_SummerWorkRegist-D">
                        <label id="tfa_SummerWorkRegist-L" for="tfa_SummerWorkRegist" class="label preField reqMark">Summer
                            Work Registration Number</label><br>
                        <div class="inputWrapper">
                            <input type="text" id="tfa_SummerWorkRegist" name="tfa_SummerWorkRegist" value=""
                                   placeholder="" maxlength="8" title="Summer Work Registration Number"
                                   class="validate-alphanum required"><span class="field-hint-inactive"
                                                                            id="tfa_SummerWorkRegist-H"><span
                                        id="tfa_SummerWorkRegist-HH" class="hint">You must input your registration number correctly otherwise your appointment request will not be approved.</span></span>
                        </div>
                    </div>
                </fieldset>
                <div class="oneField field-container-D     " id="tfa_Anyambiguityorte-D">
                    <label id="tfa_Anyambiguityorte-L" for="tfa_Anyambiguityorte" class="label preField reqMark">Are you
                        are REHIRE?</label><br>
                    <div class="inputWrapper"><select id="tfa_Anyambiguityorte" name="tfa_Anyambiguityorte"
                                                      title="Are you are REHIRE?" class="required">
                            <option value="">Please select...</option>
                            <option value="tfa_Yes1" id="tfa_Yes1" class="">Yes</option>
                            <option value="tfa_No1" id="tfa_No1" class="">No</option>
                        </select></div>
                </div>
                <div class="oneField field-container-D     " id="tfa_Whatisyourpresen-D">
                    <label id="tfa_Whatisyourpresen-L" for="tfa_Whatisyourpresen" class="label preField ">If YES to the
                        question above, who was your previous employer?</label><br>
                    <div class="inputWrapper"><input type="text" id="tfa_Whatisyourpresen" name="tfa_Whatisyourpresen"
                                                     value="" placeholder=""
                                                     title="If YES to the question above, who was your previous employer?"
                                                     class=""></div>
                </div>
                <div class="oneField field-container-D     " id="tfa_DesiredAppointme-D">
                    <label id="tfa_DesiredAppointme-L" for="tfa_DesiredAppointme" class="label preField reqMark">Desired
                        Appointment Date</label><br>
                    <div class="inputWrapper"><select id="tfa_DesiredAppointme" name="tfa_DesiredAppointme"
                                                      title="Desired Appointment Date" class="required">
                            <option value="">Please select...</option>
                            <option value="tfa_46" id="tfa_46" class="">December 18, 2018 - 10:00am</option>
                            <option value="tfa_47" id="tfa_47" class="">December 19, 2018 - 10:00am</option>
                            <option value="tfa_48" id="tfa_48" class="">December 20, 2018 - 10:00am</option>
                        </select></div>
                </div>
                <div class="htmlSection" id="tfa_1">
                    <div class="htmlContent" id="tfa_1-HTML">
                        <div id="html-tmp-2993913426430" class="htmlsection">
                            <p><em>Please note that by submitting this request for appointment, you hereby agree that
                                    the information you are supplying is factual and true to the best of your knowledge,
                                    you will be available for program processing on the scheduled date and understand
                                    that failure to show up for processing will result in the cancellation of your
                                    application package. This schedule portal is only valid for 72 hours from the date
                                    and time you receive the request notification by email. Besor Associates reserves
                                    the right to grant or decline your request based on prevailing factors, appointment
                                    and job slots availability. Please, note that your application package will not be
                                    activated until you schedule an appointment to process. If your appointment
                                    scheduling is successful, you will receive an official acceptance email confirming
                                    your appointment. Thank you.</em></p>
                        </div>
                        <p><em><br></em></p></div>
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
                <input type="hidden" value="4706877" name="tfa_dbFormId" id="tfa_dbFormId"><input type="hidden" value=""
                                                                                                  name="tfa_dbResponseId"
                                                                                                  id="tfa_dbResponseId"><input
                        type="hidden" value="b826932a45cfa68a1c389cd9eea348c2" name="tfa_dbControl"
                        id="tfa_dbControl"><input type="hidden" value="1" name="tfa_dbVersionId"
                                                  id="tfa_dbVersionId"><input type="hidden" value=""
                                                                              name="tfa_switchedoff"
                                                                              id="tfa_switchedoff">
            </form>
        </div>
    </div>

</div>
				