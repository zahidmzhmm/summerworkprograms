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

app\Sql::update("UPDATE uio_faq SET status='$new_stat' WHERE faq_id='$id'");

//###################################################################################

//############# Redirect #######################
app\Web::return_to_page('home.php?modules=faq&action=faq');

?>