<?php
error_reporting(1);
include __DIR__ . '/app/main.php';

$user_id = $_SESSION['user_id'];

if (isset($_GET['status'])) {
    $medoo = new \Medoo\Medoo($database);
    $medoo->update("tbl_member", ['appointment_payment_status' => 2], ['users_id' => $user_id]);
    header("location:profile.php?success");
}
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("location:profile.php");
}

$user_id = $_GET['id'];
$member = (object)\app\Sql::Select_single("select * from tbl_member where users_id='$user_id'");
$fees = $member->appointment_fee;
$url = "https://api.paystack.co/transaction/initialize";

$fields = [
    'email' => $member->email,
    'amount' => $fees * 100
];

$fields_string = http_build_query($fields);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer " . PS_KEY,
    "Cache-Control: no-cache",
));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$result = json_decode($result, true);
if ($result['status'] === true) {
    header("location:" . $result["data"]["authorization_url"]);
} else {
    header("location:profile.php");
}
?>