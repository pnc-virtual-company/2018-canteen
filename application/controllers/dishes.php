<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class dishes extends CI_Controller {
public function __construct() {
        parent::__construct();
        log_message('debug', 'URI=' . $this->uri->uri_string());
        $this->session->set_userdata('last_page', $this->uri->uri_string());
        if($this->session->loggedIn === TRUE) {
           // Allowed methods
           if ($this->session->isAdmin || $this->session->isSuperAdmin) {
             //User management is reserved to admins and super admins
           } else {
             redirect('errors/privileges');
           }
         } else {
           redirect('connection/login');
         }
        $this->load->model('users_model');
    }
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

	public function DishOrder(){
        $this->load->model('Dishes_model');	
	}
	
	
}
// }
?>