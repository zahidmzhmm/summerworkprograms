<?php
$user_sql="SELECT * FROM kyl_category ORDER BY category_id DESC";
$url='home.php?modules=sub_category&action=sub_category&pg=';
$paging_data=paging_admin($user_sql,$url);
$user_data=sql::Query_select($paging_data['query']);

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
          <td>Category Name</td>
          <td>Sub-Category Name</td>
          <td>Registered Date</td>
          <td>Status</td>
          <td colspan="2" width="10%">Action</td>
        </tr>
        <?php
			if(is_array($user_data)){
			$counter=0;
			foreach($user_data as $user_item) { $counter++;?>
        <tr>
          <td align="center"><?= $counter;?></td>
          <td>&nbsp;</td>
          <td><?= $user_item['category_name'];?></td>
          <td>
            <?= $user_item['registered_date'];?>           </td>
          <td> <a href="home.php?modules=sub_category&amp;action=status&amp;status=<?= $user_item['status'];?>&amp;id=<?= $user_item['category_id'];?>">
            <?php if($user_item['status']=='0') 
				echo '<img src="images/no.gif" />';
				
				else 
				echo '<img src="images/yes.jpg" />'; ?>
            </a></td>
          <td align="left" ><a href="home.php?modules=sub_category&amp;action=edit&amp;id=<?= $user_item['category_id'];?>" title="Edit this Menu">Edit</a> &nbsp;&nbsp;|&nbsp;&nbsp;
          <a href="home.php?modules=sub_category&amp;action=delete&amp;id=<?= $user_item['category_id'] ;?>" title="Delete this Menu" onclick="javascript: if(!confirm('Are you sure to delete this Menu?')) return false;">Delete</a></td>
        </tr>
        <?php } }?>
        <tr>
          <td colspan="6"  align="center"><?php
if($paging_data['paging'])
echo $paging_data['paging'];

?>          </td>
        </tr>
      </table>
      <!-- end of Category display box -->
    </td>
  </tr>
</table>
