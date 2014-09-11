<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Input {
	
	public function escape($string)
	{
		$string = mysql_real_escape_string($string);
		
		return $string;
	
	}


}