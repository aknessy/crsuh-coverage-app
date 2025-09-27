<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -----------------------------------------------------
| PRODUCT NAME: 	CloudSkul
| -----------------------------------------------------
| AUTHOR:			CLOUDSKUL TEAM
| -----------------------------------------------------
| EMAIL:			info@cloudskul.com
| -----------------------------------------------------
| COPYRIGHT:		RESERVED BY Cloudskul
| -----------------------------------------------------
| WEBSITE:			http://cloudskul.com
| -----------------------------------------------------
*/



class MY_Model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
}