<?php 
  if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

  /**
   * This controller serves the user management pages and tools.
   * The difference with HR Controller is that operations are technical (CRUD, etc.).
   */
  class StaffParticipation extends CI_Controller {
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
   * List all the participation that join the lunch event
  * @author Sun MEAS <sun.meas@student.passerellesnumeriques.org>
  */
  function getListParticipate(){
    $data['page'] = 'Calendar/StaffParticipation';
    $this->load->model('UsersModel');
    $this->load->model('ParticipateModel');
    $data['title'] = 'List of Participate';
    $this->load->view('templates/header', $data);
    $this->load->view('menu/adminDasboard', $data);
    $status = $this->uri->segment(4);
    $data['statusId'] = $this->uri->segment(4);
    if ($status == 2) {
      $data['$statusId'] = $status;
      $data['userParticipate'] = $this->UsersModel->getListParticipate();
    }else if ($status != 2) {
      $data['$statusId'] = $status;
      $data['userParticipate'] = $this->UsersModel->shortListParticipate($status);
    }
      $this->load->view('Calendar/StaffParticipation', $data);
      $this->load->view('templates/footer', $data);
    }
 }