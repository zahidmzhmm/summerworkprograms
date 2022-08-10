<?php
class sql
{

	function num_rows($result)
		{
			return @mysql_num_rows($result);
		}

	public function Select_single($select_query)
		{
				$data=mysql_query($select_query);
				if(self::num_rows($data)>0)
					{

						$data_field=mysql_fetch_assoc($data);
						return $data_field;
					}
				else return '';

		}

	function update_query($query)
		{
			if(!mysql_query($query))
			return false;
			else return true;
		}

	
	function Query_Select($select_query)
		{
			$i=0;
			$result=array();
			$data=mysql_query($select_query);//or die("QUERY ERROR1=>".mysql_error());
				if(self::num_rows($data)>0)
					{
						while ($row=mysql_fetch_assoc($data)) 
						{
          					$result[$i] = $row;
          					$i++;
						}
						
						return $result;
					}
				else return '';

		}
	
	function Query_Insert($qry)
			{

			  $result_insert=mysql_query($qry) ;//or die("QUERY ERROR4=>".mysql_error());
			  return $result_insert;
			}
			
}


$obj_sql= new sql;

?>