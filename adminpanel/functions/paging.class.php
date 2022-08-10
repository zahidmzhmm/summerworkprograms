<?php  
   class Pager  
   {  
       function getPagerData($numHits, $limit, $page)  
       {  
           $numHits  = (int) $numHits;  
           $limit    = max((int) $limit, 1);  
           $page     = (int) $page;  
           $numPages = ceil($numHits / $limit);  

           $page = max($page, 1);  
           $page = min($page, $numPages);  

           $offset = ($page - 1) * $limit;  

           $ret = new stdClass;  

           $ret->offset   = $offset;  
           $ret->limit    = $limit;  
           $ret->numPages = $numPages;  
           $ret->page     = $page;  

           return $ret;  
       }  
   }  
   

function paging($pageName, $page, $numpage,$link){
	if ($page <= 1) // this is the first page - there is no previous page  
    	echo "<span class=\"current\">Previous &nbsp;&nbsp;&nbsp;</span>";  
	else            // not the first page, link to the previous page  
    	echo "<a  class=\"paging\" href=\"$pageName&page=" . ($page - 1) . "&$link\">Previous</a>";  

    for ($i = 1; $i <= $numpage; $i++) {  
        if ($i>1):
			echo "";  
		endif;
        if ($i == $page)  
            echo "<span class=\"current\">&nbsp;<b>$i</b>&nbsp;</span> ";  
        else  
            echo "<a class=\"paging\" href=\"$pageName&page=$i&$link\">&nbsp;$i&nbsp;</a>";  
    }  

    if ($page == $numpage) // this is the last page - there is no next page  
        echo "<span class=\"current\">&nbsp;&nbsp;&nbsp; Next</span>";  
    else            // not the last page, link to the next page  
        echo "<a class=\"paging\" href=\"$pageName&page=" . ($page + 1) . "&$link\" > Next</a>";
}
?> 