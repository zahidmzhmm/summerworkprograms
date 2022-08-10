		<?php
	
	$id=$_GET['id'];
	$users_id=$_GET['users_id'];
	

	
	$i901_sql="SELECT * FROM  tbl_i901 WHERE users_id='$users_id' AND id='$id'";
	 $i901_data=sql::Select_single($i901_sql);
	
?>	 <?php echo $i901_data['firstname'];?>

		 <p class="top_border"> <?php $user_sql="SELECT * FROM tbl_member WHERE users_id='$users_id'";
				$user_sql=sql::Select_single($user_sql); ?>
	
		  <?=ucfirst($user_sql['firstname']);?> <?=ucfirst($user_sql['lastname']);?> I-901 Details</p>
                   
                   
                     <!--.....................containt_main_start......................... -->
                     <div class="form_sec1">
                         <h1 class="ur_acc"></h1>
                       <div class="form_sec_main1">
                   
                                 <!--..................................................... -->
                                  <h1 class="information">Personal Information </h1>
								   <div class="form_name" >
                                   <!--<h1 class="f_information">Enter your name exactly as it appears on your Form I-20 or DS-2019</h1>-->
                                       <span class="text_n1" style="margin-left:0px;">Last Name (Surname):</span>
                                        <?php echo $i901_data['lastname'];?>
                                     
                                  </div>
                                  <div class="form_name">
                                   <!--<h1 class="f_information">Enter your name exactly as it appears on your Form I-20 or DS-2019</h1>-->
                                       <span class="text_n1"  style="margin-left:0px;">First Name (Given Name):</span>
                                        <?php echo $i901_data['firstname'];?>
                                     
                                  </div>
                                  <div class="form_name" >
                                   <!--<h1 class="f_information">Enter your name exactly as it appears on your Form I-20 or DS-2019</h1>-->
                                       <span class="text_n1" style="margin-left:0px;">Middle Name :</span>
                                       <?php echo $i901_data['middlename'];?>
                                  </div>
                                  <h1 class="information"> PAYMENT RECEIPT TO BE SENT?</h1>
                               <div class="form_name" style="margin-bottom:0px;">
                             <!--  <h1 class="f_information">Enter the street address to where your payment receipt 
                               should be sent. Include apartment number and Post Office (P.O.) box, if applicable.</h1>-->
                                 <span class="text_n1">Street Address /P.O. Box:</span>
                                <?php echo $i901_data['street_address1'];?>
                                        <span class="text_n1" style="margin-left:30px;">Apartment Number:</span> 
                                          <?php echo $i901_data['appartment_no'];?>
                                        
                         </div>
                                 <div class="form_name" style="margin-bottom:0px;">
                           
                                   <span class="text_n1">Street Address /P.O. Box:</span><span class="form_name" style="margin-bottom:0px;">
                                    <?php echo $i901_data['street_address2'];?>
                             
                                   </span></div>
                                  <div class="form_name"  style="margin-bottom:10px;">
                                 
                                       <span class="text_n1" >City (Province):</span>
                                       <?php echo $i901_data['city'];?><em>*</em>
                                               <span class="text_n1" style="margin-left:75px;">State (Province):</span>
                                               <?php echo $i901_data['state'];?>
                                  </div>
                                  
    <div class="form_name" style="margin-bottom:10px;">
                                    <span class="text_n1" >Country:</span><span class="form_name" ><?php echo $i901_data['country'];?>
                                  
                                    </span><em>*</em></div>
                                    <div class="form_name">
                                       <span class="text_n1" >Zip Code/Postal Code::</span>
                                             <span class="form_name" style="margin-bottom:0px;">
                                             <?php echo $i901_data['postcode'];?></span>
                                             <span class="text_n1" style="padding-left:30px;">Date of Birth:</span>
                                              <?php echo $i901_data['dob_month'];?>, <?php echo $i901_data['dob_day'];?>,<?php echo $i901_data['dob_year'];?>
                                    
                                  </div>
									<div class="form_name">
                                       <span class="text_n1">Gender(Select one):</span>
                                            <span class="" style="margin-left:3px;"> <?php echo $i901_data['gender'];?>
                                          </span>
                                  </div>
                                  <div class="form_name"  style="margin-bottom:0px;">
                                 
                                       <span class="text_n1" style="margin-left:0px;">City (Province) of Birth:</span><span class="form_name" style="margin-bottom:10px;"> <?php echo $i901_data['city_birth'];?>

                                       </span><em>*</em>
                                              
                                  </div>
                                  <div class="form_name" style="margin-bottom:0px;">
                                       <span class="text_n1" style="padding-right:0px;margin-left:0px;">Country of Birth:</span>
                                       <?php echo $i901_data['country_birth'];?>
                                      
                         </div>
                          <div class="form_name" style="margin-bottom:0px;">
                                       <span class="text_n1" style="padding-right:0px;margin-left:0px;">Country of Citizenship:</span>
                                        <?php echo $i901_data['country_citizenship'];?>
                                       
                         </div>
                          <div class="form_name"  style="margin-bottom:60px;">
                                 
                               <span class="text_n1" style="margin-left:0px;">School Code (I-20) (F/M nonimmigrant only):</span>
                               <?php echo $i901_data['school_code'];?>
                               <br /><br />OR
                               <span class="text_n1" style="margin-left:0px;">Program Number (DS-2019) (J-1 nonimmigrant only):</span>
                                <?php echo $i901_data['program_no'];?>
                           </div>
                                   <div class="form_name"  style="margin-bottom:20px;">
                                 
                                       <span class="text_n1" style="margin-left:2px;">SEVIS Identification Number:</span>
                                         <?php echo $i901_data['sevis_is_no'];?>
                                      
                                       <span class="text_n1" style="margin-left:10px;">Passport Number::</span>
                                      <?php echo $i901_data['pass_port_no'];?>
                                    
                                  </div>
								   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td colspan="2">  <span class="text_n1">Amount to be paid:</span>
                                            <span class="text_n_r" style="margin-left:0px;"> <strong>F/M only: </strong></span><?php echo $i901_data['amt_f_only'];?>

                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="4">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="4"><span class="text_n_r" style="margin-left:30px;"><strong>J-1 only:</strong> Indicate your Exchange Visitor Category (Check only one of the following boxes)</span></td>
                                      </tr>
                                    <tr>
                                      <td colspan="4">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="27%" class="text_n_r"><strong>Student ($180)</strong></td>
                                      <td width="22%"><?php echo $i901_data['amt_j_only'];?></td>
                                      <td width="30%" class="text_n_r"><strong>Research Scholar ($180)</strong></td>
                                      <td width="21%"></td>
                                    </tr>
                                    <tr>
                                     <td width="27%" class="text_n_r"><strong>Teacher ($180)</strong></td>
                                      <td width="22%"><input name="amt_j_only" value="3" type="radio" onclick="calculateTotal();" /></td>
                                      <td width="30%" class="text_n_r"><strong>Short-term scholar  ($180)</strong></td>
                                      <td width="21%"><input name="amt_j_only" value="4" type="radio" onclick="calculateTotal();" />&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="27%" class="text_n_r"><strong>Trainee ($180)</strong></td>
                                      <td width="22%"><input name="amt_j_only" value="180" type="radio" onclick="calculateTotal();" /></td>
                                      <td width="30%" class="text_n_r"><strong>Specialist ($180)</strong></td>
                                      <td width="21%"><input name="amt_j_only" value="180" type="radio" onclick="calculateTotal();" />&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="27%" class="text_n_r"><strong>Professor ($180)</strong></td>
                                      <td width="22%"><input name="amt_j_only" value="180" type="radio" onclick="calculateTotal();" /></td>
                                      <td width="30%" class="text_n_r"><strong>Intern ($180)</strong></td>
                                      <td width="21%"><input name="amt_j_only" value="180" type="radio" onclick="calculateTotal();" />&nbsp;</td>
                                    </tr>
                                    <tr>
                                   <td width="27%" class="text_n_r"><strong>Alien Physician ($180)</strong></td>
                                      <td width="22%"><input name="amt_j_only" value="180" type="radio" onclick="calculateTotal();" /></td>
                                      <td width="30%" class="text_n_r"><strong>Summer Work/Travel  ($35)</strong></td>
                                      <td width="21%"><input name="amt_j_only" value="35" type="radio" onclick="calculateTotal();" />&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="27%" class="text_n_r"><strong>Government Visitor ($180)</strong></td>
                                      <td width="22%"><input name="amt_j_only" value="180" type="radio" onclick="calculateTotal();" /></td>
                                      <td width="30%" class="text_n_r"><strong>Camp Counselor ($35)</strong></td>
                                      <td width="21%"><input name="amt_j_only" value="35" type="radio" onclick="calculateTotal();" />&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td width="27%" class="text_n_r"><strong></strong></td>
                                      <td width="22%"></td>
                                      <td width="30%" class="text_n_r"><strong>AuPair ($35) </strong></td>
                                      <td width="21%"><input name="amt_j_only" value="35" type="radio" onclick="calculateTotal();" />&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td colspan="2">&nbsp;</td>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                  </table>
                         
         
                                    <div class="form_name" style="margin-bottom:50px;">
                                       <span class="text_n1">Return Receipt::</span>
         <span class="text_n_r" style="margin-left:0px;"> <strong>Air Mail  </strong></span> <span class="text_n_r" style="margin-left:89px;"> 
         <?php echo $i901_data['deliver_air_mail'];?><br /></span><span class="text_n_r" style="margin-left:0px;">(You must choose one) <strong>Expedited Delivery </strong> <?php echo $i901_data['expedited_delivery'];?></span> <span class="text_n1" style="margin-left:50px;">Telephone:</span>
                                             <?php echo $i901_data['telephone'];?>
                                 </div>
                                  
								  <div class="form_name"  style="margin-bottom:10px;">
                                 
                                       <span class="text_n1" style="margin-left:12px;">Total amount : $</span><span class="form_name" style="margin-bottom:10px;">
                                        <?php echo $i901_data['total_amt'];?>
                                       </span>
                                              
                                  </div>
                                  
                                 <!--....................................................... -->
                                  <!--..................................................... -->
                                  
                                  
							  
                                  <div class="form_name" style="padding-bottom:50px; padding-left:250px;"><br />
								
								  </div>
                
                       </div> 
                   </div>
					