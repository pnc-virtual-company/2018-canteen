<?php
/**
 * This controller serves the user management pages and tools.
 * @copyright  Copyright (c) 2018-2019 hok khai
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      0.1.0
 */

if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

/**
 * This controller serves the user management pages and tools.
 * The difference with HR Controller is that operations are technical (CRUD, etc.).
 */
class food extends CI_Controller {
    /**
     * Default constructor
     * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
     */
    public function __construct() {
        parent::__construct();
        log_message('debug', 'URI=' . $this->uri->uri_string());
        $this->session->set_userdata('last_page', $this->uri->uri_string());
        if($this->session->loggedIn === TRUE) {
           // Allowed methods
           if ($this->session->isAdmin || $this->session->isSuperAdmin) {
             //User management is reserved to admins and super admins

         }else {
           redirect('welcome');
       }
   } else {
     redirect('connection/login');
 }
 $this->load->model('UsersModel');
}

/**
  * @return the list of dishes
  * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
*/
public function index() {
  $this->load->helper('form');
  $this->load->model('DishesModel');
  $data['dishes'] = $this->DishesModel->getDishes();
  $data['title'] = 'List of Dishes';
  $data['activeLink'] = 'users';
  $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
  $this->load->view('templates/header', $data);
  $this->load->view('menu/adminDasboard', $data);
  $this->load->view('Admin/food/listDish', $data);
  $this->load->view('templates/footer', $data);
}

/**
  * Short Meal type breakfast , dinner or lunch
  * @author kimsoeng kao <kimsoeng.kao.passerellesnumeriques.org>
*/
    public function shortMealType(){
      $this->load->helper('form');
      $mealType = $this->uri->segment(4);
      $data['mealType'] = "";
      if ($mealType ==1 ) {
        $data['mealType'] = "List All BreakFast";
      }else if ($mealType ==2 ) {
        $data['mealType'] = "List All Lunch";
      }else {
        $data['mealType'] = "List All Dinner";
      }
      $data['dishes'] = $this->DishesModel->shortMealType($mealType);
      $data['title'] = 'List of Dishes';
      $data['activeLink'] = 'users';
      $this->load->view('templates/header', $data);
      $this->load->view('menu/adminDasboard', $data);
      $this->load->view('dishes/shortMealType', $data);
      $this->load->view('templates/footer', $data); 
    }
  
/**
  * Display the list of all food
  * @author kimsoeng kao <kimsoeng.kao.passerellesnumeriques.org>
*/
public function listDish() {
  $this->load->helper('form');
  $this->load->model('DishesModel');
  $data['dishes'] = $this->DishesModel->getDishes();
  $data['title'] = 'List of Dishes';
  $data['activeLink'] = 'users';
  $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
  $this->load->view('templates/header', $data);
  $this->load->view('menu/adminDasboard', $data);
  $this->load->view('Admin/food/listDish', $data);
  $this->load->view('templates/footer', $data);
}

/**
  * display pie chat of the favorite dishes
  * @author khai hok <khai.hok.passerellesnumeriques.org>
*/
public function favouriteFood(){
  $data['title'] = 'List Favorite Food';
  $data['activeLink'] = 'users';
  $this->load->model('foodFavorite');
  $data['dishes'] = $this->foodFavorite->dishesFavorite();
  $this->load->view('templates/header', $data);
  $this->load->view('menu/adminDasboard', $data);
  $this->load->view('admin/food/favouriteFoods', $data);
  $this->load->view('templates/footer', $data);
}

/**
  * Update dish
  * @author kimsoeng kao <kimsoeng.kao.passerellesnumeriques.org>
*/
public function updateDishes(){        
  $id = $this->uri->segment(4);
  $data['mealTime'] = $this->DishesModel->getMealTime();
  $data['select_dishes'] = $this->DishesModel->selectDish($id);       
  $data['title'] = 'Update Dishes'; 
  $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
  $this->load->view('templates/header');            
  $this->load->view('menu/adminDasboard');                    
   // upload User image configuaration                
  $config['upload_path'] = './assets/images/dish_uploads/';
  $config['allowed_types']= 'gif|jpg|png';
  $config['max_size'] = 10000;
  $config['max_width']  = 1024;
  $config['max_height']= 768;               
  $this->load->library('upload', $config);                
    //Condition to know the if image insert or not                
    if ( ! $this->upload->do_upload('dishImage')) 
    {
      $data['error_message'] = $this->upload->display_errors();  // show error message     
    }
    else                
    {                  
      $data['dishes'] = $this->DishesModel->updateDishes($id); //load model                  
      if($data){ 
        $this->session->set_flashdata('msg', 'Dish has been updated.');
        redirect('admin/food/listDish');                  
      }                
    }
    $this->load->view('dishes/updateDish', $data);            
    $this->load->view('templates/footer');  
}

/**
* delete dish from database
* @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
*/
public function deleteDish(){
  $id = $this->uri->segment(4);
  $this->DishesModel->deleteDishes($id);
  $this->session->set_flashdata('msg', 'Dish has been Deleted.');
  $this->listDish();
}

/**
* create new dihs
* @author Chantha ROEURN <chantha.roeurn@student.passerellesnumeriques.org>
*/
  public function addDish(){
    $this->load->helper('form');
    $data['mealTime'] = $this->DishesModel->getMealTime();
    $data['dishes'] = $this->DishesModel->getDishes();
    $data['title'] = 'List of Dishes';
    $data['activeLink'] = 'users';
    $this->load->view('templates/header', $data);
    $this->load->view('menu/adminDasboard', $data);
    $this->load->view('templates/footer', $data);
    // upload image config
    $config['upload_path']          = './assets/images/dish_uploads/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 10000;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;
    $this->load->library('upload', $config);
    //Condition to know the if image insert or not
    if ( ! $this->upload->do_upload('dishImage'))
    {
      $data['error_msg'] = $this->upload->display_errors();  // show error message
    }
      else
        {
          $data['dishes'] = $this->DishesModel->addDish(); //load model
          if($data){
            $this->session->set_flashdata('msg', 'Dish has been created.');
            redirect('admin/food/listDish');
          }
        }
        $this->load->view('admin/food/addDish', $data);
  }

/**
* let loop the quantiy for each food to get only quantiy != 0
* @author Chantha ROEURN <chantha.roeurn@student.passerellesnumeriques.org>
*/
  function addOrder(){
    // okay now let get value from form
    $food_ids = $this->input->post('fo_id');
    $quantities = $this->input->post('plate');
    // let loop the quantiy for each food to get only quantiy != 0
    for($i = 0; $i<count($quantities); $i++)
    {
      // check if qty != 0, let insert it into db
      if($quantities[$i] != 0)
      {
        // call model to insert to db
        $ordered = $this->DishesModel->createOrder($sfood_ids[$i], $quantities[$i]);
        if($ordered ){
          redirect('Welcome ');
        }
      }
    }
  }
/**
* Display the list of dish for creating meanu
* @author khai hok <khai.hok@student.passerellesnumeriques.org>
*/
  function createMenu(){
    $this->load->helper('form');
    $data['dishes'] = $this->dishTypeModel->getDinner();
    $data['title'] = 'create menu for today';
    $data['activeLink'] = 'Create Menu';
    $this->load->view('templates/header', $data);
    $this->load->view('menu/adminDasboard', $data);
    $this->load->view('dishes/createMenu', $data);
    $this->load->view('templates/footer', $data);
  }

 /**
* get dish to update
* @author davy poeng <davy.poeng@student.passerellesnumeriques.org>
*/   
 public function selectDish() {
  $id = $this->uri->segment(4);
  $data['select_dishes'] = $this->DishesModel->selectDish($id);
  $data['title'] = 'List of Dishes';
  $data['activeLink'] = 'users';
  $this->load->view('templates/header');
  $this->load->view('menu/adminDasboard');
  $this->load->view('dishes/updateDish', $data);
  $this->load->view('templates/footer');
}

}
