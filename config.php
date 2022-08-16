<?php

$live_site = 'http://summerworkprograms.com/';

//$live_site = 'http://swp.xtendhub.com/';
define("RECAPTCHA_PRIVATE_KEY", "6LfnHcYZAAAAAHM-5lLF2wWLnKZ-HvHQ8oIzBI98");
define("RECAPTCHA_PUBLIC_KEY", "6LfnHcYZAAAAAHJvBFTKA1IcWo_88OrF0r1M70lD");

define("SITE_URL", $live_site);
define("NO_REPLY_EMAIL", "noreply@summerworkprograms.com");
define("ADMIN_EMAIL", "info@summerworkprograms.com");

//mail
define("HOST_NAME", "summerworkprograms.com");
define("SMTP_PORT", 26);
define("AUTH_KEY", "Z5q38U3S");

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'summer');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
global $conn;
function query($query)
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        exit("Database connection error");
    }
    return mysqli_query($conn, $query);
}

?>
