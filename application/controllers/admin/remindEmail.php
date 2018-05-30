<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class remindEmail extends CI_Controller {
 public function __construct() {
  parent::__construct();
 }

 /**
  * Function email to remind the participated user to join the lunch event
  * @author sun meas <sun.meas@student.passerellesnumeriques.org>
  */
 public function index() {
/*Sending email to invite the staff the join the lunch in PNC*/
  $mesg = $this->load->view('Calendar/sendMailResult','',true);
  $email_to = ('sun.meas@student.passerellesnumeriques.org');
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
  $this->email->to($email_to);
  $this->email->subject('Lunch Invitation Reminding');
  $this->email->message('Dear staff, '.'<br><br>'.'You are reminded to join the lunch event at PNC.'.$mesg);
   if($this->email->send())
    {
      $this->sendReminded();
    } else {
      show_error($this->email->print_debugger());
    }
 }

}