<table width="100%">
  <tr>
    <td align="left" class="site-State">Add Site Product Category </td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">[*] Requried Fields</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left"><form name="category" action="home.php?modules=sub_category&amp;action=post" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="new" />
        <table width="100%" cellpadding="3" cellspacing="0">
          		
          <tr>
            <td width="15%" align="left">Category Name : *</td>
            <td width="85%" align="left"><select name="category" id="category">
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
            <td width="15%" align="left">Sub-Category : </td>
            <td width="85%" align="left">
			<input type="text" name="sub_category" id="sub_category" /></td>
          </tr>			  
          			  	  
          <tr>
            <td width="15%" align="left">Published : </td>
            <td width="85%" align="left"><input type="radio" name="status" value="1" checked="checked" />
              &nbsp;Yes&nbsp;
              <input type="radio" name="status" value="0">
              &nbsp;No&nbsp; </td>
          </tr>
          <tr>
            <td align="left">&nbsp;</td>
            <td align="left"><input type="submit" value="Submit" />
              <input type="reset" value="Cancel"  onclick="javasctipt:history.go(-1);"/></td>
          </tr>
        </table>
      </form>
	  <script language="JavaScript" type="text/javascript">
//You should create the validator only after the definition of the HTML form
 var frmvalidator = new Validator("category");
 frmvalidator.addValidation("name","req","Please enter your menu name");
 frmvalidator.addValidation("pagetype","req","Please select page type");
 frmvalidator.addValidation("status","req","Please select option");
 
</script>
    </td>
  </tr>
</table>
