<?php
//$user_sql="SELECT * FROM tbl_admin ORDER BY user_id DESC";

$url='home.php?moduels=faq&action=faq&pg=';
//$paging_data=paging_admin($user_sql,$url);
//$user_data=sql::Query_select($paging_data['query']);
$user_data=Admin::find("all");

//var_dump($p_data);
?>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><!-- Category display box -->
      <table width="100%" cellpadding="5" cellspacing="1" class="item-details">
        <tr class="bar">
          <td>Sn. </td>
          <td>Title</td>
          <td>Email</td>
          <td>Registered Date</td>
          <td colspan="2">Action</td>
        </tr>
        <?php
			if(is_array($user_data)){
			$counter=0;
			foreach($user_data as $user_item) { $counter++;?>
        <tr>
          <td align="center"><?= $counter;?></td>
          <td><a href="#">
            <?= $user_item->title;?>
            </a></td>
          <td><a href="#">
            <?= $user_item->fromemail;?>
          </a></td>
          <td><a href="#">
            <?= $user_item->date->format("y-m-d");?>
            </a></td>
          <td align="left" ><a href="home.php?modules=adminuser&action=edit&id=<?= $user_item->user_id;?>" title="Edit this Administrator Users"><strong>Edit</strong></a> </td>
        </tr>
        <?php } 
		
		}?>
        <tr>
          <td colspan="5"  align="center">&nbsp;</td>
        </tr>
      </table>
      <!-- end of Category display box -->
    </td>
  </tr>
</table>
