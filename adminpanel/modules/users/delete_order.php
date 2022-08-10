
<?php

//########################################## Get Data ###############################
$id=$_GET['id'];


#####################################################################################

//###################################### Delete Now #################################

 $delete_query="DELETE from tbl_i901  where users_id='$id'";
 sql::update_query($delete_query);
 $delete_query="DELETE from tbl_payment_order  where users_id='$id'";
 sql::update_query($delete_query); 

//###################################################################################

//############# Redirect #######################
return_to_page($_SERVER['HTTP_REFERER']);
?>