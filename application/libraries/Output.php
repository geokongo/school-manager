<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Output {

	public function rescape($string)
	{
		$string = stripslashes($string);
		
		return $string;
		
	}

}