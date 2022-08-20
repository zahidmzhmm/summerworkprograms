<?php
include "app/main.php";

if (!@$_SESSION['user_id'])
    header('location:login.php');
$id = $_SESSION['user_id'];
$send_to_profile = false;
$message = "";
$allowed_types = array(".pdf", ".jpg");


if ($_POST) {

    $list = (object)\app\Sql::Select_single("select * from tbl_member where users_id='$id'");
    $list = unserialize($list->support_document_list);

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

    //    if ($_FILES["student_id"]["size"] > 0) {
    //        //student id\
    //        $upfile = $_FILES["student_id"]["name"];
    //        $ext = substr($upfile, strrpos($upfile, "."));
    //        if (in_array($ext, $allowed_types)) {
    //            $file_name = "std_id{$ext}";
    //            $update_fields .= " student_id='$file_name',";
    //            move_uploaded_file($_FILES["student_id"]["tmp_name"], "$upload_path/$file_name");
    //            $files_uploaded++;
    //        } else {
    //            $message .= "Invalid file format for Student Id.\\n";
    //        }

    //    }
    //    if ($_FILES["admission_letter"]["size"] > 0) {
    //        //admission letter
    //        $upfile = $_FILES["admission_letter"]["name"];
    //        $ext = substr($upfile, strrpos($upfile, "."));
    //        if (in_array($ext, $allowed_types)) {
    //            $file_name = "adm_ltr{$ext}";
    //            $update_fields .= " admission_letter='$file_name',";
    //            move_uploaded_file($_FILES["admission_letter"]["tmp_name"], "$upload_path/$file_name");
    //            $files_uploaded++;
    //        } else {
    //            $message .= "Invalid file format for Admission letter.\\n";
    //        }
    //    }
    //    if ($_FILES["pp_photo"]["size"] > 0) {
    //        //pp_photo
    //        $upfile = $_FILES["pp_photo"]["name"];
    //        $ext = substr($upfile, strrpos($upfile, "."));
    //        if (in_array($ext, $allowed_types)) {
    //            $file_name = "pp_photo{$ext}";
    //            $update_fields .= " pp_photo='$file_name',";
    //            move_uploaded_file($_FILES["pp_photo"]["tmp_name"], "$upload_path/$file_name");
    //            $files_uploaded++;
    //        } else {
    //            $message .= "Invalid file format for Passport photo.\\n";
    //        }
    //    }

    // if ($_FILES["intl_passport"]["size"] > 0) {
    // 	//intl_passport
    // 	$upfile = $_FILES["intl_passport"]["name"];
    // 	$ext = substr($upfile, strrpos($upfile, "."));
    // 	if (in_array($ext, $allowed_types)) {
    // 		$file_name = "intl_passport{$ext}";
    // 		$update_fields .= " intl_passport='$file_name',";
    // 		move_uploaded_file($_FILES["intl_passport"]["tmp_name"], "$upload_path/$file_name");
    // 		$files_uploaded++;
    // 	} else {
    // 		$message .= "Invalid file format for International Passport.\\n";
    // 	}
    // }


    // if ($_FILES["academic_record"]["size"] > 0) {
    // 	//intl_passport
    // 	$upfile = $_FILES["academic_record"]["name"];
    // 	$ext = substr($upfile, strrpos($upfile, "."));
    // 	if (in_array($ext, $allowed_types)) {
    // 		$file_name = "academic_record{$ext}";
    // 		$update_fields .= " academic_record='$file_name',";
    // 		move_uploaded_file($_FILES["academic_record"]["tmp_name"], "$upload_path/$file_name");
    // 		$files_uploaded++;
    // 	} else {
    // 		$message .= "Invalid file format for Academic Record.\\n";
    // 	}
    // }


    $message = "$files_uploaded file(s) uploaded.\\n$message";


    // $update_fields = substr($update_fields, 0, strrpos($update_fields, ","));

    // $query = "UPDATE `tbl_member` SET $update_fields  WHERE `users_id` = $users_id";
    // sql::update_query($query);
    $send_to_profile = true;


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