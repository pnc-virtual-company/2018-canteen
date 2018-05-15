<?php 
	class c_users extends CI_Controller {
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
		public function addUsers(){
			$this->load->view('templates/header');
			$this->load->view('users/register');
			$this->load->view('templates/footer');
         $config['upload_path']          = './assets/images/user_uploads';
         $config['allowed_types']        = 'gif|jpg|png';
         $config['max_size']             = 10000;
         $config['max_width']            = 1024;
         $config['max_height']           = 768;
         $this->load->library('upload', $config);
         //Condition to know the if image insert or not
         if ( ! $this->upload->do_upload('image'))
         {
            echo $this->upload->display_errors();  // show error message
         }
         else
         {
            $data['add_users'] = $this->Users_model->addUsers(); //load model
            if($data){
               redirect('welcome');
            }
                
         }
		}
	}
 ?>