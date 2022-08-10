<?php
class zipExtract
{
	function Extract($file_to_open,$extract_path='')
	{
		
	

     $zip = new ZipArchive();  
	 if(!$file_to_open) return;
	 $target=$extract_path;
     $x = $zip->open($file_to_open);  
     if($x === true) {  
	 

         $zip->extractTo($target);  
         $zip->close();  
	 }
	}
	
	
	function Compress($files)
	{
	}
	
	
}
	 ?>