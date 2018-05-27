
<?php 

/**
 * CRUD that related to Calendar and sending email in the database.
 * @return int number of affected rows
 * @author sun MEAS <sun.meas@gmail.com>
 */
Class calendar extends CI_Controller{
	    /**
	     * Default constructor
	     * @author kimsoeng kao <kimsoeng.kao@student.passerellesnumeriques.org>
	     */
	    public function __construct() {
	    parent::__construct();
	    log_message('debug', 'URI=' . $this->uri->uri_string());
	    $this->session->set_userdata('last_page', $this->uri->uri_string());
	    if($this->session->loggedIn === TRUE) {
	       // Allowed methods
	       if ($this->session->isSuperAdmin || $this->session->isStaff) {
	         //User management is reserved to admins and super admins
	       } else {
	         redirect(base_url());
	       }
	     } else {
	       redirect('connection/login');
	     }
	    $this->load->model('users_model');
	}
	// stuff calendar
	function getJoinDinnerEvent(){
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/userJoinCalendar';
		$this->load->view('layout', $data);
	}

	// admin calendar
	function getAdminCalendar(){
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/admin_calendar';
	  $this->load->view('templates/header', $data);
	 	$this->load->view('menu/admin_dasboard', $data);
		$this->load->view('Calendar/admin_calendar', $data);
	  $this->load->view('templates/footer', $data);
	}	
	function getDinnerEvent(){
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/admin_calendar';
	  $this->load->view('templates/header', $data);
	  $this->load->view('menu/admin_dasboard', $data);
		$this->load->view('Calendar/dinnerEvent', $data);
	  $this->load->view('templates/footer', $data);
	}

	/*Get all staff lunch Events */

	Public function getLunchEvents()
	{
		$result=$this->Calendar_model->getLunchEvents();
		echo json_encode($result);
	}
	/*Add new event */
	Public function addLunchEvent()
	{
		$result=$this->Calendar_model->addLunchEvent();
		echo $result;
	/*Sending email to invite the staff the join the lunch in PNC*/
		$this->load->model('Participate_model');      
		$selectMessage = $this->Participate_model->getLatestDescrition();     
		foreach ($selectMessage as $descr) {        
		  $eventName = $descr->title;      
		  $contentEmail = $descr->description;      
		}     
		$mesg = $this->load->view('Calendar/sendMailResult','',true);
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
		$this->email->to('sun.meas@student.passerellesnumeriques.org');
		$this->email->subject($eventName);
		$this->email->message('Dear Staffs,  '.'<br><br>'.$contentEmail.$mesg);
		$this->email->send();
	}
	/*Update Event */
	Public function updateLunchEvent()
	{
		$result=$this->Calendar_model->updateLunchEvent();
		echo $result;
	}
	
	/*Delete Event*/
	Public function deleteEvent()
	{
		$result=$this->Calendar_model->deleteLunchEvent();
		echo $result;
	}
	Public function dragUpdateEvent()
	{	
		$result=$this->Calendar_model->dragUpdateLunchEvent();
		echo $result;
	}

	/*Get all  dinner Events */

	Public function getDinnerEvents()
	{
		$result=$this->Calendar_model->getDinnerEvents();
		echo json_encode($result);
	}
	/*Add new event */
	Public function addDinnerEvent()
	{
		$result=$this->Calendar_model->addDinnerEvent();
		echo $result;
	}
	/*Update Event */
	Public function updateDinnerEvent()
	{
		$result=$this->Calendar_model->updateDinnerEvent();
		echo $result;
	}
	/*Delete Event*/
	Public function deleteDinnerEvent()
	{
		$result=$this->Calendar_model->deleteDinnerEvent();
		echo $result;
	}
	Public function dragUpdateDinnerEvent()
	{	
		$result=$this->Calendar_model->dragUpdateLunchEvent();
		echo $result;
	}

	/*Add new event user for join event */
	Public function userJoinEvent()
	{
		$result=$this->Calendar_model->userJoinEvent();
		echo $result;
	}
}
 ?>