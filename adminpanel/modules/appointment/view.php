<?php
$list = app\Sql::Select_all("select * from appointment_time_list");
?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#new_date_time').datetimepicker({
            //language:  'fr',
            weekStart: 1,
            format: 'yyyy-mm-dd hh:ii',
            startDate: '<?=date('Y-m-d H:i')?>',
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
    });
</script>
<form method="post" action="add-appoiment-list.php">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="right">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
                <table width="100%" cellpadding="5" cellspacing="1" class="item-details">
                    <tr class="bar">
                        <td>No</td>
                        <td>Type</td>
                        <td>Title</td>
                        <td>Action</td>
                    </tr>
                    <?php
                    if ($list != null && count($list) > 0) {
                        $counter = 0;
                        foreach ($list as $item) {
                            $appointment_date_time = $item['date_time'];
                            $counter++; ?>
                            <tr>
                                <td align="center"><?= $counter; ?></td>
                                <td><?php if ($item['type'] == 'Onsite') {
                                        echo 'In-person (Onsite)';
                                    } else {
                                        echo 'Virtual (Online)';
                                    } ?></td>
                                <td>
                                    <?= $appointment_date_time; ?>
                                </td>
                                <td><?php echo '<a href="delete_appoiment_list.php?id=' . $item['id'] . '">Delete</a>'; ?></td>
                            </tr>
                        <?php }
                    }
                    ?>
                    <tr>
                        <td></td>
                        <td>
                            <select name="type" id="type">
                                <option value="onsite">In-person (Onsite)</option>
                                <option value="online">Virtual (Online)</option>
                            </select>
                        </td>
                        <td><input type="text" name="new_date_time" id="new_date_time" autocomplete="off"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4" align="center">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <p class="input-with-button">
        <button type="submit" name="submit">Save</button>
    </p>
</form>
