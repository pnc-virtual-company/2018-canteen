<?php 
  if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

  /**
   * This controller serves the user management pages and tools.
   * The difference with HR Controller is that operations are technical (CRUD, etc.).
   */
  class StaffParticipation extends CI_Controller {

       // public function getParticipate()
       // {
       //         $this->load->model('Users_model');
       //         $data['userParticipate'] = $this->Users_model->getListParticipate();
       //         $data['title'] = 'List of Participate';
       //         $this->load->view('templates/header', $data);
       //         $this->load->view('menu/admin_dasboard', $data);
       //         $this->load->view('Calendar/UserParticipation', $data);
       //         $this->load->view('templates/footer', $data);

       // }
       function getListParticipate(){
          $data['page'] = 'Calendar/StaffParticipation';
          $this->load->model('Users_model');
          $data['userParticipate'] = $this->Users_model->getListParticipate();
          $data['title'] = 'List of Participate';
          $this->load->view('templates/header', $data);
          $this->load->view('menu/admin_dasboard', $data);
          $this->load->view('Calendar/StaffParticipation', $data);
          $this->load->view('templates/footer', $data);
        }


     }
 ?>