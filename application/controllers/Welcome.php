<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	//Default constructor
	function __construct()
	{
			parent::__construct();
			log_message('debug', 'URI=' . $this->uri->uri_string());
	}

	public function index()
	{
		$data['activeLink'] = 'home';
		$this->load->view('templates/header', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('welcome', $data);
		$this->load->view('templates/footer', $data);
	}
}
