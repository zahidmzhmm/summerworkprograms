<table width="100%" cellpadding="0" style="vertical-align:top;">
    <tr>
        <td class="menu-head" colspan="2">Main Menu</td>
    </tr>
    <tr>
        <td class="menu" colspan="2"><a href="home.php?modules=adminuser&amp;action=adminuser">
                <?php if (@$_GET['modules'] == 'adminuser') echo '<b>Site Configurations </b>'; else echo 'Site Configurations '; ?>
            </a>
        </td>
    </tr>
    <tr>
        <td class="menu" colspan="2"><a href="home.php?modules=users&amp;action=users&pg=1">
                <?php if (@$_GET['modules'] == 'users') echo '<b>  Users  Management </b>'; else    echo '  Users Management'; ?>
            </a>
        </td>
    </tr>
    <tr>
        <td class="menu" colspan="2"><a href="home.php?modules=appointment&amp;action=view">
                <?php if (@$_GET['modules'] == 'appointment') echo '<b>  Appointment Date Time List </b>'; else    echo '  Appointment Date Time List '; ?>
                <span></span>
            </a>
        </td>
    </tr>
    <tr>
        <td class="menu" colspan="2"><a href="logout.php">
                <?php if (@$_GET['modules'] == 'logout') echo '<b>Logout</b>'; else echo 'Logout'; ?>
            </a>
        </td>
    </tr>

</table>
