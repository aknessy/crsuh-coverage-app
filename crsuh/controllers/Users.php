<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* @package CrossRiver Pay
* @author Nugi Technologies Development Team
* @copyright 2016
**/

class Users extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		
		$this->load->model(array('users_m', 'md_m', 'md_login_m'));
		$this->load->library(array('form_validation'));
		$this->load->helper('uuid_generator');
		$this->load->helper('random_md_code');
		$this->load->helper('otp_generator');

		if(!$this->session->login->logged_in && !$this->session->login->usertype == 'Super Admin'){
            redirect(base_url('md_login'));
        }
	}
	
	function index(){
		echo "User's Index!";
	}
	
	function create_user(){
		if($_POST){
			$this->form_validation->set_rules('fname', 'First Name', 'required|trim|min_length[2]|max_length[50]|alpha');
			$this->form_validation->set_rules('lname', 'Last Name', 'required|trim|min_length[2]|max_length[50]|alpha');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|max_length[100]');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|min_length[10]|max_length[20]|regex_match[/^[0-9+\-\s()]+$/]');
			$this->form_validation->set_rules('address', 'Address', 'trim|max_length[255]');
			$this->form_validation->set_rules('role', 'Role', 'trim|in_list[admin,md_user]');
			$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[2]|max_length[50]|alpha_numeric');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|max_length[20]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|min_length[6]|max_length[20]|matches[password]');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			
			if($this->form_validation->run() === FALSE){
				$this->data['title'] = 'Add Admin User';
				$this->data['subview'] = 'users/create_user';
				$this->load->view('_layout_main_', $this->data);
			}else{
				$password_text = $this->input->post('password');
				$password_hash = $this->users_m->myhash($password_text);
				$fname = $this->input->post('fname');
				$lname = $this->input->post('lname');
				$phone = $this->input->post('phone');
				$email = $this->input->post('email');
				$username = $this->input->post('username');
				$role = $this->input->post('role');
				$usertype = $this->input->post('usertype');
				$address = $this->input->post('address');

				$user_data = array(
					//'user_uuid' => generate_uuid(),
					'firstname' => $fname,
					'lastname' => $lname,
					'phone' => $phone,
					'email' => $email,
					'username' => $username,
					'role' => $role,
					'usertype' => $usertype,
					'address' => $address,
					'password' => $password_hash,
					'password_text' => $password_text,
				);

				$created = $this->users_m->create_user($user_data);

				if($created){
					$this->session->set_flashdata('success', "User has been created successfully!");
					redirect(base_url('users'));
				}else{
					$this->session->set_flashdata('error', "User was not created!");
					redirect(base_url('users'));
				}
			}
		}else{
			$this->data['title'] = 'Add Admin User';
			$this->data['subview'] = 'users/create_user';
			$this->load->view('_layout_main_', $this->data);
		}
	}

	public function create_md(){
		if($_POST){
			$this->form_validation->set_rules('md_name', 'MD Name', 'required|trim|min_length[2]|max_length[50]|alpha');
			$this->form_validation->set_rules('md_code', 'MD Code', 'trim|min_length[2]|max_length[50]|alpha_numeric');
			$this->form_validation->set_rules('md_state', 'MD State', 'trim');
			$this->form_validation->set_rules('md_lga', 'MD LGA', 'trim');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			
			if($this->form_validation->run() === FALSE){
				$this->data['title'] = 'Add MD User';
				$this->data['subview'] = 'users/create_md';
				$this->data['states'] = $this->md_m->get_md_states();
				$this->load->view('_layout_main_', $this->data);
			}else{
				$pwd_text = generate_otp(8);
				$pwd_hash = $this->md_login_m->myhash($pwd_text);
				$md = $this->input->post('md_name');

				$uuid = generate_uuid();
				$md_code = NULL;

				if($this->input->post('md_code')){
					$md_code = $this->input->post('md_code');
				}else{
					$md_code = generate_md_code($md);
				}

				$check_md_exists = $this->md_m->get_md($md);
				
				if($check_md_exists){
					$this->session->set_flashdata('error', "MD already exists!");
					redirect(base_url('users/create_md'));
				}
					
				$data = [
					'md_uuid' => $uuid,				
					'md_name' => $md,
					'md_code' => $md_code,
					'md_state' => $this->input->post('md_state'),
					'md_lga' => $this->input->post('md_lga'),
					'pwd_text' => $pwd_text,
					'pwd_hash' => $pwd_hash,
					'created_at' => date('Y-m-d H:i:s'),
				];

				$created = $this->md_login_m->populate_md_table($data);
				
				if($created){
					$this->session->set_flashdata('success', "MD has been created successfully!");
					redirect(base_url('users/create_md'));
				}else{
					$this->session->set_flashdata('error', "MD was not created!");
					redirect(base_url('users/create_md'));
				}
			}
		}else{
			$this->data['title'] = 'Add MD User';
			$this->data['subview'] = 'users/create_md';
			$this->data['states'] = $this->md_m->get_md_states();
			$this->load->view('_layout_main_', $this->data);
		}
	}

	/**
	 * Custom callback to check if new password is different from current
	 */
	public function _password_check($password) {
		if ($password === $this->input->post('current_password')) {
			$this->form_validation->set_message('_password_check', 'New password must be different from current password');
			return false;
		}
		return true;
	}

	public function get_lgas_by_state_id(){
		$stateId = $this->input->post('state_id');
		$lgas = [];
		$status = false;
		
		if($stateId){
			$lgas = $this->md_m->get_lgas_by_state_id($stateId);
			
			if($lgas){
				$status = true;

				foreach($lgas as $lga){
					$lgas[] = array(
						'id' => $lga->id,
						'name' => $lga->name
					);
				}
			}
		}
		
		echo json_encode(
			[
				'lgas' => $lgas,
				'status' => $status,
			]);
	}
}