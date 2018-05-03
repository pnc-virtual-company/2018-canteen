
<?php 
Class calendar extends CI_Controller{
	// stuff calendar
	function getStuffCalendar()
	{
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/stuff_calendar';
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