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
     * Display the list of all dry food
     * @author khai hok <khai.hok.passerellesnumeriques.org>
     */
    public function listDish() {
        $this->load->helper('form');
        $this->load->model('Dishes_model');
        $data['dishes'] = $this->Dishes_model->getDishes();
        $data['title'] = 'List of Dishes';
        $data['activeLink'] = 'users';
        $this->load->view('templates/header', $data);
        $this->load->view('menu/admin_dasboard', $data);
        $this->load->view('Admin/food/listDish', $data);
        $this->load->view('templates/footer', $data);
    }

    /**
     * Display the list of all water food
     * @author khai hok <khai.hok.passerellesnumeriques.org>
     */
    public function waterFood() {
        $this->load->helper('form');
        // $data['users'] = $this->users_model->getUsersAndRoles();
        $data['title'] = 'List water food';
        $data['activeLink'] = 'users';
        $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/admin_dasboard', $data);
        $this->load->view('admin/food/listDish', $data);
        $this->load->view('templates/footer', $data);
    }

    public function favouriteFood(){
        $data['title'] = 'List Favourite Food';
        $data['activeLink'] = 'users';
        $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/admin_dasboard', $data);
        $this->load->view('admin/food/favouriteFoods', $data);
        $this->load->view('templates/footer', $data);
    }

  /**
     * viewDishDetail
     * @author Chantha ROEURN <chantha.roeurn@student.passerellesnumeriques.org>
     */
    public function viewDishDetail(){
        $dishId = $this->uri->segment('4');
        $this->load->helper('form');
        $this->load->model('Dishes_model');
        $data['dishes'] = $this->Dishes_model->viewDetail($dishId);
       $data['title'] = 'List Favourite Food';
        $data['activeLink'] = 'users';
        $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/admin_dasboard', $data);
        $this->load->view('dishes/viewDishDetail', $data);
        $this->load->view('templates/footer', $data);
        
    }

   // // Start update dishes
   public function updateDishes(){        
   $id = $this->uri->segment(4);        
   $data['select_dishes'] = $this->Dishes_model->selectDish($id);       
    $data['title'] = 'Update Dishes';           
    $this->load->view('templates/header');            
    $this->load->view('menu/admin_dasboard');            
    $this->load->view('dishes/updateDish', $data);            
    $this->load->view('templates/footer');         
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
        echo $this->upload->display_errors();  // show error message                
    }


 //    public function viewDishDetail($id){
 //     $data['title'] = 'List Favourite Food';
 //     $data['activeLink'] = 'users';
 //     $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
 //     $this->load->view('templates/header', $data);
 //     $this->load->view('menu/admin_dasboard', $data);
 //     $this->load->view('dishes/viewDishDetail', $data);
 //     $this->load->view('templates/footer', $data);
 // }

    else                
    {                  
        $data['dishes'] = $this->Dishes_model->updateDishes($id); //load model                  
        if($data){ 
            redirect('admin/food/listDish');                  
        }                
    } 
}
/**
* delete dish from database
* @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
*/
    public function deleteDish(){
       $id = $this->uri->segment(4);
        $this->Dishes_model->deleteDishes($id);
    }

/**
     * add_dish with image
     * @author Chantha ROEURN <chantha.roeurn@student.passerellesnumeriques.org>
     */
    public function add_dish()
    {
            $this->load->helper('form');
            $data['mealTime'] = $this->Dishes_model->getMealTime();
            $data['dishes'] = $this->Dishes_model->getDishes();
            $data['title'] = 'List of Dishes';
            $data['activeLink'] = 'users';
            $this->load->view('templates/header', $data);
            $this->load->view('menu/admin_dasboard', $data);
            $this->load->view('admin/food/view_add_dish', $data);
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
                    echo $this->upload->display_errors();  // show error message
                }
                else
                {
                    $data['dishes'] = $this->Dishes_model->insert_dish(); //load model
                    if($data){
                            redirect('admin/food/listDish');
                        }
                
                }
    }
/**
     * show breakfast lunch and dinner in admin dashboard
     * @author Chantha ROEURN <chantha.roeurn@student.passerellesnumeriques.org>
     */
    function showBreakfast() {
            $this->load->helper('form');
            $data['dishes'] = $this->dishTypeModel->getBreakfast();
            $data['title'] = 'List of Dishes';
            $data['activeLink'] = 'users';
            $this->load->view('templates/header', $data);
            $this->load->view('menu/admin_dasboard', $data);
            $this->load->view('dishes/breakfast', $data);
            $this->load->view('templates/footer', $data);
    }
        function showLunch() {
            $this->load->helper('form');
            $data['dishes'] = $this->dishTypeModel->getLunch();
            $data['title'] = 'List of Dishes';
            $data['activeLink'] = 'users';
            $this->load->view('templates/header', $data);
            $this->load->view('menu/admin_dasboard', $data);
            $this->load->view('dishes/lunch', $data);
            $this->load->view('templates/footer', $data);
    }

    function showDinner() {
            $this->load->helper('form');
            $data['dishes'] = $this->dishTypeModel->getDinner();
            $data['title'] = 'List of Dishes';
            $data['activeLink'] = 'users';
            $this->load->view('templates/header', $data);
            $this->load->view('menu/admin_dasboard', $data);
            $this->load->view('dishes/dinner', $data);
            $this->load->view('templates/footer', $data);
    }

    function createMenu(){
        $this->load->helper('form');
        $data['dishes'] = $this->dishTypeModel->getDinner();
        $data['title'] = 'create menu for today';
        $data['activeLink'] = 'users';
        $this->load->view('templates/header', $data);
        $this->load->view('menu/admin_dasboard', $data);
        $this->load->view('dishes/createMenu', $data);
        $this->load->view('templates/footer', $data);
    }
    

 public function selectDish() {
    $id = $this->uri->segment(4);
    $data['select_dishes'] = $this->Dishes_model->selectDish($id);
    $data['title'] = 'List of Dishes';
    $data['activeLink'] = 'users';
    $this->load->view('templates/header');
    $this->load->view('menu/admin_dasboard');
    $this->load->view('dishes/updateDish', $data);
    $this->load->view('templates/footer');
}


}
