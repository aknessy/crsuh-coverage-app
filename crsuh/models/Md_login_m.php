<?php

defined('BASEPATH') OR die('No direct script access allowed!');

/**
* @package CRSIRS
* @author Nugitech Dev. Team
* @copyright 2016
*/

class Md_login_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('encryption');
	}

	/**
	* Function for checking user's login validity
	* @param string $user
	* @param string $password
	* @return bool
	**/
	public function login($credentials) {

		$is_logged_in = $this->db->get_where('crsuh_mds', $credentials)->row();
		$data = NULL;

		if($is_logged_in){
			$data = [
				'md_name' => $is_logged_in->md_name,
				'md_code' => $is_logged_in->md_code,
				'uuid' => $is_logged_in->md_uuid,
				'md_state' => $is_logged_in->md_state,
				'usertype' => 'user',
				'role' => 'MD User',
				'logged_in' => TRUE
			];

			return (object)$data;
		}

		return false;

	}

	public function populate_md_table($data){
		$this->db->insert('crsuh_mds', $data);
		return true;
	}

	public function populate_kpi_table($data){
		$this->db->insert('crsuh_kpi', $data);
		return true;
	}

	public function myhash($string) {
		return hash("sha512", $string . config_item("encryption_key"));
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
