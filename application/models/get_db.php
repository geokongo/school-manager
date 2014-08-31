<?php

class Get_db extends CI_Model {
	
	public function getAll() {
		$query = $this->db->query("SELECT * FROM users");
		return $query->result();
	}

}
?>