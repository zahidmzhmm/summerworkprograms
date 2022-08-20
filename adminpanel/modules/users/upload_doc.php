<?php
ob_start();
error_reporting(0);
$id = 0;

if (isset($_POST['user_id'])) {
    $id = $_REQUEST["user_id"];
    $list = (object)app\Sql::Select_single("select * from tbl_member where users_id='$id'");
    if ($list != null) {
        $list = unserialize($list->upload_document_list);
    }
    $message = "";
    if (!$id) {
        exit("Error");
    }

    $upload_path = "../user_uploads/$id";

    if (!file_exists($upload_path)) {
        mkdir($upload_path);
    }

    $allowed_types = array(".pdf");
    $count = count($_FILES['new_item']) - 3;
    for ($i = 0; $i < $count; $i++) {
        $name = $_FILES['new_item']['name'][$i];
        $tmp_name = $_FILES['new_item']['tmp_name'][$i];
        $size = $_FILES['new_item']['size'];
        if ($size > 0) {
            $upfile = $_FILES["new_item"]["name"][$i];
            $ext = substr($upfile, strrpos($upfile, "."));
            if (in_array($ext, $allowed_types)) {
                $file_name = $list[$i] . "{$ext}";
                move_uploaded_file($_FILES["new_item"]["tmp_name"][$i], "$upload_path/$file_name");
            } else {
                $message .= "Invalid file format for " . $upfile;
            }
        }
    }
    header('Location: home.php?modules=users&action=upload_doc&usersid=' . $id . '&pg=' . @$_REQUEST["pg"]);

}
?>
<table width="100%">
    <tr>
        <td align="left" class="site-State">Edit Status</td>
        <td align="left">&nbsp;</td>
    </tr>
    <tr>
        <td align="left">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <?php
    $id = $_GET["usersid"];

    $file_path = "../user_uploads/{$id}/parental_consent_letter.pdf";
    if (file_exists($file_path)):
        $has_file = true;
        ?>
        <tr>
            <td align="left" valign="top">Parental Consent Letter:</td>
            <td align="left">
                <a target="_blank" download href="<?= $file_path ?>">View/Download</a> &nbsp;
            </td>
        </tr>
    <?php endif; ?>
    <?php

    $file_path = "../user_uploads/{$id}/summer_calendar_confirmation.pdf";
    if (file_exists($file_path)):
        $has_file = true;
        ?>
        <tr>
            <td align="left" valign="top">Summer Calendar Confirmation:</td>
            <td align="left">
                <a target="_blank" download href="<?= $file_path ?>">View/Download</a> &nbsp;
            </td>
        </tr>
    <?php endif; ?>
    <?php

    $file_path = "../user_uploads/{$id}/employer_interview_invitation.pdf";
    if (file_exists($file_path)):
        $has_file = true;
        ?>
        <tr>
            <td align="left" valign="top">Employers Interview Invitation:</td>
            <td align="left">
                <a target="_blank" download href="<?= $file_path ?>">View/Download</a> &nbsp;
            </td>
        </tr>
    <?php endif; ?>
    <tr>
        <td colspan="3" align="left">
            <form action="" method="post"
                  enctype="multipart/form-data">

                <input type="hidden" value="<?= $id ?>" name="user_id">
                <table cellpadding="3" cellspacing="0">
                    <?php $id = $_GET["usersid"];
                    $list = (object)app\Sql::Select_single("select * from tbl_member where users_id='$id'");
                    if ($list != null) {
                        $list = unserialize($list->upload_document_list);

                        foreach ($list

                                 as $index => $item) {
                            ?>
                            <tr>
                                <td align="left" valign="top"><?= $item ?>:</td>
                                <td align="left">


                                    <input type="file" name="new_item[]">
                                </td>
                                <td>
                                    <?php

                                    $file_path = "../user_uploads/{$_GET["usersid"]}/{$item}.pdf";
                                    // echo $file_path;
                                    if (file_exists($file_path)):
                                        $has_file = true;
                                        ?>

                                        <a target="_blank" download href="<?= $file_path ?>">View/Download</a> &nbsp;

                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php }
                    } ?>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left"><input type="submit" value="Update"/>
                            <input type="reset" value="Cancel" onclick="javasctipt:history.go(-1);"/></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
