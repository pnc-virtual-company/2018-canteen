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

	public function getDish(){
$this->load->model('getUserActive');
    $data['user'] = $this->getUserActive->getActive();
$id = $this->input->post('dish_id');
    $data['dishesOrder'] = $this->Dishes_model->selectDish($id);
    $output = "";	
		foreach ($data['dishesOrder'] as $dish) 
		{	
			$output .= '
				<form action="'.base_url().'admin/PreOrder/insertOrderInfo/'.$id.'/'.$dish->meal_time_id.'" method="post">			        
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
