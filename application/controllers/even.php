
<?php 
Class even extends CI_controller{
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
	public function getRegisterList(){
		 $data['title'] = 'Registered List';
		$data['page'] = 'even/staff_register_list'; //load content
		$this->load->view('layout', $data);
	}
}
 ?>