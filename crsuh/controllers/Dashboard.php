<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* @package CrossRiver Pay
* @author Nugi Technologies Development Team
* @copyright 2016
**/

class Dashboard extends CI_Controller{
    function __construct(){
		parent::__construct();
		
		$this->load->model(['users_m', 'dashboard_m']);
		$this->load->library(array('form_validation'));

        if(!$this->session->login->usertype == 'Super Admin'){
            redirect(base_url('md_login'));
        }
	}

    public function index(){
        $count_mds = $this->dashboard_m->count_mds();
        $count_kpis = $this->dashboard_m->count_kpis();
        $count_tracked_patients = $this->dashboard_m->count_tracked_patients();

        $this->data['total_mds'] = intval($count_mds);
        $this->data['total_kpis'] = intval($count_kpis);
        $this->data['total_tracked_patients'] = intval($count_tracked_patients);
        
        $this->data['title'] = 'Super Admin Dashboard';
        $this->data['subview'] = 'dashboard/index';
        $this->load->view('_layout_main_', $this->data);
    }

    public function get_md_data() {
        $draw = $this->input->post('draw');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $search = $this->input->post('search')['value'];
        $order = $this->input->post('order')[0];
        $order_column = $this->input->post('columns')[$order['column']]['data'];
        $order_dir = $order['dir'];

        $total = $this->dashboard_m->count_mds();
        $filtered = $this->dashboard_m->filtered_mds($search);
        $mds = $this->dashboard_m->get_datatable($start, $length, $search, $order_column, $order_dir);
        
        $data = [];
        $sn = $start + 1;

        if($mds){
            foreach ($mds as $md) {
                $data[] = [
                    'id' => $sn++,
                    'md_name' => $md->md_name,
                    'md_code' => $md->md_code,
                    'md_state' => ucfirst($md->state_name),
                    'md_lga' => $md->lga_name,
                    'password' => $md->pwd_text,
                    'actions' => $this->get_action_buttons($md)
                ];
            }
        }
        
        $output = [
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data
        ];

        echo json_encode($output);
    }

    private function get_action_buttons($md) {
        $buttons = '';
        
        $buttons .= '<a href="' . base_url('md/view/' . $md->md_uuid) . '" class="btn btn-primary btn-sm me-1" title="View Details">
            <i class="ti ti-eye"></i>
        </a>';
        
        $buttons .= '<a href="' . base_url('md/delete/' . $md->md_uuid) . '" 
            class="deleteMD btn btn-danger btn-sm" 
            title="Delete"
            onclick="return confirm(\'Are you sure you want to delete this MD?\')">
            <i class="ti ti-trash"></i>
        </a>';
        
        return $buttons;
    }
}