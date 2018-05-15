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
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 25,
				'smtp_user' => 'kimsoeng.kao@student.passerellesnumeriques.org',
				'smtp_pass' => 'happynewyear'
			);
			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
			$this->email->from('kimsoeng.kao@student.passerellesnumeriques.org','kimsoeng kao');
			$this->email->to('kimsoeng.kao@gmail.com');
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