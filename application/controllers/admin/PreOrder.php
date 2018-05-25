<?php 
class PreOrder extends CI_Controller {
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
            redirect(base_url());
          }
        } else {
          redirect('connection/login');
        }
       $this->load->model('users_model');
   }
   /**
    * Get all the food which are already ordered by the users
    * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
    */
	public function preOrderList(){
      $data['preOrder'] = $this->Dishes_model->preOrderList();
      $data['title'] = 'Pre Order Food';
      $this->load->view('templates/header', $data);
      $this->load->view('menu/admin_dasboard', $data);
      $this->load->view('Admin/food/preOrder', $data);
      $this->load->view('templates/footer', $data);
  }

    /**
    * Get all the user who already order the dishes
    * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
    */
  public function userOrderList(){
    $data['userPreOrder'] = $this->Users_model->userOrderList();
    $data['title'] = 'Users Pre-Ordered';
    $this->load->view('templates/header', $data);
    $this->load->view('menu/admin_dasboard', $data);
    $this->load->view('Admin/users/userPreOrdered', $data);
    $this->load->view('templates/footer', $data);
  }

  /**
  * Export the user who already the dishes
  * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
  */
  public function exportDishOrdered() {
    $data['dishPreOrder'] = $this->Dishes_model->preOrderList();
    $this->load->view('Admin/food/exportDishOrdered',$data);
  }
}
