<?php
include "app/main.php";

if (!@$_SESSION['user_id']) {
    header('location:login.php');
}
$user_id = $_SESSION['user_id'];
$member = \app\Sql::Select_single("select * from tbl_member where users_id='$user_id'");
if (!$member) {
    header("location:logout.php");
}
$member = (object)$member;
include("includes/header.php");
?>

<section class="grid">
    <div class="block-border" style="margin: 5rem">
        <div><b>Appointment Approval Status:</b> <?php
            if ($member->appointment_approve_status == "approve") {
                ?>Approved<?php } else if ($member->appointment_approve_status == "declined") {
                echo 'Appointment request has been Declined. The office will open new dates when available.';
            } else { ?>Pending<?php } ?></div>
        <br>
        <?php if ($member->appointment_approve_status != "declined") { ?>
            <div><b>Appointment Type:</b> <?php if ($member->appointment_type == 'onsite') {
                    echo 'In-person (Onsite)';
                } else {
                    echo 'Virtual (Online)';
                } ?></div><br>
            <div><b>Appointment Date /
                    Time</b> <?= $member->appointment_date_time ?>
            </div><br>
        <?php } ?>
        <b>Administrative Fee:</b> <?= $member->appointment_fee ?>
        <br><br>
        <?php
        if ($member->appointment_payment_status != 2) {
            ?>
            <div class="">
                <button onclick="window.location.href='payment.php?id=<?= $member->users_id ?>'">Pay
                    Fees
                </button>
            </div>
            <br>
        <?php } else { ?>
            <div class="">
                <button disabled>Paid</button>
            </div>
            <br>
        <?php } ?>
    </div>
    </div>
</section>

<?php include("includes/footer.php"); ?>
