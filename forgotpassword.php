<?php
include "app/main.php";

if ($_POST) {
    $email = $_POST['email'];
    $members = \app\Sql::Select_single("select * from tbl_member where email='$email'");
    if ($members == null) {
        header('Location: forgotpassword.php?code=1');
    }

    if ($members != null) {

        $password_token = mt_rand(100000, 999999);
        $medoo = new \Medoo\Medoo($database);
        $medoo->update('tbl_member', ['password_reset' => $password_token], ['email' => $email]);
        $url = SITE_URL . "password-reset.php?email=" . $email . "&token=" . $password_token;
        $mail1 = new \app\Mailer();
        $mail1->mail->addAddress($_POST["email"]);
        $mail1->mail->Subject = "Password Reset Message";
        $mail1->mail->Body = "Go to this link to reset your password " . $url;
        $msgAd = "<br><br>" .
            " 
            Go to this link to reset your password ";
        $msgAd .= "<a href='" . $url . "'>" . $url . "</a>";
        $msgAd .= "
            
             <br/><br/>
             __________ <br />
             Thank you !<br/> 
            Summer Work Programs <br/>
            Besor  Associates<br/>
            Lagos State, Nigeria 100001<br/>
            info@summerworkprograms.com<br/>
            www.summerworkprograms.com.<br/>";

        //$msgAd = preg_replace( "[\]", '', $msgAd );
        $mail1->mail->msgHTML($msgAd);
        if ($mail1->mail->send()) {
        }

    }
    session_destroy();

}

$hide_slider = true;
?>
<?php include("includes/header.php"); ?>

    <section class="grid">
        <div class="block-border">
            <h1>Forgot Password </h1>

            <form name="forgotpassword" action="forgotpassword.php" method="post"
                  class="block-content form inline-small-label">
                <fieldset>
                    <p>
                        <label for="email">Email Address:</label>
                        <input type="text" name="email" id="email" value="<?= @$_REQUEST['email'] ?>"
                               class="input-type-text"/>
                    </p>
                </fieldset>
                <fieldset class="grey-bg no-margin">
                    <p class="input-with-button">
                        <button type="submit" name="submit">Submit</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <input type="hidden" id="code" value="<?= isset($_GET["code"]) ? $_GET["code"] : '' ?>">
    </section>
    <script>
        $(function () {
            if ($("#code").val() == 1) {
                alert("Invalid Email address.");
            }
        });
    </script>
<?php include("includes/footer.php"); ?>