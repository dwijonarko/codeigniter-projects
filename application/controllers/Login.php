<?php
/**
 * Login controller
 * application/controllers/Login.php
 */

class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->database();
		$this->load->model('user');
	}

	public function index(){
		$this->load->view('login/index');
	}

	public function proses(){
		$data = array(
			'username'=>$this->input->post('username'),
			'password'=>sha1($this->input->post('password'))
			);
		//membuat model User untuk query ke table
		$login = $this->user->proses_login($data);
		if ($login) {
			$this->session->set_flashdata('success','Login berhasil');
			$this->session->set_userdata('login',$login);
			redirect('login/success');
		}else{
			$this->session->set_flashdata('error','Username atau password salah!');
			redirect('login/index');
		}
	}

	public function success(){
		if ($this->session->userdata('login')==null) {
			$this->session->set_flashdata('error','Anda harus login dulu !');
			redirect('login/index');
		}else{
			$this->load->view('login/success');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login/index');
	}
}