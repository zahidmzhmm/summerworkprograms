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
if ($member->bgform_id != null) {
    header('location:index.php');
}
if ($member->participant_statement_link == 'close') {
    header('location:index.php');
}

include("includes/header.php");
?>

<section class="grid">

    <div class="block-border">

        <h1 class="information">Summer Work Participant Statement</h1>

        <form name="registerform" id="registerform" method="post" action="bg-form-generate.php"
              class="form block-content inline-label">
            <fieldset>

                <h6>Explain why you want to participate in the Work & Travel USA program. ** Minimum 250 characters</h6>
                <br>
                <textarea name="q1" cols="152" rows="6" minlength="250" required></textarea><br><br><br>

                <h6>What do you hope to achieve by spending your summer living and working in the U.S.? ** Minimum 200
                    characters</h6><br>
                <textarea name="q2" cols="152" rows="6" minlength="200" required></textarea><br><br><br>

                <h6>How do you think your life in the U.S.A. will be similar to your life at home? ** Minimum 120
                    characters</h6><br>
                <textarea name="q3" cols="152" rows="6" minlength="120" required></textarea><br><br><br>

                <h6>How do you think your life in the U.S.A. will be different from your life at home? ** Minimum 120
                    characters</h6><br>
                <textarea name="q4" cols="152" rows="6" minlength="120" required></textarea><br><br><br>

                <h6>What type of seasonal jobs do you hope to be placed in? (Refer to the SWT Job Profiles)</h6><br>
                <textarea name="q5" cols="152" rows="6" required></textarea><br><br><br>

                <h6>What do you hope to gain by participating in the SWT program?</h6><br>
                <textarea name="q6" cols="152" rows="6" required></textarea><br><br><br>

                <h6>How do you plan to participate in U.S. cultural activities during your program?</h6><br>
                <textarea name="q7" cols="152" rows="6" required></textarea><br><br><br>

                <h6>Explain what you want to learn about U.S. culture, how you will share your culture, events or
                    activities you plan to attend, places you want to see or travel to. ** Minimum 250 characters</h6>
                <br>
                <textarea name="q8" cols="152" rows="6" minlength="250" required></textarea><br><br><br>

                <h6>How do you best learn a new task?</h6><br>
                <textarea name="q9" cols="152" rows="6" required></textarea><br><br><br>

                <h6>What is your plan after participating in the Work & Travel USA program?</h6><br>
                <textarea name="q10" cols="152" rows="6" required></textarea><br><br><br>

                <h6>Do you have plans to travel within the US during the program? If yes, list destinations and
                    purpose.</h6><br>
                <textarea name="q11" cols="152" rows="6" required></textarea><br><br><br>

                <h6>If you have an opportunity to extend your stay and change your return date, or stay back in the US
                    after your Summer Work Program participation with the consent of your parents, will you?</h6><br>
                <textarea name="q12" cols="152" rows="6" required></textarea><br><br><br>

                <h6>If yes, which US city will you prefer to live in and why?</h6><br>
                <textarea name="q13" cols="152" rows="6" required></textarea><br><br><br>

                <h6>SIGNATURE ** Input your First and Last Names ONLY</h6><br>
                <textarea name="q14" cols="152" rows="6" required></textarea><br><br><br>
                <center><input type="submit" class="form-control" value="Submit"></center>
            </fieldset>
        </form>
    </div>
</section>

<?php include("includes/footer.php"); ?>
