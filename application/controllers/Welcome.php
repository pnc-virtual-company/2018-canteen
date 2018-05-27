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

    	$rows = array();
    	$result = $this->Dishes_model->getMenu(1);
    	// We will create new array to store new element value check is the food already order, it is the same as like unlick yesteraday
    	if($result->num_rows() > 0)
    	{
    		foreach ($result->result() as $row) {
    			$rows[] = array(
    					'dish_id' => $row->dish_id,
    					'dish_name' => $row->dish_name,
    					'dish_image' => $row->dish_image,
    					'description' => $row->description,
    					'dish_active' => $row->dish_active,
    					'meal_time_id' => $row->meal_time_id,
    					'menu_created_date' => $row->menu_created_date,
    					'menu_description' => $row->menu_description,
    					'current_interest' => $row->current_interest,
    					'is_user_order' => $this->Dishes_model->checkIfUserOrderDish($row->dish_id, $this->session->userdata('id'))
    				);
    		}
    	}
    	$data['dishesOrder'] = $rows;

    	// Lunch time 
    	$rows_lunch = array();
    	$result = $this->Dishes_model->getMenu(2);
    	if($result->num_rows() > 0)
    	{
    		foreach ($result->result() as $row) {
    			$rows_lunch[] = array(
    					'dish_id' => $row->dish_id,
    					'dish_name' => $row->dish_name,
    					'dish_image' => $row->dish_image,
    					'description' => $row->description,
    					'dish_active' => $row->dish_active,
    					'meal_time_id' => $row->meal_time_id,
    					'menu_created_date' => $row->menu_created_date,
    					'current_interest' => $row->current_interest,
    					'menu_description' => $row->menu_description,
    					'is_user_order' => $this->Dishes_model->checkIfUserOrderDish($row->dish_id, $this->session->userdata('id'))
    				);
    		}
    	}
    	$data['dishesOrder1'] = $rows_lunch;
    	// Dinner time 
    	$rows_dinner = array();
    	$result = $this->Dishes_model->getMenu(3);
    	// We will create new array to store new element value check is the food already order, it is the same as like unlick yesteraday
    	if($result->num_rows() > 0)
    	{
    		foreach ($result->result() as $row) {
    			$rows_dinner[] = array(
    					'dish_id' => $row->dish_id,
    					'dish_name' => $row->dish_name,
    					'dish_image' => $row->dish_image,
    					'description' => $row->description,
    					'dish_active' => $row->dish_active,
    					'meal_time_id' => $row->meal_time_id,
    					'menu_created_date' => $row->menu_created_date,
    					'current_interest' => $row->current_interest,
    					'menu_description' => $row->menu_description,
    					'is_user_order' => $this->Dishes_model->checkIfUserOrderDish($row->dish_id, $this->session->userdata('id'))
    				);
    		}
    	}
    	$data['dishesOrder2'] = $rows_dinner;
		$data['page'] = 'welcome';
		$this->load->view('layout', $data);
	}

		/**
     * Dishplay  favorite food in public user interface
     * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
     */
	public function favoriteFood(){
		$this->load->model('foodFavorite');
		$data['dishes'] = $this->foodFavorite->dishesFavorite();
		$data['title'] = 'Favorite Food';
		$data['page'] = 'dishes/favouriteFoods';
		$this->load->view('layout', $data);
	}

	public function getDish(){
	
	$id = $this->input->post('dish_id');
	$status_form = $this->input->post('status_form');

	$output = "";

	/// if check statu form for order or edit
	if($status_form == "btn_order"){
    	$data['dishesOrder'] = $this->Dishes_model->selectDish($id);
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
	}else{ // Edit form
		$dish_order_edit_data = $this->Dishes_model->selectDishEdit($id, $this->session->userdata('id'));

		foreach ($dish_order_edit_data as $dish) 
		{	
			$output .= '
				<form action="'.base_url().'Welcome/EditOrderInfo/'.$dish->order_id.'" method="post">			        
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
							          	<select name="quantity" class="form-control">';

							        	for($i = 1; $i <= 10; $i++)
										{
											$selected = "";
											if($dish->quantity == $i)
											{
												$selected = "selected";
											}

											$output.='<option '.$selected.' value="'.$i.'">'.$i.'</option>';
										}							           			

			$output .= '</select>	 	
							</div>
						</div>							 	     	
					</div>				        					        	
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				        <button type="submit" class="btn btn-success" id="btn-order">Save Edit</button>
				      </div>
				  </form>
			';
		}






	}
	echo $output;
}

	 public function insertOrderInfo(){
    $dish_id = $this->uri->segment(3); 
    $meal_time_id = $this->uri->segment(4); 
    $data['userPreOrder'] = $this->Dishes_model->createOrder($dish_id,$meal_time_id);
    if ($data == TRUE) {
      redirect(base_url());
       ///  $data['dishesOrder']  = $this->Dish_model->updateOrder($dish_id);
    }else{
      $data == true;
    }
  }
  // edit order info 
  public function EditOrderInfo()
  {
    $order_id = $this->uri->segment(3);
    $this->Dishes_model->updateOrderInfo($order_id); 
    redirect(base_url());
  }
}
