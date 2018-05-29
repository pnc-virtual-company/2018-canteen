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
          $this->load->model('UsersModel');
      }

       /**
        * @return user join the events
        * @author sun meas <sun.meas@student.passerellesnumeriques.org>
      */
      public function insertUserJoinEvent(){
          $Dinner_ID = $this->uri->segment(4); 
          $this->load->model('JoinDinnerModel');
           $data['joinEvent'] = $this->JoinDinnerModel->getUserJoinEvent($Dinner_ID);
           if ($data == TRUE) {
             redirect(base_url());
           }
       }

        /**
        * @return list of user to join dinner event
        * @author sun meas <sun.meas@student.passerellesnumeriques.org>
      */
       function getDinner(){
        $id = $this->uri->segment(4);        
        $data['dinnerEvent'] = $this->JoinDinnerModel->selectDinner($id);       
       }

        /**
        * @return Get user join dinner event
        * @author sun meas <sun.meas@student.passerellesnumeriques.org>
      */
       function getListJoinDinner(){
          $data['page'] = 'Calendar/userJoinDinner';
          $this->load->model('JoinDinnerModel');
          $data['joinEvent'] = $this->JoinDinnerModel->getListJoinDinner();
          $data['title'] = 'List of user join Dinner';
          $this->load->view('templates/header', $data);
          $this->load->view('menu/adminDasboard', $data);
          $this->load->view('Calendar/userJoinDinner', $data);
          $this->load->view('templates/footer', $data);
        }

        /**
        * @return Get user join dinner event
        * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
      */
        public function exportUserJoinEvent() {
          $data['userJoinEvent'] = $this->JoinDinnerModel->getListJoinDinner();
          $this->load->view('Calendar/export',$data);
        }
}

