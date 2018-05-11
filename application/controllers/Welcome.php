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
		$this->load->model('getUserActive');
        $data['user'] = $this->getUserActive->getActive();

		$data['page'] = 'welcome';
		// $this->load->view('templates/right_menu', $data);
		$this->load->view('layout', $data);

	}
	
}
