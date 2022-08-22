<?php
$id = $_GET['id'];
$order_data = (object)app\Sql::Select_single("select * from tbl_member where users_id='$id'");
$type = 'onsite';
if ($order_data->appointment_type != "") {
    $type = $order_data->appointment_type;
}
$list = app\Sql::Select_all("select * from appointment_time_list where type='$type'");
?>
<script type="text/javascript">
    $(function () {
        $(document).on('change', '#appointment_type', function (e) {
            var appointment_type = $("#appointment_type").val();
            $.ajax({
                type: "POST",
                url: 'ajaxAppointment.php',
                data: {appointment_type: appointment_type},
                dataType: "json",
                success: function (result) {
                    $("#browsers").html(result.listOptions);
                },
            });
        });
    });
</script>
<table width="100%">
    <tr>
        <td align="left" class="site-State">Edit Appointment</td>
        <td align="left">&nbsp;</td>
    </tr>
    <tr>
        <td align="left">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3" align="left">
            <form name="new_cat"
                  action="home.php?modules=users&action=app_post&id=<?= $id; ?>&pg=<?= @$_REQUEST["pg"] ?>"
                  method="post" enctype="multipart/form-data">
                <table width="100%" cellpadding="3" cellspacing="0">
                    <tr>
                        <td width="20%" align="left" valign="top">Appointment Status:</td>
                        <td width="80%" align="left"><select name="appointment_status" class="form-control">
                                <option <?php if ($order_data->appointment_status == "close") { ?> selected="selected" <?php } ?>
                                        value="close">Close
                                </option>
                                <option <?php if ($order_data->appointment_status == "open") { ?> selected="selected" <?php } ?>
                                        value="open">Open
                                </option>
                            </select></td>
                    </tr>
                    <tr>
                        <td width="20%" align="left" valign="top">Appointment Approval Status:</td>
                        <td width="80%" align="left">
                            <select name="appointment_approve_status" class="form-control">
                                <option <?php if ($order_data->appointment_approve_status == "pending") { ?> selected="selected" <?php } ?>
                                        value="pending">Pending
                                </option>
                                <option <?php if ($order_data->appointment_approve_status == "approve") { ?> selected="selected" <?php } ?>
                                        value="approve">Approved
                                </option>
                                <option <?php if ($order_data->appointment_approve_status == "declined") { ?> selected="selected" <?php } ?>
                                        value="declined">Declined
                                </option>
                            </select></td>
                    </tr>

                    <tr>
                        <td width="20%" align="left" valign="top">Appointment Type:</td>
                        <td width="80%" align="left">
                            <select class="form-control" name="appointment_type" id="appointment_type">
                                <option value="">Select Appointment Type</option>
                                <option value="onsite" <?php if ($order_data->appointment_type == 'onsite') {
                                    echo 'selected=selected';
                                } ?>>In-person (Onsite)
                                </option>
                                <option value="online" <?php if ($order_data->appointment_type == 'online') {
                                    echo 'selected=selected';
                                } ?>>Virtual (Online)
                                </option>
                            </select>
                        </td>
                    </tr>


                    <tr>
                        <td width="20%" align="left" valign="top">Appointment Date / Time:</td>
                        <td width="80%" align="left">
                            <input list="browsers" type="datetime-local"
                                   value="<?= $order_data->appointment_date_time; ?>"
                                   name="appointment_date_time" class="form-control" autocomplete="off">
                            <?php
                            if ($list != null) {
                                ?>
                                <datalist id="browsers">
                                    <?php foreach ($list

                                    as $item){
                                    ?>
                                    <option value="<?php echo $item['date_time'] ?>">
                                        <?php } ?>
                                </datalist>
                            <?php } ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="20%" align="left" valign="top">Fee:</td>
                        <td width="80%" align="left">
                            <input type="text" value="<?= $order_data->appointment_fee ?>" name="fee"
                                   class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td width="20%" align="left" valign="top">Payment Status:</td>
                        <td width="80%" align="left">
                            <?= $order_data->appointment_payment_status == 2 ? 'Paid' : 'Unpaid' ?>
                        </td>
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
