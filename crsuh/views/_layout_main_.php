<?php

	  $this->load->view('layout/header', $this->data);
		$this->load->view('layout/sidemenu', $this->data); 
	  $this->load->view('layout/top_menu', $this->data);
		$this->load->view($subview, $this->data);
		$this->load->view("layout/footer", $this->data);
