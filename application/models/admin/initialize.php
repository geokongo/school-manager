<?php

class initialize extends CI_Model {

public function adm_tables() {
	
	$sql1 = $this->db->query("CREATE TABLE IF NOT EXISTS basic (
							  id int not null auto_increment primary key primary key,
							  adm int not null unique,
							  f_name varchar(255),
							  m_name varchar(255),
							  l_name varchar(255)
							  )");
	if ($sql1) {
		$sql2 = $this->db->query("CREATE TABLE IF NOT EXISTS personal (
								 id int not null auto_increment primary key,
								 ADM int unique not null,
								 DOB varchar(255),
								 DOA varchar(255),
								 POB varchar(255),
								 COA varchar(255),
								 COUNTY varchar(255),
								 GENDER varchar(255),
								 NATIONALITY varchar(255))");
	if ($sql2) {
		$sql3 = $this->db->query("CREATE TABLE IF NOT EXISTS contacts (
								  id int not null auto_increment primary key,
								  ADM int not null unique,
								  ADDRESS varchar(255),
								  CODE varchar(255),
								  CITY varchar(255))");
	if ($sql3) {
		$sql4 = $this->db->query("CREATE TABLE IF NOT EXISTS passports (
								  id int not null auto_increment primary key,
								  ADM int not null unique,
								  PHOTO blob)");
	if ($sql4) {
		$sql5 = $this->db->query(" CREATE TABLE IF NOT EXISTS father_details (
								  id int not null auto_increment primary key,
								  ADM int not null unique,
								  f_name varchar(255),
								  l_name varchar(255),
								  ADDRESS varchar(255),
								  PHONE varchar(255),
								  EMAIL varchar(255))");
	if ($sql5) {
		$sql6 = $this->db->query(" CREATE TABLE IF NOT EXISTS mother_details (
								  id int not null auto_increment primary key,
								  ADM int not null unique,
								  f_name varchar(255),
								  l_name varchar(255),
								  ADDRESS varchar(255),
								  PHONE varchar(255),
								  EMAIL varchar(255))");
	if ($sql6) {
		$sql7 = $this->db->query(" CREATE TABLE IF NOT EXISTS guardian_details (
								  id int not null auto_increment primary key,
								  ADM int not null unique,
								  f_name varchar(255),
								  l_name varchar(255),
								  ADDRESS varchar(255),
								  PHONE varchar(255),
								  EMAIL varchar(255))");
		return $sql7;
	
	}
	
	
	}
	
	}
	
	}
								  
	
	}
								 
								
	
	}
}
}
?>