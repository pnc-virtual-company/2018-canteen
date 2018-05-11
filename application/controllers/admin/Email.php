<?php 
	class  Email extends CI_Controller {

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
			$this->email->from('sun.meas@student.passerellesnumeriques.org','Sun Meas');
			$this->email->to('meassun2014@gmail.com');
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