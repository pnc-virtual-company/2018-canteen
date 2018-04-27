<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class dishes extends CI_Controller {

	// public function menu(){
	// 	$this->load->view('dishes/menu');
	// }

		public function menu()
	{
		$data['activeLink'] = 'home';
		$this->load->view('templates/header', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('dishes/food_menu', $data);
		$this->load->view('templates/footer', $data);
	}
}
// }
?>