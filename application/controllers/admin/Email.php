<?php 
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
				'smtp_host' => 'smtp.gmail.com',
				'smtp_port' => 25,
				'smtp_user' => 'sun.meas@student.passerellesnumeriques.org',
				'smtp_pass' => 'sunstudentpnc'
			);
			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
			$this->email->from('sun.meas@student.passerellesnumeriques.org','Admin & Finance');
			$this->email->to('WEP2018 Cambodia');
			$this->email->subject('This is an email testing');
			$this->email->message('It is working . Greate!');

			if ($this->email->send()) 
			{
				echo "Your email has been send.";
			}
			else {
					show_error($this->email->print_debugger());				
			}
		}

	}