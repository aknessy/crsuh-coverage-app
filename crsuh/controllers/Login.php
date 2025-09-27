<?php defined('BASEPATH') OR exit('No direct script access allowed!');

/**
* @package CrossRiver Pay
* @author Nugi Technologies Development Team
* @copyright 2016
**/

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('login_m'));
	}

	private function rules(){
		$rules = array(
			array(
				'field' => 'username',
				'rules' => 'trim|required|xss_clean'
			),
			array(
				'field' => 'password',
				'rule' => 'trim|required|xss_clean'
			)
		);
		return $rules;
	}

	public function index(){
		if($_POST){

			$this->form_validation->set_rules($this->rules());
			if($this->form_validation->run() === FALSE){
				$this->data['title'] = 'User Login';
				$this->data['subview'] = 'login/login';
				$this->load->view('layout/_auth_layout', $this->data);
			}else{
				$login = $this->login_m->login();

				if($login){
					$this->session->set_userdata($login);
					redirect(base_url('dashboard'));
				}else{

					$this->session->set_flashdata('error', 'Invalid Login Details');
					redirect('login');
				}
			}
		}else{
			$this->data['title'] = 'User Login';
			$this->data['subview'] = 'login/login';
			$this->load->view('layout/_auth_layout', $this->data);
		}
	}

	function logout(){
		session_destroy();
		//$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	public function myhash1() {
		$string = $_GET['pass'];
		echo hash("sha512", $string . config_item("encryption_key"));
	}

	public function myhash($string) {
		echo hash("sha512", $string . config_item("encryption_key"));
	}

	protected function generate_otp($length = 6, $chars = 'abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'){
		$chars_length = (strlen($chars) -1);
		$string = $chars[rand(0, $chars_length)];
		for ($i=1; $i < $length; $i = strlen($string)) {
			# code...
			$r = $chars[rand(0, $chars_length)];
			if ($r != $string[$i - 1]) $string .= $r;
		}
		return $string;
	}
}
