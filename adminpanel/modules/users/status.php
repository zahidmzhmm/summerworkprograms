<div style="margin:200px 0 0 200px;">:::::::::::::::::::::::::::::: Updating Status
    :::::::::::::::::::::::::::::::::::::::
</div>


<?php
//########################################## Get Data ###############################
$status = $_GET['status'];
$id = $_GET['id'];
#####################################################################################

//################################### ALTERNATE STATUS ##############################
if ($status == '1')
    $new_stat = '0';

if ($status == '0')
    $new_stat = '1';
#####################################################################################

//###################################### Update Now #################################
$update_query = "UPDATE forum_users SET status='$new_stat' WHERE users_id='$id'";

app\Sql::update($update_query);

//###################################################################################

//############# Redirect #######################
app\Web::return_to_page('home.php?modules=users&action=users');

?>