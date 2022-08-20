<?php
include "includes/includes.php";
$new_list = $_POST["new_list"];

$latest_list = [];
foreach($new_list as $item){
	if($item != ""){
		$latest_list[] = $item;
	}
}

$list = SupportDocumentList::first();
// print_r($latest_list);
// return;
$full_list = serialize(array_merge(unserialize($list->data), $latest_list));

$update_sql="UPDATE support_document_list SET data='$full_list' WHERE id=`1`";
sql::update_query($update_sql);

?>