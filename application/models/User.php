<?php 
//application/model/User.php
class User extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function proses_login($data){
		// $query = $this->db->query("SELECT * FROM user WHERE username='$data[username]' AND password='$data[password]' AND status='1'");
		$query = $this->db->get_where('user',$data);
		if ($query->num_rows()==1) {
			return $query->row();
		}else{
			return false;
		}
	}
}