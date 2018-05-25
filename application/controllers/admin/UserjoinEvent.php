<?php 
  if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

  /**
   * This controller serves the user management pages and tools.
   * The difference with HR Controller is that operations are technical (CRUD, etc.).
   */
  class UserjoinEvent extends CI_Controller {
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
             if ($this->session->isSuperAdmin) {
               //User management is reserved to admins and super admins
             } else {
               redirect(base_url());
             }
           } else {
             redirect('connection/login');
           }
          $this->load->model('users_model');
      }

      /*Function to get the user join the events */
      public function insertUserJoinEvent(){
          $Dinner_ID = $this->uri->segment(4); 
          $this->load->model('JoinDinner_model');
           $data['joinEvent'] = $this->JoinDinner_model->getUserJoinEvent($Dinner_ID);
           if ($data == TRUE) {
             redirect(base_url());
           }
       }

        // Get user join dinner events
       function getDinner(){
        $id = $this->uri->segment(4);        
        $data['dinnerEvent'] = $this->JoinDinner_model->selectDinner($id);       
       }

       // Get user join dinner events
       function getListJoinDinner(){
          $data['page'] = 'Calendar/UserJoin_dinner';
          $this->load->model('JoinDinner_model');
          $data['joinEvent'] = $this->JoinDinner_model->getListJoinDinner();
          $data['title'] = 'List of user join Dinner';
          $this->load->view('templates/header', $data);
          $this->load->view('menu/admin_dasboard', $data);
          $this->load->view('Calendar/UserJoin_dinner', $data);
          $this->load->view('templates/footer', $data);
        }

        // Export of user join
        public function exportUserJoinEvent() {
          $data['userJoinEvent'] = $this->JoinDinner_model->getListJoinDinner();
          $this->load->view('Calendar/export',$data);
        }
}

