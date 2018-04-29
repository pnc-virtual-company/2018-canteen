<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class dishes extends CI_Controller {

	// public function menu(){
	// 	$this->load->view('dishes/menu');
	// }
	public function dry_food()
	{
		  $data['title'] = 'dry food';
		$data['page'] = 'dishes/dry_food';
		$this->load->view('layout', $data);
	}
	public function water_food()
	{	
		$data['title'] = 'water food';
		$data['page'] = 'dishes/water_food';
		$this->load->view('layout', $data);
	}
		public function menu()
	{	
		$data['title'] = 'menu';
		$data['page'] = 'dishes/food_menu';
		$this->load->view('layout', $data);
	}
}
// }
?>