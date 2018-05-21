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
			$data['title'] = 'This is Food for';
			$this->load->model('getUserActive');
        	$data['user'] = $this->getUserActive->getActive();
        	$data['dishesOrder'] = $this->Dishes_model->getMenu();
        	$data['dishesOrder1'] = $this->Dishes_model->getMenu1();
        	$data['dishesOrder2'] = $this->Dishes_model->getMenu2();
			$data['page'] = 'welcome';
			$this->load->view('layout', $data);

	}
}
