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

<link href="https://www.tfaforms.com/form-builder/4.3.0/css/wforms-layout.css?v=512-2" rel="stylesheet"
      type="text/css"/>

<!--[if IE 8]>
<link href="https://www.tfaforms.com/form-builder/4.3.0/css/wforms-layout-ie8.css" rel="stylesheet"
      type="text/css"/>
<![endif]-->
<!--[if IE 7]>
<link href="https://www.tfaforms.com/form-builder/4.3.0/css/wforms-layout-ie7.css" rel="stylesheet"
      type="text/css"/>
<![endif]-->
<!--[if IE 6]>
<link href="https://www.tfaforms.com/form-builder/4.3.0/css/wforms-layout-ie6.css" rel="stylesheet"
      type="text/css"/>
<![endif]-->
<link href="https://www.tfaforms.com/wForms/3.4/css/antique-blue/wforms.css" rel="stylesheet" type="text/css"/>
<link href="https://www.tfaforms.com/form-builder/4.3.0/css/wforms-jsonly.css?v=512-2" rel="alternate stylesheet"
      title="This stylesheet activated by javascript" type="text/css"/>
<script type="text/javascript" src="https://www.tfaforms.com/wForms/3.10/js/wforms.js?v=512-2"></script>
<script type="text/javascript">
    wFORMS.behaviors.prefill.skip = false;
</script>
<script type="text/javascript" src="https://www.tfaforms.com/wForms/3.10/js/localization-en_US.js?v=512-2"></script>

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

        #tfa_PresentAddress-L,
        label[id^="tfa_PresentAddress["] {
            width: 250px !important;
        }

        #tfa_Anysuggestiononi,
        *[id^="tfa_Anysuggestiononi["] {
            width: 40 !important;
        }

        #tfa_Anysuggestiononi-D,
        *[id^="tfa_Anysuggestiononi["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_Anysuggestiononi-L,
        label[id^="tfa_Anysuggestiononi["] {
            width: 300px !important;
        }

        #tfa_3,
        *[id^="tfa_3["] {
            width: 40 !important;
        }

        #tfa_3-D,
        *[id^="tfa_3["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_3-L,
        label[id^="tfa_3["] {
            width: 310px !important;
        }

        #tfa_5,
        *[id^="tfa_5["] {
            width: 40 !important;
        }

        #tfa_5-D,
        *[id^="tfa_5["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_5-L,
        label[id^="tfa_5["] {
            width: 300px !important;
        }

        #tfa_7,
        *[id^="tfa_7["] {
            width: 40 !important;
        }

        #tfa_7-D,
        *[id^="tfa_7["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_7-L,
        label[id^="tfa_7["] {
            width: 300px !important;
        }

        #tfa_13,
        *[id^="tfa_13["] {
            width: 40 !important;
        }

        #tfa_13-D,
        *[id^="tfa_13["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_13-L,
        label[id^="tfa_13["] {
            width: 310px !important;
        }

        #tfa_15,
        *[id^="tfa_15["] {
            width: 40 !important;
        }

        #tfa_15-D,
        *[id^="tfa_15["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_15-L,
        label[id^="tfa_15["] {
            width: 310px !important;
        }

        #tfa_17,
        *[id^="tfa_17["] {
            width: 40 !important;
        }

        #tfa_17-D,
        *[id^="tfa_17["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_17-L,
        label[id^="tfa_17["] {
            width: 300px !important;
        }

        #tfa_19,
        *[id^="tfa_19["] {
            width: 40 !important;
        }

        #tfa_19-D,
        *[id^="tfa_19["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_19-L,
        label[id^="tfa_19["] {
            width: 320px !important;
        }

        #tfa_Anyambiguityorte,
        *[id^="tfa_Anyambiguityorte["] {
            width: 40 !important;
        }

        #tfa_Anyambiguityorte-D,
        *[id^="tfa_Anyambiguityorte["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_Anyambiguityorte-L,
        label[id^="tfa_Anyambiguityorte["] {
            width: 310px !important;
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
            width: 330px !important;
        }

        #tfa_Chooseoneofthefo-L,
        label[id^="tfa_Chooseoneofthefo["] {
            width: 330px !important;
        }

        #tfa_21,
        *[id^="tfa_21["] {
            width: 40 !important;
        }

        #tfa_21-D,
        *[id^="tfa_21["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_21-L,
        label[id^="tfa_21["] {
            width: 350px !important;
        }
    </style>
    <div class="">
        <div class="wForm" id="tfa_0-WRPR" dir="ltr">
            <div class="codesection" id="code-tfa_0"></div>
            <h3 class="wFormTitle" id="tfa_0-T">Summer Work Participant Statement</h3>
            <form method="post" action="https://www.tfaforms.com/responses/processor"
                  class="hintsTooltip labelsAbove"
                  id="tfa_0">
                <fieldset id="tfa_Yourpersonaldeta" class="section required">
                    <legend id="tfa_Yourpersonaldeta-L">Personal Details</legend>
                    <div class="oneField field-container-D     " id="tfa_Name-D">
                        <label id="tfa_Name-L" for="tfa_Name" class="label preField reqMark">Full Name </label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_Name" name="tfa_Name" value=""
                                                         placeholder="" title="Full Name " class="required"></div>
                    </div>
                    <div class="oneField field-container-D     " id="tfa_Email-D">
                        <label id="tfa_Email-L" for="tfa_Email" class="label preField reqMark">Email address</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_Email" name="tfa_Email" value=""
                                                         placeholder="" title="Email address" class="required">
                        </div>
                    </div>
                    <div class="oneField field-container-D     " id="tfa_Contactnumber-D">
                        <label id="tfa_Contactnumber-L" for="tfa_Contactnumber" class="label preField reqMark">Phone
                            number</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_Contactnumber" name="tfa_Contactnumber"
                                                         value="" placeholder="" title="Phone number"
                                                         class="required">
                        </div>
                    </div>
                    <div class="oneField field-container-D     " id="tfa_PresentAddress-D">
                        <label id="tfa_PresentAddress-L" for="tfa_PresentAddress" class="label preField reqMark">Summer
                            Work Registration Number</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_PresentAddress"
                                                         name="tfa_PresentAddress"
                                                         value="" placeholder=""
                                                         title="Summer Work Registration Number"
                                                         class="required"></div>
                    </div>
                </fieldset>
                <div class="oneField field-container-D    hintsTooltip " id="tfa_Anysuggestiononi-D">
                    <label id="tfa_Anysuggestiononi-L" for="tfa_Anysuggestiononi" class="label preField reqMark">Explain
                        why you want to participate in the Work &amp; Travel USA program</label><br>
                    <div class="inputWrapper">
                        <textarea cols="40" id="tfa_Anysuggestiononi" name="tfa_Anysuggestiononi"
                                  title="Explain why you want to participate in the Work &amp; Travel USA program"
                                  class="required"></textarea><span class="field-hint-inactive"
                                                                    id="tfa_Anysuggestiononi-H"><span
                                    id="tfa_Anysuggestiononi-HH" class="hint">Minimum 250 characters.
Please note the minimum character required. Do not duplicate statements.</span></span>
                    </div>
                </div>
                <div class="oneField field-container-D    hintsTooltip " id="tfa_3-D">
                    <label id="tfa_3-L" for="tfa_3" class="label preField reqMark">What do you hope to achieve by
                        spending your summer living and working in the U.S.?</label><br>
                    <div class="inputWrapper">
                        <textarea cols="40" id="tfa_3" name="tfa_3"
                                  title="What do you hope to achieve by spending your summer living and working in the U.S.?"
                                  class="required"></textarea><span class="field-hint-inactive" id="tfa_3-H"><span
                                    id="tfa_3-HH" class="hint">Minimum 200 characters. Please note the minimum character required. Do not duplicate statements.</span></span>
                    </div>
                </div>
                <div class="oneField field-container-D    hintsTooltip " id="tfa_5-D">
                    <label id="tfa_5-L" for="tfa_5" class="label preField reqMark">How do you think your life in the
                        U.S.A. will be similar to your life at home?</label><br>
                    <div class="inputWrapper">
                        <textarea cols="40" id="tfa_5" name="tfa_5"
                                  title="How do you think your life in the U.S.A. will be similar to your life at home?"
                                  class="required"></textarea><span class="field-hint-inactive" id="tfa_5-H"><span
                                    id="tfa_5-HH" class="hint">Minimum 120 characters. Please note the minimum character required. Do not duplicate statements.</span></span>
                    </div>
                </div>
                <div class="oneField field-container-D    hintsTooltip " id="tfa_7-D">
                    <label id="tfa_7-L" for="tfa_7" class="label preField reqMark">How do you think your life in the
                        U.S.A. will be different from your life at home?</label><br>
                    <div class="inputWrapper">
                        <textarea cols="40" id="tfa_7" name="tfa_7"
                                  title="How do you think your life in the U.S.A. will be different from your life at home?"
                                  class="required"></textarea><span class="field-hint-inactive" id="tfa_7-H"><span
                                    id="tfa_7-HH" class="hint">Minimum 120 characters. Please note the minimum character required. Do not duplicate statements.</span></span>
                    </div>
                </div>
                <div class="oneField field-container-D     " id="tfa_13-D">
                    <label id="tfa_13-L" for="tfa_13" class="label preField reqMark">What type of seasonal jobs do
                        you
                        hope to be placed in? </label><br>
                    <div class="inputWrapper"><textarea cols="40" id="tfa_13" name="tfa_13"
                                                        title="What type of seasonal jobs do you hope to be placed in? "
                                                        class="required"></textarea></div>
                </div>
                <div class="oneField field-container-D     " id="tfa_15-D">
                    <label id="tfa_15-L" for="tfa_15" class="label preField reqMark">What do you hope to gain by
                        participating in the SWT program?</label><br>
                    <div class="inputWrapper"><textarea cols="40" id="tfa_15" name="tfa_15"
                                                        title="What do you hope to gain by participating in the SWT program?"
                                                        class="required"></textarea></div>
                </div>
                <div class="oneField field-container-D    hintsTooltip " id="tfa_17-D">
                    <label id="tfa_17-L" for="tfa_17" class="label preField reqMark">How do you plan to participate
                        in
                        U.S. cultural activities during your program?<br></label><br>
                    <div class="inputWrapper">
                        <textarea cols="40" id="tfa_17" name="tfa_17"
                                  title="How do you plan to participate in U.S. cultural activities during your program?"
                                  class="required"></textarea><span class="field-hint-inactive" id="tfa_17-H"><span
                                    id="tfa_17-HH" class="hint">Explain what you want to learn about U.S. culture, how you will share your culture, events or activities you plan to attend, places you
want to see or travel to. Minimum; 250 characters. Please note the minimum character required. Do not duplicate statements.</span></span>
                    </div>
                </div>
                <div class="oneField field-container-D     " id="tfa_19-D">
                    <label id="tfa_19-L" for="tfa_19" class="label preField reqMark">How do you best learn a new
                        task?</label><br>
                    <div class="inputWrapper"><textarea cols="40" id="tfa_19" name="tfa_19"
                                                        title="How do you best learn a new task?"
                                                        class="required"></textarea></div>
                </div>
                <div class="oneField field-container-D     " id="tfa_Anyambiguityorte-D">
                    <label id="tfa_Anyambiguityorte-L" for="tfa_Anyambiguityorte" class="label preField reqMark">What
                        is
                        your plan after participating in the Work &amp; Travel USA program?</label><br>
                    <div class="inputWrapper"><textarea cols="40" id="tfa_Anyambiguityorte"
                                                        name="tfa_Anyambiguityorte"
                                                        title="What is your plan after participating in the Work &amp; Travel USA program?"
                                                        class="required"></textarea></div>
                </div>
                <div class="oneField field-container-D     " id="tfa_Whatisyourpresen-D">
                    <label id="tfa_Whatisyourpresen-L" for="tfa_Whatisyourpresen" class="label preField reqMark">Do
                        you
                        have plans to travel within the US during the program? If yes, list destinations and
                        purpose.</label><br>
                    <div class="inputWrapper"><textarea cols="40" id="tfa_Whatisyourpresen"
                                                        name="tfa_Whatisyourpresen"
                                                        title="Do you have plans to travel within the US during the program? If yes, list destinations and purpose."
                                                        class="required"></textarea></div>
                </div>
                <div class="oneField field-container-D     " id="tfa_Chooseoneofthefo-D">
                    <label id="tfa_Chooseoneofthefo-L" for="tfa_Chooseoneofthefo" class="label preField reqMark">If
                        you
                        have an opportunity to extend your stay and change your return
                        date, or stay back in the US after your Summer Work Program participation
                        with the consent of your parents, will you?</label><br>
                    <div class="inputWrapper"><span id="tfa_Chooseoneofthefo" class="choices  required"><span
                                    class="oneChoice"><input type="radio" value="tfa_1quiteaneffort" class=""
                                                             id="tfa_1quiteaneffort"
                                                             name="tfa_Chooseoneofthefo"><label
                                        class="label postField" id="tfa_1quiteaneffort-L"
                                        for="tfa_1quiteaneffort">Yes</label></span><span class="oneChoice"><input
                                        type="radio" value="tfa_2icouldhaveeasil" class="" id="tfa_2icouldhaveeasil"
                                        name="tfa_Chooseoneofthefo"><label class="label postField"
                                                                           id="tfa_2icouldhaveeasil-L"
                                                                           for="tfa_2icouldhaveeasil">No</label></span><span
                                    class="oneChoice"><input type="radio" value="tfa_Maybe" class="" id="tfa_Maybe"
                                                             name="tfa_Chooseoneofthefo"><label
                                        class="label postField"
                                        id="tfa_Maybe-L"
                                        for="tfa_Maybe">Maybe</label></span></span>
                    </div>
                </div>
                <div class="oneField field-container-D     " id="tfa_21-D">
                    <label id="tfa_21-L" for="tfa_21" class="label preField reqMark">If yes, which US city will you
                        prefer to live in and why?</label><br>
                    <div class="inputWrapper"><textarea cols="40" id="tfa_21" name="tfa_21"
                                                        title="If yes, which US city will you prefer to live in and why?"
                                                        class="required"></textarea></div>
                </div>
                <div class="htmlSection" id="tfa_1">
                    <div class="htmlContent" id="tfa_1-HTML"><p><em>Please review the information you are supplying
                                and
                                ensure that its factual and true to the best of your knowledge. The information
                                provided
                                on this form is part of your Summer Work Application package. <br></em></p>
                        <p><em>Thank you.</em></p></div>
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
                        <div class="captchaHelp">This helps prevent automated form submissions. If you are not sure
                            what
                            the characters are, make your best guess. You will have another try in the next
                            screen.<br>Can't
                            see the image? <a href="https://www.tfaforms.com/forms/captcha/1">Click here for an
                                audible
                                version in English.</a>
                        </div>
                    </fieldset>
                </div>
                <div class="actions" id="tfa_0-A"><input type="submit" class="primaryAction" value="Submit"></div>
                <div style="clear:both"></div>
                <input type="hidden" value="4703923" name="tfa_dbFormId" id="tfa_dbFormId"><input type="hidden"
                                                                                                  value=""
                                                                                                  name="tfa_dbResponseId"
                                                                                                  id="tfa_dbResponseId"><input
                        type="hidden" value="4b188ae5169f10de1c151ae2c4059208" name="tfa_dbControl"
                        id="tfa_dbControl"><input type="hidden" value="7" name="tfa_dbVersionId"
                                                  id="tfa_dbVersionId"><input type="hidden" value=""
                                                                              name="tfa_switchedoff"
                                                                              id="tfa_switchedoff">
            </form>
        </div>
    </div>

</div>