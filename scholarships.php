<?php
$hide_slider = true;
include "includes/header.php"
?>

<!-- FORM: HEAD SECTION -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
    .captcha {
        padding-bottom: 1em !important;
    }

    .wForm .captcha .oneField {
        margin: 0;
        padding: 0;
    }
</style>
<script type="text/javascript">
    // initialize our variables
    var captchaReady = 0;
    var wFORMSReady = 0;

    // when wForms is loaded call this
    var wformsReadyCallback = function () {
        // using this var to denote if wForms is loaded
        wFORMSReady = 1;
        // call our recaptcha function which is dependent on both
        // wForms and an async call to google
        // note the meat of this function wont fire until both
        // wFORMSReady = 1 and captchaReady = 1
        onloadCallback();
    }
    var gCaptchaReadyCallback = function () {
        // using this var to denote if captcha is loaded
        captchaReady = 1;
        // call our recaptcha function which is dependent on both
        // wForms and an async call to google
        // note the meat of this function wont fire until both
        // wFORMSReady = 1 and captchaReady = 1
        onloadCallback();
    };

    // add event listener to fire when wForms is fully loaded
    document.addEventListener("wFORMSLoaded", wformsReadyCallback);

    var enableSubmitButton = function () {
        var submitButton = document.getElementById('submit_button');
        var explanation = document.getElementById('disabled-explanation');
        if (submitButton != null) {
            submitButton.removeAttribute('disabled');
            if (explanation != null) {
                explanation.style.display = 'none';
            }
        }
    };
    var disableSubmitButton = function () {
        var submitButton = document.getElementById('submit_button');
        var explanation = document.getElementById('disabled-explanation');
        if (submitButton != null) {
            submitButton.disabled = true;
            if (explanation != null) {
                explanation.style.display = 'block';
            }
        }
    };

    // call this on both captcha async complete and wforms fully
    // initialized since we can't be sure which will complete first
    // and we need both done for this to function just check that they are
    // done to fire the functionality
    var onloadCallback = function () {
        // if our captcha is ready (async call completed)
        // and wFORMS is completely loaded then we are ready to add
        // the captcha to the page
        if (captchaReady && wFORMSReady) {
            grecaptcha.render('g-recaptcha-render-div', {
                'sitekey': '6LeISQ8UAAAAAL-Qe-lDcy4OIElnii__H_cEGV0C',
                'theme': 'light',
                'size': 'normal',
                'callback': 'enableSubmitButton',
                'expired-callback': 'disableSubmitButton'
            });
            var oldRecaptchaCheck = parseInt('1');
            if (oldRecaptchaCheck === -1) {
                var standardCaptcha = document.getElementById("tfa_captcha_text");
                standardCaptcha = standardCaptcha.parentNode.parentNode.parentNode;
                standardCaptcha.parentNode.removeChild(standardCaptcha);
            }

            if (!wFORMS.instances['paging']) {
                document.getElementById("g-recaptcha-render-div").parentNode.parentNode.parentNode.style.display = "block";
                //document.getElementById("g-recaptcha-render-div").parentNode.parentNode.parentNode.removeAttribute("hidden");
            }
            document.getElementById("g-recaptcha-render-div").getAttributeNode('id').value = 'tfa_captcha_text';

            var captchaError = '';
            if (captchaError == '1') {
                var errMsgText = 'The CAPTCHA was not completed successfully.';
                var errMsgDiv = document.createElement('div');
                errMsgDiv.id = "tfa_captcha_text-E";
                errMsgDiv.className = "err errMsg";
                errMsgDiv.innerText = errMsgText;
                var loc = document.querySelector('.g-captcha-error');
                loc.insertBefore(errMsgDiv, loc.childNodes[0]);

                /* See wFORMS.behaviors.paging.applyTo for origin of this code */
                if (wFORMS.instances['paging']) {
                    var b = wFORMS.instances['paging'][0];
                    var pp = base2.DOM.Element.querySelector(document, wFORMS.behaviors.paging.CAPTCHA_ERROR);
                    if (pp) {
                        var lastPage = 1;
                        for (var i = 1; i < 100; i++) {
                            if (b.behavior.isLastPageIndex(i)) {
                                lastPage = i;
                                break;
                            }
                        }
                        b.jumpTo(lastPage);
                    }
                }
            }
        }
    };
</script>
<script src='https://www.google.com/recaptcha/api.js?onload=gCaptchaReadyCallback&render=explicit' async
        defer></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        var warning = document.getElementById("javascript-warning");
        if (warning != null) {
            warning.parentNode.removeChild(warning);
        }
        var oldRecaptchaCheck = parseInt('1');
        if (oldRecaptchaCheck !== -1) {
            var explanation = document.getElementById('disabled-explanation');
            var submitButton = document.getElementById('submit_button');
            if (submitButton != null) {
                submitButton.disabled = true;
                if (explanation != null) {
                    explanation.style.display = 'block';
                }
            }
        }
    });
</script>
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

<link href="https://www.tfaforms.com/dist/form-builder/5.0.0/wforms-layout.css?v=571-3" rel="stylesheet"
      type="text/css"/>

<link href="https://www.tfaforms.com/wForms/3.4/css/antique-blue/wforms.css" rel="stylesheet" type="text/css"/>
<link href="https://www.tfaforms.com/dist/form-builder/5.0.0/wforms-jsonly.css?v=571-3" rel="alternate stylesheet"
      title="This stylesheet activated by javascript" type="text/css"/>
<script type="text/javascript" src="https://www.tfaforms.com/wForms/3.11/js/wforms.js?v=571-3"></script>
<script type="text/javascript">
    wFORMS.behaviors.prefill.skip = false;
</script>
<script type="text/javascript" src="https://www.tfaforms.com/wForms/3.11/js/localization-en_US.js?v=571-3"></script>

<!-- FORM: BODY SECTION -->
<div class="wFormContainer">
    <div class="wFormHeader"></div>
    <style type="text/css">
        #tfa_Name,
        *[id^="tfa_Name["] {
            width: 197px !important;
        }

        #tfa_Name-D,
        *[id^="tfa_Name["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_Surname,
        *[id^="tfa_Surname["] {
            width: 197px !important;
        }

        #tfa_Surname-D,
        *[id^="tfa_Surname["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_Email,
        *[id^="tfa_Email["] {
            width: 197px !important;
        }

        #tfa_Email-D,
        *[id^="tfa_Email["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_Contactnumber,
        *[id^="tfa_Contactnumber["] {
            width: 197px !important;
        }

        #tfa_Contactnumber-D,
        *[id^="tfa_Contactnumber["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_PresentAddress,
        *[id^="tfa_PresentAddress["] {
            width: 197px !important;
        }

        #tfa_PresentAddress-D,
        *[id^="tfa_PresentAddress["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_CourseofStudy,
        *[id^="tfa_CourseofStudy["] {
            width: 197px !important;
        }

        #tfa_CourseofStudy-D,
        *[id^="tfa_CourseofStudy["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_SummerWorkRegist,
        *[id^="tfa_SummerWorkRegist["] {
            width: 197px !important;
        }

        #tfa_SummerWorkRegist-D,
        *[id^="tfa_SummerWorkRegist["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_2,
        *[id^="tfa_2["] {
            width: 434px !important;
        }

        #tfa_2-D,
        *[id^="tfa_2["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_2-L,
        label[id^="tfa_2["] {
            width: 431px !important;
            min-width: 0px;
        }

        #tfa_3,
        *[id^="tfa_3["] {
            width: 434px !important;
        }

        #tfa_3-D,
        *[id^="tfa_3["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_3-L,
        label[id^="tfa_3["] {
            width: 451px !important;
            min-width: 0px;
        }

        #tfa_4,
        *[id^="tfa_4["] {
            width: 434px !important;
        }

        #tfa_4-D,
        *[id^="tfa_4["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_4-L,
        label[id^="tfa_4["] {
            width: 651px !important;
            min-width: 0px;
        }

        #tfa_5,
        *[id^="tfa_5["] {
            width: 434px !important;
        }

        #tfa_5-D,
        *[id^="tfa_5["][class~="field-container-D"] {
            width: auto !important;
        }

        #tfa_5-L,
        label[id^="tfa_5["] {
            width: 411px !important;
            min-width: 0px;
        }

        #tfa_7-L,
        label[id^="tfa_7["] {
            width: 571px !important;
            min-width: 0px;
        }

        #tfa_9-L,
        label[id^="tfa_9["] {
            width: 571px !important;
            min-width: 0px;
        }

        #tfa_2,
        *[id^="tfa_2["] {
            height: 64px
        }

        #tfa_2-D,
        *[id^="tfa_2["][class~="field-container-D"] {
            height: auto !important;
        }

        #tfa_2-L,
        label[id^="tfa_2["],
        *[id^="tfa_2["][id$="-L"] {
            height: auto !important;
        }

        #tfa_3,
        *[id^="tfa_3["] {
            height: 69px
        }

        #tfa_3-D,
        *[id^="tfa_3["][class~="field-container-D"] {
            height: auto !important;
        }

        #tfa_3-L,
        label[id^="tfa_3["],
        *[id^="tfa_3["][id$="-L"] {
            height: auto !important;
        }
    </style>
    <div class="">
        <div class="wForm" id="4641778-WRPR" dir="ltr">
            <div class="codesection" id="code-4641778"></div>
            <h3 class="wFormTitle" id="4641778-T">GLOBAL EXCHANGE/SUMMER WORK SCHOLARSHIP APPLICATION</h3>
            <form method="post" action="https://www.tfaforms.com/responses/processor" class="hintsTooltip labelsAbove"
                  id="4641778" role="form" enctype="multipart/form-data">
                <fieldset id="tfa_Yourpersonaldeta" class="section">
                    <legend id="tfa_Yourpersonaldeta-L">Personal Details</legend>
                    <div class="oneField field-container-D    " id="tfa_Name-D">
                        <label id="tfa_Name-L" class="label preField reqMark" for="tfa_Name">First Name </label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_Name" name="tfa_Name" value=""
                                                         aria-required="true" title="First Name " class="required">
                        </div>
                    </div>
                    <div class="oneField field-container-D    " id="tfa_Surname-D">
                        <label id="tfa_Surname-L" class="label preField reqMark" for="tfa_Surname">Surname </label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_Surname" name="tfa_Surname" value=""
                                                         aria-required="true" title="Surname " class="required"></div>
                    </div>
                    <div class="oneField field-container-D    " id="tfa_Email-D">
                        <label id="tfa_Email-L" class="label preField reqMark" for="tfa_Email">Email address</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_Email" name="tfa_Email" value=""
                                                         aria-required="true" title="Email address"
                                                         class="validate-email required"></div>
                    </div>
                    <div class="oneField field-container-D    " id="tfa_Contactnumber-D">
                        <label id="tfa_Contactnumber-L" class="label preField reqMark" for="tfa_Contactnumber">Mobile
                            Phone number</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_Contactnumber" name="tfa_Contactnumber"
                                                         value="" aria-required="true" title="Mobile Phone number"
                                                         class="required"></div>
                    </div>
                    <div class="oneField field-container-D    " id="tfa_PresentAddress-D">
                        <label id="tfa_PresentAddress-L" class="label preField reqMark" for="tfa_PresentAddress">Name of
                            Institution</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_PresentAddress" name="tfa_PresentAddress"
                                                         value="" aria-required="true" title="Name of Institution"
                                                         class="required"></div>
                    </div>
                    <div class="oneField field-container-D    " id="tfa_CourseofStudy-D">
                        <label id="tfa_CourseofStudy-L" class="label preField reqMark" for="tfa_CourseofStudy">Course of
                            Study</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_CourseofStudy" name="tfa_CourseofStudy"
                                                         value="" aria-required="true" title="Course of Study"
                                                         class="required"></div>
                    </div>
                    <div class="oneField field-container-D    " id="tfa_LevelofStudy-D">
                        <label id="tfa_LevelofStudy-L" class="label preField reqMark" for="tfa_LevelofStudy">Level of
                            Study</label><br>
                        <div class="inputWrapper"><select id="tfa_LevelofStudy" name="tfa_LevelofStudy"
                                                          title="Level of Study" aria-required="true" class="required">
                                <option value="">Please select...</option>
                                <option value="tfa_100Level" id="tfa_100Level" class="">100 Level</option>
                                <option value="tfa_200Level" id="tfa_200Level" class="">200 Level</option>
                                <option value="tfa_300Level" id="tfa_300Level" class="">300 Level</option>
                                <option value="tfa_400Level" id="tfa_400Level" class="">400 Level</option>
                                <option value="tfa_FinalYear" id="tfa_FinalYear" class="">Final Year</option>
                            </select></div>
                    </div>
                    <div class="oneField field-container-D    " id="tfa_SummerWorkRegist-D">
                        <label id="tfa_SummerWorkRegist-L" class="label preField reqMark" for="tfa_SummerWorkRegist">Summer
                            Work Registration Number</label><br>
                        <div class="inputWrapper"><input type="text" id="tfa_SummerWorkRegist"
                                                         name="tfa_SummerWorkRegist" value="" aria-required="true"
                                                         title="Summer Work Registration Number"
                                                         class="validate-alphanum required"></div>
                    </div>
                </fieldset>
                <div class="oneField field-container-D    " id="tfa_2-D">
                    <label id="tfa_2-L" class="label preField reqMark" for="tfa_2">What do you understand by the term
                        "Cultural Exchange"?</label><br>
                    <div class="inputWrapper"><textarea aria-required="true" id="tfa_2" name="tfa_2"
                                                        title='What do you understand by the term "Cultural Exchange"?'
                                                        class="required"></textarea></div>
                </div>
                <div class="oneField field-container-D    " id="tfa_3-D">
                    <label id="tfa_3-L" class="label preField reqMark" for="tfa_3">What are your expectations going into
                        the Summer Work Program?</label><br>
                    <div class="inputWrapper"><textarea aria-required="true" id="tfa_3" name="tfa_3"
                                                        title="What are your expectations going into the Summer Work Program?"
                                                        class="required"></textarea></div>
                </div>
                <div class="oneField field-container-D    " id="tfa_4-D">
                    <label id="tfa_4-L" class="label preField reqMark" for="tfa_4">How will you apply the experiences
                        gained to the advancement of the SWT Program in the future?</label><br>
                    <div class="inputWrapper"><textarea aria-required="true" id="tfa_4" name="tfa_4"
                                                        title="How will you apply the experiences gained to the advancement of the SWT Program in the future?"
                                                        class="required"></textarea></div>
                </div>
                <div class="oneField field-container-D    " id="tfa_5-D">
                    <label id="tfa_5-L" class="label preField reqMark" for="tfa_5">Who is your favorite person in
                        history and why?</label><br>
                    <div class="inputWrapper"><textarea aria-required="true" id="tfa_5" name="tfa_5"
                                                        title="Who is your favorite person in history and why?"
                                                        class="required"></textarea></div>
                </div>
                <div class="htmlSection" id="tfa_1">
                    <div class="htmlContent" id="tfa_1-HTML">
                        <div id="html-tmp-2993913426430" class="htmlsection"><b>Please submit a 300-500 word essay, or a
                                1-2 minute video on the following topic:</b><br><i>The
                                goal of CIEE Work &amp; Travel USA is to increase mutual understanding
                                between Americans and citizens of other countries. Are you a global
                                citizen? Tell us what you hope to gain from living and working in the
                                United States through this exchange program</i>
                            <p><em></em>By submitting this application for Summer Work Programs Scholarship by Besor
                                Associates, you hereby agree that the information you are supplying is factual and true
                                to the best of your knowledge. <em><br></em></p>
                            <p><em><b></b></em>Your application will be subject to verification for plagiarism and Besor
                                Associates reserves the right to grant or decline your application based on follow-up
                                interview, strength of character and integrity.<em><b></b> <br></em></p>
                            <p><em>Y<b>ou must upload your typed essay in PDF format or video essay in MPEG format
                                        below.</b> Thank you.</em></p>
                        </div>
                        <p><em><br></em></p></div>
                </div>
                <div class="oneField field-container-D    " id="tfa_7-D">
                    <label id="tfa_7-L" class="label preField reqMark" for="tfa_7">Please <i><b>upload your essay in PDF
                                format here</b></i><b><i></i></b></label><br>
                    <div class="inputWrapper"><input type="file" id="tfa_7" name="tfa_7" size=""
                                                     title="Please upload your essay in PDF format here"
                                                     class="required"></div>
                </div>
                <div class="oneField field-container-D    " id="tfa_9-D">
                    <label id="tfa_9-L" class="label preField " for="tfa_9">Please <i><b>upload your video essay here
                                (</b>if applicable<b>)<br></b></i></label><br>
                    <div class="inputWrapper"><input type="file" id="tfa_9" name="tfa_9" size=""
                                                     title="Please upload your video essay here (if applicable)"
                                                     class=""></div>
                </div>
                <div class="actions" id="4641778-A">
                    <div id="google-captcha" style="display: none">
                        <br>
                        <div class="captcha">
                            <div class="oneField">
                                <div class="g-recaptcha" id="g-recaptcha-render-div"></div>
                                <div class="g-captcha-error"></div>
                                <br>
                            </div>
                            <div class="captchaHelp">reCAPTCHA helps prevent automated form spam.<br>
                            </div>
                            <div id="disabled-explanation" class="captchaHelp" style="display: none">The submit button
                                will be disabled until you complete the CAPTCHA.
                            </div>
                        </div>
                    </div>
                    <input type="submit" data-label="Submit" class="primaryAction" id="submit_button" value="Submit">
                </div>
                <div style="clear:both"></div>
                <input type="hidden" value="4641778" name="tfa_dbFormId" id="tfa_dbFormId"><input type="hidden" value=""
                                                                                                  name="tfa_dbResponseId"
                                                                                                  id="tfa_dbResponseId"><input
                        type="hidden" value="407af9bf5b328f8c53f058b70ce5a658" name="tfa_dbControl"
                        id="tfa_dbControl"><input type="hidden" value="16" name="tfa_dbVersionId"
                                                  id="tfa_dbVersionId"><input type="hidden" value=""
                                                                              name="tfa_switchedoff"
                                                                              id="tfa_switchedoff">
            </form>
        </div>
    </div>

</div>
				