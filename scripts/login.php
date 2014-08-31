<?php
class Login extends CI_Model {

	public function auth() {
	
	$sql = $this->db->query(" SELECT password FROM users WHERE name='".$name"'");
	return $sql->result();
	
	if ($sql->num_rows() = 1 ) {
			if ( $sql['password'] == '".$password"' ) {
				echo "Login Successful";
				}
			else {
				echo "Your username and password are incorrect"; 
			}
		}
		
	else {
		echo "You are not a registered user";
	
	}
	}

}


?>