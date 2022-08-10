<table width="100%">
  <tr>
    <td align="left" class="site-State">Add FAQ </td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left"><form name="new_cat" action="home.php?modules=faq&action=post" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="new" />
        <table width="100%" cellpadding="3" cellspacing="0">

          <tr>
            <td width="15%" align="left">Faq Question: </td>
            <td width="85%" align="left"><input name="name" type="text" id="name" size="120"  /></td>
          </tr>  
          <tr>
            <td width="15%" align="left">Answer : </td>
            <td width="85%" align="left"><textarea name="details" cols="60" rows="10" style="width:70%; height:300px" ></textarea></td>
          </tr>			  	  
          <tr>
            <td width="15%" align="left">Published : </td>
            <td width="85%" align="left"><input type="radio" name="status" value="1" />
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
    </td>
  </tr>
</table>
