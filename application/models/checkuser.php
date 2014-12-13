<?php 

class Checkuser extends CI_Model {
	
	//extend the parent model construct
	function __construct()
	{
		parent::__construct();
	
	}
	
	public function check($variable)
	{
		$variable = (object)$variable;
		
		$sql = $this->db->query(" SELECT * FROM users WHERE username= '$variable->username' ");
		
		//$sql = $this->db->get_where('users', array('username' => $variable->username));
		
		return $sql;
		
	}
	
	public function getClientInfo($variable)
	{
		$variable = (object)$variable;
		
		$sql = $this->db->query(" SELECT p_address, p_code, city, phone, email, status, startDate, stopDate FROM clients WHERE client_id = '$variable->client_id' ");
		
		return $sql;
	
	}
}