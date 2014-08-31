<?php

class Select extends CI_Model {
	public function classes() {
		
		$sql = $this->db->query("SELECT * FROM classes");
		return $sql->result();
	}
}