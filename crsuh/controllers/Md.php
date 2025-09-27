<?php defined('BASEPATH') OR exit('No direct script access allowed!');

/**
* @package CrossRiver Pay
* @author Nugi Technologies Development Team
* @copyright 2016
**/

class Md extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('md_m'));
		$this->load->helper('uuid_generator');
		$this->load->helper('random_md_code');
	}

    public function index(){
        $this->data['title'] = 'Ministry - Departments';
        $this->data['subview'] = 'dashboard/md_index';
        $this->load->view('_layout_main_', $this->data);
    }

    public function track_record(){
        $md_code = $this->session->login->md_code;
        $md_kpi_list = $this->md_m->get_md_kpi($md_code);
        
        $this->data['title'] = 'Ministry - Departments';
        $this->data['subview'] = 'dashboard/track_record';
        $this->data['md_kpi_list'] = $md_kpi_list;

        $this->load->view('_layout_main_', $this->data);
    }

    public function create_kpi(){
        if($_POST){
            $this->form_validation->set_rules('kpi[]', 'Key Performance Index', 'required');

            if($this->form_validation->run() == FALSE){
                $this->session->set_flashdata('error', 'Please select a Key Performance Index!');
                redirect(base_url('md/track_record'));
            }else{
                $kpi_md_code = $this->session->login->md_code;
                $selected_kpi = $this->input->post('kpi');
                $successes = 0;

                foreach($selected_kpi as $kpi){
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
        
                    $insert = $this->md_login_m->populate_kpi_table($data);

                    if($insert)$successes++;
                }

                if($successes > 0){
                    $this->session->set_flashdata('success', 'Key Performance Indexes have been created for this Ministry/Department');
                }else{
                    $this->session->set_flashdata('error', 'Failed to create KPIs. Please try again!');
                }

                redirect(base_url('md/track_record'));
            }
        }else{
            $this->session->set_flashdata('error', 'Request rejected!');
            redirect(base_url('md/track_record'));
        }
    }

    public function load_kpi_form(){
        $perf_index = $this->input->post('kpi');
        $form = '';
        
        if($perf_index != ''){
            switch ($perf_index) {
                case 'Enrollment':
                    echo $this->load->view('kpi_forms/enrollment', '', true);
                    break;
                case 'Empanelment':
                    echo $this->load->view('kpi_forms/empanelment', '', true);
                    break;
                case 'Interventions':
                    echo $this->load->view('kpi_forms/interventions', '', true);
                    break;
                case 'Quality Assurance':
                case 'Fee for Service':
                case 'Capitation Payment':
                    $md_state = $this->session->login->md_state;
                    $lgas = $this->md_m->get_md_lgas(intval($md_state));
                    $data['lgas'] = $lgas;

                    echo $this->load->view('kpi_forms/providers', $data, true);
                    break;
                case 'Accreditation':
                    echo $this->load->view('kpi_forms/accreditation', '', true);
                    break;
                case 'SOC Meetings':
                    echo $this->load->view('kpi_forms/soc_meetings', '', true);
                    break;
                case 'Trainings':
                    echo $this->load->view('kpi_forms/trainings', '', true);
                    break;
                default:
                    echo 'No Key Performance Index Provided!';
                    break;
            }
        }else{
            echo 'No Key Performance Index Provided!';
        }
    }

}