<?php
include "app/main.php";

if (!@$_SESSION['user_id']) {
    header('location:login.php');
}

$user_id = $_SESSION["user_id"];
$medoo = new \Medoo\Medoo($database);

$member = (object)\app\Sql::Select_single("select * from tbl_member where users_id='$user_id'");

if (!$member->regform_complete) {
    $_SESSION["user_id"] = $member->users_id;
    $_SESSION["member_info"] = $member;
    header('location:register.php');
}

if ($member->have_valid_summer_holiday == false || $member->have_carry_over_classes == 1) {
    session_destroy();
    header('location:message.php');
    exit;
}

?>
<?php include("includes/header.php"); ?>
<!--<script type="text/javascript" src="js/datetimepicker/js/bootstrap.min.js"></script>-->
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(function () {
        $(document).on('change', '#appointment_type', function (e) {
            var appointment_type = $("#appointment_type").val();
            $.ajax({
                type: "POST",
                url: 'adminpanel/ajaxAppointment.php',
                data: {appointment_type: appointment_type},
                dataType: "json",
                success: function (result) {
                    $("#appointment_date_time").html(result.listOptions);
                },
            });
        });
    });
</script>
<style>
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 9999; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0, 0, 0); /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 55%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }
        to {
            top: 0;
            opacity: 1
        }
    }

    @keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }
        to {
            top: 0;
            opacity: 1
        }
    }

    /* The Close Button */
    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 12px 16px;
        border-bottom: 1px solid;
        display: block;
    }

    .modal-body {
        padding: 2px 16px;
    }

    a {
        color: #3399cc;
    }

</style>
<section class="grid">
    <div class="block-border">
        <h1>Dashboard </h1>
        <div class="block-content form inline-label">
            <fieldset class="grey-bg">
                <legend>PERSONAL DETAILS</legend>
                <p>
                    <label><strong>Full Name:</strong></label>
                    <?php echo ucwords($member->fname);
                    echo '&nbsp;';
                    echo ucwords($member->midname);
                    echo '&nbsp;';
                    echo ucwords($member->lname); ?> &nbsp;</p>
                <p>
                    <label><strong>Registration#:</strong></label>
                    <?php echo $member->referenceid; ?></p>
                <p>
                    <label><strong>Date of Birth:</strong></label>
                    <?php echo $member->dob; ?></p>
                <p>
                    <label><strong>Age:</strong></label>
                    <?php echo ucwords($member->age); ?> &nbsp;</p>
                <p>
                    <label><strong>No of siblings:</strong></label>
                    <?php echo $member->no_siblings; ?> &nbsp;</p>
                <p>
                    <label><strong>Contact Address:</strong></label>
                    <?php echo ucwords($member->contact_address); ?> &nbsp;</p>
                <p>
                    <label><strong>Gender:</strong></label>
                    <?php echo ucwords($member->gender); ?> &nbsp;</p>
                <p>
                    <label><strong>Place of Birth:</strong></label>
                    <?php echo ucwords($member->birth_country); ?> &nbsp;</p>
                <p>
                    <label><strong>Name of Instution:</strong></label>
                    <?php echo ucwords($member->name_institution); ?> &nbsp;</p>
                <p>
                    <label><strong>Mobile No:</strong></label>
                    <?php echo ucwords($member->mobile_no); ?> &nbsp;</p>
                <p>
                    <label><strong>Phone Number:</strong></label>
                    <?php echo ucwords($member->phone_no); ?> &nbsp;</p>
                <p>
                    <label><strong>Email:</strong></label>
                    <?php echo $member->email; ?> &nbsp;</p>
                <p>
                    <label><strong>Passport Number:</strong></label>
                    <?php echo ucwords($member->passport_number); ?> &nbsp;</p>
                <p>
                    <label><strong>Status:</strong></label>
                    <?php echo ucwords($member->status); ?> &nbsp;</p>
                <p>
                    <label><strong>Appointment:</strong></label>
                    <a href="javascript:void(0)" onclick="openModal()" data-toggle="modal" data-target="#myModal"
                       id="myBtn">Schedule</a>
                <p>
                    <label><strong>Registration Form:</strong></label>
                    <a href="download.php?id=<?= $_SESSION["user_id"]; ?>">Download</a> &nbsp;</p>

                <p>
                    <label><strong>Support Documents:</strong></label>
                    <a href="support_doc.php">Upload</a> &nbsp;</p>
                <?php if ($member->participant_statement_link == 'open') { ?>
                    <p>
                        <label><strong>Participant Statement:</strong></label>
                        <a href="bg-form.php">Open</a> &nbsp;</p>
                <?php } ?>

            </fieldset>
        </div>
    </div>
</section>


<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close" data-dismiss="modal">&times;</span>
            <h5><b>Appointment Details</b></h5>
        </div>
        <div class="modal-body">
            <?php if ($member->appointment_status == "close") { ?>
                <div style="font-size: 1.25em;padding-top: 15px;padding-bottom: 15px;">Appointment is Closed. You will
                    receive notification when appointment is open for your schedule group.
                </div>
            <?php } else if ($member->appointment_status == "declined") { ?>
                <div style="font-size: 1.25em;padding-top: 15px;padding-bottom: 15px;">Appointment request has been
                    Declined. The office will open new dates when available.
                </div>
            <?php }
            if ($member->appointment_status == "open") {

                if ($member->appointment_date_time == null || $member->appointment_date_time == "") {
                    $list = AppointmentTimeList::all();
                    if ($list != null) {
                        ?>
                        <div style="font-size: 1.25em;padding-top: 15px;padding-bottom: 15px;">
                            <form method="post" action="appoiment_update.php">
                                <input type="hidden" name="id" value="<?= $member->id; ?>">
                                <div><b>Appointment Approval Status:</b> <?php
                                    if ($member->appointment_approve_status == "approve") {
                                        ?>Approved<?php } else if ($member->appointment_approve_status == "declined") {
                                        echo 'Appointment has been Declined. The office will open new dates when available';
                                    } else { ?>Pending<?php } ?></div>
                                <br>
                                <div class="form-group form-inline">
                                    <label class="text-left" style="padding-right: 5px">Type</label>
                                    <select class="form-control" name="appointment_type" id="appointment_type">
                                        <option value="">Select Type</option>
                                        <option value="onsite">In-person (Onsite)</option>
                                        <option value="online">Virtual (Online)</option>
                                    </select>
                                </div>
                                <div class="form-group form-inline">
                                    <label class="text-left" style="padding-right: 5px">Appointment Date /
                                        Time<?= $member->appointment_date_time; ?></label>
                                    <select class="form-control" name="appointment_date_time"
                                            id="appointment_date_time">
                                        <option value="">No Available</option>
                                    </select><br><br>
                                </div>

                                <button type="submit">Save</button>
                            </form>
                        </div>
                    <?php }
                } else { ?>
                    <div style="font-size: 1.25em;padding-top: 15px;padding-bottom: 15px;">
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
                            <div><b>Appointment Date / Time</b> <?= $member->appointment_date_time ?></div><br>
                        <?php } ?>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>

</div>
<script type="text/javascript">
    function openModal() {
        $('#myModal').modal('show');
    }

    // Get the modal
    // var modal = document.getElementById('myModal');
    //
    // // Get the button that opens the modal
    // var btn = document.getElementById("myBtn");
    //
    // // Get the <span> element that closes the modal
    // var span = document.getElementsByClassName("close")[0];
    //
    // // When the user clicks the button, open the modal
    // btn.onclick = function() {
    //     modal.style.display = "block";
    // }
    //
    // // When the user clicks on <span> (x), close the modal
    // span.onclick = function() {
    //     modal.style.display = "none";
    // }
    //
    // // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {
    //     if (event.target == modal) {
    //         modal.style.display = "none";
    //     }
    // }
</script>
<?php include("includes/footer.php"); ?>
