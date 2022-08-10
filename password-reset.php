<?php

include("config.php");
include "third_party/DataAccess.php";


if(isset($_POST['submit'])){
	
	$members = Member::find_by_email($_POST["email"]);
	$members->password = md5( $_POST["new_password"] );
	$members->password_reset = null;
	$members->save();

	header("location:login.php");
    exit;
}
    
$email = $_GET['email'];
$token = $_GET['token'];


$members = Member::find_by_email($email);

if($members->password_reset == $token)
{?>

<?php include("includes/headerNew.php"); ?>

<section class="grid">
    <div class="block-border">
        <h1>Reset Password </h1>

        <form action="" method="post" class="block-content form inline-small-label">
            <fieldset>
                <p>
                    <label for="email">New Password:</label>
                    <input type="password" name="new_password" class="input-type-text" required />
                    <input type="hidden" name="email" value="<?= $email; ?>">
                </p>
            </fieldset>
            <fieldset class="grey-bg no-margin">
                <p class="input-with-button">
                    <button type="submit" name="submit">Submit</button>
                </p>
            </fieldset>
        </form>
    </div>
</section>
<?php include("includes/footerNew.php"); ?>

<?php }
else {
	echo "<h2> Invalid Link </h2>";
} 
?>



