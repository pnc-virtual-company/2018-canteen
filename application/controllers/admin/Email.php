<?php 
/**
 * This controller serves the user management pages and tools.
 * @copyright  Copyright (c) 2018-2019 hok khai
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      0.1.0
 */

if (!defined('BASEPATH')) { exit('No direct script access allowed'); }
class  Email extends CI_Controller {
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

	function index(){
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'pnc.temporary.vc2018@passerellesnumeriques.org',
			'smtp_pass' => 'Pnc!Wep2018?'
		);
		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('pnc.temporary.vc2018@passerellesnumeriques.org','Admin & Finance');
		$this->email->to('sun.meas@student.passerellesnumeriques.org');
		$this->email->subject('This is an email testing');
		$this->email->message('It is working . Greate!');

			// if ($this->email->send()) 
			// {
			// 	echo "Your email has been send.";
			// }
			// else {
			// 		show_error($this->email->print_debugger());				
			// }
	}

}