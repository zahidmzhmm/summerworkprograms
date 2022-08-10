<?php
$id         = $_GET['id'];
$order_data = Member::find($id);
$status     = $order_data->status;
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
            <form name="new_cat" action="home.php?modules=users&action=status_post&id=<?= $id; ?>&pg=<?=@$_REQUEST["pg"]?>" method="post"
                  enctype="multipart/form-data">
                <table width="100%" cellpadding="3" cellspacing="0">
                    <tr>
                        <td width="15%" align="left" valign="top">Latest Status:</td>
                        <td width="85%" align="left">
                            <select name="status">
                                <option value="INCOMPLETE" <?=$status=="INCOMPLETE"?"selected":""?>>INCOMPLETE</option>
                                <option value="PENDING" <?=$status=="PENDING"?"selected":""?>>PENDING</option>
                                <option value="CLOSED" <?=$status=="CLOSED"?"selected":""?>>Re-Opened</option>
                                <option value="Administrative Review" <?=$status=="Administrative Review"?"selected":""?>>Administrative Review</option>
                                <option value="Application Active" <?=$status=="Application Active"?"selected":""?>>Application Active</option>
                                <option value="Application Processed" <?=$status=="Application Processed"?"selected":""?>>Application Processed</option>
                                <option value="Application Complete" <?=$status=="Application Complete"?"selected":""?>>Application Complete</option>
                                <option value="Shortlisted for Job Interview" <?=$status=="Shortlisted for Job Interview"?"selected":""?>>Shortlisted for Job Interview</option>
                                <option value="Hired for WAT USA" <?=$status=="Hired for WAT USA"?"selected":""?>>Hired for WAT USA</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left"><input type="submit" value="Update"/>
                            <input type="reset" value="Cancel" onclick="javasctipt:location.replace('home.php?modules=users&action=users&pg=<?=@$_REQUEST["pg"]?>' );"/></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
