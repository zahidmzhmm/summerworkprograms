<?php

include("app/main.php");

if (isset($_POST['submit'])) {
    $medoo = new \Medoo\Medoo($database);
    if (!empty($_POST['email']) && !empty($_POST['new_password'])) {
        $update = $medoo->update('tbl_member', ['password' => md5($_POST['new_password'])], ['email' => $_POST['email']]);
        header("location:login.php");
    } else {
        header("location:login.php");
    }
    exit;
}

$email = $_GET['email'];
$token = $_GET['token'];
if (empty($email) || empty($token)) {
    header("location:login.php");
}

$members = \app\Sql::Select_single("select * from tbl_member where email='$email' and password_reset='$token'");
if ($members && !empty($members)) {
    $members = (object)$members;
    include("includes/header.php"); ?>
    <section class="grid">
        <div class="block-border">
            <h1>Reset Password </h1>

            <form action="" method="post" class="block-content form inline-small-label">
                <fieldset>
                    <p>
                        <label for="email">New Password:</label>
                        <input type="password" name="new_password" class="input-type-text" required/>
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
    <?php
    include("includes/footer.php");
} else {
    echo "<h2> Invalid Link </h2>";
}
?>



