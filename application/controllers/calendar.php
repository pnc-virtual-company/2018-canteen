
<?php 
Class calendar extends CI_Controller{
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
	// stuff calendar
	function getStuffCalendar(){
		$this->load->model('getUserActive');
        $data['user'] = $this->getUserActive->getActive();
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/stuff_calendar';
		// $this->load->view('templates/right_menu', $data);
		$this->load->view('layout', $data);
	}

	// admin calendar
	function getAdminCalendar()
	{
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/admin_calendar';
	        	$this->load->view('templates/header', $data);
	       	$this->load->view('menu/admin_dasboard', $data);
		$this->load->view('Admin/Calendar/admin_calendar', $data);
	        	$this->load->view('templates/footer', $data);
	}	

	function getEvent()
	{
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/admin_calendar';
	        	$this->load->view('templates/header', $data);
	       	$this->load->view('menu/admin_dasboard', $data);
		$this->load->view('Admin/Calendar/admin_calendar', $data);
	        	$this->load->view('templates/footer', $data);
	}
	function getRegister()
	{
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/admin_calendar';
	        	$this->load->view('templates/header', $data);
	       	$this->load->view('menu/admin_dasboard', $data);
		$this->load->view('Admin/Calendar/admin_calendar', $data);
	        	$this->load->view('templates/footer', $data);
	}
	function getMonthlyEvent()
	{
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/admin_calendar';
	        	$this->load->view('templates/header', $data);
	       	$this->load->view('menu/admin_dasboard', $data);
		$this->load->view('Admin/Calendar/admin_calendar', $data);
	        	$this->load->view('templates/footer', $data);
	}

	function addEvent()
	{

	}
}
 ?>