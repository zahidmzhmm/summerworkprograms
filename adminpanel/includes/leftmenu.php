<table width="100%" cellpadding="0" style="vertical-align:top;">
    <tr>
        <td class="menu-head" colspan="2">Main Menu</td>
    </tr>
    <tr>
        <td class="menu" colspan="2"><a href="home.php?modules=adminuser&amp;action=adminuser">
                <?php if (@$_GET['modules'] == 'adminuser') echo '<b>Site Configurations </b>'; else echo 'Site Configurations '; ?>
            </a></td>
    </tr>
    <tr>
        <td class="menu" colspan="2"><a href="home.php?modules=users&amp;action=users&pg=1">
                <?php if (@$_GET['modules'] == 'users') echo '<b>  Users  Management </b>'; else    echo '  Users Management'; ?>
            </a></td>
        <?php /*?>  	 <tr>
      <td class="menu" colspan="2"><a href="home.php?modules=order&action=order">
        <?php	if($_GET['modules']=='order')echo '<b>  Order  Management </b>';else	echo '  Order Management'; ?>
      </a></td>
    </tr>
<?php */ ?>
        <?php /*?>    <tr>
	   <td class="menu" colspan="2"><a href="home.php?modules=faq_category&amp;action=category">
	     <?php	if($_GET['modules']=='faq_category')echo '<b> FAQ  Category</b>';else	echo '  FAQ Category '; ?>
	   </a></td>
  </tr> 
  <tr>
	   <td class="menu" colspan="2"><a href="home.php?modules=faq&amp;action=faq">
	     <?php	if($_GET['modules']=='faq')echo '<b> FAQ  Management</b>';else	echo '  FAQ Management '; ?>
	   </a></td>
  </tr> 
<?php */ ?>    </tr>
    <tr>
        <td class="menu" colspan="2"><a href="home.php?modules=appointment&amp;action=view">
                <?php if (@$_GET['modules'] == 'appointment') echo '<b>  Appointment Date Time List </b>'; else    echo '  Appointment Date Time List '; ?>
                <span></span>
            </a></td>
    </tr>
    <tr>
        <td class="menu" colspan="2"><a href="logout.php">
                <?php if (@$_GET['modules'] == 'logout') echo '<b>Logout</b>'; else echo 'Logout'; ?>
            </a></td>
    </tr>


    <!-- <tr>
	   <td class="menu" colspan="2"><a href="home.php?modules=books">
	     <?php if (@$_GET['modules'] == 'books') echo '<b> Management Books</b>'; else    echo ' Management Books  '; ?>
	   </a></td>
  </tr>-->

    </tr>


</table>
