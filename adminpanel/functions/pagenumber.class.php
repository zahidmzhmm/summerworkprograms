<?php  
   class Pagernumber  
   {  
       function getPagernumber($numHits,$limit,$id,$post)  
       {  
	  
           $numHits  = (int) $numHits;  
           $limit    = max((int) $limit, 1);  
           $numPages = ceil($numHits / $limit);  

             for ($i = 1; $i <= $numPages; $i++) {
			 $offset = ($i - 1) * $limit; 
			 $sql = "SELECT SQL_CALC_FOUND_ROWS ".
           "p.id, p.subject, p.body, p.date_posted, " .
           "p.date_updated, u.firstname as author, u.users_id as author_id, " .
           "u.signature as sig, c.count as postcount, " .
           "p.forum_id as forum_id, f.forum_moderator as 'mod', " .
           "p.update_id, u2.firstname as updated_by " .
         "FROM forum_forum f " .
         "JOIN forum_posts p " .
         "ON f.id = p.forum_id " .
         "JOIN forum_users u " .
         "ON u.users_id = p.author_id " .
         "LEFT JOIN forum_users u2 " .
         "ON u2.users_id = p.update_id " .
         "LEFT JOIN forum_postcount c " .
         "ON u.users_id = c.user_id " .
         "WHERE (p.topic_id = $id OR p.id = $id) " .
         "ORDER BY p.topic_id, p.date_posted ".
         "LIMIT $offset,$limit";
  			$result = mysql_query($sql);
			  while ($row = mysql_fetch_array($result)) {
			  	if($row['id']==$post){
				$page=$i;
				}else{
				$page=1;
				}
				
			  }
			} 

           

           

           
            

           return $page;  
       }  
   }  
   


?> 