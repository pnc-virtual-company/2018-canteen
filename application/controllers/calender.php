
<?php 
Class calender extends CI_Controller{
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
	function getCalender(){
		$data['title'] = 'Calender';
		$data['page'] = 'calender/calender';
      
        $this->load->view('templates/header', $data);
        $this->load->view('menu/admin_dasboard', $data);
				$this->load->view('admin/calender/calender', $data);
        $this->load->view('templates/footer', $data);
	}	
}
 ?>