<table cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <!-- left items -->
        <td width="20%" class="left-items"><!-- menu -->
            <?php include('includes/leftmenu.php'); ?>
            <!-- end of menu -->
        </td>
        <!-- end of left items -->
        <!-- right items -->
        <td width="80%" class="right-items" valign="top"><!-- table for right items -->
            <?php //include('includes/right-items.php');
            @$module = $_GET['modules'];

            switch ($module) {
                case'books':
                    require_once("modules/$module/$module.php");
                    break;
                case'productquantity':
                    require_once("modules/$module/$module.php");
                    break;
                default:
                    \app\Kernel::redirect();
                    break;

            }
            ?>
            <!-- end of table for right items -->
        </td>
        <!-- end of right items -->
    </tr>
</table>
