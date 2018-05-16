<?php 
class PreOrder extends CI_Controller {
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
	public function preOrderList(){
      $data['preOrder'] = $this->Dishes_model->preOrderList();
      $data['title'] = 'Pre Order Food';
      $this->load->view('templates/header', $data);
      $this->load->view('menu/admin_dasboard', $data);
      $this->load->view('Admin/food/preOrder', $data);
      $this->load->view('templates/footer', $data);
  }

  public function userOrderList(){
    $data['userPreOrder'] = $this->Dishes_model->userOrderList();
    $data['title'] = 'Users Pre-Ordered';
    $this->load->view('templates/header', $data);
    $this->load->view('menu/admin_dasboard', $data);
    $this->load->view('Admin/food/userPreOrdered', $data);
    $this->load->view('templates/footer', $data);
  }

  public function insertOrderInfo(){
    $dish_id = $this->uri->segment(4); 
    $meal_time_id = $this->uri->segment(5); 
    $data['userPreOrder'] = $this->Dishes_model->createOrder($dish_id,$meal_time_id);
    if ($data == TRUE) {
      redirect(base_url());
    }
  }

}
