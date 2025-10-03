<?php defined('BASEPATH') OR exit('No direct script access allowed!');

/**
* @package CrossRiver Pay
* @author Nugi Technologies Development Team
* @copyright 2016
**/

class Md_login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('md_login_m','md_m','users_m'));
		$this->load->helper('uuid_generator');
		$this->load->helper('random_md_code');
	}

	private function rules(){
		$rules = array(
			array(
				'field' => 'handle',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'pwd',
				'rule' => 'trim|required'
			)
		);
		return $rules;
	}

	public function index(){
		if($_POST){
			$this->form_validation->set_rules($this->rules());

			if($this->form_validation->run() === FALSE){
				$this->data['title'] = 'Ministry - Department Dashboard Login';
				$this->data['subview'] = 'login/md_login';
				$this->load->view('layout/_auth_layout', $this->data);
			}else{
				$pwd = $this->input->post('password');

				$credentials1 = [
					'md_code' => $this->input->post('handle'),
					'pwd_hash' => $this->md_login_m->myhash($pwd)
				];
				
				$login1 = $this->md_login_m->login($credentials1);

				$credential2 = [
					'md_name' => strtoupper($this->input->post('handle')),
					'pwd_hash' => $this->md_login_m->myhash($pwd)
				];

				$login2 = $this->md_login_m->login($credential2);

				$credential3 = [
					'email' => $this->input->post('handle'),
					'password' => $this->users_m->myhash($pwd)
				];

				$login3 = $this->users_m->login($credential3);

				$credentials4 = [
					'username' => $this->input->post('handle'),
					'password' => $this->users_m->myhash($pwd)
				];

				$login4 = $this->users_m->login($credentials4);

				if($login1){
					$this->session->set_userdata('login', $login1);
					redirect(base_url('md'));
				}elseif($login2){
					$this->session->set_userdata('login', $login2);
					redirect(base_url('md'));
				}elseif($login3){
					$this->session->set_userdata('login', $login3);
					redirect(base_url('dashboard'));
				}elseif($login4){
					$this->session->set_userdata('login', $login4);
					redirect(base_url('dashboard'));
				}
				else{
					$this->session->set_flashdata('error', 'Login Credentails are Invalid!');
					redirect('md_login');
				}
			}
		}else{
			$this->data['title'] = 'Ministry - Department Dashboard Login';
			$this->data['subview'] = 'login/md_login';
			$this->load->view('layout/_auth_layout', $this->data);
		}
	}

	function logout(){
		session_destroy();
		//$this->session->sess_destroy();
		redirect(base_url('md_login'));
	}

	public function populate_md_table(){
		$md_list = [
			'CRSHIA',
			'SERVICE PROVIDERS',
			'SACA',
			'GENERAL HOSPITAL',
			'TERTIARY HOSPITALS',
			'CRS HEALTH ANTI-QUACKERY TASKFORCE',
			'SPHCDA',
			'DNS',
			'D-MDS',
			'DPS',
			'D-SERVICOM',
			'DPH (EOC+)',
			'AMBULANCE SERVICE OPERATIONS'
		];

		$pwd_text = NULL;
		$pwd_hash = NULL;
		$uuid = NULL;
		$md_code = NULL;

		foreach ($md_list as $md) {
			$pwd_text = $this->md_login_m->generate_otp(8);
			$pwd_hash = $this->md_login_m->myhash($pwd_text);
			
			$uuid = generate_uuid();
			$md_code = generate_md_code($md);

			$check_md_exists = $this->md_m->get_md($md);
			
			if($check_md_exists){
				continue;
			}

			$data = [
				'md_uuid' => $uuid,				
				'md_name' => $md,
				'md_code' => $md_code,
				'pwd_text' => $pwd_text,
				'pwd_hash' => $pwd_hash,
				'created_at' => date('Y-m-d H:i:s'),
			];

			$this->md_login_m->populate_md_table($data);
		}
	}

	public function populate_kpi_table(){
		$kpi_md_code = $this->session->login->md_code;
		
		$kpi_list = [
			'Enrollment',
			'Empanelment',
			'Accreditation',
			'Capitation Payment',
			'Fee for Service',
			'Interventions',
			'Quality Assurance',
			'SOC Meetings',
			'Trainings'
		];

		foreach($kpi_list as $kpi){
			$check_kpi_exists = $this->md_m->check_md_kpi($kpi_md_code, $kpi);
			
			if($check_kpi_exists){
				continue;
			}

			$data = [
				'kpi_uuid' => generate_uuid(),
				'kpi_md_code' => $kpi_md_code,
				'kpi_name' => $kpi,
				'created_at' => date('Y-m-d H:i:s')
			];

			$this->md_login_m->populate_kpi_table($data);
		}
	}
}
