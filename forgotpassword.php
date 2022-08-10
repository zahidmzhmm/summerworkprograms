<?php
session_start();
include( 'third_party/mail/class.phpmailer.php' );
include("config.php");

if ( $_POST ) {

    
    $email = $_POST['email'];
    
    include "third_party/DataAccess.php";

    
    $members = Member::find_by_email( $_POST["email"] );
    
    if($members == null){
        header('Location: forgotpassword.php?code=1');
    }
    
    if ( $members != null ) {

        $password_token = mt_rand(100000, 999999);
        $members->password_reset = $password_token;
        $members->save();

        $url = $_SERVER['SERVER_NAME']."/password-reset.php?email=".$email."&token=".$password_token;

        $mail1 = new PHPMailer();
        $mail1->IsHTML( true );
        $mail1->IsMail();
        $mail1->SetFrom( NO_REPLY_EMAIL, "Summer Work Programs" );
        $mail1->AddAddress($_POST["email"], "");
        $mail1->Subject = "Password Reset Message";
        $mail1->Body="Go to this link to reset your password ".$url;
        $msgAd .= "<br><br>" .
                  " 
            Go to this link to reset your password ".$url."
            
             <br/><br/>
             __________ <br />
             Thank you !<br/> 
            Summer Work Programs <br/>
            Besor  Associates<br/>
            Lagos State, Nigeria 100001<br/>
            info@summerworkprograms.com<br/>
            www.summerworkprograms.com.<br/>";

        //$msgAd = preg_replace( "[\]", '', $msgAd );
        
        if($mail1->Send()){
		}

    }
        session_destroy();

}

$hide_slider = true;
?>
<?php include("includes/headerNew.php"); ?>

<section class="grid">
    <div class="block-border">
        <h1>Forgot Password </h1>

        <form name="forgotpassword" action="forgotpassword.php" method="post" class="block-content form inline-small-label">
            <fieldset>
                <p>
                    <label for="email">Email Address:</label>
                    <input type="text" name="email" id="email" value="" class="input-type-text"/>
                </p>
            </fieldset>
            <fieldset class="grey-bg no-margin">
                <p class="input-with-button">
                    <button type="submit" name="submit">Submit</button>
                </p>
            </fieldset>
        </form>
    </div>
    <input type="hidden" id="code" value="<?= $_GET["code"]; ?>">
</section>
<script>
$(function(){
    if($("#code").val() == 1){
        alert("Invalid Email address.");
    }
});
</script>
<?php include("includes/footerNew.php"); ?>