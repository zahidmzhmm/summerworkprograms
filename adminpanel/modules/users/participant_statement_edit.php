<?php
$id = $_GET['id'];
$order_data = (object)sql::Select_single("select * from tbl_member where users_id='$id'");
$participant_statement_link = $order_data->participant_statement_link;
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
    <tr>
        <td colspan="3" align="left">
            <form name="new_cat"
                  action="home.php?modules=users&action=participant_statement_save&id=<?= $id; ?>&pg=<?= @$_REQUEST["pg"] ?>"
                  method="post"
                  enctype="multipart/form-data">
                <table width="100%" cellpadding="3" cellspacing="0">
                    <tr>
                        <td width="15%" align="left" valign="top">Participant Statement Link:</td>
                        <td width="85%" align="left">
                            <select name="participant_statement_link" id="participant_statement_link">
                                <option value="close" <?= $participant_statement_link == "close" ? "selected" : "" ?>>
                                    CLOSE
                                </option>
                                <option value="open" <?= $participant_statement_link == "open" ? "selected" : "" ?>>
                                    OPEN
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left"><input type="submit" value="Update"/>
                            <input type="reset" value="Cancel"
                                   onclick="javasctipt:location.replace('home.php?modules=users&action=users&pg=<?= @$_REQUEST["pg"] ?>' );"/>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
