<?php 

class Install extends CI_Controller {
	
	public function index()
	{
		$this->load->view('install/header');
		$this->load->view('install/home');
		$this->load->view('admin/footer');
	
	}

	public function configuration()
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
				$this->load->database();
				$this->load->model('sample');
				$res = $this->sample->test_db();
				
				if($res)
				{
					$source = APPPATH."config/autoload.php";
			
					$target = APPPATH."config/autoloadtmp.php";

					//copy operation
					$sp = fopen($source, 'r');
					$tp = fopen($target, 'w');
					
					$replaced = TRUE;
					
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
										

										if($value_to_insert == str_ireplace(array('\'', '"'), '', $array[$x][$y]))
										{
											$newline .= str_ireplace(array('\'', '"'), '', $array[$x][$y]).'\', \'';

											$replaced = FALSE;

										}
										else
										{
											$newline .= str_ireplace(array('\'', '"'), '', $array[$x][$y]).'\', \'';

										
										}
										

									
									}
									else //to ensure the last value doesn't have a comma
									{
										
										
										if($value_to_insert == str_ireplace(array('\'', '"'), '', $array[$x][$y]))
										{
											$newline .= str_ireplace(array('\'', '"'), '', $array[$x][$y]).'\'';
											$replaced = FALSE;
											
										}
										else
										{
											$newline .= str_ireplace(array('\'', '"'), '', $array[$x][$y]).'\'';
										
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
					
					if($replaced)
					{
						//delete source file and rename target file
						unlink($source);
						rename($target, $source);
						
						$this->load->view('admin/header');
						$this->load->view('install/step2');
						$this->load->view('admin/footer');
						
					}
					
					else
					{
						unlink($target);
						
						$this->load->view('install/header');
						$this->load->view('install/step2');
						$this->load->view('admin/footer');
					
					}
					
					
					
					
				}
				
			}
			
		}
		
		if($this->input->post('actionf') == 'url')
		{
			$url = strtolower($this->input->post('url'));
			$institution = mysql_real_escape_string(ucwords($this->input->post('institution')));
			$folder = strtolower($this->input->post('folder'));
			
				$source = APPPATH."config/constants.php";
				$target = APPPATH."config/constants.tmp";
				
				$sp = fopen($source, 'rb+');
				$tp = fopen($target, 'w');
				
				$insert_pos = 0;
				$exists = FALSE;
				$newline = 'define(\'NAME\', \''.$institution.'\');'.PHP_EOL;
				
				$test1 = 'define(\'NAME\'';
				$test2 = 'define(\'FOPEN_READ_WRITE_CREATE_STRICT\'';
				
			while( !feof($sp))
			{
				$line = fgets($sp);
				
				if(stripos($line, $test1) !== FALSE)
				{
					$line = $newline;
					$exists = TRUE;
				}
				
				if(stripos($line, $test2) !== FALSE)
				{
					$insert_pos = ftell($sp);
					
				}
				else
				{
					$var = '';
					$var .= $line;
				
				}
				
				fwrite($tp, $line);
			
			}
			
			if($exists)
			{
				fclose($sp);
				fclose($tp);
				
				//delete source file and rename target file
				unlink($source);
				rename($target, $source);
				
			}
			else
			{
				fseek($sp, $insert_pos);
				fwrite($sp, $newline);
			
				fclose($sp);
				fclose($tp);
				
				$exists = TRUE;
			
			}
			
			if($exists === TRUE)
			{
				$something_done = FALSE;
				$source = FCPATH.'.htaccess';
				$target = FCPATH.'htaccess.tmp';
				
				$sp = fopen($source, 'rb');
				$tp = fopen($target, 'wb');
				$replaced = FALSE;
				
				while( !feof($sp))
				{
					$line = fgets($sp);
					
					if(stripos($line, 'RewriteBase') !== FALSE)
					{
						$line = 'RewriteBase /'.$folder.'/'.PHP_EOL;
						
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
					
					$something_done = TRUE;
					
				}
				
				else
				{
					unlink($target);
					
					$something_done = TRUE;
				}
				
				if($something_done == TRUE)
				{
					
					$source = APPPATH.'config/config.php';
					$target = APPPATH.'config/config.tmp';
					
					$sp = fopen($source, 'rb');
					$tp = fopen($target, 'wb');
					
					$replaced = FALSE;
					
					$test = '$config[\'base_url\']';
					$newline = '$config[\'base_url\']	= \''.$url.'\';'.PHP_EOL;

					
					while( !feof($sp))
					{
						$value = fgets($sp);
						
						if(stripos($value, $test) !== FALSE)
						{
							$value = $newline;
							$replaced = TRUE;
						}
						
						fwrite($tp, $value);
					
					}
					
					fclose($sp);
					fclose($tp);
					
					//will not overwrite the file if we didn't replace anything
					if($replaced === TRUE)
					{
						//delete source file and rename target file
						unlink($source);
						rename($target, $source);
						
						$this->load->view('install/header');
						$this->load->view('install/account');
						$this->load->view('admin/footer');
						
					}
					
					else
					{
						unlink($target);
						
						echo $test;
						echo $newline;
					}
				
				}
				
			}
			
		}
		
		
		if($this->input->post('actionf') == 'account')
		{
			$info['f_name'] = $this->input->post('f_name');
			$info['l_name'] = $this->input->post('l_name');
			$info['username'] = $this->input->post('username');
			$info['password'] = $this->input->post('password');
			
			$this->load->model('sample');
			$res = $this->sample->users($info);
			
			if($res)	//set default controller to login
			{
				
				$source = APPPATH.'config/routes.php';
				$target = APPPATH.'config/routes.tmp';
				
				$sp = fopen($source, 'rb');
				$tp = fopen($target, 'wb');
				
				$replaced = FALSE;
				
				$test = '$route[\'default_controller\']';
				$newline = '$route[\'default_controller\'] = "login";'.PHP_EOL;

				
				while( !feof($sp))
				{
					$line = fgets($sp);
					
					if(stripos($line, $test) !== FALSE)
					{
						$line = $newline;
						$replaced = TRUE;
					}
					
					fwrite($tp, $line);
				
				}
				
				fclose($sp);
				fclose($tp);
				
				//will not overwrite the file if we didn't replace anything
				if($replaced === TRUE)
				{
					//delete source file and rename target file
					unlink($source);
					rename($target, $source);
					
					redirect('login', 'refresh');
					
				}
				
				else
				{
					unlink($target);
					
					echo $test;
					echo $newline;
					
					echo "We never did anything";
				}
				
			
			}
			
			
			
		
		}
		
	}
}