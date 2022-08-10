
<?php

//########################################## Get Data ###############################
$id=$_GET['id'];
$member=Member::find($id);
@$member->delete();
TravelHistory::table()->delete(array("user_id"=>$id));
VisaHistory::table()->delete(array("user_id"=>$id));



//###################################################################################

//############# Redirect #######################
return_to_page($_SERVER['HTTP_REFERER']);
?>