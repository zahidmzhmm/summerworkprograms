<?php
include "app/main.php";

if (!@$_SESSION['user_id']) {
    header('location:login.php');
}


$user_id = $_SESSION['user_id'];
$member = (object)\app\Sql::Select_single("select * from tbl_member where users_id='$user_id'");

if (!$member->regform_complete) {
    $_SESSION["user_id"] = $member->users_id;
    $_SESSION["member_info"] = $member;
    header('location:register.php');
}

$has_file = false;
$id = $_GET["id"];
?>
<?php include("includes/header.php"); ?>
<section class="grid">
    <div class="block-border">
        <h1>Download Links </h1>
        <div class="block-content form inline-label">
            <fieldset class="grey-bg">


                <p>
                    <label><strong>Form :</strong></label>
                    <a target="_blank" download href="<?= "userform.php?id=" . $member->users_id ?>">Download</a> &nbsp;
                </p>

                <?php

                $file_path = "user_uploads/{$member->users_id}/parental_consent_letter.pdf";
                if (file_exists($file_path)):
                    $has_file = true;
                    ?>
                    <p>
                        <label><strong>Parental Consent Letter:</strong></label>
                        <a target="_blank" download href="<?= $file_path ?>">Download</a> &nbsp;</p>

                <?php endif; ?>
                <?php
                $file_path = "user_uploads/{$member->users_id}/summer_calendar_confirmation.pdf";
                if (file_exists($file_path)):
                    $has_file = true;
                    ?>
                    <p>
                        <label><strong>Summer Calendar Confirmation:</strong></label>
                        <a target="_blank" download href="<?= $file_path ?>">Download</a></p>

                <?php endif; ?><?php
                $file_path = "user_uploads/{$member->users_id}/employer_interview_invitation.pdf";
                if (file_exists($file_path)):
                    $has_file = true;
                    ?>
                    <p>
                        <label><strong>Employers Interview Invitation:</strong></label>
                        <a target="_blank" download href="<?= $file_path ?>">Download</a>&nbsp;</p>
                <?php endif; ?>

                <?php

                $list = (object)\app\Sql::Select_single("select * from tbl_member where users_id='$id'");
                if ($list != null):
                    $list = unserialize($list->upload_document_list);

                    foreach ($list as $index => $item):
                        $file_path = "user_uploads/{$member->users_id}/{$item}.pdf";
                        if (file_exists($file_path)):
                            $has_file = true;
                            ?>
                            <p>
                                <label><strong><?= $item ?>:</strong></label>
                                <a target="_blank" download href="<?= $file_path ?>">Download</a>&nbsp;</p>
                        <?php endif; endforeach; endif; ?>

            </fieldset>
        </div>
    </div>
</section>
<?php include("includes/footer.php"); ?>
