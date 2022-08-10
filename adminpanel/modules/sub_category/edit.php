<?php
	$id	= $_GET['id'];
	$user_data	=	sql::Select_single("SELECT * FROM kyl_category where category_id='$id'");

?>
<table width="100%">
  <tr>
    <td align="left" class="site-State">Edit Product Category </td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">[*] Requried Fields</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left"><form name="new_cat" action="home.php?modules=sub_category&amp;action=post&amp;id=<?= $id;?>" method="post" enctype="multipart/form-data">
        <table width="100%" cellpadding="3" cellspacing="0">
          	          <tr>
            <td width="15%" align="left">Category  Name  :</td>
            <td width="85%" align="left">
			<select name="category" id="category">
              <?PHP
					$query = "SELECT * FROM kyl_product_category WHERE status='1' ORDER BY category_id DESC";
					$menu = sql::Query_select($query);
					if(is_array($menu)){
					foreach($menu as $data){
					echo '<option value="'.$data['category_id'].'">'.$data['name'].'</option>';					//$submenu = "SELECT * FROM kyl_menu WHERE parent_id='".$data['menu_id']."'";
//					$listsubmenu = sql::Query_select($submenu);
//					if(is_array($listsubmenu)){
//						foreach($listsubmenu as $listmenu){
//							echo  '<option value="'.$listmenu['category_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &raquo; &nbsp;'.$listmenu['name'].'</option>';
//						}
//					}
				}
				}
			?>
            </select></td>
          </tr>		
          <tr>
            <td width="15%" align="left"> *Sub-Categroy Name  : </td>
            <td width="85%" align="left">
			<input type="text" name="sub_category" size="60" value="<?= $user_data['category_name'];?>"  /></td>
          </tr>
          
		  
		  
			  
          			  
          <tr>
            <td width="15%" align="left">Published : </td>
            <td width="85%" align="left">
			<?php 
				$yes = "";
				$no = "";
				if($user_data['status'] == 1){
					$yes = "checked";
					$no = "";
				}else{
					$yes = "";
					$no = "checked";
				}
	  		?>
              <input name="status" type="radio" value="1" <?php echo($yes);?> />
              Yes
              <input name="status" type="radio" value="0" <?php echo($no);?> />
              No </td>
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
