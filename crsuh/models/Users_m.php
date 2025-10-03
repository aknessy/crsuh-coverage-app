<?php

defined('BASEPATH') OR die('No direct script access allowed!');

/**
* @package CRSIRS
* @author Nugitech Dev. Team
* @copyright 2016
*/

class Users_m extends CI_Model
{
	
	public function myhash($string) {
		return hash("sha512", $string . config_item("encryption_key"));
	}

	public function login($credentials){
		$query = $this->db->get_where('users', $credentials)->row();
		$data = NULL;

		if($query){
			$data = [
				'uuid' => $query->user_uuid,
				'firstname' => $query->firstname,
				'lastname' => $query->lastname,
				'phone' => $query->phone,
				'email' => $query->email,
				'username' => $query->username,
				'profile_photo' => $query->profile_image,
				'status' => $query->status,
				'role' => $query->role,
				'usertype' => $query->usertype,
				'logged_in' => TRUE
			];

			return (object)$data;
		}

		return false;
	}

	public function create_user($user_data){
		$this->db->insert('users', $user_data);
		return $this->db->insert_id();
	}
	
	

}
