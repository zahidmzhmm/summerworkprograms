<?php
$id = $_GET['id'];
$user_data = sql::Select_single("SELECT * FROM tbl_member where users_id='$id'");

?>
<table width="100%">
    <tr>
        <td align="left" class="site-State">Edit Users Information</td>
        <td align="left">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3" align="left">
            <form name="user" action="home.php?modules=users&action=post&id=<?= $id; ?>" method="post"
                  enctype="multipart/form-data">
                <table width="100%" cellpadding="3" cellspacing="0">
                    <tr>
                        <td width="15%" align="left">Gender</td>
                        <td width="85%" align="left"><span class="form_field">
              <select name="gender" class="txt_field_1">
                <option value=""> --- Select one --- </option>
                <option value="male" <? if ($user_data['gender'] == 'male'){ ?>selected="selected"<? } ?>>Male</option>
                <option value="female"
                        <? if ($user_data['gender'] == 'female'){ ?>selected="selected"<? } ?>>Female</option>
              </select>
            </span></td>
                    </tr>
                    <tr>
                        <td align="left">First Name</td>
                        <td align="left"><input type="text" name="firstname" size="40"
                                                value="<?= $user_data['firstname']; ?>"/></td>
                    </tr>
                    <tr>
                        <td align="left">Last Name</td>
                        <td align="left"><input type="text" name="lastname" size="40"
                                                value="<?= $user_data['lastname']; ?>"/></td>
                    </tr>
                    <tr>
                        <td align="left">Email</td>
                        <td align="left"><input type="text" name="email" size="40" value="<?= $user_data['email']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">Date of Birth</td>
                        <td align="left"><span class="form_field">
              <select name="month_dob" id="month_dob">
                <option value="">Month</option>
                <option value="January" <? if ($user_data['dob_month'] == 'January'){ ?>selected="selected"<? } ?>>January</option>
                <option value="February" <? if ($user_data['dob_month'] == 'February'){ ?>selected="selected"<? } ?>>February</option>
                <option value="March"
                        <? if ($user_data['dob_month'] == 'March'){ ?>selected="selected"<? } ?>>March</option>
                <option value="April"
                        <? if ($user_data['dob_month'] == 'April'){ ?>selected="selected"<? } ?>>April</option>
                <option value="May" <? if ($user_data['dob_month'] == 'May'){ ?>selected="selected"<? } ?>>May</option>
                <option value="June"
                        <? if ($user_data['dob_month'] == 'June'){ ?>selected="selected"<? } ?>>June</option>
                <option value="July"
                        <? if ($user_data['dob_month'] == 'July'){ ?>selected="selected"<? } ?>>July</option>
                <option value="August"
                        <? if ($user_data['dob_month'] == 'August'){ ?>selected="selected"<? } ?>>August</option>
                <option value="September" <? if ($user_data['dob_month'] == 'September'){ ?>selected="selected"<? } ?>>September</option>
                <option value="October" <? if ($user_data['dob_month'] == 'October'){ ?>selected="selected"<? } ?>>October</option>
                <option value="November" <? if ($user_data['dob_month'] == 'November'){ ?>selected="selected"<? } ?>>November</option>
                <option value="December" <? if ($user_data['dob_month'] == 'December'){ ?>selected="selected"<? } ?>>December</option>
              </select>
              <select name="day_dob" id="day_dob">
                <option value="">Day</option>
                <?PHP
                for ($i = 1; $i <= 31; $i++) {
                    $selected = ($user_data['dob_day'] == $i) ? "selected=\"selected\"" : "";
                    echo '<option value="' . $i . '" "' . $selected . '">' . $i . '</option>';
                }
                ?>
              </select>
              <select name="year_dob" id="year_dob">
                <option value="">- Years - </option>
                <?PHP
                for ($year = date('Y'); $year >= 1909; $year--) {
                    $selected = ($user_data['dob_year'] == $year) ? "selected=\"selected\"" : "";
                    echo '<option value="' . $year . '" "' . $selected . '">' . $year . '</option>';
                }
                ?>
              </select>
            </span></td>
                    </tr>
                    <tr>
                        <td align="left">Age</td>
                        <td align="left"><input type="text" name="age" size="40" value="<?= $user_data['age']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">Gender</td>
                        <td align="left"><input type="text" name="gender" size="40"
                                                value="<?= $user_data['gender']; ?>"/></td>
                    </tr>
                    <tr>
                        <td align="left">Place of Birth</td>
                        <td align="left">
                            <input type="text" name="birth_country " size="40"
                                   value="<?= $user_data['birth_country ']; ?>"/></td>
                    </tr>
                    <tr>
                        <td align="left">Date of Birth</td>
                        <td align="left"><span class="form_field">
              <select name="month_dob" id="month_dob">
                <option value="">Month</option>
                <option value="January" <? if ($user_data['dob_month'] == 'January'){ ?>selected="selected"<? } ?>>January</option>
                <option value="February" <? if ($user_data['dob_month'] == 'February'){ ?>selected="selected"<? } ?>>February</option>
                <option value="March"
                        <? if ($user_data['dob_month'] == 'March'){ ?>selected="selected"<? } ?>>March</option>
                <option value="April"
                        <? if ($user_data['dob_month'] == 'April'){ ?>selected="selected"<? } ?>>April</option>
                <option value="May" <? if ($user_data['dob_month'] == 'May'){ ?>selected="selected"<? } ?>>May</option>
                <option value="June"
                        <? if ($user_data['dob_month'] == 'June'){ ?>selected="selected"<? } ?>>June</option>
                <option value="July"
                        <? if ($user_data['dob_month'] == 'July'){ ?>selected="selected"<? } ?>>July</option>
                <option value="August"
                        <? if ($user_data['dob_month'] == 'August'){ ?>selected="selected"<? } ?>>August</option>
                <option value="September" <? if ($user_data['dob_month'] == 'September'){ ?>selected="selected"<? } ?>>September</option>
                <option value="October" <? if ($user_data['dob_month'] == 'October'){ ?>selected="selected"<? } ?>>October</option>
                <option value="November" <? if ($user_data['dob_month'] == 'November'){ ?>selected="selected"<? } ?>>November</option>
                <option value="December" <? if ($user_data['dob_month'] == 'December'){ ?>selected="selected"<? } ?>>December</option>
              </select>
              <select name="day_dob" id="day_dob">
                <option value="">Day</option>
                <?PHP
                for ($i = 1; $i <= 31; $i++) {
                    $selected = ($user_data['dob_day'] == $i) ? "selected=\"selected\"" : "";
                    echo '<option value="' . $i . '" "' . $selected . '">' . $i . '</option>';
                }
                ?>
              </select>
              <select name="year_dob" id="year_dob">
                <option value="">- Years - </option>
                <?PHP
                for ($year = date('Y'); $year >= 1909; $year--) {
                    $selected = ($user_data['dob_year'] == $year) ? "selected=\"selected\"" : "";
                    echo '<option value="' . $year . '" "' . $selected . '">' . $year . '</option>';
                }
                ?>
              </select>
            </span></td>
                    </tr>
                    <tr>
                        <td align="left">Email</td>
                        <td align="left"><span class="form_field">
              <input type="text" name="email" id="email" value="<?= $user_data['email']; ?>" class="text_f"/>
            </span></td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left">Password :</td>
                        <td align="left"><input type="password" name="password" size="20"
                                                value="<?= $user_data['password']; ?>" maxlength="20"/></td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left"><input type="submit" value="Update"/>
                            <input type="reset" value="Cancel" onclick="javasctipt:history.go(-1);"/></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
<script language="JavaScript" type="text/javascript">
    //You should create the validator only after the definition of the HTML form
    var frmvalidator = new Validator("user");
    frmvalidator.addValidation("gender", "req", "please Select Gender");
    frmvalidator.addValidation("firstname", "req", "Please Type Firstname");
    frmvalidator.addValidation("lastname", "req", "Please Type Last Name");
    frmvalidator.addValidation("email", "req", "Please Type email");
    frmvalidator.addValidation("month_dob", "req", "Please select Month");
    frmvalidator.addValidation("day_dob", "req", "Please select Day");
    frmvalidator.addValidation("year_dob", "req", "Please select Year");
    frmvalidator.addValidation("country", "req", "Please select country");

    frmvalidator.addValidation("password", "req", "please Type Password");
    frmvalidator.addValidation("access_level", "req", "Please select Access Level");

</script>
             
