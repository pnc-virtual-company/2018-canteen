<?php
/**
 * This controller serves the create menu management pages.
 * @copyright  Copyright (c) 2017-2018 hok khai
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      0.1.0
 */
if (!defined('BASEPATH')) { exit('No direct script access allowed'); }
/**
 * This controller serves the create menu pages.
 * 
 */
class CreateMenu extends CI_Controller {
     /**
     * Allow only admin and super admin to use this function
     * @author khai hok <khai.hok.passerellesnumeriques.org>
     */
 public function __construct() {
    parent::__construct();
    log_message('debug', 'URI=' . $this->uri->uri_string());
    $this->session->set_userdata('last_page', $this->uri->uri_string());
    if($this->session->loggedIn === TRUE) {
           // Allowed methods
       if ($this->session->isAdmin || $this->session->isSuperAdmin) {
        //User management is reserved to admins and super admins
     } else {
       redirect(base_url());
   }
} else {
 redirect('connection/login');
}
$this->load->model('UsersModel');
}
    /**
     * Display the list of all list of food to create menu.
     * @author khai hok <khai.hok.passerellesnumeriques.org>
     */
    public function index() {
        $this->load->helper('form');
        $this->load->model('DishesModel');
        $data['data_image']= $this->DishesModel->getDishes();
        $data['meal_time']= $this->DishesModel->getMealTime();
        $data['title'] = 'List of users';
        $data['activeLink'] = 'users';
        $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
        $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/adminDasboard', $data);
        $this->load->view('admin/createMenu', $data);
        $this->load->view('templates/footer', $data);
    }
    /**
     * Display the select multiple of dishes info from when we select image to create menu.   
     * @author khai hok <khai.hok.passerellesnumeriques.org>
     */
    public function postMenu() {
        if (isset($_POST['submit'])) {
            $id = $_POST['dish_id'];
            if (empty($id) || $id==0) {
             $this->session->set_flashdata('msg', 'Please select at least one dish.');
             redirect('admin/CreateMenu'); 
         } else {
            $this->load->model('createDish');
            date_default_timezone_set("Asia/Phnom_Penh");
            $creating_date = date('Y-m-d');
            $dishId = "'".implode("', '", $id)."'";
            $meal_time =$this->input->post('meal_time');
            $mealDate =$this->input->post('mealDate');
            $menuDescription =$this->input->post('menuDescription');
            $data['meal_time'] = $meal_time;
            if ( $mealDate ==  $creating_date) {
               $this->createDish->getPostMenu($dishId, $meal_time, $mealDate, $menuDescription);
           }elseif ($mealDate < $creating_date) {
            $this->session->set_flashdata('msg', 'You cannot Create food for the previous day.');
            redirect('admin/CreateMenu'); 
        } else {
           $this->createDish->getPostMenuNext($dishId, $meal_time, $mealDate, $menuDescription);
       }     
       $this->session->set_flashdata('msg', 'Menu have created successfully.');
       redirect('admin/CreateMenu', $data);     
   }
}
}
}