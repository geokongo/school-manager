<?php 

class Install extends CI_Controller {
	
	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('install/home');
		$this->load->view('admin/footer');
	
	}

	public function database()
	{
		if($this->input->post('actionf') == 'database')
		{
			$hostname = $this->input->post('hostname');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$database = $this->input->post('database');
			$dbdriver = $this->input->post('dbdriver');
		
			$source = APPPATH."config/database.php";
			
			$target = APPPATH."config/databasetmp.php";
			
			//copy operation
			$sp = fopen($source, 'r');
			$tp = fopen($target, 'w');
			
			$replaced = FALSE;
			$rewrite = FALSE;
			
			while( !feof($sp))
			{
				$line = fgets($sp);
				
				
				$test = '$db[\'default\'][\'hostname\']';

				if(stripos($line, $test) !== FALSE)
				{
					$var = ' = \''.$hostname.'\';';

					$line = $test.$var.PHP_EOL;
					
					$replaced = TRUE;
				
				}
				
				$test = '$db[\'default\'][\'username\']';

				if(stripos($line, $test) !== FALSE)
				{
					$var = ' = \''.$username.'\';';

					$line = $test.$var.PHP_EOL;
					
					$replaced = TRUE;
				
				}
				
				$test = '$db[\'default\'][\'password\']';

				if(stripos($line, $test) !== FALSE)
				{
					$var = ' = \''.$password.'\';';

					$line = $test.$var.PHP_EOL;
					
					$replaced = TRUE;
				
				}
				
				$test = '$db[\'default\'][\'database\']';

				if(stripos($line, $test) !== FALSE)
				{
					$var = ' = \''.$database.'\';';

					$line = $test.$var.PHP_EOL;
					
					$replaced = TRUE;
				
				}
				
				$test = '$db[\'default\'][\'dbdriver\']';

				if(stripos($line, $test) !== FALSE)
				{
					$var = ' = \''.$dbdriver.'\';';

					$line = $test.$var.PHP_EOL;
					
					$replaced = TRUE;
				
				}
				
				fwrite($tp, $line);
				
			}
			
			fclose($sp);
			fclose($tp);
			
			//will not overwrite the file if we didn't replace anything
			
			if($replaced)
			{
				//delete source file and rename target file
				unlink($source);
				rename($target, $source);
				
				$rewrite = TRUE;
				
			}
			
			else
			{
				unlink($target);
			
			}
			
			if($rewrite)
			{
				//$this->load->library('database');
				$this->load->model('sample');
				$res = $this->sample->test_db();
				
				if($res)
				{
					$source = APPPATH."config/autoload.php";
			
					$target = APPPATH."config/autoloadtmp.php";

					//copy operation
					$sp = fopen($source, 'r');
					$tp = fopen($target, 'w');
					
					$replaced = FALSE;
					$rewrite = FALSE;
					
					while( !feof($sp))
					{
						$line = fgets($sp);
						
						
						$test = '$autoload[\'libraries\']';

						if(stripos($line, $test) !== FALSE)
						{
						
							preg_match_all("/'[^']+'/", $line, $array);
							
							$newline = '$autoload[\'libraries\'] = array(\'database\', \'';
							$value_to_insert = 'database';
							
							for($x = 0; $x < count($array); $x++)
							{
								array_shift($array[$x]);
								
								
								for($y = 0; $y < count($array[$x]); $y++)
								{	
									if(($y + 1) < count($array[$x]))
									{
										if($value_to_insert !== str_replace(array('\'', '"'), '', $array[$x][$y]))
										{
											$newline .= str_replace(array('\'', '"'), '', $array[$x][$y]).'\', \'';
											
										}
									
									}
									else //to ensure the last value doesn't have a comma
									{
										if($value_to_insert !== str_replace(array('\'', '"'), '', $array[$x][$y]))
										{
											$newline .= str_replace(array('\'', '"'), '', $array[$x][$y]).'\'';
											
										}
									
									}
									
								}
							
							}
							
							$newline .= ' );'.PHP_EOL;
							
							$line = $newline;
						
						}
						
						fwrite($tp, $line);
						
					}
					
					fclose($sp);
					fclose($tp);
					
					//will not overwrite the file if we didn't replace anything
					/*
					if($replaced)
					{
						//delete source file and rename target file
						unlink($source);
						rename($target, $source);
						
						$rewrite = TRUE;
						
					}
					
					else
					{
						unlink($target);
					
					}
						
					
					}
					*/
				}
				
			}
			
		}
		
	}
}