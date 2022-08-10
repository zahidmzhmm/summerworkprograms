<?php
if(!isset($_GET['upto']))
$upto=10;
else
$upto=$_GET['upto'];

$product_sql="select * from tbl_customer order by customer_id desc";
if($_GET['upto']!='All')
$product_sql.=" limit $upto";
$p_data=sql::Query_select($product_sql);


//var_dump($p_data);
?>

<table width="100%" cellpadding="5" cellspacing="1" class="item-details">
                                    	<tr class="bar">
                                        	<td>&nbsp; </td>
                                        	<td>Customer Name</td>
                                        	<td>Email</td>
                                        	<td>Country</td>
                                        	<td>Telephone</td>
                                            <td>Status</td>
                                            <td>Action</td>
                                        </tr>
                                    	
                                    	
                                    			<?php
												$i=1;
					foreach($p_data as $p_item) {?>
					<tr>
					
					<td align="left"><?= $i.' )';  $i++; ?></td>
					<td align="left"><?= $p_item['customer_name'];?></td>
                    
                    <td align="left"><?= $p_item['customer_email'];?></td>
					<td align="left"><?= $p_item['customer_country'];?></td>
					<td align="left"><?= $p_item['customer_tel'];?></td>
					<td align="left">
					
					<a href="home.php?modules=users&action=post&user=normal&status=<?= $p_item['customer_status'];?>&id=<?= $p_item['customer_id'];?>">
					<?php if($p_item['customer_status']=='Disabled') 
					echo '<font color="red">'.$p_item['customer_status'].'</font>';
					else 
					echo $p_item['customer_status']; ?> </a></td>
					
					
                                    	  
<td align="left"><a href="home.php?modules=users&action=post&user=normal&ac=delete&id=<?= $p_item['customer_id'];?>" title="Delete this customer" onclick="javascript: if(!confirm('Are you sure to delete this record?')) return false;"><img src="images/dele.jpg" alt="Remove" /></a></td>
                                  	  </tr>
                                    	<?php } ?>
										
										
										
										
										
										
										
										
										
                                    </table>
									
<div align="center">
Dispaly 
<select name="upto" id="upto" onChange="javascript: paging();">
<option <?php if($upto=='10') echo 'selected="selected"';?> value="10">10</option>
<option  <?php if($upto=='20') echo 'selected="selected"';?> value="20">20</option>
<option  <?php if($upto=='50') echo 'selected="selected"';?> value="50">50</option>
<option  <?php if($upto=='100') echo 'selected="selected"';?> value="100">100</option>
<option   <?php if($upto=='All') echo 'selected="selected"';?>value="All">All</option>
</select>
<input type="hidden"  id="modules" value="<?=$_GET['modules'];?>">
<input type="hidden"   id="action" value="<?=$_GET['action'];?>">
<input type="hidden"   id="action" value="<?=$_GET['action'];?>">





</div>									