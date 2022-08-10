<?php
include('defines/errors.php');
@$error_data=$errors[$_GET['error']];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log-In Admin</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script language="javascript" src="javascript/admin_check.js"></script>
</head>
<body>
<!-- main table -->
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td class="bar"><table cellpadding="0" cellspacing="0" border="0" align="left">
        <tr>
          <td class="bar-links">Welcome to Admin Panel</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center" class="mainbody"><table cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td width="80%" class="log-in-container" valign="top"><form name="admin" method="post" enctype="multipart/form-data" action="checklogin.php" onSubmit="jacascript: return check();">
              <table width="24%" class="log-in-box" align="center" cellpadding="5" cellspacing="0">
                <tr>
                  <th colspan="2" class="site-State" align="center">Log In Please</th>
                </tr>
                <tr>
                  <td colspan="2" class="log-in-error"><?php echo $error_data; ?></td>
                </tr>
                <tr>
                  <td>User Name : </td>
                  <td><input type="text" name="user_name"  /></td>
                </tr>
                <tr>
                  <td>Password : </td>
                  <td><input type="password" name="user_password" /></td>
                </tr>
                <tr>
                  <td colspan="2" align="center"><center><input type="submit" class="btnStyle" value="Log In" /></center></td>
                </tr>
              </table>
            </form></td>
        </tr>
      </table></td>
  </tr>
  <!-- end of mainbody -->
  <!-- footer -->
  <tr>
    <td><table width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <td class="footer"> </td>
        </tr>
        <tr>
          <td align="center"></td>
        </tr>
      </table></td>
  </tr>
  <!-- end of footer -->
</table>
<!-- end of main table -->
</body>
</html>
