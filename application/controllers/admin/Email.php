<?php 
	class  Email extends CI_Controller {

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