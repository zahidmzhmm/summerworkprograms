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

<link href="https://www.tfaforms.com/dist/form-builder/5.0.0/wforms-layout.css?v=548-4" rel="stylesheet"
      type="text/css"/>

<link href="https://www.tfaforms.com/themes/get/17258" rel="stylesheet" type="text/css"/>
<link href="https://www.tfaforms.com/dist/form-builder/5.0.0/wforms-jsonly.css?v=548-4" rel="alternate stylesheet"
      title="This stylesheet activated by javascript" type="text/css"/>
<script type="text/javascript" src="https://www.tfaforms.com/wForms/3.11/js/wforms.js?v=548-4"></script>
<script type="text/javascript">
    wFORMS.behaviors.prefill.skip = false;
</script>
<script type="text/javascript" src="https://www.tfaforms.com/wForms/3.11/js/localization-en_US.js?v=548-4"></script>

<!-- FORM: BODY SECTION -->
<div class="wFormHeader"></div>
<style type="text/css">
    #tfa_8588153617646,
    *[id^="tfa_8588153617646["] {
        width: 274px !important;
    }

    #tfa_8588153617646-D,
    *[id^="tfa_8588153617646["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617646-L,
    label[id^="tfa_8588153617646["] {
        width: 170px !important;
        min-width: 0px;
    }

    #tfa_8588153617647,
    *[id^="tfa_8588153617647["] {
        width: 274px !important;
    }

    #tfa_8588153617647-D,
    *[id^="tfa_8588153617647["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617647-L,
    label[id^="tfa_8588153617647["] {
        width: 170px !important;
        min-width: 0px;
    }

    #tfa_8588153617648,
    *[id^="tfa_8588153617648["] {
        width: 274px !important;
    }

    #tfa_8588153617648-D,
    *[id^="tfa_8588153617648["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617648-L,
    label[id^="tfa_8588153617648["] {
        width: 170px !important;
        min-width: 0px;
    }

    #tfa_8588153617650,
    *[id^="tfa_8588153617650["] {
        width: 274px !important;
    }

    #tfa_8588153617650-D,
    *[id^="tfa_8588153617650["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617650-L,
    label[id^="tfa_8588153617650["] {
        width: 170px !important;
        min-width: 0px;
    }

    #tfa_8588153617651,
    *[id^="tfa_8588153617651["] {
        width: 274px !important;
    }

    #tfa_8588153617651-D,
    *[id^="tfa_8588153617651["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617651-L,
    label[id^="tfa_8588153617651["] {
        width: 170px !important;
        min-width: 0px;
    }

    #tfa_8588153617756,
    *[id^="tfa_8588153617756["] {
        width: 274px !important;
    }

    #tfa_8588153617756-D,
    *[id^="tfa_8588153617756["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617756-L,
    label[id^="tfa_8588153617756["] {
        width: 170px !important;
        min-width: 0px;
    }

    #tfa_8588153617757,
    *[id^="tfa_8588153617757["] {
        width: 444px !important;
    }

    #tfa_8588153617757-D,
    *[id^="tfa_8588153617757["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617757-L,
    label[id^="tfa_8588153617757["] {
        width: 181px !important;
        min-width: 0px;
    }

    #tfa_8588153617758,
    *[id^="tfa_8588153617758["] {
        width: 444px !important;
    }

    #tfa_8588153617758-D,
    *[id^="tfa_8588153617758["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617758-L,
    label[id^="tfa_8588153617758["] {
        width: 241px !important;
        min-width: 0px;
    }

    #tfa_8588153617759,
    *[id^="tfa_8588153617759["] {
        width: 444px !important;
    }

    #tfa_8588153617759-D,
    *[id^="tfa_8588153617759["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617759-L,
    label[id^="tfa_8588153617759["] {
        width: 421px !important;
        min-width: 0px;
    }

    #tfa_8588153617760,
    *[id^="tfa_8588153617760["] {
        width: 444px !important;
    }

    #tfa_8588153617760-D,
    *[id^="tfa_8588153617760["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617760-L,
    label[id^="tfa_8588153617760["] {
        width: 421px !important;
        min-width: 0px;
    }

    #tfa_8588153617761,
    *[id^="tfa_8588153617761["] {
        width: 444px !important;
    }

    #tfa_8588153617761-D,
    *[id^="tfa_8588153617761["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617761-L,
    label[id^="tfa_8588153617761["] {
        width: 441px !important;
        min-width: 0px;
    }

    #tfa_8588153617762,
    *[id^="tfa_8588153617762["] {
        width: 444px !important;
    }

    #tfa_8588153617762-D,
    *[id^="tfa_8588153617762["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617762-L,
    label[id^="tfa_8588153617762["] {
        width: 441px !important;
        min-width: 0px;
    }

    #tfa_8588153617763,
    *[id^="tfa_8588153617763["] {
        width: 444px !important;
    }

    #tfa_8588153617763-D,
    *[id^="tfa_8588153617763["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617763-L,
    label[id^="tfa_8588153617763["] {
        width: 421px !important;
        min-width: 0px;
    }

    #tfa_8588153617765,
    *[id^="tfa_8588153617765["] {
        width: 444px !important;
    }

    #tfa_8588153617765-D,
    *[id^="tfa_8588153617765["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617765-L,
    label[id^="tfa_8588153617765["] {
        width: 441px !important;
        min-width: 0px;
    }

    #tfa_8588153617764-L,
    label[id^="tfa_8588153617764["] {
        width: 421px !important;
        min-width: 0px;
    }

    #tfa_8588153617766,
    *[id^="tfa_8588153617766["] {
        width: 444px !important;
    }

    #tfa_8588153617766-D,
    *[id^="tfa_8588153617766["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617766-L,
    label[id^="tfa_8588153617766["] {
        width: 421px !important;
        min-width: 0px;
    }

    #tfa_8588153617770,
    *[id^="tfa_8588153617770["] {
        width: 444px !important;
    }

    #tfa_8588153617770-D,
    *[id^="tfa_8588153617770["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617770-L,
    label[id^="tfa_8588153617770["] {
        width: 441px !important;
        min-width: 0px;
    }

    #tfa_8588153617771,
    *[id^="tfa_8588153617771["] {
        width: 444px !important;
    }

    #tfa_8588153617771-D,
    *[id^="tfa_8588153617771["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617771-L,
    label[id^="tfa_8588153617771["] {
        width: 538px !important;
        min-width: 0px;
    }

    #tfa_8588153617772,
    *[id^="tfa_8588153617772["] {
        width: 444px !important;
    }

    #tfa_8588153617772-D,
    *[id^="tfa_8588153617772["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617772-L,
    label[id^="tfa_8588153617772["] {
        width: 538px !important;
        min-width: 0px;
    }

    #tfa_8588153617773,
    *[id^="tfa_8588153617773["] {
        width: 444px !important;
    }

    #tfa_8588153617773-D,
    *[id^="tfa_8588153617773["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617773-L,
    label[id^="tfa_8588153617773["] {
        width: 538px !important;
        min-width: 0px;
    }

    #tfa_8588153617778,
    *[id^="tfa_8588153617778["] {
        width: 458px !important;
    }

    #tfa_8588153617778-D,
    *[id^="tfa_8588153617778["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617767,
    *[id^="tfa_8588153617767["] {
        width: 444px !important;
    }

    #tfa_8588153617767-D,
    *[id^="tfa_8588153617767["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617767-L,
    label[id^="tfa_8588153617767["] {
        width: 441px !important;
        min-width: 0px;
    }

    #tfa_8588153617774,
    *[id^="tfa_8588153617774["] {
        width: 438px !important;
    }

    #tfa_8588153617774-D,
    *[id^="tfa_8588153617774["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617774-L,
    label[id^="tfa_8588153617774["] {
        width: 538px !important;
        min-width: 0px;
    }

    #tfa_8588153617713,
    *[id^="tfa_8588153617713["] {
        width: 493px !important;
    }

    #tfa_8588153617713-D,
    *[id^="tfa_8588153617713["][class~="field-container-D"] {
        width: auto !important;
    }

    #tfa_8588153617777-L,
    label[id^="tfa_8588153617777["] {
        width: 538px !important;
        min-width: 0px;
    }

    #tfa_8588153617780-L,
    label[id^="tfa_8588153617780["] {
        width: 538px !important;
        min-width: 0px;
    }

    #tfa_8588153617757,
    *[id^="tfa_8588153617757["] {
        height: 46px
    }

    #tfa_8588153617757-D,
    *[id^="tfa_8588153617757["][class~="field-container-D"] {
        height: auto !important;
    }

    #tfa_8588153617757-L,
    label[id^="tfa_8588153617757["],
    *[id^="tfa_8588153617757["][id$="-L"] {
        height: auto !important;
    }

    #tfa_8588153617778,
    *[id^="tfa_8588153617778["] {
        height: 69px
    }

    #tfa_8588153617778-D,
    *[id^="tfa_8588153617778["][class~="field-container-D"] {
        height: auto !important;
    }

    #tfa_8588153617778-L,
    label[id^="tfa_8588153617778["],
    *[id^="tfa_8588153617778["][id$="-L"] {
        height: auto !important;
    }

    #tfa_8588153617774,
    *[id^="tfa_8588153617774["] {
        height: 68px
    }

    #tfa_8588153617774-D,
    *[id^="tfa_8588153617774["][class~="field-container-D"] {
        height: auto !important;
    }

    #tfa_8588153617774-L,
    label[id^="tfa_8588153617774["],
    *[id^="tfa_8588153617774["][id$="-L"] {
        height: auto !important;
    }

    #tfa_8588153617713,
    *[id^="tfa_8588153617713["] {
        height: 76px
    }

    #tfa_8588153617713-D,
    *[id^="tfa_8588153617713["][class~="field-container-D"] {
        height: auto !important;
    }

    #tfa_8588153617713-L,
    label[id^="tfa_8588153617713["],
    *[id^="tfa_8588153617713["][id$="-L"] {
        height: auto !important;
    }
</style>
<div class="">
    <div class="wForm" id="4638679-WRPR" dir="ltr">
        <div class="codesection" id="code-4638679"></div>
        <h3 class="wFormTitle" id="4638679-T">||Summer Work Experience Report|| </h3>
        <form method="post" action="https://www.tfaforms.com/responses/processor" class="hintsTooltip labelsAbove"
              id="4638679" role="form" enctype="multipart/form-data">
            <div class="oneField field-container-D  labelsLeftAligned  " id="tfa_8588153617646-D">
                <label id="tfa_8588153617646-L" class="label preField reqMark" for="tfa_8588153617646">First
                    Name</label>
                <div class="inputWrapper"><input type="text" id="tfa_8588153617646" name="tfa_8588153617646" value=""
                                                 aria-required="true" title="First Name"
                                                 data-dataset-allow-free-responses="" class="required"></div>
            </div>
            <div class="oneField field-container-D  labelsLeftAligned  " id="tfa_8588153617647-D">
                <label id="tfa_8588153617647-L" class="label preField reqMark" for="tfa_8588153617647">Last Name</label>
                <div class="inputWrapper"><input type="text" id="tfa_8588153617647" name="tfa_8588153617647" value=""
                                                 aria-required="true" title="Last Name"
                                                 data-dataset-allow-free-responses="" class="required"></div>
            </div>
            <div class="oneField field-container-D  labelsLeftAligned  " id="tfa_8588153617648-D">
                <label id="tfa_8588153617648-L" class="label preField reqMark" for="tfa_8588153617648">Email
                    Address</label>
                <div class="inputWrapper"><input type="text" id="tfa_8588153617648" name="tfa_8588153617648" value=""
                                                 aria-required="true" title="Email Address"
                                                 data-dataset-allow-free-responses="" class="validate-email required">
                </div>
            </div>
            <div class="oneField field-container-D  labelsLeftAligned  " id="tfa_8588153617650-D">
                <label id="tfa_8588153617650-L" class="label preField reqMark" for="tfa_8588153617650">Phone
                    Number</label>
                <div class="inputWrapper"><input type="text" id="tfa_8588153617650" name="tfa_8588153617650" value=""
                                                 aria-required="true" title="Phone Number"
                                                 data-dataset-allow-free-responses="" class="validate-integer required">
                </div>
            </div>
            <div class="oneField field-container-D  labelsLeftAligned  " id="tfa_8588153617651-D">
                <label id="tfa_8588153617651-L" class="label preField reqMark" for="tfa_8588153617651">Course of
                    Study</label>
                <div class="inputWrapper"><input type="text" id="tfa_8588153617651" name="tfa_8588153617651" value=""
                                                 aria-required="true" title="Course of Study"
                                                 data-dataset-allow-free-responses="" class="required"></div>
            </div>
            <div class="oneField field-container-D  labelsLeftAligned  " id="tfa_8588153617756-D">
                <label id="tfa_8588153617756-L" class="label preField reqMark" for="tfa_8588153617756">Level of
                    Study</label>
                <div class="inputWrapper"><input type="text" id="tfa_8588153617756" name="tfa_8588153617756" value=""
                                                 aria-required="true" title="Level of Study"
                                                 data-dataset-allow-free-responses="" class="required"></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617757-D">
                <label id="tfa_8588153617757-L" class="label preField reqMark" for="tfa_8588153617757">Current
                    Address</label><br>
                <div class="inputWrapper"><textarea aria-required="true" id="tfa_8588153617757" name="tfa_8588153617757"
                                                    title="Current Address" class="required"></textarea></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617758-D">
                <label id="tfa_8588153617758-L" class="label preField reqMark" for="tfa_8588153617758">US Address
                    (during the Program)</label><br>
                <div class="inputWrapper"><textarea aria-required="true" id="tfa_8588153617758" name="tfa_8588153617758"
                                                    title="US Address (during the Program)" class="required"></textarea>
                </div>
            </div>
            <div class="oneField field-container-D   hintsTooltip " id="tfa_8588153617759-D">
                <label id="tfa_8588153617759-L" class="label preField reqMark" for="tfa_8588153617759">Name of your
                    institution when you participated in the program </label><br>
                <div class="inputWrapper">
                    <input type="text" id="tfa_8588153617759" name="tfa_8588153617759" value="" aria-required="true"
                           aria-describedby="tfa_8588153617759-HH"
                           title="Name of your institution when you participated in the program "
                           data-dataset-allow-free-responses="" class="required"><span class="field-hint-inactive"
                                                                                       id="tfa_8588153617759-H"><span
                                id="tfa_8588153617759-HH" class="hint">Babcock University</span></span>
                </div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617760-D">
                <label id="tfa_8588153617760-L" class="label preField reqMark" for="tfa_8588153617760">What is your
                    present status and where?</label><br>
                <div class="inputWrapper">
                    <input type="text" id="tfa_8588153617760" name="tfa_8588153617760" value="" aria-required="true"
                           aria-describedby="tfa_8588153617760-HH" title="What is your present status and where?"
                           data-dataset-allow-free-responses="" class="required"><span class="field-hint-inactive"
                                                                                       id="tfa_8588153617760-H"><span
                                id="tfa_8588153617760-HH"
                                class="hint">Current Student, Graduate, Youth Corp, Employed</span></span>
                </div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617761-D">
                <label id="tfa_8588153617761-L" class="label preField reqMark" for="tfa_8588153617761">Who was your host
                    employer in the Summer Work &amp; Travel USA Program?</label><br>
                <div class="inputWrapper"><input type="text" id="tfa_8588153617761" name="tfa_8588153617761" value=""
                                                 aria-required="true"
                                                 title="Who was your host employer in the Summer Work &amp; Travel USA Program?"
                                                 data-dataset-allow-free-responses="" class="required"></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617762-D">
                <label id="tfa_8588153617762-L" class="label preField reqMark" for="tfa_8588153617762">What is the
                    distance from your housing to the workplace? (in Kilometers)</label><br>
                <div class="inputWrapper"><input type="text" id="tfa_8588153617762" name="tfa_8588153617762" value=""
                                                 aria-required="true"
                                                 title="What is the distance from your housing to the workplace? (in Kilometers)"
                                                 data-dataset-allow-free-responses="" class="required"></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617763-D">
                <label id="tfa_8588153617763-L" class="label preField reqMark" for="tfa_8588153617763">Please, give a
                    full assessment of the housing provided and the work environment</label><br>
                <div class="inputWrapper"><textarea aria-required="true" id="tfa_8588153617763" name="tfa_8588153617763"
                                                    title="Please, give a full assessment of the housing provided and the work environment"
                                                    class="required"></textarea></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617765-D">
                <label id="tfa_8588153617765-L" class="label preField reqMark" for="tfa_8588153617765">Fully describe
                    your duties, position and department</label><br>
                <div class="inputWrapper"><textarea aria-required="true" id="tfa_8588153617765" name="tfa_8588153617765"
                                                    title="Fully describe your duties, position and department"
                                                    class="required"></textarea></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617764-D" role="radiogroup"
                 aria-labelledby="tfa_8588153617764-L" data-tfa-labelledby="-L tfa_8588153617764-L">
                <label id="tfa_8588153617764-L" class="label preField reqMark">Did you take any second job?</label><br>
                <div class="inputWrapper"><span id="tfa_8588153617764" class="choices  required"><span
                                class="oneChoice"><input type="radio" value="tfa_8588153617768" class=""
                                                         id="tfa_8588153617768" name="tfa_8588153617764"
                                                         aria-required="true" aria-labelledby="tfa_8588153617768-L"
                                                         data-tfa-labelledby="tfa_8588153617764-L tfa_8588153617768-L"><label
                                    class="label postField" id="tfa_8588153617768-L" for="tfa_8588153617768"><span
                                        class="input-radio-faux"></span>Yes</label></span><span class="oneChoice"><input
                                    type="radio" value="tfa_8588153617769" class="" id="tfa_8588153617769"
                                    name="tfa_8588153617764" aria-required="true" aria-labelledby="tfa_8588153617769-L"
                                    data-tfa-labelledby="tfa_8588153617764-L tfa_8588153617769-L"><label
                                    class="label postField" id="tfa_8588153617769-L" for="tfa_8588153617769"><span
                                        class="input-radio-faux"></span>No</label></span></span></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617766-D">
                <label id="tfa_8588153617766-L" class="label preField reqMark" for="tfa_8588153617766">If Yes, what kind
                    of job did you take, who was your employer and what was the reason for the second job?</label><br>
                <div class="inputWrapper"><textarea aria-required="true" id="tfa_8588153617766" name="tfa_8588153617766"
                                                    title="If Yes, what kind of job did you take, who was your employer and what was the reason for the second job?"
                                                    class="required"></textarea></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617770-D">
                <label id="tfa_8588153617770-L" class="label preField reqMark" for="tfa_8588153617770">What was your
                    most interesting and memorable experience during the program.</label><br>
                <div class="inputWrapper"><textarea aria-required="true" id="tfa_8588153617770" name="tfa_8588153617770"
                                                    title="What was your most interesting and memorable experience during the program."
                                                    class="required"></textarea></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617771-D">
                <label id="tfa_8588153617771-L" class="label preField reqMark" for="tfa_8588153617771">Narrate the
                    unique experiences and opportunities the Summer Work &amp;Travel USA Program has opened for you
                    during your program participation (not less than 150 words)</label><br>
                <div class="inputWrapper"><textarea aria-required="true" id="tfa_8588153617771" name="tfa_8588153617771"
                                                    title="Narrate the unique experiences and opportunities the Summer Work &amp;Travel USA Program has opened for you during your program participation (not less than 150 words)"
                                                    class="required"></textarea></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617772-D">
                <label id="tfa_8588153617772-L" class="label preField reqMark" for="tfa_8588153617772">Mention new
                    places you traveled to and your purpose of visit. Briefly narrate your experiences in these new
                    places.</label><br>
                <div class="inputWrapper"><textarea aria-required="true" id="tfa_8588153617772" name="tfa_8588153617772"
                                                    title="Mention new places you traveled to and your purpose of visit. Briefly narrate your experiences in these new places."
                                                    class="required"></textarea></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617773-D">
                <label id="tfa_8588153617773-L" class="label preField reqMark" for="tfa_8588153617773">How will you rate
                    your performance during your program. Give detailed explanations and examples</label><br>
                <div class="inputWrapper"><textarea aria-required="true" id="tfa_8588153617773" name="tfa_8588153617773"
                                                    title="How will you rate your performance during your program. Give detailed explanations and examples"
                                                    class="required"></textarea></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617778-D">
                <label id="tfa_8588153617778-L" class="label preField reqMark" for="tfa_8588153617778">Mention 5 news
                    things you have learned through this program and how they have positively impacted or will impact
                    your life academically, career-wise, socially, financially, etc.</label><br>
                <div class="inputWrapper"><textarea aria-required="true" id="tfa_8588153617778" name="tfa_8588153617778"
                                                    title="Mention 5 news things you have learned through this program and how they have positively impacted or will impact your life academically, career-wise, socially, financially, etc."
                                                    class="required"></textarea></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617767-D">
                <label id="tfa_8588153617767-L" class="label preField reqMark" for="tfa_8588153617767">What are the
                    areas you think the Summer Work &amp; Travel USA Program should be improved upon.</label><br>
                <div class="inputWrapper"><textarea aria-required="true" id="tfa_8588153617767" name="tfa_8588153617767"
                                                    title="What are the areas you think the Summer Work &amp; Travel USA Program should be improved upon."
                                                    class="required"></textarea></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617774-D">
                <label id="tfa_8588153617774-L" class="label preField reqMark" for="tfa_8588153617774">Give detailed
                    reasons for your suggestions.</label><br>
                <div class="inputWrapper"><textarea aria-required="true" id="tfa_8588153617774" name="tfa_8588153617774"
                                                    title="Give detailed reasons for your suggestions."
                                                    class="required"></textarea></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617713-D">
                <label id="tfa_8588153617713-L" class="label preField reqMark" for="tfa_8588153617713">How will you be a
                    brand ambassador of the Summer Work &amp; Travel USA Program in your institution and
                    community.</label><br>
                <div class="inputWrapper"><textarea aria-required="true" id="tfa_8588153617713" name="tfa_8588153617713"
                                                    title="How will you be a brand ambassador of the Summer Work &amp; Travel USA Program in your institution and community."
                                                    class="required"></textarea></div>
            </div>
            <div class="oneField field-container-D    " id="tfa_8588153617777-D">
                <label id="tfa_8588153617777-L" class="label preField reqMark" for="tfa_8588153617777">Please, upload a
                    picture taken with your colleagues during the program</label><br>
                <div class="inputWrapper"><input type="file" id="tfa_8588153617777" name="tfa_8588153617777" size=""
                                                 title="Please, upload a picture taken with your colleagues during the program"
                                                 class="required"></div>
            </div>
            <div class="oneField field-container-D   hintsBelow " id="tfa_8588153617780-D">
                <label id="tfa_8588153617780-L" class="label preField reqMark" for="tfa_8588153617780">Additional
                    photo</label><br>
                <div class="inputWrapper">
                    <input type="file" id="tfa_8588153617780" name="tfa_8588153617780" size="" title="Additional photo"
                           class="required"><span class="field-hint-inactive" id="tfa_8588153617780-H"><span
                                id="tfa_8588153617780-HH" class="hint">Please endeavor to upload a photo taken at your workplace.</span></span>
                </div>
            </div>
            <div class="actions" id="4638679-A">
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
                        <div id="disabled-explanation" class="captchaHelp" style="display: none">The submit button will
                            be disabled until you complete the CAPTCHA.
                        </div>
                    </div>
                </div>
                <input type="submit" data-label="Send" class="primaryAction" id="submit_button" value="Send">
            </div>
            <div style="clear:both"></div>
            <input type="hidden" value="4638679" name="tfa_dbFormId" id="tfa_dbFormId"><input type="hidden" value=""
                                                                                              name="tfa_dbResponseId"
                                                                                              id="tfa_dbResponseId"><input
                    type="hidden" value="a14606fbf8628bddb30402d4d060df94" name="tfa_dbControl"
                    id="tfa_dbControl"><input type="hidden" value="16" name="tfa_dbVersionId"
                                              id="tfa_dbVersionId"><input type="hidden" value="" name="tfa_switchedoff"
                                                                          id="tfa_switchedoff">
        </form>
    </div>
</div>

</div>
				