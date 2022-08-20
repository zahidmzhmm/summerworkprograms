<?php
include "../app/main.php";

$new_date_time = $_POST["new_date_time"];
$type = $_POST['type'];

if ($new_date_time != null && $new_date_time != "") {
    $insert = app\Sql::insert("INSERT INTO appointment_time_list (date_time,type) VALUES ('$new_date_time','$type')");
    if ($insert === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record";
    }
}
echo '<script>location.href="home.php?modules=appointment&action=view"</script>';
header('Location: home.php?modules=appointment&action=view');
?>
