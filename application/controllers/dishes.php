<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class dishes extends CI_Controller {

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

    /**
     * Display the list of all favorte dishes as pie chart
     * @author khai hok <khai.hok.passerellesnumeriques.org>
     */
	public function favouriteFood(){
		 $this->load->model('foodFavorite');
		$data['dishes'] = $this->foodFavorite->dishesFavorite();
		$data['page'] = 'dishes/favouriteFoods';
		$this->load->model('getUserActive');
        $data['user'] = $this->getUserActive->getActive();
		$this->load->view('layout', $data);
	}

	public function DishOrder(){
        $this->load->model('Dishes_model');	
	}	
}
// }
?>