<?php

$member = Member::find( $_GET["id"] );
// $list = UploadDocumentList::first();

if($member != null){
  $list = unserialize($member->upload_document_list);
}
// print_r($list);
// return;
?>
<form method="post" action="update-upload-list.php?id=<?= $member->id ?>">
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
      <table width="100%" cellpadding="5" cellspacing="1" class="item-details">
        <tr class="bar">
          <td>No</td>
          <td>Title</td>
          <td>Action</td>
        </tr>
        <?php
        if(count($list) > 0){
      $counter=0;
      foreach($list as $item) { $counter++;?>
        <tr>
          <td align="center"><?= $counter;?></td>
          <td>
            <?= $item;?>
          </td>
          <td><?php echo '<a href="delete_upload_list.php?id='.$member->id.'&count='.$counter.'">Delete</a>'; ?></td>
        </tr>
        <?php } } 
        ?>
        <?php 
        for($i=count($list); $i< 5; $i++){
        ?> 
        <tr>
          <td><?= $i+1; ?></td>
          <td><input type="text" name="new_list[]"></td>
        </tr>
        <?php } ?>
        <tr>
          <td colspan="5"  align="center">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<p class="input-with-button">
    <button type="submit" name="submit">Save</button>
</p>
</form>