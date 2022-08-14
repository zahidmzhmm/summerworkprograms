<?php
session_start();
include('includes/includes.php');
session::checkSession();

$data = Admin::find($_SESSION["admin_user_id"]);

//	$sql = "SELECT title,sitename FROM tbl_admin ";
//	$data = sql::Select_single($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Admin -<?= $data->title; ?> </title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <script language="javascript" src="javascript/cat_empty.js"></script>
    <script language="javascript" src="javascript/product_empty.js"></script>
    <script language="javascript" src="javascript/paging.js"></script>
    <script language="javascript" src="jquery.js"></script>
    <!--  Defining our tinyMCE text editor -->
    <script language="javascript" src="javascript/gen_validator.js"></script>

    <script language="javascript" type="text/javascript"
            src="../components/com_tiny/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>

    <link href="../js/datetimepicker/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../js/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="../js/datetimepicker/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../js/datetimepicker/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../js/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js"
            charset="UTF-8"></script>
    <SCRIPT type=text/javascript>

        tinyMCE.init({
            theme: "advanced",
            language: "en",
            mode: "textareas",
            editor_deselector: "mceNoEditor",
            document_base_url: "http://localhost/kingdom/",
            relative_urls: false,
            remove_script_host: false,
            save_callback: "TinyMCE_Save",
            invalid_elements: "script,applet,iframe",
            theme_advanced_toolbar_location: "top",
            theme_advanced_source_editor_height: "550",
            theme_advanced_source_editor_width: "750",
            directionality: "ltr",
            force_br_newlines: "false",
            force_p_newlines: "true",
            content_css: "../../../css/admin.css",
            debug: false,
            cleanup: true,
            cleanup_on_startup: false,
            safari_warning: false,
            plugins: "advlink, advimage, , preview, searchreplace, insertdatetime, emotions, advhr, flash, table, fullscreen, layer, style,ibrowser",
            theme_advanced_buttons1_add: "fontselect,fontsizeselect",
            theme_advanced_buttons2_add: ", preview, search,replace, insertdate, inserttime, emotions, insertlayer, moveforward, movebackward, absolute",
            theme_advanced_buttons3_add: ", advhr, flash, tablecontrols, fullscreen, styleprops,ibrowser,forecolor,backcolor",
            plugin_insertdate_dateFormat: "%Y-%m-%d",
            plugin_insertdate_timeFormat: "%H:%M:%S",
            plugin_preview_width: "750",
            plugin_preview_height: "550",
            extended_valid_elements: "a[name|href|target|title|onclick], img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name], , hr[class|width|size|noshade]",
            fullscreen_settings: {
                theme_advanced_path_location: "top"
            }
        });


        function TinyMCE_Save(editor_id, content, node) {
            base_url = tinyMCE.settings['document_base_url'];
            var vHTML = content;
            if (true == true) {
                vHTML = tinyMCE.regexpReplace(vHTML, 'href\s*=\s*"?' + base_url + '', 'href="', 'gi');
                vHTML = tinyMCE.regexpReplace(vHTML, 'src\s*=\s*"?' + base_url + '', 'src="', 'gi');
                vHTML = tinyMCE.regexpReplace(vHTML, 'mce_real_src\s*=\s*"?', '', 'gi');
                vHTML = tinyMCE.regexpReplace(vHTML, 'mce_real_href\s*=\s*"?', '', 'gi');
            }
            return vHTML;
        }

        function toggleSubmit(sel) {
            var area = document.getElementById('jarea');
            area.style.display = (sel.options[sel.selectedIndex].value == 0) ? 'none' : 'block';
        }
    </script>
    <noscript>
        You must enable javascript to run web application correctly!
    </noscript>
</head>

<body>
<!-- main table -->
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <!-- banner -->
    <!-- end of banner -->

    <!-- navbar -->
    <tr>
        <td class="bar">
            <!-- left bar -->
            <?php include('includes/leftbar.php'); ?>
            <!-- end of left bar -->

            <!-- right search -->

            <!-- end of search -->
        </td>
    </tr>
    <!-- end of navbar -->

    <!-- main body -->
    <tr>
        <td align="center" class="mainbody">
            <!-- table for mainbody -->
            <?php include('includes/mainbody.php'); ?>
            <!-- end of table for mainbody -->
        </td>
    </tr>
    <!-- end of mainbody -->

    <!-- footer -->
    <tr>
        <td>
            <!-- table for footer -->
            <?php include('includes/footer.php'); ?>
            <!-- end of table for footer -->
        </td>
    </tr>
    <!-- end of footer -->
</table>
<!-- end of main table -->
</body>
</html>
