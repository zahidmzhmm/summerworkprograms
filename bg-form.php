<?php
include "app/main.php";


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

                <h6>How do you think your life in the U.S.A. will be similar to or different from your life at home? **
                    Minimum 120 characters</h6><br>
                <textarea name="q2" cols="152" rows="6" minlength="120" required></textarea><br><br><br>

                <h6>Mention U.S. cultural activities you want to participate in during your program.</h6>
                - Explain what you want to learn about the U.S. culture <br>
                - How you will share your culture <br>
                - Events or activities you plan to attend and places you want to see or travel to. <br><br>
                <textarea name="q3" cols="152" rows="6" minlength="5" required></textarea><br><br><br>

                <h6>What do you hope to achieve by spending your summer living and working in the U.S.? **
                    Minimum 200 characters</h6><br>
                <textarea name="q4" cols="152" rows="6" minlength="200" required></textarea><br><br><br>

                <h6>Do you have plans to travel within the US during or after the program? If yes, list destinations and
                    purpose.</h6><br>
                <textarea name="q5" cols="152" rows="6" required></textarea><br><br><br>

                <h6> What do you plan to do upon your return from the U.S.?</h6><br>
                <textarea name="q7" cols="152" rows="6" required></textarea><br><br><br>

                <h6>What would you like to do after the completion of your Summer Work Program participation in the
                    US?</h6>
                - Extend your stay in the US <br>
                <input type="radio" name="q81" required value="Yes"> Yes
                <input type="radio" name="q81" required style="margin-left:3px;" value="No"> No
                <br>
                <br>
                - Change your return date <br>
                <input type="radio" name="q82" required value="Yes"> Yes
                <input type="radio" name="q82" required style="margin-left:3px;" value="No"> No
                <br>
                <br>
                - Stay back in the US <br>
                <input type="radio" name="q83" required value="Yes"> Yes
                <input type="radio" name="q83" required style="margin-left:3px;" value="No"> No
                <br>
                <br>
                <br>
                <h6>* If YES to any or all of the questions above, why will you desire to take such action?</h6><br>
                <textarea name="q9" cols="152" rows="6" required></textarea><br><br><br>

                <h6>Where will you stay and with whom?</h6><br>
                <textarea name="q10" cols="152" rows="6" required></textarea><br><br><br>

                <h6>SIGNATURE ** Input your First and Last Names ONLY</h6><br>
                <textarea name="q11" cols="152" rows="6" required></textarea><br><br><br>
                <center>
                    <button type="submit" class="form-control" value="Submit">Submit</button>
                </center>
            </fieldset>
        </form>
    </div>
</section>

<?php include("includes/footer.php"); ?>
