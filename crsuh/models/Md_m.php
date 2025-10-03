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

    public function get_md_states(){
        return $this->db->get('state')->result();
    }

    public function get_lgas_by_state_id($state_id){
        return $this->db->get_where('lga', ['state_id' => $state_id])->result();
    }

    public function get_md_by_uuid($uuid){
        return $this->db->get_where('crsuh_mds', ['md_uuid' => $uuid])->row();
    }

    public function insert($data){
        $this->db->insert('crsuh_track_record', $data);
        return $this->db->insert_id() > 0;
    }

    public function create_patient_record($patient_records){
        $this->db->insert('crsuh_patient_info', $patient_records);
        return $this->db->last_query();
    }

    public function update($uuid, $data){
        $this->db->where('md_uuid', $uuid);
        $this->db->update('crsuh_mds', $data);
        // var_dump($this->db->last_query());die;
        return $this->db->affected_rows() == 1;
    }

    public function soft_delete($uuid){
        $this->db->where('md_uuid', $uuid);
        $this->db->update('crsuh_mds', ['deleted' => 1, 'deleted_at' => date('Y-m-d H:i:s')]);
        return $this->db->affected_rows() == 1;
    }

}