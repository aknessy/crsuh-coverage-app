<?php

  $this->data['app_name'] = $this->settings_m->getOne(array('skey' => 'app_name'))->value;
  $this->data['app_favicon'] = $this->settings_m->getOne(array('skey' => 'app_favicon'))->value;
  $this->data['app_logo'] = $this->settings_m->getOne(array('skey' => 'app_logo'))->value;
  $this->data['app_logo_white'] = $this->settings_m->getOne(array('skey' => 'app_logo_white'))->value;
  $this->data['app_seo_keywords'] = $this->settings_m->getOne(array('skey' => 'app_seo_keywords'))->value;
  $this->data['app_description'] = $this->settings_m->getOne(array('skey' => 'app_description'))->value;
  $this->data['app_powered_by'] = $this->settings_m->getOne(array('skey' => 'app_powered_by'))->value;
  $this->data['app_powered_by_url'] = $this->settings_m->getOne(array('skey' => 'app_powered_by_url'))->value;
  $this->data['app_login_banner'] = $this->settings_m->getOne(array('skey' => 'app_login_banner'))->value;
  $this->data['app_assets_url'] = $this->settings_m->getOne(array('skey' => 'app_assets_url'))->value;
  $this->data['app_irs_logo'] = $this->settings_m->getOne(array('skey' => 'app_irs_logo'))->value;
  $this->data['app_irs_name'] = $this->settings_m->getOne(array('skey' => 'app_irs_name'))->value;
  $this->data['app_state_name'] = $this->settings_m->getOne(array('skey' => 'app_state_name'))->value;
  $this->data['aws_base_url'] = $this->settings_m->getOne(array('skey' => 'aws_base_url'))->value;
  $this->data['app_receipt_bg'] = $this->settings_m->getOne(array('skey' => 'app_receipt_bg'))->value;

  $this->load->view('layout/header', $this->data);
	$this->load->view('layout/sidemenu', $this->data);
  $this->load->view('layout/top_menu', $this->data);
	$this->load->view($subview, $this->data);
	$this->load->view("layout/footer", $this->data);
