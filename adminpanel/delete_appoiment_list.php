<?php

include "../app/main.php";
$id = $_GET['id'];
app\Sql::insert("delete from appointment_time_list where id='$id'");
echo '<script>location.href="home.php?modules=appointment&action=view"</script>';
header('Location: home.php?modules=appointment&action=view');