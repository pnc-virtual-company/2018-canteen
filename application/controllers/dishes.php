<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class dishes extends CI_Controller {

	// public function menu(){
	// 	$this->load->view('dishes/menu');
	// }
	public function dryFood()
	{
		 $data['title'] = 'dry food';
		$data['page'] = 'dishes/dry_food'; //load content
		$this->load->view('layout', $data);
	}
	public function waterFood()
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

	public function favouriteFood(){
		// $data['title'] = 'menu';
		$data['page'] = 'dishes/favouriteFoods';
		$this->load->model('getUserActive');
        $data['user'] = $this->getUserActive->getActive();
		// $data['page'] = 'welcome';
		// $this->load->view('templates/right_menu', $data);
		$this->load->view('layout', $data);
	}

	
	
}
// }
?>