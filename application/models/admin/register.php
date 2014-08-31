<?php
class Register extends CI_Model {

	public function classes() {
		
	$sql = $this->db->query("create table if not exists CLASSES (
		ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		CLASS VARCHAR(10) UNIQUE )");
	return $sql;
 
	}
	
	public function insert($class) {
		
	$sql = $this->db->query(" INSERT INTO  classes set CLASS = '$class'");	
	return $sql;
	
	}
	
	public function streams($class, $stream) {
		
		$bt = "_";
		$streams = "streams";
		
		
		$table_name = $class.$bt.$streams;
		
		$sql_tb = $this->db->query("CREATE TABLE IF NOT EXISTS $table_name (
					ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
					STREAMS VARCHAR(10) UNIQUE )");
		
		if($sql_tb) {
		$sql_str = $this->db->query(" INSERT INTO $table_name SET STREAMS = '$stream' ");
		return $sql_str;
		}
			
			
		}
		
	public function subjects($class, $subject) {
		//declare variables to be used
		$bt = "_";
		$subjects = "subjects";
		$table_name = $class.$bt.$subjects;
	
		//query to create table is database
		$sql_tb = $this->db->query("CREATE TABLE IF NOT EXISTS $table_name (
				ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				SUBJECTS VARCHAR(20) UNIQUE )");

		if($sql_tb) {
		//if table creation is successful then insert subjects
		
		$sql_sub = $this->db->query("INSERT INTO $table_name SET SUBJECTS= '$subject'");
		return $sql_sub;
		}
	
	
	}
	
	public function exams($class, $exam) {
		//declare variables to be used
		$bt = "_";
		$exams = "examinations";
		$table_name = $class.$bt.$exams;
	
		//query to create table is database
		$sql_tb = $this->db->query("CREATE TABLE IF NOT EXISTS $table_name (
				ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				EXAM VARCHAR(20) UNIQUE )");

		if($sql_tb) {
		//if table creation is successful then insert subjects
		
		$sql_exam = $this->db->query("INSERT INTO $table_name SET EXAM= '$exam'");
		return $sql_exam;
		}
	
	
	}
	
	public function terms($term) {
		//declare variables to be used
		$bt = "_";
		$terms = "terms";
		$table_name = $terms;
	
		//query to create table is database
		$sql_tb = $this->db->query("CREATE TABLE IF NOT EXISTS $table_name (
				ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				TERM VARCHAR(10) UNIQUE )");

		if($sql_tb) {
		//if table creation is successful then insert subjects
		
		$sql_term = $this->db->query("INSERT INTO $table_name SET TERM= '$term'");
		return $sql_term;
		}
	
	}
	
	public function year($year) {
		//declare variables to be used
		$years = "years";
		$table_name = $years;
	
		//query to create table is database
		$sql_tb = $this->db->query("CREATE TABLE IF NOT EXISTS $table_name (
				ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				YEAR VARCHAR(10) UNIQUE )");

		if($sql_tb) {
		//if table creation is successful then insert subjects
		
		$sql_year = $this->db->query("INSERT INTO $table_name SET YEAR= '$year'");
		return $sql_year;
		}
	
	}
	
		
}


?>