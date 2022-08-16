<?php

$id = 0;

if ($_POST) {
    $id = $_POST["user_id"];
    $list = (object)sql::Select_single("select * from tbl_member where users_id='$id'");
    if ($list != null) {
        $list = unserialize($list->upload_document_list);
    }

    $id = @$_POST["user_id"];
    $message = "";
    if (!$id) header("location:home.php?modules=users&action=users");
    $upload_path = "../user_uploads/$id";

    if (!file_exists($upload_path)) {
        mkdir($upload_path);
    }

    $allowed_types = array(".pdf");

    foreach ($_FILES['new_item']['tmp_name'] as $key => $tmp_name) {
        if ($_FILES['new_item']["size"][$key] > 0) {
            // print_r($list);
            // echo $list[$key];
            // return;
            $upfile = $_FILES["new_item"]["name"][$key];
            $ext = substr($upfile, strrpos($upfile, "."));
            if (in_array($ext, $allowed_types)) {
                $file_name = $list[$key] . "{$ext}";
                //$update_fields .= " parental_consent_letter='$file_name',";
                move_uploaded_file($_FILES["new_item"]["tmp_name"][$key], "$upload_path/$file_name");
                //$files_uploaded++;

            } else {
                $message .= "Invalid file format for " . $upfile;
            }
        }
    }

    // if ($_FILES["parental_consent_letter"]["size"] > 0) {
    // 	//intl_passport
    // 	$upfile = $_FILES["parental_consent_letter"]["name"];
    // 	$ext = substr($upfile, strrpos($upfile, "."));
    // 	if (in_array($ext, $allowed_types)) {
    // 		$file_name = "parental_consent_letter{$ext}";
    // 		//$update_fields .= " parental_consent_letter='$file_name',";
    // 		move_uploaded_file($_FILES["parental_consent_letter"]["tmp_name"], "$upload_path/$file_name");
    // 		//$files_uploaded++;

    // 	} else {
    // 		$message .= "Invalid file format for Parental consent letter.\\n";
    // 	}
    // }


    // if ($_FILES["summer_calendar_confirmation"]["size"] > 0) {
    // 	//intl_passport
    // 	$upfile = $_FILES["summer_calendar_confirmation"]["name"];
    // 	$ext = substr($upfile, strrpos($upfile, "."));
    // 	if (in_array($ext, $allowed_types)) {
    // 		$file_name = "summer_calendar_confirmation{$ext}";
    // 		//$update_fields .= " summer_calendar_confirmation='$file_name',";
    // 		move_uploaded_file($_FILES["summer_calendar_confirmation"]["tmp_name"], "$upload_path/$file_name");
    // 		//$files_uploaded++;
    // 	} else {
    // 		$message .= "Invalid file format for Summer Calendar Confirmaion.";
    // 	}
    // }


    // if ($_FILES["employer_interview_invitation"]["size"] > 0) {
    // 	//intl_passport
    // 	$upfile = $_FILES["employer_interview_invitation"]["name"];
    // 	$ext = substr($upfile, strrpos($upfile, "."));
    // 	if (in_array($ext, $allowed_types)) {
    // 		$file_name = "employer_interview_invitation{$ext}";
    // 		//$update_fields .= " employer_interview_invitation='$file_name',";
    // 		move_uploaded_file($_FILES["employer_interview_invitation"]["tmp_name"], "$upload_path/$file_name");
    // 		//$files_uploaded++;
    // 	} else {
    // 		$message .= "Invalid file format for Employer interview invitaion.";
    // 	}
    // }

    // if($message!=""){

    //        echo $message;

    // }
    // else {

    // 	echo "<script language='javascript'>
    // 			alert('document uploaded successfully');
    // 		</script>";
    // 	return_to_page( "home.php?modules=users&action=users&pg=".@$_REQUEST["pg"] );
    // 	//exit;
    // }

    header('Location: home.php?modules=users&action=upload_doc&usersid=' . $id . '&pg=' . @$_REQUEST["pg"]);
}

// if(!$id)
// $id         = @$_GET['usersid'];

// if(!$id) return_to_page("home.php?modules=users&action=users");

// $order_data =Member::find($id);
// $status     = $order_data->status;


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
            <form action="home.php?modules=users&action=upload_doc&pg=<?= @$_REQUEST["pg"] ?>" method="post"
                  enctype="multipart/form-data">

                <input type="hidden" value="<?= $id ?>" name="user_id">
                <table width=" cellpadding=" 3
                " cellspacing="0">
                <?php $id = $_GET["usersid"];
                $list = (object)sql::Select_single("select * from tbl_member where users_id='$id'");
                if ($list != null){
                $list = unserialize($list->upload_document_list);

                foreach ($list

                as $index => $item){
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
