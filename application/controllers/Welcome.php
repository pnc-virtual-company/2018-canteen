<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	//Default constructor
	function __construct()
	{
			parent::__construct();
			log_message('debug', 'URI=' . $this->uri->uri_string());
	}
		/**
	     * Load welcome page in public user interface.
	     * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
	     */
	public function index()
	{
	$data['title'] = 'Home';
      	$data['dishesOrder'] = $this->Dishes_model->getMenu();
      	$data['dishesOrder1'] = $this->Dishes_model->getMenu1();
      	$data['dishesOrder2'] = $this->Dishes_model->getMenu2();
	$data['page'] = 'welcome';
	$this->load->view('layout', $data);
	}
		/**
	    * This function is use to create the order for each usergdf
	    * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
	  */
	public function insertOrderInfo(){
	  $dish_id = $this->uri->segment(3);
	  $meal_time_id = $this->uri->segment(4); 
	  $data['userPreOrder'] = $this->Dishes_model->createOrder($dish_id,$meal_time_id);
	  if ($data == TRUE) {
	    redirect(base_url());
	  }
	}
	/**
     * Dishplay  favorite food in public user interface
     * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
     */
	public function favoriteFood(){
		$data['title'] = 'Favorite Food';
		$data['page'] = 'dishes/favouriteFoods';
		$this->load->view('layout', $data);
	}
		/**
	     * Display popup and allow user to order their food.
	     * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
	     */
	public function getDish(){
		$id = $this->input->post('dish_id');
    $data['dishesOrder'] = $this->Dishes_model->selectDish($id);
    $output = "";	
		foreach ($data['dishesOrder'] as $dish) 
		{	
			$output .= '
				<form action="'.base_url().'Welcome/insertOrderInfo/'.$id.'/'.$dish->meal_time_id.'" method="post">			        
				        	<div class="row">
				        		<div class="col-6">
				        			<div class="form-group text-center">				        			
							          <label for="recipient-name" class="col-form-label">'.$dish->dish_name.'</label>
							          <img src="'.base_url().'assets/images/dish_uploads/'.$dish->dish_image.'" class="img-thumbnail mx-auto d-block">
						          </div>		        			
				        		</div>
				        		<div class="col-6">
				        			<div class="form-group text-center">
							          	<label for="recipient-name" class="col-form-label">Quantity</label>
							          	<select name="quantity" class="form-control">
							           				<option value="1">1</option>
							           				<option value="2">2</option>
							           				<option value="3">3</option>
							           				<option value="4">4</option>
							           				<option value="5">5</option>
							           				<option value="6">6</option>
							           				<option value="7">7</option>
							           				<option value="8">8</option>
							           				<option value="9">9</option>
							           				<option value="10">10</option>
							          	</select>	 	
							</div>
						</div>							 	     	
					</div>				        					        	
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				        <button type="submit" class="btn btn-success" id="btn-order">Order Now</button>
				      </div>
				  </form>
			';
		}
		echo $output;
	}
}
