
<?php if(!isset($_GET['id'])) {?>
<table width="100%">
                	<tr class="site-State">
                    	<td>Add New User</td>
                        <td align="right">
                        	
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="3" valign="top">
                        <!-- add-new category -->
 <form name="new_cat" action="home.php?modules=users&action=post" method="post" enctype="multipart/form-data">
 <input type="hidden" name="action" value="new" />
                        <table width="100%" cellpadding="3" cellspacing="0" class="item-details">
                        	<tr>
                            	<td width="15%" valign="middle">Username : </td>
                                <td width="85%" valign="middle"><input type="text" name="user_name" size="40" /></td>
                            </tr>
							<tr>
                            	<td width="15%" valign="middle">User Fullname : </td>
                                <td width="85%" valign="middle"><input type="texzt" name="user_fullname" size="40" /></td>
                            </tr>		
							<tr>
                            	<td width="15%" valign="middle">User Type : </td>
                                <td width="85%" valign="middle"><input type="radio" name="user_type" value="admin">&nbsp;Admin&nbsp;<input type="radio" name="user_type" value="general">&nbsp;General&nbsp;</td>
                            </tr>	
							<td width="15%" valign="middle">User Gender : </td>
                            <td width="85%" valign="middle"><input type="radio" name="user_gender" value="Male">&nbsp;Male&nbsp;<input type="radio" name="user_gender" value="Female">&nbsp;Female&nbsp;</td>
                            </tr>				
                        	<tr>
                        	  <td valign="middle">User Country : </td>
                        	  <td valign="middle"><input type="text" name="user_country" size="40" /></td>
							  </tr>
							   <td valign="middle">User State : </td>
                        	  <td valign="middle"><input type="text" name="user_state" size="40" /></td>
							  </tr>
							   <td valign="middle">User City : </td>
                        	  <td valign="middle"><input type="text" name="user_city" size="40" /></td>
							 </tr>
							  <td valign="middle">Post Code : </td>
                        	  <td valign="middle"><input type="text" name="post_code" size="40" /></td>
							  </tr>
							  <td valign="middle">User Email : </td>
                        	  <td valign="middle"><input type="text" name="user_email" size="40" /></td>
							  </tr>
							  <td valign="middle">User Telephone: </td>
                        	  <td valign="middle"><input type="text" name="user_telephone" size="40" /></td>
							  </tr>
							  <td width="15%" valign="middle">User status : </td>
                                <td width="85%" valign="middle"><input type="radio" name="user_status" value="Enabled">&nbsp;Enable&nbsp;<input type="radio" name="user_status" value="Disabled">&nbsp;Disable&nbsp;
								</td>
								</tr>
                        	<tr>
							 <td valign="middle">User Password: </td>
                        	  <td valign="middle"><input type="password" name="user_password" size="40" /></td>
							  </tr>
                        	  <td valign="middle">User Image : </td>
                        	  <td valign="middle"><input type="file" name="user_image" /></td>
                      	  </tr>
                        	<tr>
                        	  <td valign="middle"><input type="submit" value="Submit" /></td>
                        	  <td valign="middle"><input type="reset" value="Cancel"  onclick="javasctipt:history.go(-1);"/></td>
                      	  </tr>
                        </table>
                        </form>
                        <!-- end of add-new category -->
                        </td>
                    </tr>
                </table>
				
				
<?php }  else { 

$id=$_GET['id'];
$user_data=sql::Select_single("SELECT * FROM tbl_users where user_id='$id'");
$image_dir='../images/';
$image=$image_dir.$user_data['user_image'];

// var_dump($cat_data);
?>				
				
		<table width="100%">
                	<tr class="site-State">
                    	<td>Edit User</td>
                        <td align="right">
                        	<!-- search and all -->
                        	
                            <!-- end of search and all -->
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="3" valign="top">
                        <!-- add-new category -->
 <form name="new_cat" action="home.php?modules=users&action=post&id=<?= $id;?>" method="post" enctype="multipart/form-data" >
 
<input type="hidden" name="pre_image" value="<?php echo $user_data['user_image'];?>" />
 
                        <table width="100%" cellpadding="3" cellspacing="0" class="item-details">
                        	<tr>
                            	<td width="15%" valign="middle">User Name : </td>
                                <td width="85%" valign="middle"><input type="text" name="user_name" size="40" value="<?= $user_data['user_name'];?>" /></td>
                            </tr>
							<tr>
                            	<td width="15%" valign="middle">User Fullname :</td>
                                <td width="85%" valign="middle"><input type="text"
								name="user_fullname" size="40" value="<?= $user_data['user_fullname'];?>" />
								</td>
                            </tr>
							<tr>
                            	<td width="15%" valign="middle">User Type :</td>
                                <td width="85%" valign="middle">
								<?php
								if($user_data['user_type'] == "admin")
								{
								?>
								<input type="radio"	name="user_type" value="admin" checked="checked">&nbsp;Admin&nbsp;<input type="radio" name="user_type" value="general">&nbsp;General&nbsp;
								<?php
								}
								else
								{
								?>
								<input type="radio"	name="user_type" value="admin">&nbsp;Admin&nbsp;<input type="radio" name="user_type" value="general" checked="checked">&nbsp;General&nbsp;
								<?php
								}
								?>
								</td>
                            </tr>
							<tr>
                            	<td width="15%" valign="middle">User Gender</td>
                                <td width="85%" valign="middle">
								<?php
								if($user_data['user_gender'] == "Male")
								{
								?>
								<input type="radio"	name="user_gender" value="Male" checked="checked">&nbsp;Male&nbsp;<input type="radio" name="user_gender" value="Female">&nbsp;Female&nbsp;
								<?php
								}
								else
								{
								?>
								<input type="radio"	name="user_gender" value="Male">&nbsp;Male&nbsp;<input type="radio" name="user_gender" value="Female" checked="checked">&nbsp;Female&nbsp;
								<?php
								}
								?>
								</td>
                            </tr>
							<tr>
                            	<td width="15%" valign="middle">User Country</td>
                                <td width="85%" valign="middle"><input type="text"
								name="user_country" size="40" value="<?= $user_data['user_country'];?>" />
								</td>
                            </tr>
								<tr>
                            	<td width="15%" valign="middle">User State</td>
                                <td width="85%" valign="middle"><input type="text"
								name="user_state" size="40" value="<?= $user_data['user_state'];?>" />
								</td>
                            </tr>
							</tr>
								<tr>
                            	<td width="15%" valign="middle">User City</td>
                                <td width="85%" valign="middle"><input type="text"
								name="user_city" size="40" value="<?= $user_data['user_city'];?>" />
								</td>
                            </tr>
							</tr>
								<tr>
                            	<td width="15%" valign="middle">User Post Code</td>
                                <td width="85%" valign="middle"><input type="text"
								name="post_code" size="40" value="<?= $user_data['post_code'];?>" />
								</td>
                            </tr>
							</tr>
								<tr>
                            	<td width="15%" valign="middle">User Email</td>
                                <td width="85%" valign="middle"><input type="text"
								name="user_email" size="40" value="<?= $user_data['user_email'];?>" />
								</td>
                            </tr>
							</tr>
								<tr>
                            	<td width="15%" valign="middle">User Telephone</td>
                                <td width="85%" valign="middle"><input type="text"
								name="user_telephone" size="40" value="<?= $user_data['user_telephone'];?>" />
								</td>
                            </tr>
							</tr>
								<tr>
                            	<td width="15%" valign="middle">User Password</td>
                                <td width="85%" valign="middle"><input type="password"
								name="user_password" size="40" value="<?= $user_data['user_password'];?>" />
								</td>
                            </tr>
							</tr>
                        	<tr>
                        	  <td valign="middle">User Image : </td>
                        	  <td valign="middle"><input type="file" name="user_image"  value="<?php echo $image;?>" />
							  <input type="hidden" name="image" value="<?php echo $user_data['user_image'];?>" /></td>
                      	  </tr>
                        	<tr>
                        	  <td valign="middle"><input type="submit" value="Edit" /></td>
                        	  <td valign="middle"><input type="reset" value="Cancel"  onclick="javasctipt:history.go(-1);"/></td>
                      	  </tr>
                        </table>
                        </form>
                        <!-- end of add-new category -->
                        </td>
                    </tr>
                </table>		
				
	<?php } ?>			
				
				