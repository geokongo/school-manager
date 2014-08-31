<?php

class Ini extends CI_Controller {

	public function adm() {
	$this->load->model('admin/initialize');
	$res = $this->initialize->adm_tables();
	
	if($res) {
		echo "Thank you. You initialized the Admission Tables Successfully!<p>";
		exit;
	}
	
	}

}