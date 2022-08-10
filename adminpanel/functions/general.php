<?php

function paging_control( $base_url, $total_records, $page_size, $current_page ) {
	$url = $base_url;
	if ( @$_REQUEST["sort"] ) {
		$url .= "&sort=" . $_REQUEST["sort"];
	}
	if ( @$_REQUEST["keywords"] ) {
		$url .= "&keywords=" . $_REQUEST["keywords"];
	}

	$pages = ceil( $total_records / $page_size );
	$pager = "";

	for ( $i = 1; $i <= $pages; $i ++ ) {
		if ( $current_page == $i ) {
			$pager .= "&nbsp;&nbsp;$i&nbsp;&nbsp;";
		} else {
			$url.="&pg=$i";
			$pager .= "<a href='$url'>&nbsp;$i&nbsp;</a>";
		}
	}

	return $pager;
}

function message( $message ) {
	echo "<script language='javascript'>
			alert('$message');
		</script>";
}

function return_to_page( $page ) {
	echo "<script language='javascript'>window.location.href='$page'
			</script>";
}
