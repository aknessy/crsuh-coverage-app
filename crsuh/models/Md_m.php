<?php

defined('BASEPATH') OR die('No direct script access allowed!');

/**
* @package CRSIRS
* @author Nugitech Dev. Team
* @copyright 2016
*/

class Md_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('encryption');
	}

    public function get_md_kpi($md_code){
        return $this->db->get_where('crsuh_kpi', ['kpi_md_code' => $md_code])->result();
    }

    public function get_md($md)
    {
        $query = $this->db->get_where('crsuh_mds', array('md_name' => $md_code));
        return $query->row();
    }

    public function get_mds(){
        $query = $this->db->get('crsuh_mds');
        return $query->result();
    }

    public function check_md_kpi($kpi_name){
        return $this->db->get_where('crsuh_kpi', ['kpi_md_code' => $kpi_md_code, 'kpi_name' => $kpi_name])->result();
    }

    public function get_md_lgas($md_state){
        return $this->db->get_where('lga', ['state_id' => $md_state])->result();
    }

}