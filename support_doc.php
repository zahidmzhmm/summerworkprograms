<?php
include "app/main.php";

if (!@$_SESSION['user_id'])
    header('location:login.php');
$id = $_SESSION['user_id'];
$send_to_profile = false;
$message = "";
$allowed_types = array(".pdf", ".jpg");


if ($_POST) {

    $member = (object)\app\Sql::Select_single("select * from tbl_member where users_id='$id'");
    $list = unserialize($member->support_document_list);

    $files_uploaded = 0;
    $update_fields = "";

    $users_id = $_SESSION["user_id"];

    $upload_path = "user_uploads/$users_id/";

    if (!file_exists($upload_path)) {
        mkdir($upload_path);
    }

    foreach ($_FILES['new_item']['tmp_name'] as $key => $tmp_name) {
        if ($_FILES['new_item']["size"][$key] > 0) {
            $upfile = $_FILES["new_item"]["name"][$key];

            $ext = substr($upfile, strrpos($upfile, "."));
            if (in_array($ext, $allowed_types)) {

                $file_name = $list[$key] . "{$ext}";
                if (file_exists($upload_path . $list[$key] . ".pdf")) {
                    unlink($upload_path . $list[$key] . ".pdf");
                }
                if (file_exists($upload_path . $list[$key] . ".jpg")) {
                    unlink($upload_path . $list[$key] . ".jpg");
                }
                // $update_fields .= " student_id='$file_name',";
                move_uploaded_file($_FILES["new_item"]["tmp_name"][$key], "$upload_path/$file_name");
                $files_uploaded++;
            } else {
                $message .= "Invalid file format for" . $list[4 + $key];
            }

        }
    }
    $content = "";
    foreach ($list as $index => $item) {
        $content .= "<p>";
        $file_pointer = "user_uploads/$users_id/$item.pdf";
        $file_pointer1 = "user_uploads/$users_id/$item.jpg";
        $file_pointer2 = "user_uploads/$users_id/$item.png";
        if (file_exists($file_pointer)) {
            $content .= '<a target="_blank" href="user_uploads/' . $users_id . $item . '.pdf">' . $item . '.pdf</a><br>';
        }
        if (file_exists($file_pointer1)) {
            $content .= '<a target="_blank" href="user_uploads/' . $users_id . $item . '.pdf">' . $item . '.jpg</a><br>';
        }
        if (file_exists($file_pointer2)) {
            $content .= '<a target="_blank" href="user_uploads/' . $users_id . $item . '.pdf">' . $item . '.png</a><br>';
        }
        $content .= "</p>";
    }
    $mail1 = new \app\Mailer();
    $mail1->mail->Subject = $member->fname . " " . $member->lname . " has uploaded " . $files_uploaded . " files";
    $msg = "<p>Dear Administrator,</p>";
    $msg .= "<p>" . $member->fname . " " . $member->lname . " has uploaded " . $files_uploaded . " files as listed below:</p>";
    $msg .= $content;
    $msg .= "<p>Thank you !<br />
            _______________________
            <br><br>
            Summer Work Programs <br>
            Besor Associates <br>
            Lagos State, Nigeria 100001 <br>
            info@summerworkprograms.com <br>
            www.summerworkprograms.com <br>
            <br/>
            </p>";
    $mail1->mail->msgHTML($msg);
    $mail1->mail->addAddress(ADMIN_EMAIL);
    $mail1->mail->send();

    $message = "$files_uploaded file(s) uploaded.\\n$message";
    echo '<script>alert("' . $message . '");window.location.href="profile.php"</script>';
}

$member_data = (object)\app\Sql::Select_single("select * from tbl_member where users_id='$id'");
// $members_data = unserialize($member_data->support_document_list);
// var_dump($members_data);return;

if (!$member_data->regform_complete)
    header('location:register.php');

?>
<?php include("includes/header.php"); ?>

<?php

if ($send_to_profile): ?>
    <script type="text/javascript">
        alert("<?=trim($message)?>");
        location.replace("profile.php");
    </script>
<?php

endif; ?>

    <section class="grid">
        <div class="block-border">
            <h1>Upload support documents </h1>

            <form name="login" action="" method="post" class="block-content form inline-small-label"
                  enctype="multipart/form-data">

                <fieldset>
                    <?php
                    $list = (object)\app\Sql::Select_single("select * from tbl_member where users_id='$id'");
                    $users_id = $_SESSION["user_id"];
                    //var_dump($users_id);return;
                    $list = unserialize($list->support_document_list);

                    foreach ($list as $index => $item) {
                        ?>
                        <p>
                            <label for="password"><?= $item ?>:</label>
                            <input type="file" name="new_item[]" id="academic_record" value="" class="input-type-text"
                                   accept="image/x-png, image/jpeg, application/pdf"/>&nbsp;&nbsp;
                            <?php
                            //echo "/user_uploads/$users_id/$item.pdf";
                            $file_pointer = "user_uploads/$users_id/$item.pdf";
                            $file_pointer1 = "user_uploads/$users_id/$item.jpg";
                            $file_pointer2 = "user_uploads/$users_id/$item.png";
                            if (file_exists($file_pointer)) {

                                ?>
                                <a target="_blank"
                                   href="user_uploads/<?= $users_id ?>/<?= $item ?>.pdf">View</a>
                            <?php }
                            if (file_exists($file_pointer1)) { ?>
                                <a target="_blank"
                                   href="user_uploads/<?= $users_id ?>/<?= $item ?>.jpg">View</a>
                            <?php }
                            if (file_exists($file_pointer2)) { ?>
                                <a target="_blank"
                                   href="user_uploads/<?= $users_id ?>/<?= $item ?>.png">View</a>
                            <?php } ?>

                        </p>
                    <?php } ?>


                    <input type="hidden" name="register_posted" value="yes">
                </fieldset>
                <fieldset class="grey-bg no-margin">
                    <p class="input-with-button">
                        <button type="submit" name="submit">Submit</button>
                    </p>
                </fieldset>
            </form>
        </div>
    </section>
<?php include "includes/footer.php";