		<?php
	
	$user_id=$_GET['id'];
	
	

	
	echo $order_sql="SELECT * FROM tbl_payment_order WHERE users_id='$user_id' ORDER BY payment_date DESC";
	$url='index.php?goto=myorders&pg=';
	$paging_data=paging_admin($order_sql,$url);
	$order_data=sql::Query_select($paging_data['query']);
?>	

		 <p class="top_border">
		 <?php $user_sql="SELECT * FROM tbl_member WHERE users_id='$user_id'";
				$user_sql=sql::Select_single($user_sql); ?>
	
		  <?=ucfirst($user_sql['firstname']);?> <?=ucfirst($user_sql['lastname']);?> Payment Details</p>
                   
                   
                     <!--.....................containt_main_start......................... -->
                     <div class="containt_main">
                       <div class="my_account">
                        
			             <div class="my_account_content">  
                           <div class="my_account_left">
                              
                           </div>
						  
                           		<div class="my_orders_right">
                                <table width="100%" cellpadding="0" cellspacing="0">
 
  <tr>
    <td colspan="2"><!-- Category display box -->
      <table width="100%" cellpadding="5" cellspacing="1" class="item-details">
        <tr class="bar">
          <td width="4%">Sn. </td>
		   <td width="6%">Name</td>
          <td width="7%"> Reference Id</td>
          <td width="9%"> Fee Category</td>
          <td width="10%">Payment Method</td>
          <td width="9%">SEVP Fee</td>
          <td width="13%">MySEVISFee.com Fee</td>
          <td width="9%">Total Amount</td>
          
          <td width="8%">Payment  Date</td>
          <td width="7%">Latest Status</td>
		  <td width="18%">I-901 Details</td>
          
        </tr>
        <?php
		if(is_array($order_data)){
			$counter=0;
			foreach($order_data as $order_item) { $counter++;?>
        <tr>
          <td align="center"><?= $counter;?></td>
		  <td><?php 
		  		$users_id=$order_item['users_id'];
		  		$user_sql="SELECT * FROM tbl_member WHERE users_id='$users_id'";
				$user_sql=sql::Select_single($user_sql); ?>
	
		  <?=ucfirst($user_sql['firstname']);?> <?=ucfirst($user_sql['lastname']);?></td>
          <td><?= $order_item['ref_id'];   ?></td>
          <td><?= $order_item['payment_category'];?></td>
          <td><?= $order_item['payment_method'];?></td>
          <td>$<?= $order_item['total_sevis_fee'];?></td>
          <td>$<?= $order_item['mysevis_fee'];?></td>
          <td>$<?= $order_item['total_amount'];?></td>
          <td>
            <?= $order_item['payment_date'];?>           </td>
          <td> 
            <a href="home.php?modules=users&action=order_status&status=<?= $order_item['status'];?>&id=<?= $order_item['order_id'];?>">
              <?php echo ucwords($order_item['status']); ?>
              </a>
          </td>
		   <td> 
		     <a href="home.php?modules=users&action=orders_details&id=<?=$order_item['I901_id'];?>&users_id=<?=$order_item['users_id']?>" title="Delete this Menu" class="detail"><strong>I-901 Details</strong></a>| <a href="home.php?modules=users&action=status_edit&id=<?=$order_item['order_id'];?>" title="Edit this Menu" class="detail"><strong>Edit Status</strong></a>| <a href="home.php?modules=users&action=delete_order&id=<?= $order_item['users_id'] ;?>" title="Delete this Users" onclick="javascript: if(!confirm('Are you sure to delete this order?')) return false;"><strong>Delete</strong></a>
		     
		     </td>
          
       	 </tr>
		 
        	<?php 
			}
			
		}else{ ?>
			
		No orders have been made
		
		<?php
		
		}?>
        <tr>
          <td colspan="10"  align="center"><?php
if($paging_data['paging'])
echo $paging_data['paging'];

?>          </td>
        </tr>
      </table>
      <!-- end of Category display box -->
    </td>
  </tr>
</table>

								 
								 
								 <div >
                                    
                                </div>
                           </div>
						   
                          </div>
                     </div>
					 </div>
					