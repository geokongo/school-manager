<?php

class sample extends CI_Model {
	
	public function test_db()
	{
		$tablename = 'test';
		
		$sql = $this->db->query(" CREATE TABLE IF NOT EXISTS $tablename (
							id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
							name VARCHAR(255)
							) ");
		
		return $sql;
	}


}


