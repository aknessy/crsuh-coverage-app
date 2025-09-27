<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* @package CrossRiver Pay
* @author Nugi Technologies Development Team
* @copyright 2016
**/

class Users extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		
		$this->load->model(array('taxpayment_m', 'users_m'));
		$this->load->library(array('upload', 'form_validation'));
	}
	
	function index(){
		
		if($this->session->userdata('usertype') == 'Super Admin' && $this->session->userdata('username') == 'docaustyne'){
			
			$this->data['title'] = 'CrossRiver Pay | Users';
			$this->data['staffs'] = $this->users_m->staff_list();
			$this->data['subview'] = 'users/index';
			$this->load->view('_layout_main_', $this->data);
		}else{
			redirect(base_url('login'));
		}
	}
	
	function rules(){
		$rules = array(
			array(
				"field" => "employee_tin",
				"label" => "Employee TIN",
				"rules" => "required|trim|xss_clean|callback_individual_tin"
			),
			array(
				"field" => "employee_salary",
				"label" => "Salary",
				"rules" => "required|trim|xss_clean|numeric|greater_than[0]"
			),
			array(
				"field" => "employee_designation",
				"label" => "Designation",
				"rules" => "required|trim|xss_clean"
			)
		);
		return $rules;
	}
	
	function add(){
		if($this->session->userdata('usertype') == 'Super Admin' && $this->session->userdata('username') == 'docaustyne'){
			
			$password = $this->hash($this->input->post('password'));
			$staff = array(
				'first_name' => $this->input->post('name'),
				'username' => $this->input->post('username'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'password' => $password,
				'type' => $this->input->post('type'),
				'company' => $this->input->post('company'),
				'active' => 1
			);

			$this->users_m->add_staff($staff);
			$this->session->set_flashdata('flashSuccess', 'Staff has been added successfully');
			redirect(base_url('users'));
				
		}else{
			redirect(base_url('login'));
		}
	}
	
	function delete(){
		if($this->session->userdata('usertype') == 'Super Admin' && $this->session->userdata('username') == 'docaustyne'){
			
			$staffID = $this->uri->segment(3);
			
			if($this->users_m->get_single_staff($staffID)){
				
				//delete taxpayer
				$update_array = array(
					"deleted" => 1
				);
				
				$this->users_m->delete_staff($staffID, $update_array);
				$this->session->set_flashdata('flashSuccess', "Staff have been deleted successfully");
				redirect(base_url('users'));
				
			}else{
				$this->session->set_flashdata("flashError", "StaffID doesn't exist!");
				redirect(base_url('users'));
			}
		}else{
			redirect(base_url('login'));
		}
	}
	
	function deactivate(){
		if($this->session->userdata('usertype') == 'Super Admin' && $this->session->userdata('username') == 'docaustyne'){
			
			$staffID = $this->uri->segment(3);
			
			if($this->users_m->get_single_staff($staffID)){
				
				//delete taxpayer
				$update_array = array(
					"active" => 0
				);
				
				$this->users_m->delete_staff($staffID, $update_array);
				$this->session->set_flashdata('flashSuccess', "Staff have been deactivated successfully");
				redirect(base_url('users'));
				
			}else{
				$this->session->set_flashdata("flashError", "StaffID doesn't exist!");
				redirect(base_url('users'));
			}
		}else{
			redirect(base_url('login'));
		}
	}
	
	function activate(){
		if($this->session->userdata('usertype') == 'Super Admin' && $this->session->userdata('username') == 'docaustyne'){
			
			$staffID = $this->uri->segment(3);
			
			if($this->users_m->get_single_staff($staffID)){
				
				//delete taxpayer
				$update_array = array(
					"active" => 1
				);
				
				$this->users_m->delete_staff($staffID, $update_array);
				$this->session->set_flashdata('flashSuccess', "Staff have been Activated successfully");
				redirect(base_url('users'));
				
			}else{
				$this->session->set_flashdata("flashError", "StaffID doesn't exist!");
				redirect(base_url('users'));
			}
		}else{
			redirect(base_url('login'));
		}
	}
	
	public function hash($string) {
		return hash("sha512", $string . config_item("encryption_key"));
	}
}