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
		
			$source = APPPATH."config/database.php";
			
			$target = APPPATH."config/database.tmp";
			
			//copy operation
			$sp = fopen($source, 'r');
			$tp = fopen($target, 'w');
			
			$replaced = FALSE;
			
			while( !feof($sp))
			{
				$line = fgets($sp);
				
				
				$test = '$db[\'default\'][\'hostname\']';

				if(stripos($line, $test) !== FALSE)
				{
					$host = 'myownhost';
					$var = ' = \''.$host.'\';';

					$line = $test.$var.PHP_EOL;
					
					$replaced = TRUE;
				
				}
				
				$test = '$db[\'default\'][\'username\']';

				if(stripos($line, $test) !== FALSE)
				{
					$username = 'myownusername';
					$var = ' = \''.$username.'\';';

					$line = $test.$var.PHP_EOL;
					
					$replaced = TRUE;
				
				}
				
				$test = '$db[\'default\'][\'password\']';

				if(stripos($line, $test) !== FALSE)
				{
					$password = 'myownpassword';
					$var = ' = \''.$password.'\';';

					$line = $test.$var.PHP_EOL;
					
					$replaced = TRUE;
				
				}
				
				$test = '$db[\'default\'][\'database\']';

				if(stripos($line, $test) !== FALSE)
				{
					$database = 'myowndatabase';
					$var = ' = \''.$database.'\';';

					$line = $test.$var.PHP_EOL;
					
					$replaced = TRUE;
				
				}
				
				$test = '$db[\'default\'][\'dbdriver\']';

				if(stripos($line, $test) !== FALSE)
				{
					$dbdriver = 'myowndbdriver';
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
				
			}
			
			else
			{
				unlink($target);
			
			}
			
			
			
		}
		
	}
}