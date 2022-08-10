<?php
	$id	= $_GET['id'];
	$order_data	=	sql::Select_single("SELECT * FROM ak_user_order where order_id='$id'");

?>
<table width="100%">
  <tr>
    <td align="left" class="site-State">Edit Order </td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left"><form name="new_cat" action="home.php?modules=users&action=post_order&id=<?=$id;?>" method="post" enctype="multipart/form-data">
        <table width="100%" cellpadding="3" cellspacing="0">			
          <tr>
            <td width="15%" align="left">Transaction ID:</td>
            <td width="85%" align="left">
			<input type="text" name="transaction_id" size="30" value="<?= $order_data['transaction_id'];?>" disabled="disabled"  /></td>
          </tr>
          <tr>
            <td width="15%" align="left">Order No: </td>
			<td><input type="text" name="order_no" id="order_no" size="30" value="<?= $order_data['order_number'];?>" disabled="disabled" /></td>
          </tr>
          <tr>
            <td width="15%" align="left">Order Date: </td>
            <td width="85%" align="left"><input type="text" name="order_date" id="order_date" size="30" value="<?= $order_data['order_date'];?>" disabled="disabled"/></td>
          </tr>			  
          			  
          <tr>
            <td width="15%" align="left">Invoice Amount  </td>
            <td width="85%" align="left"><input type="text" name="invoice_amount" id="invoice_amount" size="30" value="<?= $order_data['invoice_amount'];?>" disabled="disabled" /></td>
          </tr>
          <tr>
            <td align="left" valign="top">Latest Situation: </td>
            <td align="left"><textarea name="situation" cols="40" rows="10"><?=$order_data['order_active'];?>
            </textarea></td>
          </tr>
          <tr>
            <td align="left">&nbsp;</td>
            <td align="left"><input type="submit" value="Update" />
              <input type="reset" value="Cancel"  onclick="javasctipt:history.go(-1);"/></td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
</table>
