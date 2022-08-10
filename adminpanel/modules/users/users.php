<?php

$sort=@$_GET["sort"]?$_GET["sort"]:"users_id asc";
$keywords=@$_GET["keywords"]?$_GET["keywords"]:"";
$conditions="fname LIKE '%$keywords%' OR lname LIKE '%$keywords%' OR email LIKE '%$keywords%'";

$page_size    = 15;
$current_page = @$_GET["pg"] ? $_GET["pg"] : 1;
$offset=$page_size*($current_page-1);

$query_records=Member::find_by_sql("select count(*) num_rows from tbl_member  where $conditions");
$total_records=$query_records[0]->num_rows;
$user_data = Member::find( "all", array('conditions' => $conditions, "order"=>$sort, "limit"=>$page_size, "offset"=>$offset) );



//var_dump($p_data);
?>
<style type="text/css">
    <!--
    .style1 {
        font-weight: bold
    }

    -->
</style>

<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="right">
            <form action="home.php" method="get">
                <input type="hidden" name="modules" value="users">
                <input type="hidden" name="action" value="users">

                <table width="100%" border="0" cellpadding="0">
                    <tr>
                        <td width="15%"><strong>Sort: </strong>
                            <select name="sort" id="sort" size="1">
                                <option value="users_id" <?php if ( $sort == 'users_id' ) {
									echo "selected";
								} ?>> -- select --
                                </option>
                                <option value="fname" <?php if ( $sort == 'fname' ) {
									echo "selected";
								} ?>>Name
                                </option>
                                <option value="gender" <?php if ( $sort == 'gender' ) {
									echo "selected";
								} ?>>Gender
                                </option>
                                <option value="email" <?php if ( $sort == 'email' ) {
									echo "selected";
								} ?>>Email
                                </option>
                                <option value="date_joined" <?php if ( $sort == 'date_joined' ) {
									echo "selected";
								} ?>>Date Joined
                                </option>
                                <option value="status" <?php if ( $sort == 'status' ) {
									echo "selected";
								} ?>>Status
                                </option>
                            </select></td>
                        <td width="17%"><strong>Keywords: </strong>
                            <input type="text" name="keywords" value="<?=$keywords?>"/></td>
                        <td width="68%"><input type="submit" value="Search"/></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <tr>
        <td colspan="2"><!-- Category display box -->

            <table width="100%" cellpadding="5" cellspacing="1" class="item-details">
                <tr class="bar">
                    <td>Sn.</td>
                    <td>Full Name</td>
                    <td>Gender</td>
                    <td>Email</td>
                    <td>Registered Date</td>
                    <td>Latest Status</td>

                    <td colspan="2">Action</td>
                </tr>
				<?php
				if ( sizeof( $user_data ) ) {
					$counter = ($current_page-1) * $page_size;
					foreach ( $user_data as $user_item ) {
						$counter ++;


						?>
                        <tr>
                            <td align="center"><?= $counter; ?></td>
                            <td><?php echo trim(ucwords( $user_item->fname )); ?> <?php echo trim(ucwords( $user_item->midname )); ?> <?php echo trim(ucwords( $user_item->lname )); ?></td>
                            <td> <?= ucwords( $user_item->gender ); ?></td>
                            <td><?= $user_item->email; ?></td>
                            <td><a href="#">
									<?= $user_item->date_joined->format( "Y-m-d" ); ?>
                                </a></td>
                            <td><?php echo $user_item->status; ?></td>

                            <td align="left"><span class="style1"><a
                                            href="home.php?modules=users&action=edit&id=<?= $user_item->users_id; ?>"
                                            title="Edit this  Users"><!--Edit Info--></a><!--&nbsp;&nbsp;|-->&nbsp;&nbsp;<a
                                            href="home.php?modules=users&action=status_edit&id=<?= $user_item->users_id; ?>&pg=<?= @$_REQUEST["pg"] ?>"
                                            title="Edit this Menu" class="detail">Edit Status</a>&nbsp;&nbsp;<a
                                            href="home.php?modules=users&action=participant_statement_edit&id=<?= $user_item->users_id; ?>&pg=<?= @$_REQUEST["pg"] ?>"
                                            title="Edit this Menu" class="detail">Edit Participant Statement</a>

          &nbsp;&nbsp;
          <a href="home.php?modules=users&action=app_edit&id=<?= $user_item->users_id; ?>&pg=<?= @$_REQUEST["pg"] ?>"
             title="Edit this Menu" class="detail">Edit Appointment</a>


            &nbsp;&nbsp;|&nbsp;&nbsp;<a href="home.php?modules=users&action=details&usersid=<?= $user_item->users_id; ?>&pg=<?= @$_REQUEST["pg"] ?>"
                                        title="Click on Users Details Information">Details</a> &nbsp;&nbsp;|&nbsp;&nbsp;<a
                                            href="home.php?modules=users&action=delete&id=<?= $user_item->users_id; ?>&pg=<?= @$_REQUEST["pg"] ?>"
                                            title="Delete this Users"
                                            onclick="javascript: if(!confirm('Are you sure to delete this Users?')) return false;">Delete</a>

            &nbsp;|&nbsp;&nbsp;<a href="home.php?modules=users&action=upload_doc&usersid=<?= $user_item->users_id; ?>&pg=<?= @$_REQUEST["pg"] ?>"
                                  title="Upload Document">Upload Documents</a>


                  |  <a href="<?= "../userform.php?id=" . $user_item->users_id ?>" download>Download user form</a> &nbsp;|&nbsp;&nbsp;
                  <a href="<?= "home.php?modules=upload_documents&action=view&id=" . $user_item->users_id ?>">Upload Documents List</a> |
                  <a href="<?= "home.php?modules=support_documents&action=view&id=" . $user_item->users_id ?>">Support Documents List</a>
            </span>


                            </td>
                        </tr>
					<?php }
				} ?>
                <tr>
                    <td colspan="8" align="center"><?php

                        echo paging_control("home.php?modules=users&action=users",  $total_records, $page_size, $current_page );
//						if ( $paging_data['paging'] ) {
//							echo $paging_data['paging'];
//						}

						?></td>
                </tr>
            </table>

            <!-- end of Category display box --></td>
    </tr>
</table>
