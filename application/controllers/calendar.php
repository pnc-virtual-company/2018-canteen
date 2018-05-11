
<?php 
Class calendar extends CI_Controller{
	// stuff calendar
	function getStuffCalendar(){
		$this->load->model('getUserActive');
        		$data['user'] = $this->getUserActive->getActive();
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/stuff_calendar';
		$this->load->view('layout', $data);
	}

	// admin calendar
	function getAdminCalendar(){
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/admin_calendar';
	        	$this->load->view('templates/header', $data);
	       	$this->load->view('menu/admin_dasboard', $data);
		$this->load->view('admin/Calendar/admin_calendar', $data);
	        	$this->load->view('templates/footer', $data);
	}	

	function getRegister(){
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/admin_calendar';
	        	$this->load->view('templates/header', $data);
	       	$this->load->view('menu/admin_dasboard', $data);
		$this->load->view('Admin/Calendar/admin_calendar', $data);
	        	$this->load->view('templates/footer', $data);
	}
	function getMonthlyEvent(){
		$data['title'] = 'Calendar';
		$data['page'] = 'Calendar/admin_calendar';
	        	$this->load->view('templates/header', $data);
	       	$this->load->view('menu/admin_dasboard', $data);
		$this->load->view('Admin/Calendar/admin_calendar', $data);
	        	$this->load->view('templates/footer', $data);
	}

	/*Get all Events */

	Public function getEvents()
	{
		$result=$this->Calendar_model->getEvents();
		echo json_encode($result);
	}
	/*Add new event */
	Public function addEvent()
	{
		$result=$this->Calendar_model->addEvent();
		echo $result;
	}
	/*Update Event */
	Public function updateEvent()
	{
		$result=$this->Calendar_model->updateEvent();
		echo $result;
	}
	/*Delete Event*/
	Public function deleteEvent()
	{
		$result=$this->Calendar_model->deleteEvent();
		echo $result;
	}
	Public function dragUpdateEvent()
	{	
		$result=$this->Calendar_model->dragUpdateEvent();
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