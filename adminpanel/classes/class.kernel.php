<?php
	
	
	class kernel
		
		{
		
		
				public function path()
					{
							$get=$_GET;
							return self::getpath($get);
							
					}
				
				public function getpath($get)
					{
							$extension='.php';
							$categories=$get['modules'];
							$action=$get['action'];
							return 'modules/'.$categories.'/'.$action.$extension;
					}
					
					
				public function redirect()
					{
							if(!empty($_GET))
								{
									$path=self::path();
									
										if(file_exists($path))
											{
												include( $path);
											}
										else
											{
												'';
											}
								}
							else
								{
									include('includes/right-items.php');
								}
					}
					
		}
		
		
		
		
		
?>
