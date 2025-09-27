<?php

	$this->load->view('layout/auth_header', $this->data);
	$this->load->view($subview, $this->data);
	$this->load->view("layout/auth_footer", $this->data);
