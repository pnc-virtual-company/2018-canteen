<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class remindEmail extends CI_Controller {
 public function __construct() {
  parent::__construct();
 }

 /*Function email to remind the participated user to join the lunch event*/
 public function index() {
  $config = array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'pnc.temporary.vc2018@passerellesnumeriques.org', 
  'smtp_pass' => 'Pnc!Wep2018?',
  'mailtype' => 'html',
  'wordwrap' => TRUE
  );
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
     $this->email->from('pnc.temporary.vc2018@passerellesnumeriques.org', 'Admin & Finance');
      $this->email->to('sun.meas@student.passerellesnumeriques.org');
      $this->email->subject('Lunch Invitation Reminding');
      $this->email->message('We would like to remind you again to join the lunch event.');
   if($this->email->send())
      {
       $this->sendReminded();
      } else {
       show_error($this->email->print_debugger());
     }
       $this->sendReminded();
 }


}