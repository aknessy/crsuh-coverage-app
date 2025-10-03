<?php

defined('BASEPATH') OR die('No direct script access allowed!');

/**
* @package CRSIRS
* @author Nugitech Dev. Team
* @copyright 2016
*/

class Dashboard_m extends CI_Model
{
    public function count_mds(){
        return $this->db->count_all('crsuh_mds');
    }

    public function count_kpis(){
        return $this->db->count_all('crsuh_kpi');
    }

    public function count_tracked_patients(){
        return $this->db->count_all('crsuh_patient_info');
    }

    /**
     * Count filtered users
     */
    public function filtered_mds($search = '') {
        try {
            // Select only the fields we need
            $this->db->select('crsuh_mds.*,state.name as state_name,lga.name as lga_name');
            $this->db->from('crsuh_mds');
            $this->db->join('state', 'state.id = crsuh_mds.md_state', 'left');
            $this->db->join('lga', 'lga.id = crsuh_mds.md_lga', 'left');
            
            // Handle deleted records
            $this->db->group_start()
                ->where('crsuh_mds.deleted', 0)
                ->or_where('crsuh_mds.deleted IS NULL')
                ->group_end();
            
            // Handle search
            if (!empty($search)) {
                $this->db->group_start();
                $this->db->like('crsuh_mds.md_name', $search);
                $this->db->or_like('crsuh_mds.md_code', $search);
                $this->db->or_like('state.name', $search);
                $this->db->or_like('lga.name', $search);
                $this->db->group_end();
            }
            
            return $this->db->count_all_results();
        } catch (Exception $e) {
            log_message('error', 'Error in get_datatable: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get datatable
     */
    public function get_datatable($start, $length, $search, $order_column, $order_dir) {
        try {
            // Select only the fields we need
            $this->db->select('crsuh_mds.*,state.name as state_name,lga.name as lga_name');
            $this->db->from('crsuh_mds');
            $this->db->join('state', 'state.id = crsuh_mds.md_state', 'left');
            $this->db->join('lga', 'lga.id = crsuh_mds.md_lga', 'left');
            
            // Handle deleted records
            $this->db->group_start()
                ->where('crsuh_mds.deleted', 0)
                ->or_where('crsuh_mds.deleted IS NULL')
                ->group_end();
            
            // Handle search
            if (!empty($search)) {
                $this->db->group_start();
                $this->db->like('crsuh_mds.md_name', $search);
                $this->db->or_like('crsuh_mds.md_code', $search);
                $this->db->or_like('state.name', $search);
                $this->db->or_like('lga.name', $search);
                $this->db->group_end();
            }
    
            // Add ordering
            $this->db->order_by($order_column, $order_dir);
            
            // Add pagination
            if ($length != -1) {
                $this->db->limit($length, $start);
            }
    
            $query = $this->db->get();
            
            // Log the query for debugging
            log_message('debug', 'MD Query: ' . $this->db->last_query());
            
            return $query->result();
            
        } catch (Exception $e) {
            log_message('error', 'Error in get_datatable: ' . $e->getMessage());
            return [];
        }
    }

}