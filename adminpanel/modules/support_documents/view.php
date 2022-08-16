<?php
$id = $_GET["id"];
$member = (object)sql::Select_single("select * from tbl_member where users_id='$id'");
$list = unserialize($member->support_document_list);
?>
<form method="post" action="update-document-list.php?id=<?= $member->id; ?>">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="right">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
                <table width="100%" cellpadding="5" cellspacing="1" class="item-details">
                    <tr class="bar">
                        <td>No</td>
                        <td>Title</td>
                        <td>Action</td>
                    </tr>
                    <?php
                    $counter = 0;
                    foreach ($list as $item) {
                        $counter++; ?>
                        <tr>
                            <td align="center"><?= $counter; ?></td>
                            <td>
                                <?= $item; ?>
                            </td>
                            <td><?php echo '<a href="delete_document_list.php?id=' . $_GET["id"] . '&count=' . $counter . '">Delete</a>'; ?></td>
                        </tr>
                    <?php }
                    ?>
                    <?php
                    for ($i = count($list); $i < 7; $i++) {
                        ?>
                        <tr>
                            <td><?= $i + 1; ?></td>
                            <td><input type="text" name="new_list[]"></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="5" align="center">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <p class="input-with-button">
        <button type="submit" name="submit">Save</button>
    </p>
</form>