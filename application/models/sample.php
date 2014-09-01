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
	
	public function users($info)
	{
		$tablename = 'users';
		
		$this->db->query(" CREATE TABLE IF NOT EXISTS $tablename ( 
						  id INT AUTO_INCREMENT PRIMARY KEY,
						  name VARCHAR(100) UNIQUE,
						  password VARCHAR(100)
						  ) ");
		
		$sql = $this->db->query(" INSERT INTO $tablename SET name = $info['username'], password = $info['password'] ");
		return $sql;
		
	
	}


}


