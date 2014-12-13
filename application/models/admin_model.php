<?php 

class Admin_model extends CI_Model {
	
	//extend parent construct
	function __construct()
	{
		parent::__construct();
	
	}
	
	function clients($variable)
	{
		//cast the variable array into object
		$variable = (object)$variable;
		
		if($variable->actionf == 'step1')
		{
			$value = uniqid();
			$this->db->query(" INSERT INTO clients (client_id) values('$value')");
			$number = $this->db->insert_id();
			
			return $number;
		
		}
		
		if($variable->actionf == 'insert_client_details')
		{
			$sql = $this->db->query(" UPDATE clients SET
									client_id = '$variable->client_id',
									client_name = '$variable->client_name',
									f_name = '$variable->f_name',
									l_name = '$variable->l_name',
									phone = '$variable->phone',
									email = '$variable->email',
									p_address = '$variable->p_address',
									p_code = '$variable->p_code',
									city = '$variable->city',
									startDate = '$variable->startDate',
									stopDate = '$variable->stopDate',
									status = '$variable->status'
									WHERE id = '$variable->id' 
								");
			return $sql;
		}
		
		if($variable->actionf == 'create_client_user')
		{
			$sql = $this->db->query(" INSERT INTO users SET
									username = '$variable->username',
									password = '$variable->password',
									f_name = '$variable->f_name',
									l_name = '$variable->l_name',
									usertype = '$variable->usertype',
									phone = '$variable->phone',
									email = '$variable->email',
									client_id = '$variable->client_id',
									client_name = '$variable->client_name'
									
								");
			return $sql;
		}
	
	}

}