<?php
$id = $_GET['id'];
$user_data = (object)app\Sql::Select_single("select * from tbl_admin where user_id='$id'");
?>
<table width="100%">
    <tr>
        <td align="left" class="site-State">Edit Site Configurations Setting</td>
        <td align="left">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3" align="left">
            <form name="new_cat" action="home.php?modules=adminuser&action=post&id=<?= $id; ?>" method="post"
                  enctype="multipart/form-data">
                <table width="100%" cellpadding="3" cellspacing="0">
                    <tr>
                        <td align="left">Site name</td>
                        <td align="left"><input type="text" name="sitename" size="40"
                                                value="<?= $user_data->sitename; ?>"></td>
                    </tr>
                    <tr>
                        <td width="15%" align="left">Site Title:</td>
                        <td width="85%" align="left"><input type="text" name="fullname" size="40"
                                                            value="<?= $user_data->title; ?>"/></td>
                    </tr>
                    <tr>
                        <td width="15%" align="left">From Email :</td>
                        <td width="85%" align="left"><input type="text" name="fromemail" size="40"
                                                            value="<?= $user_data->fromemail; ?>"></td>
                    </tr>
                    <tr>
                        <td align="left">To Email :</td>
                        <td align="left"><input type="text" name="toemail" id="toemail" size="40"
                                                value="<?= $user_data->toemail; ?>"/></td>
                    </tr>
                    <tr>
                        <td align="left">User name</td>
                        <td align="left"><input type="text" name="username" size="20"
                                                value="<?= $user_data->username; ?>" maxlength="20"></td>
                    </tr>
                    <tr>
                        <td width="15%" align="left">Password :</td>
                        <td width="85%" align="left"><input type="password" name="password" size="20"
                                                            value="<?= $user_data->password; ?>" maxlength="20"></td>
                    </tr>
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
